<?php

use App\Livewire\AboutPage;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ProductPage;
use App\Livewire\ServicePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/sobre', AboutPage::class);
Route::get('/contato', ContactPage::class);
Route::get('/servicos', ServicePage::class);
Route::get('/produtos', ProductPage::class);
