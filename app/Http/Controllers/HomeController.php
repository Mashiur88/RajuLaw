<?php

namespace App\Http\Controllers;

use App\Models\FaqChildModel;
use App\Models\FaqModel;
use App\Models\ServiceChieldModel;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = FaqChildModel::inRandomOrder()->limit(5)->get();
        $service_item  = \App\Models\ServiceModel::all();
        $team_member = Team::all();
        return view('frontend.pasges.home', compact('team_member', 'service_item', 'faqs'));
    }

    public function single_service($type, $id)
    {
        if ($type == "service") {
            $data = ServiceChieldModel::find($id);
        }
        return view('frontend.pasges.single_page', compact('data'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('admin/login');
    }

    public function test_api(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        return response()->json(['msg' => 'success', 'error_code' => 200, 'data_name' => $request->name, 'data_phone' => $request->phone, 'data_address' => $request->address]);
    }

    public function fetch_data()
    {
        $data = [    
            [ "test_1", "123412312", "dhaka" ],   
            [ "test_2", "65456", "khulba" ],   
            [ "test_3", "564654", "CTG" ],   
            [ "test_4", "564654", "asdasd" ],   
        ];  

        return response()->json(['msg' => 'success', 'error_code' => 200, 'data' => $data]);
    }


    public function request_data(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);

        return redirect()->route('search',$request->search);
    }
}
