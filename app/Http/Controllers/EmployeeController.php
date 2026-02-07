<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
  
    public function index()
    {
        $employees = Employee::with('department')->get(); // ডিপার্টমেন্টসহ ডাটা লোড
        return view('backend.employees.index', compact('employees'));
    }

  
    public function create()
    {
        $departments = Department::all();
        return view('backend.employees.create', compact('departments'));
    }

  
 
    public function store(Request $request)
    {
        $request->validate([
            'emp_name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:6',
            'salary' => 'required|numeric',
            'status' => 'required',
            'department' => 'required',
            'employee_code' => 'required|unique:employees,employee_code',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

  
        $employee_img = 'employee_photo/nophoto.jpg';
        if ($request->hasFile('photo')) {
            $imageName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('employee_photo'), $imageName);
            $employee_img = 'employee_photo/' . $imageName;
        }

        Employee::create([
            'name'          => $request->emp_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password), // পাসওয়ার্ড হ্যাশ করা হয়েছে
            'designation'   => $request->designation,
            'employee_code' => $request->employee_code,
            'status'        => $request->status,
            'salary'        => $request->salary,
            'image'         => $employee_img,
            'department_id' => $request->department,
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee Created Successfully!');
    }

 
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        return view('backend.employees.edit', compact('employee', 'departments'));
    }

   
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([
            'emp_name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:employees,email,' . $id,
            'salary' => 'required|numeric',
            'status' => 'required',
            'department' => 'required',
            'employee_code' => 'required|unique:employees,employee_code,' . $id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $employee_img = $employee->image;

        if ($request->hasFile('photo')) {
         
            if ($employee->image != 'employee_photo/nophoto.jpg' && File::exists(public_path($employee->image))) {
                File::delete(public_path($employee->image));
            }

            $imageName = time() . '_' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('employee_photo'), $imageName);
            $employee_img = 'employee_photo/' . $imageName;
        }

        $employee->update([
            'name'          => $request->emp_name,
            'email'         => $request->email,
            'designation'   => $request->designation,
            'employee_code' => $request->employee_code,
            'status'        => $request->status,
            'salary'        => $request->salary,
            'image'         => $employee_img,
            'department_id' => $request->department,
        ]);

       
        if ($request->filled('password')) {
            $employee->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('employee.index')->with('success', 'Employee Updated Successfully!');
    }

   
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->image != 'employee_photo/nophoto.jpg' && File::exists(public_path($employee->image))) {
            File::delete(public_path($employee->image));
        }

        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee Deleted Successfully!');
    }
}