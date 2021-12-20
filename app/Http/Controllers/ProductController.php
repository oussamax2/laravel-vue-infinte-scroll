<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function fetchProducts()
    {
        $data = User::orderBy('id')->paginate(4);
        return response()->json($data);
    }
}
