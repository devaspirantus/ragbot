<?php

namespace App\Jobs;

use App\Models\KnowledgeBase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class IndexKnowledgeBaseJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public KnowledgeBase $knowledgeBase)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->knowledgeBase->update(['status' => 'completed']);
    }
}
