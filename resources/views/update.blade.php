@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                      UPdate Task
                    </div>
                    <div class="card-body">
                        
                      <form class="d-flex" action="/update-form/{{ $task->id }}" method="POST">
                        @csrf
                        <input type="text" class="form-control me-2" name="taskname" value="{{ $task->task_body }}" placeholder="Type here...">
                        <button type="submit" name="addtaskbtn" class="btn btn-primary">Update Task</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection