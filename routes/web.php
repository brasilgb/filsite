<?php

use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ItemPage;
use App\Livewire\ProductPage;
use App\Livewire\ServicePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/sobre', AboutPage::class);
Route::get('/contato', ContactPage::class);
Route::get('/servicos/{id?}', ServicePage::class);
Route::get('/produtos', ProductPage::class);
Route::get('/produtos/detalhes/{slug}', ItemPage::class);
