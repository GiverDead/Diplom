<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;
use App\Users;

class AuthController extends Controller
{
    public function getLoginPage()
    {
        return view('main.login');
    }

    public function loginUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $users = Users::query()->where("email", $request->get("email"))->get();
        if (!$users->count()) {
            $request->session()->flash("undefined email", "undefined email");
        } else {
            foreach ($users as $user) {
                if (password_verify($request->get('password'), $user->password)) {
                    $_SESSION['user'] = $user;
                    return redirect("/");
                }
            }
        }
    }

    public function getRegistrationPage()
    {
        return view('main.registration');
    }

    public function facebookLogin(Request $request)
    {
        if (!$request->ajax()) die("error");
        $this->validate($request, [
            'email' => 'required'
        ]);
        $users = Users::query()->where("email", $request->get("email"))->get();
        if (!$users->count()) {
            $user = new Users();
            $user->email = $request->get("email");
            $user->save();
        } else {
            $_SESSION['user'] = $users->first();
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }
}

