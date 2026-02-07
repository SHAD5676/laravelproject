<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:departments']);
        Department::create($request->all());
        return back()->with('success', 'Department created successfully!');
    }

    public function destroy(Department $department) {
        $department->delete();
        return back()->with('success', 'Department deleted!');
    }

    
}
