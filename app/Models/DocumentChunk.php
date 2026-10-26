<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Pgvector\Laravel\HasNeighbors;
use Pgvector\Laravel\Vector; // ✅ تم التصحيح

class DocumentChunk extends Model
{
    use HasNeighbors;

    protected $fillable = [
        'knowledge_base_id',
        'content',
        'embedding'
    ];

    protected function casts(): array
    {
        return [
            'embedding' => Vector::class, // ✅ سيعمل بعد تصحيح الاستيراد
        ];
    }

    public function knowledgeBase(): BelongsTo
    {
        return $this->belongsTo(KnowledgeBase::class); // ✅ تم التصحيح
    }
}