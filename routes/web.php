<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Post2Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalificarController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use \App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();


    //calificaciones envio de datos
    Route::match(['get', 'post'], 'calificaciones', [CalificarController::class, 'calificaciones']);

    Route::get('/publicaciones', [BlogController::class, 'getPublicacion']);


    // Rutas solo accesibles por Super administradores
    Route::middleware(['isadmin'])->group(function () {
        //ver mensajes de contacto
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        //administrar usuarios
        Route::get('admin', [UserController::class, 'index'])->name('admin.index');
        Route::get('admin/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
        Route::put('admin/{id}', [UserController::class, 'update'])->name('admin.update');

        //Admin usuarios
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

        //Ver calificaciones
        Route::get('calificaciones', [CalificarController::class, 'mostrarCalificaciones'])->name('calificaciones.mostrar');
    });

    // Rutas solo accesibles por Rol admin
    Route::middleware(['adminOrSuperuser'])->group(function () {
        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        //admin canchas
        Route::get('posts2/create', [Post2Controller::class, 'create'])->name('posts2.create');
        Route::post('posts2', [Post2Controller::class, 'store'])->name('posts2.store');
        Route::get('posts2', [Post2Controller::class, 'index'])->name('posts2.index');
        Route::delete('posts2/{post2}', [Post2Controller::class, 'destroy'])->name('posts2.destroy');
        Route::get('posts2/{post2}/edit', [Post2Controller::class, 'edit'])->name('posts2.edit');
        Route::put('posts2/{post2}', [Post2Controller::class, 'update'])->name('posts2.update');
        //notas
        Route::resource('posts', PostController::class);
        //Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        //Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        //Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        //Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
        //Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

        // Rutas solo accesibles por Rol admin
        Route::middleware(['adminOrSuperuser'])->group(function () {
            //dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            //admin canchas
            Route::get('posts2/create', [Post2Controller::class, 'create'])->name('posts2.create');
            Route::post('posts2', [Post2Controller::class, 'store'])->name('posts2.store');
            Route::get('posts2', [Post2Controller::class, 'index'])->name('posts2.index');
            Route::delete('posts2/{post2}', [Post2Controller::class, 'destroy'])->name('posts2.destroy');
            Route::get('posts2/{post2}/edit', [Post2Controller::class, 'edit'])->name('posts2.edit');
            Route::put('posts2/{post2}', [Post2Controller::class, 'update'])->name('posts2.update');
            //notas
            Route::resource('posts', PostController::class);
            //Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            //Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
            //Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
            //Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
            //Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
        });


//Administrador
//Route::middleware('auth', 'isadmin')->prefix('admin')->name('admin.')->group(function () {
//    Route::resource('appointments', AppointmentController::class);
//    Route::delete('appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
//    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
//    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
//    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
//
//});
//usuarios
//Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
//    Route::get('appointments', [\App\Http\Controllers\User\AppointmentController::class, 'index'])->name('appointments.index');
//    Route::post('appointments/{id}/reserve', [\App\Http\Controllers\User\AppointmentController::class, 'reserve'])->name('appointments.reserve');
//    Route::delete('appointments/{id}/cancel', [\App\Http\Controllers\User\AppointmentController::class, 'cancel'])->name('appointments.cancel');
//});
// Grupo de rutas protegidas para administradores y superusuarios
Route::middleware(['auth', 'adminOrSuperuser'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('appointments', AppointmentController::class);
    Route::delete('appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});

// Grupo de rutas para usuarios autenticados que pueden reservar turnos
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('appointments', [\App\Http\Controllers\User\AppointmentController::class, 'index'])->name('appointments.index');
    Route::post('appointments/{id}/reserve', [\App\Http\Controllers\User\AppointmentController::class, 'reserve'])->name('appointments.reserve');
    Route::delete('appointments/{id}/cancel', [\App\Http\Controllers\User\AppointmentController::class, 'cancel'])->name('appointments.cancel');
});

// Rutas accesibles para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    //home panel
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //notas
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

});

//form de contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// * Accesible para cualquiera invitados *
//welcome
Route::get('/', [Controller::class, 'welcome'])->name('welcome');
Route::get('/welcomedev', [Controller::class, 'welcomeDev'])->name('welcomeDev');
//canchas
Route::get('posts2', [Post2Controller::class, 'index'])->name('posts2.index');
Route::get('posts2/{post2}', [Post2Controller::class, 'show'])->name('posts2.show');
//calificar
Route::get('/calificar', [CalificarController::class, 'index'])->name('calificar');

//sin permisos
Route::get('/sinpermisos', function () {
    return view('sinpermisos');
});
