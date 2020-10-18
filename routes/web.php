<?php

use Illuminate\Support\Facades\Route;

// Displays tasks

Route::get('/', function () {
    return view('tasks');
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

  // create the task
});

// Deletes existing task

Route::delete('/task/{id}', function ($id){
  //
});