<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\colaboratorRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhUserController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborators = User::where('role', '=', 'rh')->get();

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

        return redirect()->route('colaborators.rh-users')->with('success', "Colaborator adicionado com sucesso");
    }
}
