<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColaboratorsController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $colaborators = User::withTrashed()
            ->with('detail', 'department')
            ->where('role', '<>', 'admin')
            ->get();

        return view('colaborators.admin-all-colaborators', [
            'colaborators' => $colaborators
        ]);
    }

    public function detailColaborator($id)
    {
        Auth::user()->can('admin', 'rh') ?: abort(403, 'You are not authorized to access this page');

        if (Auth::user()->id === $id) {
            return redirect()->route('home');
        }

        $colaborator = User::withTrashed()
            ->with('detail', 'department')
            ->findOrFail($id);

        return view('colaborators.detail-colaborator', [
            'colaborator' => $colaborator
        ]);
    }

    public function destroyColaborator(Request $request)
    {

        Auth::user()->can('admin', 'rh') ?: abort(403, 'You are not authorized to access this page');

        $request->validate([

            'id' => 'required|exists:users,id'
        ]);

        $colaborator = User::findOrFail($request->id);

        if(Auth::id() == $request->id){
            return redirect()->route('colaborators.admin-all-colaborators')->with('error', 'Você não pode deletar você mesmo');
        }

        $colaborator->delete();

        return redirect()->route('colaborators.admin-all-colaborators')->with('success', 'Colaborador excluido com sucesso');
    }

    public function restoreColaborator(Request $request)
    {

        Auth::user()->can('admin') ?: abort(403, 'You are not authorized to access this page');

        $request->validate([

            'id' => 'required|exists:users,id'
        ]);

        $colaborator = User::withTrashed()->findOrFail($request->id);

        $colaborator->restore();

        return redirect()->route('colaborators.admin-all-colaborators')->with('success', 'Colaborador restaurado com sucesso');
    }
}
