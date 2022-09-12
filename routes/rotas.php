<?php
Route::get('/home/{id?}', [App\Http\Controllers\HomeController::class, 'pagina'])->name('home.index');
?>