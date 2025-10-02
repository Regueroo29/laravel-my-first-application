<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs (with eager loading for employer and tags)
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with(['employer', 'tags'])->paginate(10)
    ]);
});

// Show Create Form
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store a New Job
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    \App\Models\Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

// Single Job (using Route Model Binding)
Route::get('/jobs/{job}', function (Job $job) {
    $job->load(['employer', 'tags']);  // Load employer and tags to avoid extra queries
    return view('jobs.show', ['job' => $job]);
});

    

// Show Edit Form
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
});

// Update a Job
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
});

// Destroy a Job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect('/jobs');
});


