<?php

namespace App\Ai\Tools;

use App\Models\DocumentChunk;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Embeddings;
use Laravel\Ai\Enums\Lab;
use Laravel\Ai\Tools\Request;
use Stringable;

class LocalVectorSearch implements Tool
{

    public function __construct(protected string $knowledgeBaseId) {}

    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Search the uploaded document for relevant information matching the query.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $query = $request['query'];
        $queryEmbedding = Embeddings::for([$query])
            ->dimensions(768)->generate(Lab::Gemini)->embeddings[0];

        $chunks = DocumentChunk::query()
            ->where('knowledge_base_id', $this->knowledgeBaseId)
            ->whereVectorSimilarTo('embedding', $queryEmbedding)
            ->limit(5)
            ->get();

        if ($chunks->isEmpty()) {
            return 'No matching context found in the document.';
        }
        return $chunks
            ->map(fn($chunk) => "Context:\n" . $chunk->content)
            ->implode("\n\n");
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'query' => $schema->string()->required(),
        ];
    }
}
