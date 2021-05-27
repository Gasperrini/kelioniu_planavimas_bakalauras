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
        //$file = Journey::first()->getMedia();
    
    return view('site.pages.journey', compact('journey'/*, 'file'*/));
    }

    // Generate PDF
    public function createPDF($slug) {
        // retreive all records from db
        $data = $this->journeyRepository->findBySlug($slug);
  
        // share data to view
        //view()->share('data',$data);
        $pdf = PDF::loadView('site.pages.pdf_view', compact('data'));

        /*$content = $pdf->download()->getOriginalContent();
        $fileName =  $slug . '.' . 'pdf' ;
        Storage::put('public/files/'.$fileName,$content);

        return $pdf->download('public/files/'.$fileName);*/
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    function downloadFile( $file_name){
        /*$val = str_replace("public/","",$file_name);
        $file = Storage::disk('public')->get($val);
        $headers = ['Content-Type: application/pdf'];
  
        return Storage::download($file_name, $headers);
        return (new Response($file, 200))
              ->header('Content-Type', 'application/pdf');*/
              return response()->download(public_path('/storage/app/files/'.$file_name));
              //return Storage::disk('public')->download($path, $file_name);
    }

    /*function downloadFile($file_name){
        $val = str_replace("public/files/","",$file_name);
        if(Storage::disk('public')->exists("files/$val")){
            $path= Storage::disk('public')->path("files/$val");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($val)
            ]);
        }
        return redirect('/404');
    }*/

}
