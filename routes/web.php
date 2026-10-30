<?php

use App\Livewire\Admin\KnowledgeBaseAdmin;
use App\Livewire\Admin\KnowledgeBaseCreate;
use App\Livewire\Admin\KnowledgeBaseShow;
use App\Livewire\Chat\ChatIndex;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',fn() => redirect()->route('knowledge-bases.index'));

Route::get('/chat',ChatIndex::class)->name('chat.index');


Route::get('/admin/knowledge-base',KnowledgeBaseAdmin::class)->name('knowledge-bases.index');

Route::get('/admin/knowledge-base/create',KnowledgeBaseCreate::class)->name('knowledge-bases.create');

Route::get('/admin/knowledge-base/{knowledgeBase}',KnowledgeBaseShow::class)->name('knowledge-bases.show');