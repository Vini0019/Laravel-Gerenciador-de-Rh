<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\colaboratorRequest;
use App\Http\Requests\editColaboratorRequest;
use App\Models\Department;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RhUserController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborators = User::with('detail')->where('role', '=', 'rh')->get();

        return view(
            'colaborators.rh-users',
            [
                'colaborators' => $colaborators
            ]
        );
    }

    public function newColaborator()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $departments = Department::all();

        return view(
            'colaborators.add_rh_user',
            [
                'departments' => $departments
            ]
        );
    }

    public function addColaborator(colaboratorRequest $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborator = new User();

        $colaborator->department_id = 2;

        $colaborator->name = $request->name;

        $colaborator->email = $request->email;

        $colaborator->role = 'rh';

        $colaborator->password = bcrypt(123456789);

        $colaborator->permissions = '["rh"]';

        $colaborator->save();

        $colaborator_details = new UserDetail();

        $colaborator_details->user_id = $colaborator->id;

        $colaborator_details->address = $request->address;
        $colaborator_details->zip_code = $request->zip_code;
        $colaborator_details->city = $request->city;
        $colaborator_details->phone = $request->phone;
        $colaborator_details->salary = $request->salary;
        $colaborator_details->admission_date = $request->admission_date;

        $colaborator_details->save();

        return redirect()->route('colaborators.rh-users')->with('success', "Colaborator adicionado com sucesso");
    }

    public function editColaborator($id)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborator = User::with('detail')->where('role', 'rh')->findOrFail($id);

        return view('colaborators.edit_rh_user', [
            'colaborator' => $colaborator
        ]);
    }

    public function updateColaborator(editColaboratorRequest $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborator = User::with('detail')->findOrFail($request->id);
        // $colaborator->department_id = 2;

        $colaborator->name = $request->name;
        $colaborator->detail->salary = $request->salary;
        $colaborator->detail->admission_date = $request->admission_date;

        $colaborator->save();
        $colaborator->detail->save();

        return redirect()->route('colaborators.rh-users')->with('success', "Colaborator adicionado com sucesso");
    }

    public function deleteColaborator(Request $request)
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $request->validate([
            'id' => 'required|exists:users,id',
        ]);

        $colaborator = User::findOrFail($request->id);

        $colaborator->delete();

        return redirect()->route('colaborators.rh-users')->with('success', "Colaborator adicionado com sucesso");

    }
}
