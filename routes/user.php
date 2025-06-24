<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [UserController::class, "index"]);
Route::post("/login", [UserController::class, "login"])->name("login");
Route::get("/register", [UserController::class, "create"])->name("register");
Route::post("/register", [UserController::class, "store"])->name("register.store");
