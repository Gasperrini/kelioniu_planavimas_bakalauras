<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journey;
use Illuminate\Support\Facades\DB;
use App\Contracts\JourneyContract;
use PDF;
use Illuminate\Support\Facades\Storage;

class JourneyController extends Controller
{
    protected $journeyRepository;

    public function __construct(JourneyContract $journeyRepository)
    {
        $this->journeyRepository = $journeyRepository;
    }
    
    public function index()
    {
        $user_id = auth()->user()->id;
        $journeys = DB::table('journeys')->where('user_id', 'LIKE', $user_id)->get();
    
        return view('site.planner.journeys', compact('journeys'));
    }

    public function delete($id)
    {
        $journey = $this->journeyRepository->deleteJourney($id);

        return redirect()->route('journey.index');
    }

    public function show($slug)
    {
        $journey = $this->journeyRepository->findBySlug($slug);
    
    return view('site.pages.journey', compact('journey'));
    }

    public function createPDF($slug) {
        $data = $this->journeyRepository->findBySlug($slug);
        $pdf = PDF::loadView('site.pages.pdf_view', compact('data'));
        return $pdf->download('pdf_file.pdf');
    }

}
