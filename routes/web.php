<?php

use App\Http\Controllers\Exports\ExportsExcelController;
use App\Http\Controllers\Exports\ExportsPdfController;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Pages\ConsultsManagement;
use App\Http\Livewire\Pages\DatesManagement;
use App\Http\Livewire\Pages\ExpedientsManagement;
use App\Http\Livewire\Pages\PatientManagement;
use App\Http\Livewire\Pages\ShowPatient;
use App\Http\Livewire\Pages\UserManagement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect('ingresar');
});



Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');


Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('ingresar', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');


Route::group(['middleware' => 'auth'], function () {
Route::get('usuarios', UserManagement::class)->name('usuarios');
Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('pacientes', PatientManagement::class)->name('pacientes');
Route::get('pacientes/{id}', ShowPatient::class)->name('paciente');
Route::get('citas', DatesManagement::class)->name('citas');
Route::get('consultas', ConsultsManagement::class)->name('consultas');
Route::get('expedientes', ExpedientsManagement::class)->name('expedientes');
});

Route::controller(ExportsPdfController::class)->group(function () {
    Route::get('/pacientes/reportes/pdf', 'reportePdfPaciente');
    Route::get('/pacientes/reportes/{id}/pdf', 'reportePdfPacienteSeleccionado');
});


Route::controller(ExportsExcelController::class)->group(function () {
    Route::get('/pacientes/reportes/excel', 'reporteExcelPaciente');
});

