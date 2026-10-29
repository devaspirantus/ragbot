<div class="p-6 max-w-4xl mx-auto">
    <a href="{{ route('knowledge-bases.index') }}"
        class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 mb-6">
        &larr; Back to Knowledge Base
    </a>

    <div class="flex items-start justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $knowledgeBase->title }}</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">File: {{ $knowledgeBase->original_filename }}</p>
        </div>

        <span
            class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700">
            <span class="h-2 w-2 animate-pulse rounded-full bg-blue-600"></span>
            {{ ucfirst($knowledgeBase->status) }}
        </span>
    </div>

    <div
        class="rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-6 shadow-sm text-center py-12">
        <svg class="animate-spin h-10 w-10 text-violet-600 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <p class="text-gray-600 dark:text-gray-300 text-lg">Processing your document...</p>
        <p class="text-gray-500 text-sm mt-2">The system is reading and indexing the file in the background.</p>

        <button wire:click="$refresh"
            class="mt-6 px-4 py-2 bg-violet-600 text-white rounded-lg hover:bg-violet-700 transition-colors text-sm font-medium">
            Refresh Status
        </button>
    </div>
</div>