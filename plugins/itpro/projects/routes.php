<?php

use Itpro\Projects\Models\Project;
use Itpro\Projects\Models\Technology;
use Illuminate\Support\Facades\Route;

Route::get('/projects', function(){
    $projects = Project::all();
    $projects->load('platforms', 'technology');
    return $projects;
});

Route::get('/technologies', function(){
    $technologies = Technology::all();
    $technologies->load('project');
    return $technologies;
});

// Route::post('/request');
// Route::post('/order');