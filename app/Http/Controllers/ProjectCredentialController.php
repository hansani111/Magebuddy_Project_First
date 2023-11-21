<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCredential;
use App\Models\Emp;

class ProjectCredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = ProjectCredential::orderBy('created_at', 'DESC')->get();
        return view('project-credential.index-project-credential', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Emp::latest()->get();
        return view('project-credential.create-project-credential', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProjectCredential::create([

            'project_name' => $request->project_name,
            // 'emp_id' => $request->assigned_to,
            'project_url' => $request->project_url,
            'project_username' => $request->project_username,
            'project_password' => $request->project_password,

        ]);
        return redirect()->route('/admin/dashboard/project-credentials')->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = ProjectCredential::findOrFail($id);
        $users = Emp::all();
        return view('project-credential.show-project-credential', compact('project'), ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = ProjectCredential::findOrFail($id);
        $users = Emp::all();

        return view('project-credential.edit-project-credential', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = ProjectCredential::where([
            ['id', $id]

        ])->update(
                [
                    'project_name' => $request->project_name,
                    // 'emp_id' => $request->assigned_to,
                    'project_url' => $request->project_url,
                    'project_username' => $request->project_username,
                    'project_password' => $request->project_password
                ]
            );
        return redirect()->route('/admin/dashboard/project-credentials')->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = ProjectCredential::findOrFail($id);
        $project->delete();
        return redirect()->route('/admin/dashboard/project-credentials')->with('success', 'Project deleted successfully');
    }
    // public function emp()
    // {
    //     return $this->belongsTo(Emp::class);
    // }
}