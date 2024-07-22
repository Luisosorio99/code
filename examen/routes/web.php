<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return 'Conexión a la base de datos exitosa.';
    } catch (\Exception $e) {
        return 'No se pudo conectar a la base de datos: ' . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/examen', function () {
    return view('examen');
});

Route::get('/',[CrudController::class,'index'])->name("crud.index");

//Ruta para añadir un nuevo producto
Route::post("/registrar-paciente",[CrudController::class,"create"])->name('crud.create');

