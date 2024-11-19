
<?php

use App\Http\Controllers\WorkController;

Route::get('/works/all', [WorkController::class, 'getWorks'])->name('all.works');
