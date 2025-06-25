<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $isUser = User::where("name", $username)
            ->first();

        if($isUser) {
            if(Hash::check($password, $isUser->password)) {
                Auth::login($isUser);
                return redirect()->route("getTask");
            } else {
                return redirect()->back()->with("error", "Password is incorrect");
            }

        }else {
            return redirect()->back()->with("error", "User not found");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }


    public function create()
    {
        return view("/register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255|unique:users,name",
            "email" => "required|email|unique:users,email",
            "password" => "required|string",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with("success", "Başarılıyla kayıt oldunuz. Giriş yapabilirsiniz.");

    }

    public function profile()
    {
        $user = Auth::user();
        return view("account", compact("user"));
    }


}
