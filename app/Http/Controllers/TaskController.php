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
 * 顯示使用者所有任務的清單。
 * @param  Request  $request
 * @return Response
 */
    public function index(Request $request)
    {
        return view('tasks.index');
    }
}


