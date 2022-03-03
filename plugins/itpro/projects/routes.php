<?php

use Itpro\Projects\Models\Technology;
use Illuminate\Support\Facades\Route;

Route::get('/technologies', function(){
    $technologies = Technology::all();
    $technologies->load('projects', 'projects.platforms', 'projects.project_icon');
    return $technologies;
});

// Route::post('/request');
// Route::post('/order');