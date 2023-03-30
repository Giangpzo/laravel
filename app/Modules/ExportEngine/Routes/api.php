<?php

use Illuminate\Support\Facades\Route;
use App\Modules\ExportEngine\Controller\BigVolumeExportController;

Route::get('/download',[BigVolumeExportController::class,'exportAllUsers']);
