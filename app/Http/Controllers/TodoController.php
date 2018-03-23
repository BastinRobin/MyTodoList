<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /* Retrieve and create task **/
    public function index() {

        $tasks = Task::where('user_id', Auth::user()->id)
            ->where('is_deleted', 0)->get();

        return view('todo', ['tasks' => $tasks]);
    }

    public function create(Request $request) {

        $task = new Task;
        $task->body = $request->task;
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect('/tasks')->with('status', 'Task added successfully');
    }


    public function done(Request $request, $task_id) {
        $task = Task::find($task_id);
        $task->is_completed = 1;
        $task->save();

        return redirect('/tasks')->with('status', 'Task completed');
    }

    public function undo(Request $request, $task_id) {
        $task = Task::find($task_id);
        $task->is_completed = 0;
        $task->save();

        return redirect('/tasks')->with('status', 'Task incompleted');
    }


    public function delete(Request $request, $task_id) {
        $task = Task::find($task_id);
        $task->is_deleted = 1;
        $task->save();

        return redirect('/tasks')->with('status', 'Task deleted successfully');
    }

    public function edit(Request $request, $task_id) {
        $task = Task::find($task_id);

        return view('edit', ['task' => $task]);
    }


    public function update(Request $request, $task_id) {

        $body =  $request->task;
        $task = Task::find($task_id);
        $task->body = $body;
        $task->save();
        return redirect('/tasks')->with('status', 'Task updated successfully');
    }

}
