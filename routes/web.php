<?php

use Illuminate\Support\Facades\Route;

// Displays tasks

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
      'tasks' => $tasks
    ]);
});


// Adds new task

Route::post('/task', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  // create the task. incoming Task instance name is set to the input request validated task name then saved
  $task = new Task;
  $task->name = $request->name;
  $task->save();

  return redirect('/');
});

// Deletes existing task

Route::delete('/task/{id}', function ($id){
  //
});