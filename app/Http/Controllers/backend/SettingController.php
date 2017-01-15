<?php

namespace App\Http\Controllers\backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function editDBCSV(Request $request)
    {
        $data = $request->all();

        $setting = Setting::where('name','db_csv')->first();
        $setting->update($data);

        Session::flash('success','Settings Updated');
        return redirect()->route('backend.index');
    }
}
