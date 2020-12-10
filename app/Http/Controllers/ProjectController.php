<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllProjects() {
        $projects = Project::get()->toJson(JSON_PRETTY_PRINT);
        return response($projects, 200);
      }

      public function getProject($id) {
        if (Project::where('id', $id)->exists()) {
          $project = Project::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($project, 200);
        } else {
          return response()->json([
            "message" => "Project not found"
          ], 404);
        }
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $projects = Auth::user()->projects()->latest()->get();

        // $statuses = ProjectStatus::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tasks = Auth::user()->tasks;
        $userId = Auth::user()->id;
        $tasks = Task::where('user_id',$userId)->get();

        return view('projects.create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'company' => 'required',
        ]);

        // $status = ProjectStatus::where('alias', 'new')->first();

        $project = new Project();
        $project->user()->associate(Auth::user());
        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = $request->status;
        // $project->status()->associate($status);
        $project->duration = $request->duration;
        $project->client = $request->client;
        $project->company = $request->company;
        $project->user_id = auth()->user()->id;
        $project->save();
        
        return response()->json([
            "message" => "Book record created"
          ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // return view('tasks.index');   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'client' => 'required',
            'company' => 'required',
        ]);
        if (Project::where('id', $id)->exists()) {
            $book = Project::find($id);

        $project = Project::find($id);
        $project->title =  $request->get('title');
        $project->description = $request->get('description');
        $project->status = $request->get('status');
        $project->duration = $request->get('duration');
        $project->client = $request->get('client');
        $project->company = $request->get('company');
        $project->user_id = auth()->user()->id;
        $project->save();
        
        return response()->json([
            "message" => "records updated successfully"
          ], 200);

        } else {
            return response()->json([
                "message" => "Project not found"
              ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Project::where('id', $id)->exists()) {
            $book = Project::find($id);
            $book->delete();

            return response()->json([
                "message" => "records deleted"
              ], 202);
        } else {
            return response()->json([
                "message" => "Project not found"
              ], 404);
        }
    }

    public function getTasks(Project $project)
    {
        return response()->json($project->project);
    }
}
