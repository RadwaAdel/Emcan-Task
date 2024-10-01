<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'You must be authenticated to access this resource.'
            ], 401);
        }
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
        $products = $query->paginate(10);
        $user = Auth::user();
        $token = $user->currentAccessToken()->plainTextToken;
        return response()->json([
            'products' => $products,
            'token' => $token
        ]);
    }
}
