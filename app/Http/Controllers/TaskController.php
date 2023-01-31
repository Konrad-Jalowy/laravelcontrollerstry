<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function showAddForm(){
        return view('addtaskform');
    }

    public function deleteTask(Task $task) {
        $task->delete();
        return redirect('/');
    }

    public function postTask(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
     
        if ($validator->fails()) {
            return redirect('/');
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();
     
        return redirect('/');
    }
}
