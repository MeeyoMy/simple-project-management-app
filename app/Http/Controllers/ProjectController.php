<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            $project->client = Client::find($project->clientId);
        }

        return view("projects/projects", ["projects" => $projects]);
    }

    public function addProject()
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        return view("projects/addProject", ["clients"=> Client::all()]);
    }

    public function addProjectPost(Request $request)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $validated = Project::validate($request);
        Project::addProject($validated);
        return redirect()->route("projects");
    }

    public function editProject(int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $project = Project::find($id);
        $project->client = Client::find($project->clientId);
        return view("projects/editProject", ["project" => $project, "clients" => Client::all()]);
    }

    public function editProjectPatch(Request $request, int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        $validated = Project::validate($request);
        Project::editProject($validated, $id);
        return redirect()->route("projects");
    }

    public function removeProject(int $id)
    {
        if(!Auth::user()->isAdmin())
            return response(null, 403);

        Project::find($id)->delete();
        return redirect()->route("projects");
    }
}
