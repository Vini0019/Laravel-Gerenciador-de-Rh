<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\departmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $departments = Department::all();

        return view('department.departments', [
            'departments' => $departments
        ]);
    }

    public function FormAddDepartment()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        return view('department.add_department');

    }

    public function addDepartment(departmentRequest $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $department = new Department();

        $department->name = $request->name;

        $department->save();


        return redirect()->route('departments')->with('success', 'Department added successfully!');

    }

    public function FormEditDepartment($id)
    {

        $department = Department::findOrFail($id);

        return view('department.edit_department', [
            'department' => $department
        ]);
    }

    public function UpdateDepartment(departmentRequest $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $department = Department::findOrFail($request->id);

        $department->name = $request->name;

        $department->save();

        return redirect()->route('departments')->with('success', 'Department updated successfully!');
    }

    public function DeleteDepartment(Request $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $department = Department::findOrFail($request->id);

        $department->delete();

        return redirect()->route('departments')->with('success', 'Department deleted successfully!');
    }
}
