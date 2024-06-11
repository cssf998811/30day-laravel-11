<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
//    return view('home');
    $jobs = Job::all();

    dd($jobs);
    return $jobs;
});

Route::get('/jobs', function () {
    // lazy loading
    //    $jobs = Job::all();

    // eager loading
    $jobs = Job::with('employer')->get();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id)  {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
