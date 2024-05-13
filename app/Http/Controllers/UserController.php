<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan semua pengguna yang bukan admin
        $users = User::where('usertype', '!=', 'admin')->get();

        return view('pages.users', compact('users'));
    }
}