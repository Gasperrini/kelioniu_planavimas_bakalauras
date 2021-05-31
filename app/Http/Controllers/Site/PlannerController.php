<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Segment;
use App\Models\Accommodation;
use App\Models\Landmark;
use App\Models\Journey;
use App\Http\Controllers\Controller;
use App\Contracts\RouteContract;
use Illuminate\Support\Facades\DB;

class PlannerController extends Controller
{
    protected $routeRepository;

    public function __construct(RouteContract $routeRepository)
    {
        $this->routeRepository = $routeRepository;
    }

    public function show()
    {
        $route = DB::table('route')->get();
        $segments = DB::table('segments')->get();
        $accommodations = DB::table('accommodation')->get();
        $landmarks = DB::table('landmark')->get();
        $transports = DB::table('transport')->get();
    
        return view('site.planner.index', compact('route', 'segments', 'accommodations', 'landmarks', 'transports'));
    }

    public function showUpdated(Request $request)
    {
        $end_point = $request->end;
        $route_id = $request->route_code;
        $route = DB::table('route')->get();
        $segments = DB::table('segments')->where('route_id', 'LIKE', "%{$route_id}%")->get();
        $accommodations = DB::table('accommodation')->where('address', 'LIKE', "%{$end_point}%")->get();
        $landmarks = DB::table('landmark')->where('address', 'LIKE', "%{$end_point}%")->get();
        $transports = DB::table('transport')->get();
    
        return view('site.planner.index', compact('route', 'segments', 'accommodations', 'landmarks', 'transports'));
    }

    public function confirmed(Request $request)
    {
        if($request->hasFile('bus_file')){
            $bus_name = $request->file('bus_file')->getClientOriginalName();
            $bus_path = $request->file('bus_file')->store('public/files');
        }
        if($request->hasFile('acc_file')){
            $acc_name = $request->file('acc_file')->getClientOriginalName();
            $acc_path = $request->file('acc_file')->store('public/files');
        }
        if($request->hasFile('land_file')){
            $land_name = $request->file('land_file')->getClientOriginalName();
            $land_path = $request->file('land_file')->store('public/files');
        }

        $journey = new Journey;
                $journey->name = $request->name;
                $journey->user_id = auth()->user()->id;
                $journey->start_point = $request->start;
                $journey->end_point = $request->end;
                $journey->start_time = $request->start_time;
                $journey->end_time = $request->end_time;
                if($request->hasFile('bus_file')){
                    $journey->bus_file_name = $bus_name;
                    $journey->bus_path = $bus_path;
                }
                if($request->hasFile('acc_file')){
                    $journey->acc_file_name = $acc_name;
                    $journey->acc_path = $acc_path;
                }
                if($request->hasFile('land_file')){
                    $journey->land_file_name = $land_name;
                    $journey->land_path = $land_path;
                }
                $journey->save();
    
        return view('site.planner.confirmed');
    }
}