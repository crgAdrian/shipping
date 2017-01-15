<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = [
                'errors' => $validator->errors()
            ];

            return $errors;
        }

        $response = [
            'success' => 'true',
            'message' => 'A product has been added!',
        ];

        Product::create($data);


        return $response;
    }
}
