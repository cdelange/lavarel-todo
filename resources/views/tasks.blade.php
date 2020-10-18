@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Bootstrap -->
  <div class='panel panel-default'>
    <div class="panel-heading">
        New Task
    </div>
    <div class='panel-body'>
      <!-- Displays validation errors -->
      @include('common.errors')

      <!-- New Task Form -->
      <form action='/task' method='POST' class='form-horozontial'>
        {{ csrf_field() }}

        <!-- Task Name -->
        <div class='form-group'>
          <label for='task-name' class='col-sm-3 control-label'>Task</label>
          <div class='col-sm-6'>
            <input type="text" name="name" id='task-name' class='form-control'>
          </div>
        </div>

        <!-- Add Task Button -->
        <div class='form-group'>
          <div class='col-sm-offset-9'>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-plus"></i> Add Task
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- TODO: Current tasks -->
  @if (count($tasks) > 0)
  <div class="panel panel-default">
    <div class='panel-heading'>
      Current Tasks
    </div>

    <div class='panel-body'>
      <table class="table table-striped task-table">
        <!-- headings -->
        <thead>
          <th>Task</th>
        </thead>

        <!-- body -->
        <tbody>
          @foreach ($tasks as $task)
          <tr>
            <!-- task name -->
            <td class='table-text'>
              <div>{{ $task->name }}</div>
            </td>
            <td>
              <!-- delete button -->
              <form action="/task/{{ $task->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <!-- method field renders this hidden: <input type="hidden" name="_method" value="DELETE"> -->
                <button type="submit" class="btn btn-danger"><i class="fa fa-btn fa-trash"></i> Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </thead>
    </table>
  </div>
</div>
@endif
@endsection