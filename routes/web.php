<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

// Displays tasks

Route::get('/', function ()
{
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return view('tasks', [
      'tasks' => $tasks]);
});

// Route::get('/tasks', function () {
//     $user_id = auth()->user('id');
//     $user = User::find($user_id);
//     return view('tasks')->with('tasks',$user->tasks);
// });


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
  Task::findorFail($id)->delete();

  return redirect('/');
});
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
