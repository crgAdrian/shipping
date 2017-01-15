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
        $status_db_csv = Setting::where('name','db_csv')->first();

        if ($status_db_csv->status == 1) {
            $file = file(public_path('tracking_products.csv'));

            $tracking_product = [];

            foreach ($file as $f) {
//                $tracking_product[] = array_fill_keys([$data['tracking_code']],$f);
//                $tracking_product[] = explode(',',$f);

            }
        } else {
            $tracking_product = $this->api->get('tracking/' . $data['tracking_code'] . '/code');
        }

        return Response::json(['tracking_product' => $tracking_product]);

    }
}
