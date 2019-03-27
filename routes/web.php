<?php

/**
 * Get the ACTIVE todo tasks.
 */
use App\Todo;
 
Route::get('/', function() {
    $todo = new Todo();
    $result = $todo->where('status','=','ACTIVE')->get();
    return $result;
});

/**
 * Get the ACTIVE todo tasks for a given page.
 */
Route::get('/todo/active/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
});

/**
 * Get the DONE todo tasks for a given page.
 */
Route::get('/todo/done/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
});

/**
 * Get the DELETED todo tasks for a given page.
 */
Route::get('/todo/deleted/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
});

/**
 * Get a specific todo task by id.
 */
Route::get('/todo/{id}', function($id) {
    // code to fetch todo task having id = $id
});

/**
 * Create a new todo task.
 */
Route::post('/todo', function() {
    // code to create new todo task
});

/**
 * Update a specific todo task by id.
 */
Route::put('/todo/{id}', function($id) {
    // code to update todo task having id = $id
});

/**
 * Delete a specific todo task by id.
 */
Route::delete('/todo/{id}', function($id) {
    // code to delete todo task having id = $id
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
