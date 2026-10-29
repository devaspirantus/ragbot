<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Jobs\IndexKnowledgeBaseJob;
use App\Models\KnowledgeBase;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

class KnowledgeBaseCreate extends Component
{
    use WithFileUploads;

    public string $title = '';

    public $documentFile;

    protected $rules = [
        'title' => 'required|string|max:255',
        'documentFile' => 'required|file|mimes:pdf,txt|max:10240',
    ];

    public function save()
    {
        $this->validate();

        $filePath = $this->documentFile->store('knowledge-bases','public');

        $knowledgeBase = KnowledgeBase::query()->create([
            'title' => $this->title,
            'original_filename' => $this->documentFile->getClientOriginalName(),
            'file_path' => $filePath,
            'status' => 'generating',
        ]);

        IndexKnowledgeBaseJob::dispatch($knowledgeBase);

        $this->redirect(route('knowledge-bases.show',$knowledgeBase),navigate:true);

        }


    public function render()
    {
        return view('livewire.admin.knowledge-base-create');
    }
}
