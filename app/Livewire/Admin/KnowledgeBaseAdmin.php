<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\KnowledgeBase;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Knowledge Base')]

class KnowledgeBaseAdmin extends Component
{
    public function delete(int $id):void{
        $knowledgeBase = KnowledgeBase::findOrFail($id);
        $knowledgeBase->delete();
    }
    public function render()
    {
        return view('livewire.admin.knowledge-base-admin',
        [
            'knowledgeBases' => KnowledgeBase::query()->latest()->get(),
        ]);
    }
}
