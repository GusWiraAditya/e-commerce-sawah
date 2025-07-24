<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class UserProductControler extends Controller
{
    public function index()
    {
        $products = Produk::all();
        return view('welcome', compact('products'));
    }
    
}


?>
