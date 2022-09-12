<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Verificar autenticação antes de qualquer rota
Route::prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
        
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
        Route::prefix('paginas')->group(function (){
            Route::get('/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
            Route::post('/store', [App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
            Route::get('/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
            Route::post('/{id}/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
            Route::get('/{id}/destroy', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.destroy');
            Route::post('componentes/add', [App\Http\Controllers\AdminController::class, 'addComponente'])->name('admin.componentes.add');
        });

        Route::prefix('componentes')->group(function (){
            Route::get('/', [App\Http\Controllers\ComponentesController::class, 'index'])->name('componentes');
            Route::get('/create', [App\Http\Controllers\ComponentesController::class, 'create'])->name('componentes.create');
            Route::post('/store', [App\Http\Controllers\ComponentesController::class, 'store'])->name('componentes.store');
            Route::get('/{id}/edit', [App\Http\Controllers\ComponentesController::class, 'edit'])->name('componentes.edit');
            Route::post('/{id}/update', [App\Http\Controllers\ComponentesController::class, 'update'])->name('componentes.update');
            Route::get('/{id}/destroy', [App\Http\Controllers\ComponentesController::class, 'destroy'])->name('componentes.destroy');
            Route::post('/addAll', [App\Http\Controllers\ComponentesController::class, 'addAll'])->name('componente.addAll');
            Route::post('/removeElemento', [App\Http\Controllers\ComponentesController::class, 'removeElemento'])->name('componente.removeElemento');
        });

        // Rotas dos crops
        Route::prefix('crop')->group(function () {
            Route::post('/salvar/{pasta?}', [App\Http\Controllers\CropController::class, 'store'])->name('crop.store');
            Route::post('/excluir/{pasta?}', [App\Http\Controllers\CropController::class, 'delete'])->name('crop.delete');
        });
    });
});

Route::get('/', function () {
    return redirect()->route('home.index');
});

include __DIR__ . '/rotas.php';