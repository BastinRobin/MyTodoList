@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">MyTodo</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/tasks">
                        {{ csrf_field() }}
                    <!-- STORE THE 75% SPACE FOR INPUT -->
                    <div class="col-md-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="task" placeholder="Enter new task todo">
                        </div>
                    </div>

                    <!-- STORE THE 25% BUTTON  -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">ADD</button>

                    </div>
                </form>


                    <div class="col-md-12">
                        <ul class="list-group">
                           @foreach($tasks as $task)
                           <li class="list-group-item">
                               @if($task->is_completed)
                               <img src="ok.png" width="5%">
                               @endif
                               {{ $task->body}} | <span class='stamp'>{{ $task->created_at }}</span>

                               <div class="pull-right">
                                   @if($task->is_completed)
                                   <a href="/tasks/undo/{{ $task->id }}">Undo</a> |
                                   @else
                                   <a href="/tasks/done/{{ $task->id }}" class="text-success">Done</a> |
                                   @endif
                                   <a href="/tasks/edit/{{ $task->id }}" class="text-primary">Edit</a> |
                                   <a href="/tasks/delete/{{ $task->id }}" class="text-danger">Delete</a>
                               </div>
                          </li>
                          @endforeach


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
