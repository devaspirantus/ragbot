<?php

use App\Livewire\Admin\KnowledgeBaseAdmin;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/knowledge-base',KnowledgeBaseAdmin::class)->name('knowledge-bases.index');