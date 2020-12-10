<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Auth::user()->tasks;
        $projects = Auth::user()->projects;


        return view('tasks.index', compact("tasks", "projects"));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $task = new Task();
        $task->user()->associate(Auth::user());
        $task->title =  $request->get('title');
        $task->description = $request->get('description');
        $task->status = $request->get('status');
        $task->duration = $request->get('duration');
        $task->user_id = auth()->user()->id;
        $task->save();
        return redirect('projects')->with('success', 'Task saved!');
    }

    public function edit(Task $task)
    {

            return view('tasks.edit', compact('task'));
        
    }

       /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        if (isset($_POST['delete'])) {
            $task->delete();
            return redirect('/projects');
        } else {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ]);
            $task->title =  $request->get('title');
            $task->description = $request->get('description');
            $task->status = $request->get('status');
            $task->duration = $request->get('duration');
            $task->save();
            return redirect('/projects')->with('success', 'Task updated!');;
        }
    }
}
