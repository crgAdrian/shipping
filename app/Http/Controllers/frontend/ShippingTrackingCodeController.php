<?php

namespace App\Http\Controllers\frontend;


use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ShippingTrackingCodeController extends Controller
{
    public function index()
    {
      return view('frontend.index',compact('tracking_products'));
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $tracking_product = $this->api->get('tracking/' . $data['tracking_code'] . '/code');


        return Response::json(['tracking_product' => $tracking_product]);

    }
}
