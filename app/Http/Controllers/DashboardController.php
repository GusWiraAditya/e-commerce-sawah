<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
       // 1. Hitung total produk dari database
        $productCount = Produk::count();

        // 2. Hitung total pengguna dari database
        $userCount = User::count();

        // 3. Kirim data ke view
        return view('adminDashboard', [
            'productCount' => $productCount,
            'userCount' => $userCount,
        ]);
    }

}
