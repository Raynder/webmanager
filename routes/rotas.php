<?php
Route::get('/home/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('home.index');
Route::get('/produtos/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('produtos.index');
Route::get('/quem-somos/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('quem-somos.index');
Route::get('/contato/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('contato.index');
?>