<?php

namespace App\Http\Controllers;

// use App\Models\EmployeeDetails;
use App\Mail\MyEmail;
use App\Models\Emp;
use App\Models\ProjectCredential;
use Auth;
use Illuminate\Http\Request;
use Mail;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Emp::orderBy('created_at', 'DESC')->get();
        return view('employees.index-employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = ProjectCredential::all();
        return view('employees.create-employee', ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Emp::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $mailData = [
            'title' => 'Employee Credentials',
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ];

        Mail::to($request->email)->send(new MyEmail($mailData));
        echo 'email send successfully';

        return redirect()->route('/admin/dashboard/employee')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Emp::findOrFail($id);
        $projects = ProjectCredential::all();
        $selected = explode(",", $projects);
        return view('employees.show-employee', compact('employee', 'projects', 'selected'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Emp::findOrFail($id);
        $projects = ProjectCredential::all();
        return view('employees.edit-employee', compact('employee', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projects = Emp::where([
            ['id', $id]
        ])->update(
                [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => $request->password

                ]
            );
        return redirect()->route('/admin/dashboard/employee')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Emp::findOrFail($id);

        $employee->delete();

        return redirect()->route('/admin/dashboard/employee')->with('success', 'Employee deleted successfully');
    }

    public function emp_project()
    {
        $user = Auth::guard('emp')->user();
        $data = ProjectCredential::where('emp_id', $user->id)->get();
        return view('emp.dashboard', compact('user', 'data'));

    }

    public function showEmployeeDetails()
    {
        $user = Auth::guard('emp')->user();
        return view('emp.employee-details', compact('user'));
    }

    public function showProjectsList()
    {
        $user = Auth::guard('emp')->user();
        $data = ProjectCredential::where('emp_id', $user->id)->get();
        return view('emp.projects-list', compact('user', 'data'));
    }
}