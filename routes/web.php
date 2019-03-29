<?php

/**
 * Get the ACTIVE todo tasks.
 */
use Illuminate\Http\Request;
use App\Todo;

Route::get('/', function() {

    $todo = new Todo();

    $result = $todo->where('status','=','ACTIVE')
    ->orderBy('created_at','DESC')
    ->forPage(1,10)
    ->get();

    return view('home', ['todos' => $result]);
});

/**
 * Get the ACTIVE todo tasks for a given page.
 */
Route::get('/todo/active/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
    $todo = new Todo();
    $pn = 'active';
    $result = $todo->where('status','=','ACTIVE')
    ->orderBy('created_at','DESC')
    ->forPage($page,10)
    ->get();
    return view('active', ['todos' => $result, 'page' => $page,'pagename' => $pn]);
});

/**
 * Get the DONE todo tasks for a given page.
 */
Route::get('/todo/done/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
    $todo = new Todo();
    $pn = 'done';
    $result = $todo->where('status','=','DONE')
    ->orderBy('created_at','DESC')
    ->forPage($page,10)
    ->get();
    return view('done', ['todos' => $result, 'page' => $page,'pagename' => $pn]);
});

/**
 * Get the DELETED todo tasks for a given page.
 */
Route::get('/todo/deleted/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
    $todo = new Todo();
    $pn = 'deleted';
    $result = $todo->where('status','=','DELETED')
    ->orderBy('created_at','DESC')
    ->forPage($page,10)
    ->get();
    return view('deleted', ['todos' => $result, 'page' => $page,'pagename' => $pn]);
});

/**
 * Get a specific todo task by id.
 */
Route::get('/todo/{id}', 'TodoController@getTodoById');

/**
 * Create a new todo task.
 */
Route::post('/todo', function(Request $request) {
    // code to create new todo task
    // validate
    $validator = Validator::make($request->all(), [
        'todo-title' => 'required|max:100',
        'todo-description' => 'required|max:5000',
    ]);

    // if error
    if ($validator->fails()) {
        return 'Error in submitted data.';
    }

    // now create new todo
    $todo = new Todo();

    if (isset($request['todo-title'])) {
        $todo->title = $request['todo-title'];
    }
    if (isset($request['todo-description'])) {
        $todo->description = $request['todo-description'];
    }

    // now save
    $todo->save();

    // redirect to home
    return redirect('/');
});

/**
 * Update a specific todo task by id.
 */
Route::put('/todo/{id}', 'TodoController@updateTodoById');

/**
 * Delete a specific todo task by id.
 */
Route::delete('/todo/{id}', 'TodoController@deleteTodoById');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
