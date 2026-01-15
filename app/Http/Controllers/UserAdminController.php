<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users_count = User::count();
        $products_count = Product::count();
        $categories_count = Category::count();
        
        $users = User::all();

        return view('admin.dashboard', compact('users_count', 'products_count', 'categories_count', 'users'));
    }
}
