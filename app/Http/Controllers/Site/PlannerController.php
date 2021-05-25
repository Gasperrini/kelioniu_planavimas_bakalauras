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
        //$route = $this->routeRepository->findBySlug($slug);
    
        return view('site.planner.index', compact('route', 'segments', 'accommodations', 'landmarks'));
    }

    public function showUpdated(Request $request)
    {
        $end_point = $request->end;
        $route = DB::table('route')->get();
        $segments = DB::table('segments')->get();
        $accommodations = DB::table('accommodation')->where('address', 'LIKE', "%{$end_point}%")->get();
        $landmarks = DB::table('landmark')->where('address', 'LIKE', "%{$end_point}%")->get();
        //$route = $this->routeRepository->findBySlug($slug);
    
        return view('site.planner.index', compact('route', 'segments', 'accommodations', 'landmarks'));
    }

    public function confirmed(Request $request)
    {
        /*$route = DB::table('route')->get();
        $segments = DB::table('segments')->get();
        $accommodations = DB::table('accommodation')->get();
        $landmarks = DB::table('landmark')->get();*/
        //$route = $this->routeRepository->findBySlug($slug);
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/files');

        $journey = new Journey;
                $journey->name = $request->name;
                $journey->start_point = $request->start;
                $journey->end_point = $request->end;
                $journey->start_time = $request->start_time;
                $journey->end_time = $request->end_time;
                $journey->file_name = $name;
                $journey->path = $path;
                //$journey->addMediaFromRequest('document')->toMediaCollection();
                $journey->save();
    
        return view('site.planner.confirmed');
    }
}