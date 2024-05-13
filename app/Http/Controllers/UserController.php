<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Talk;

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

    public function count()
    {
        // Mengambil jumlah user dari tabel users
        $totalUsers = User::count();

        // Mengambil jumlah talk dari tabel talks
        $totalTalks = Talk::count();

        // Kemudian kirimkan data tersebut ke view
        return view('pages.dashboard', compact('totalUsers', 'totalTalks'));
    }
}