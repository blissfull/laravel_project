<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Projects;
use App\Service;
use Auth;

class ProjectsController extends Controller
{
	public function __construct()
	{
    	$this->middleware('auth');
	}

    public function create()
    {
    	//show form so that user can enter project info
    	return view('project.create');
    }

    public function store()
    {

    	//validate input entered into the form by user
    	$this->validate(request(), [
    		'name' => 'required|max:120',
    		'type' => 'required',
    		'serviceCheckbox' => 'required',
    		'termsAndConditions' =>'required'
    	]);

    	//add project to DB
    	$project = new Projects;
    	$project->user_id = Auth::user()->id;
    	$project->project_name = request('name');
    	$project->project_type = request('type');
    	$project->comments = request('comments');
    	$project->save();

        //using relations to add services against each projects in DB
    	$project_service = request('serviceCheckbox');
    	$service = Service::whereIn('name', $project_service)->get();
    	$project->services()->sync($service);

    	return redirect("/projects/");
    }

    public function show()
    {
    	//show all projects of single user
    	$projects = Projects::where('user_id', Auth::user()->id)->with('services')->orderBy('project_name')->get();
    	return view('project.show', ['projects' => $projects]);
    }
}
