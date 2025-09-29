<?php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs
use App\Models\Job;

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with(['employer', 'tags'])->get()
    ]);
});


Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id)
    ]);
});


