<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$tasks = Task::where('user_id', $request->user()->id)->get();
        $tasks=auth()->user()->tasks;
        //dd($tasks);


        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    //建立新的任務
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);
        return redirect('/tasks');
    }
}


