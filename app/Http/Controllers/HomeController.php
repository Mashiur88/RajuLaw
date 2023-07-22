<?php

namespace App\Http\Controllers;

use App\Models\FaqChildModel;
use App\Models\GuideLineModel;
use App\Models\ImmigrationNewsModel;
use App\Models\ServiceChieldModel;
use App\Models\ServiceModel;
use App\Models\Team;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = FaqChildModel::inRandomOrder()->limit(5)->get();
        $service_item = ServiceModel::all();
        $team_member = Team::all();
        return view('frontend.pasges.home', compact('team_member', 'service_item', 'faqs'));
    }

    public function service($type, $id): Factory|View|Application
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
        $temp = [
            ServiceChieldModel::class => ['desc', 'plain_desc'],
            GuideLineModel::class => ['desc', 'plain_desc'],
            ImmigrationNewsModel::class => ['desc', 'plain_desc'],
            FaqChildModel::class => ['desc', 'plain_desc'],
            Team::class => ['about', 'plain_about'],
        ];

        foreach ($temp as $model => $columns) {
            $data = app($model)->select(['id', $columns[0]])->get()->toArray();
            foreach ($data as $key => $value) {
                app($model)->where('id', $value['id'])->update([$columns[1] => preg_replace('/\s+|&nbsp;/', ' ', strip_tags((string)$value[$columns[0]]))]);
            }
        }

        $data = [
            ["test_1", "123412312", "fsgdhaka"],
            ["test_2", "65456", "khulba"],
            ["test_3", "564654", "CTG"],
            ["test_4", "564654", "asdasd"],
        ];

        return response()->json(['msg' => 'success', 'error_code' => 200, 'data' => $data]);
    }


    public function request_data(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);

        return redirect()->route('search', $request->search);
    }
}
