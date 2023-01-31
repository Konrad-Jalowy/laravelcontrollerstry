<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
 
            return view('welcome', [
                'tasks' => $tasks
    ]);
    }
}
