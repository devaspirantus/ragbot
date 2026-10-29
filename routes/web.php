<?php

use App\Livewire\Admin\KnowledgeBaseAdmin;
use App\Livewire\Admin\KnowledgeBaseCreate;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',fn() => redirect()->route('knowledge-bases.index'));

Route::get('/admin/knowledge-base',KnowledgeBaseAdmin::class)->name('knowledge-bases.index');

Route::get('/admin/knowledge-base/create',KnowledgeBaseCreate::class)->name('knowledge-bases.create');