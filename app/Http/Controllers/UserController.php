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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }




}
