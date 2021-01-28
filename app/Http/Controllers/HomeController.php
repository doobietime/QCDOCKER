<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        $checks = \App\Check::all();
        $checks = \App\Check::whereDate('created_at', date('Y-m-d'))
         ->orderBy('check_datetime', 'dsc')
         ->get();

        $checksNotVerified = \App\Check::whereNull('verify')->get();
        $checksCount = $checksNotVerified->count();

       //

        $mixing = \App\mixing::whereDate('created_at', date('Y-m-d'))
         ->orderBy('mixing_datetime', 'dsc')
         ->get();

        $mixNotVerified = \App\mixing::whereNull('verify')->get();
        $mixnv = $mixNotVerified->count();

         //

        $ovens = \App\Oven::whereDate('created_at', date('Y-m-d'))
         ->orderBy('datetime', 'dsc')
         ->get();

           $ovenNotVerified = \App\Oven::whereNull('verify')->get();
        $ovennv = $ovenNotVerified->count();

         //


        $weighups = \App\Weighup::whereDate('created_at', date('Y-m-d'))
          ->orderBy('datetime', 'dsc')   
         ->get();

        $wuNotVerified = \App\Weighup::whereNull('verify')->get();
        $wunv = $wuNotVerified->count();

         //

        //somaly checks
        $toyoCount = \App\pouchChecks::whereNull('verified_status')
        ->whereIn('machineID', ['T1', 'T2'])
        ->count();

        $vfCount = \App\pouchChecks::whereNull('verified_status')
        ->where('machineID','VF')
        ->count();

        $cavCount = \App\pouchChecks::whereNull('verified_status')
        ->whereIn('machineID', ['C1', 'C2', 'C3'])
        ->count();

        $waterCount = \App\water_activity::whereNull('verified_status')->count();
        $scaleCount = \App\scale_calibration::whereNull('verified_status')->count();
        $syrupCount = \App\syrups_lines::whereNull('verified_status')->count();







        return view('home', [ 'sycount' => $syrupCount, 'tcount'=> $toyoCount, 'vcount'=> $vfCount, 'cavcount'=> $cavCount, 'watercount'=> $waterCount, 'scount'=> $scaleCount, 'allChecks' => $checks, 'allMixing' => $mixing, 'Oven' => $ovens, 'Weighups' =>$weighups,'ccount'=> $checksCount, 'mcount'=> $mixnv,'ocount'=> $ovennv,'wcount'=> $wunv ]);


    }
    
}
