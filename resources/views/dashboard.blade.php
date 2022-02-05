@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
                    @if (session('status'))
                        <div class="alert alert-dismissible alert-success" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card mb-3">
                        <div class="card-header">
                          Add Tasks
                        </div>
                        <div class="card-body">
                            
                          <form class="d-flex" action="/submit-form" method="POST">
                            @csrf
                            <input type="text" class="form-control me-2" name="taskname" placeholder="Type here...">
                            <button type="submit" name="addtaskbtn" class="btn btn-primary">AddTask</button>
                          </form>
                        </div>
                      </div>

                      <div class="card mt-2">
                        <div class="card-header">
                          Todays Tasks
                        </div>
                        <div class="card-body">

                         @if(count($tasks)>0)
                            
                            <table class="table table-striped table-bordered">
                                <thead class="bg-dark text-white">
                                  <tr>
                                    <th scope="col">Index</th>
                                    <th scope="col">Tasks</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tasks as $item)
                                  <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $item->task_body }}</td>
                                    <td><a href="/edit/task/{{ $item->id }}" class="btn btn-success">Edit</a></td>
                                    <td><a href="/delete/task/{{ $item->id }}" class="btn btn-danger">Delete</a></td>
                                   
                                  </tr>
                                  @endforeach
                                  
                                  
                                </tbody>
                              </table>
                              @else 
                              <p>No records found</p>
                              @endif
                             
                        </div>
                      </div>
                   
                
            </div>
        
    </div>
</div>
@endsection
