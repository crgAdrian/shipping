<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $products = $this->api->get('products');
        $tracking = $this->api->get('tracking');
        $statusTrackingProducts = Setting::where('name','db_csv')->first();

        return view('backend.index',compact('products','tracking','statusTrackingProducts'));
    }

    public function getLogin()
    {
        if (!Auth::check()) {
            return view('frontend.login');
        } else {
            return redirect('/');
        }
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $email = $data['email'];
        $password = $data['password'];

        if (Auth::attempt(['email' => $email,'password' => $password])) {
            return redirect()->route('backend.index');
        } else {
            return redirect()->route('getLogin');
        }

    }
}
