<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8'],
        ]);

        $fields['password']= bcrypt($fields['password']);
        $user = User::create($fields);

        auth()->login($user);
        return redirect('/');
    }   
     
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'loginEmail'=>'required',
            'loginPassword'=>'required'
        ]);

        if(auth()->attempt(['email'=> $fields['loginEmail'], 'password'=> $fields['loginPassword']])){
            $request->session()->regenerate();
        }
        return redirect('/');
    }
}
