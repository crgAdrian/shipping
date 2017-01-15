<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $response = $this->api->post('products/create',$request->all());

        if (isset ($response['errors'])) {
            return redirect()->route('backend.index')->withErrors($response['errors'],'productsCreate')->withInput();
        }

        if ($response['success'] === 'true') {
            Session::flash('success', $response['message']);
            return redirect()->route('backend.index');
        }
    }
}
