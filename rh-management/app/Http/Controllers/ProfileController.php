<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\updatePasswordRequest;
use App\Http\Requests\updateUserDataRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    public function index():View
    {
        return view('user.profile');
    }

    public function updatePassword(updatePasswordRequest $request)
    {

        $user = auth()->user();

        if(!password_verify($request->current_password, $user->password)){
            return redirect()->back()->with('error', 'A senha está errada.');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'A senha atualizou com sucesso');

    }

    public function updateUserData(updateUserDataRequest $request)
    {
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->with('success_change_data', 'O perfil foi atualizado com sucesso');


    }

}
