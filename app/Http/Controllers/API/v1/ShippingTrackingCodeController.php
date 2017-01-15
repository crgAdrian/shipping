<?php

namespace App\Http\Controllers\API\v1;


use App\Models\Tracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ShippingTrackingCodeController extends Controller
{
    public function index()
    {
        return Tracking::all();
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'product' => 'required',
            'tracking_code' => 'required|unique:tracking_products',
            'date' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = [
                'errors' => $validator->errors()
            ];

            return $errors;
        }

        Tracking::create([
            'product_id' => $data['product'],
            'tracking_code' => $data['tracking_code'],
            'date' => $data['date']
        ]);

        $response = [
            'success' => 'true',
            'message' => 'A tracking code for the product has been added!',
        ];


        return $response;
    }

    public function show($tracking_code)
    {
       $tr = Tracking::where('tracking_code',$tracking_code)->first();

       if ($tr) {
           $tracking_product = [
               'product' => $tr->product->name,
               'date' => $tr->date
           ];

           return $tracking_product;
       }


    }
}
