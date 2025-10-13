<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/services', function () {
    return view('services');
});

// Contact form
Route::post('/send-contact', [MailController::class, 'sendContact'])->name('send.contact');

// Appointment form
Route::post('/send-appointment', [MailController::class, 'sendAppointment'])->name('send.appointment');
