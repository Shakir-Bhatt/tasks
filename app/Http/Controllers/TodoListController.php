<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoListController extends Controller{

    public function index(){

        $tasks = Task::where("iscompleted", 0)->orderBy("id", "desc")->get();

        $completedTasks = Task::where("iscompleted", 1)->get();

        return view("todolist", compact("tasks", "completedTasks"));

    }

    public function store(Request $request){
        $task = new Task();
        $task->task = $request->todo;
        $task->save();
        return redirect()->back()->with("message", "Task has been added");
    }

    public function complete($id){
        $task = Task::find($id);
        $task->iscompleted = true;
        $task->save();
        return redirect()->back()->with("message", "Task has been added to completed list");
    }

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('message', "Task has been deleted");
    }
}
