<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ShippingTrackingCodeController extends Controller
{
    public function store(Request $request)
    {
        $response = $this->api->post('tracking/create',$request->all());

        if (isset ($response['errors'])) {
            return redirect()->route('backend.index')->withErrors($response['errors'],'addTracking')->withInput();
        }

        if ($response['success'] === 'true') {
            Session::flash('success', $response['message']);
            return redirect()->route('backend.index');
        }
    }
}
