<?php

use Web\FE\Http\Controllers\HomeController;

Route::as('web_fe')->group(function () {
    Route::get('/', HomeController::class)->name('home');
});
