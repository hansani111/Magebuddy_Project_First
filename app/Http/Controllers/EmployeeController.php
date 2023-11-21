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
            'projectassignedto' => json_encode($request->projectassignedto),
            'email' => $request->email,
            'password' => $request->password
        ]);

        // send mail function
        $mailData = [
            'title' => 'Employee Credentials',
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            // 'link' => $request->project_url,

        ];

        Mail::to($request->email)->send(new MyEmail($mailData));
        // echo 'email send successfully';

        return redirect()->route('/admin/dashboard/employee')->with('success', 'Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Emp::with('project_credential')->findOrFail($id);
        $pdata = json_decode($employee->projectassignedto);
        $intArray = array_map('intval', $pdata);
        foreach ($intArray as $val) {
            $projects[] = ProjectCredential::findOrFail($val);
        }
        return view('employees.show-employee', compact('employee', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Emp::findOrFail($id);
        $projects = ProjectCredential::all();
        $elements = json_decode($employee->projectassignedto);
        $intArray = array_map('intval', $elements);
        return view('employees.edit-employee', compact('employee', 'projects', 'intArray'));
        // return view('employees.edit-employee', compact('employee', 'projects', 'project1'));
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
                    'projectassignedto' => json_encode($request->projectassignedto),
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

        $data = Emp::where('id', $user->id)->get();
        foreach ($data as $key => $value) {
            $project = $value->projectassignedto;
        }
        $elements = json_decode($project);
        $intArray = array_map('intval', $elements);
        $project1 = ProjectCredential::whereIn('id', $intArray)->get();


        return view('emp.dashboard', compact('user', 'project1'));

    }

    public function showEmployeeDetails()
    {
        $user = Auth::guard('emp')->user();
        return view('emp.employee-details', compact('user'));
    }

    public function showProjectsList()
    {
        $user = Auth::guard('emp')->user();

        $data = Emp::where('id', $user->id)->first();

        // dd($data->projectassignedto);   "["2","3"]"

        $elements = json_decode($data->projectassignedto);

        // array:2 [▼ 
        // 0 => "2"
        // 1 => "3"
        // ]

        $intArray = array_map('intval', $elements);

        // array:2 [▼ // app\Http\Controllers\EmployeeController.php:158
        // 0 => 2
        // 1 => 3
        // ]

        $project1 = ProjectCredential::whereIn('id', $intArray)->get();

        // Illuminate\Database\Eloquent\Collection {#293 ▼ // app\Http\Controllers\EmployeeController.php:163
        //     #items: array:2 [▼
        //       0 => App\Models\ProjectCredential {#1249 ▶}
        //       1 => App\Models\ProjectCredential {#1250 ▶}
        //     ]
        //     #escapeWhenCastingToString: false
        //   }

        return view('emp.projects-list', compact('user', 'project1'));
    }
}

// The intval() function returns the integer value of a variable.

// The json_decode() function, which helps to convert a JSON object into a PHP object. 
// It takes the input value as a string and returns a readable PHP object.

// json_encode() is a native PHP function that allows you to convert PHP data into the JSON format. 

// The array_map() function sends each value of an array to a user-made function, and returns an array with new values, given by the user-made function. 