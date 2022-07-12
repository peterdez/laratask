@extends('layouts.app')
@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
        <h5 class="mb-0"><i class="fa fa-tasks me-2"></i>Task List</h5>
        </div>
        
          <div class="card-body">
            <!-- Display Validation Errors -->
            @include('common.errors')
            <!-- New Task Form -->
            <form action="/task" method="POST" class="row g-3">
              {{ csrf_field() }}
              <!-- Task Name -->
              <div class="col-sm-10">
              <label for="task-name" class="visually-hidden control-label">Task</label>
              <input type="text" name="name" id="task-name" class="form-control" placeholder="Task">
              </div>
              <!-- Add Task Button -->
              <div class="col-sm-2">
              <button type="submit" class="btn btn-primary mb-3">
              <i class="fa fa-plus"></i> Add Task
              </button>
              </div>
            </form>
          </div>
          <!-- TODO: Current Tasks -->
          <!-- Current Tasks -->
          @if (count($tasks) > 0)
          <div class="card-header bg-transparent">
              Current Tasks
            </div>
          <div class="card-body">
            <div class="panel-body">
              <table class="table table-striped task-table">
                <!-- Table Headings -->
                <thead>
                  <th scope="col">Task</th>
                  <th scope="col">Created at</th>
                  <th scope="col">&nbsp;</th>
                </thead>
                <!-- Table Body -->
                <tbody>
                  @foreach ($tasks as $task)
                  <tr>
                    <!-- Task Name -->
                    <td class="table-text">
                      <span>{{ $task->name }}</span>
                    </td>
                    <td class="align-middle">
                    <span>{{$task->created_at->format('H:i:s')}}</span>
                    </td>
                    <td>
                      <!-- TODO: Delete Button -->
                      <form action="/task/{{ $task->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="border-0"><i class="fa fa-trash text-danger"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @endif
        
      </div><!-- card-->
    </div><!-- col-md-8-->
  </div><!-- row-->
</div><!-- container-->
@endsection