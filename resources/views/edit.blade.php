@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/tasks/edit/{{ $task->id }}">
                        {{ csrf_field() }}
                    <!-- STORE THE 75% SPACE FOR INPUT -->
                    <div class="col-md-10">
                        <div class="form-group">
                          <input type="text" class="form-control" name="task" value="{{ $task->body }}"  placeholder="Enter new task todo">
                        </div>
                    </div>

                    <!-- STORE THE 25% BUTTON  -->
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning">Update</button>

                    </div>
                </form>





                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
