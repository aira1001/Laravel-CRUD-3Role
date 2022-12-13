<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::all();

        return view('pages.project', ['project'=> $project]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.project_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectValidate = $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);
        // dd($request->status);
        try {

            $project = new Project();
            $project->nama = $projectValidate['nama'];
            $project->keterangan = $projectValidate['keterangan'];
            $project->status = $request->status;
            $project->id_user = Auth::id();
            $project->save();

            return redirect('/project')->with('success', 'add project successfully');
            // dd($project);
        } catch (\Throwable $e) {
            error_log($e);
            return redirect('/project')->with('warning', 'something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id_project)
    {
        $project = Project::find($id_project);
        // dd($project);
        return view('pages.project_edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_project)
    {
        $project = Project::find($id_project);
        try {
            $project->nama = $request->nama;
            $project->keterangan = $request->keterangan;
            $project->status = $request->status;
            $project->id_user = Auth::id();
            $project->save();

            return redirect('/project')->with('success', 'Edit project successfully');
        } catch (\Throwable $e) {
            error_log($e);
            return redirect('/project')->with('warning', 'something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_project)
    {

        $project = Project::find($id_project);
        $project->delete();
        return redirect('/project')->with('success', 'project delete successfully');
    }
}
