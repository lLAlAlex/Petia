<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Dd;

class AuthController extends Controller
{
    public function loginIndex()
    {
        App::setLocale('en');
        $title = trans('login.title');
        $desc = trans('login.description');
        $link = trans('login.link');
        return view('login', compact('title', 'desc', 'link'));
    }

    public function registerIndex()
    {
        App::setLocale('en');
        $title = trans('register.title');
        $first = trans('register.firstname');
        $last = trans('register.lastname');
        $role = trans('register.role');
        $customer = trans('register.customer');
        $shelter = trans('register.shelter');
        $phone = trans('register.phone');
        $confirm = trans('register.confirm');
        $username = trans('register.username');
        $desc = trans('register.description');
        $link = trans('register.link');
        return view('register', compact('title', 'first', 'last', 'role', 'customer', 'shelter', 'phone', 'confirm', 'username', 'desc', 'link'));
    }

    public function loginIndoIndex()
    {
        App::setLocale('id');
        $title = trans('login.title');
        $desc = trans('login.description');
        $link = trans('login.link');
        return view('loginindo', compact('title', 'desc', 'link'));
    }

    public function registerIndoIndex()
    {
        App::setLocale('id');
        $title = trans('register.title');
        $first = trans('register.firstname');
        $last = trans('register.lastname');
        $role = trans('register.role');
        $customer = trans('register.customer');
        $shelter = trans('register.shelter');
        $phone = trans('register.phone');
        $confirm = trans('register.confirm');
        $username = trans('register.username');
        $desc = trans('register.description');
        $link = trans('register.link');
        return view('regisindo', compact('title', 'first', 'last', 'role', 'customer', 'shelter', 'phone', 'confirm', 'username', 'desc', 'link'));
    }

    public function register(Request $request)
    {
        $rules = [
            'firstName' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'phoneNumber' => 'required|min:11|max:11',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->firstName . " " . $request->lastName;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phoneNumber;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->profileImage = "profile.png";
        $user->isApproved = false;

        $user->save();

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            Session::put('mysession', $credentials);
            return redirect('/');
        }

        $rules = [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
    }

    public function userData()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('/profile', compact('user'));
        } else {
            return null;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
