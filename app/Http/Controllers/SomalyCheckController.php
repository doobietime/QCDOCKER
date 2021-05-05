<?php

namespace App\Http\Controllers;

use App\SomalyCheck;
use App\keyValues;
use Illuminate\Http\Request;
use DOMDocument;
use DateTime;
use App\Rules\scale_calibration_rule;
use App\Rules\water_activity_rule;

class SomalyCheckController extends Controller
{

    public function __construct(){
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //GET STUFF FUNCTIONS

    public function getSkuAdmin(Request $request)
    {
         $selected_sku = $request->p_selected;

         $details = \App\Sku::whereIn('product_type',['T','VFFS','C1','C2','C3','TBC'])
         ->where('id', $selected_sku)
         ->get();

         //return response()->json($parameters);
         return response()->json($details);

    }
    public function getLastSKU($machineID){
        $lastUsed = \App\keyValues::where('machineName',$machineID)->value("value");
        return $lastUsed;

    }

    public function getTimeStuff(){
        $today = now();
        $today_no_time = now()->toDateString();
        return $today;
    }

    public function getSkews($machine){

        if($machine == "T1" || $machine == "T2"){
            $machine = "T";
        }

        if($machine == "VF"){
            $machine = "VFFS";
        }


         $skews = \App\Sku::where('product_type', $machine)->get();
         return $skews;
    }

    //OTHER FUNCTIONS

    public function ajax_verify(Request $request)
    {

        //water and scale 
        if($request->checktype == "WaterA")
        {
            $id = $request->id;
            $getUser = \Auth::user()->name;
            $record = \App\water_activity::find($id);

            if($record->created_by == $getUser)
            {
            $error = "1";
            return $error;
            }

            $error = "0";
            $record->verified_status = $request->status;
            $record->verified_by = $getUser;
            $record->save();

            return $error;

        }

         if($request->checktype == "ScaleC")
        {
            $id = $request->id;
            $getUser = \Auth::user()->name;
            $record = \App\scale_calibration::find($id);

            if($record->created_by == $getUser)
            {
            $error = "1";
            return $error;
            }

            $error = "0";
            $record->verified_status = $request->status;
            $record->verified_by = $getUser;
            $record->save();

            return $error;

        }

        if($request->checktype == "Syrup")
        {
            $id = $request->id;
            $getUser = \Auth::user()->name;
            $record = \App\syrups_lines::find($id);

            if($record->done_by == $getUser)
            {
            $error = "1";
            return $error;
            }

            $error = "0";
            $record->verified_status = $request->status;
            $record->verified_by = $getUser;
            $record->comments = $request->comments;
            $record->save();

            return $error;

        }
        if($request->checktype == "CCP")
        {
            $id = $request->id;
            $getUser = \Auth::user()->name;
            $record = \App\ccpChecks::find($id);

            if($record->created_by == $getUser)
            {
            $error = "1";
            return $error;
            }

            $error = "0";
            $record->status = $request->status;
            $record->verified_by = $getUser;
            $record->veri_comments = $request->comments;
            $record->save();

            return $error;

        }



        $id = $request->id;
        $getUser = \Auth::user()->name;
        $record = \App\pouchChecks::find($id);

        if($record->created_by == $getUser)
        {
        $error = "1";
        return $error;
        }

        $error = "0";
        $record->verified_status = $request->status;
        $record->verified_by = $getUser;
        $record->comments = $request->comments;
        $record->save();

        return $error;


       
    }

    public function viewReport($type)
    {
        $contentType = $type;

        if($contentType == "Toyo"){
            $results = \App\pouchChecks::where('machineID','T1')->orWhere('machineID','T2')
            ->with('pouchChecks_lines')
            ->with('pouchChecks_lines_weight')
            ->with('pouchChecks_retest')
            ->orderby('created_at','DESC')
            ->paginate(15);
        }
         if($contentType == "VFFS"){
            $results = \App\pouchChecks::where('machineID','VF')
            ->with('pouchChecks_lines')
            ->with('pouchChecks_lines_weight')
            ->with('pouchChecks_retest')
            ->orderby('created_at','DESC')
            ->paginate(15);
            
        }
         if($contentType == "Cavanna"){
            $results = \App\pouchChecks::where('machineID','C1')
            ->orWhere('machineID','C2')
            ->orWhere('machineID','C3')
            ->with('pouchChecks_lines')
            ->with('pouchChecks_lines_weight')
            ->with('pouchChecks_retest')
            ->orderby('created_at','DESC')
            ->paginate(15);
        }




         if($contentType == "WaterA"){
            $results = \App\water_activity::orderby('created_at','DESC')
            ->paginate(15);
            return view('SomalyChecks/somalychecks_report_water_scale',compact('contentType','results'));
        }
         if($contentType == "ScaleC"){
           $results = \App\scale_calibration::orderby('created_at','DESC')
            ->paginate(15);
            return view('SomalyChecks/somalychecks_report_water_scale',compact('contentType','results'));
        }
          if($contentType == "Syrup"){
           $results = \App\syrups_lines::orderby('created_at','DESC')
            ->paginate(15);
         return view('SomalyChecks/somalychecks_report_syrup',compact('contentType','results'));
        }

        if($contentType == "CCP"){
            $results = \App\ccpChecks::orderby('created_at','DESC')
            ->paginate(15);
            return view('reports/ccpReport', compact('contentType','results'));
        }
      



        return view('SomalyChecks/somalychecks_report',compact('contentType','results'));
    }

    public function index()
    {

        $today = $this->getTimeStuff();
        $today = $today->toDateString();

        $latestc1 = \App\pouchChecks::getLastCheck("C1");
        $latestc2 = \App\pouchChecks::getLastCheck("C2");
        $latestc3 = \App\pouchChecks::getLastCheck("C3");
        $latestt1 = \App\pouchChecks::getLastCheck("T1");
        $latestt2 = \App\pouchChecks::getLastCheck("T2");
        $latestvf = \App\pouchChecks::getLastCheck("VF");
       

        $checks = \App\pouchChecks::where('created_at','like',$today.'%')->get();
        $scale_checks = \App\scale_calibration::where('created_at','like',$today.'%')->get();
        $water_checks = \App\water_activity::where('created_at','like',$today.'%')->get();

        $merged = $checks->merge($scale_checks);

        return view('SomalyChecks/somalychecks_home',compact('checks','scale_checks','water_checks','latestc1','latestc2','latestc3','latestt1','latestt2','latestvf'));
    }

    public function pouch_check($type)
    {
        $pouch_number = $type;
        $today = $this->getTimeStuff();
        $skus = $this->getSkews($pouch_number);
        $lastsku = $this->getLastSKU($pouch_number);


        // dd(session()->all());

        if(session()->get($pouch_number))
        {
              $dumpy = session()->get($pouch_number);
        }
        else{
            $dumpy = ['save_mo' => null, 'save_bbd' => null , 'save_pd' => null, 'save_md' => null, 'film_part' => null, 'film_version' => null];
        }
        return view('SomalyChecks/somalychecks_pouch_check',compact('pouch_number','today','skus','lastsku','dumpy'));

    }

    public function cavanna_check($type)
    {
        $cav_number = $type;
        $checks = \App\IGCheck::where('item_code','test_sku')->get();


        return view('SomalyChecks/somalychecks_cavanna_check',compact('cav_number'));
    }

    public function water_activity_check()
    {
        $today = $this->getTimeStuff();
        $today_no_time = $today->format("Y-m-d");

        $shouldretest = \App\water_activity::where('day',$today_no_time)->first();
        $get5 = \App\water_activity::where('day',$today_no_time)->where('test_type','0.500')->get();
        $get7 = \App\water_activity::where('day',$today_no_time)->where('test_type','0.760')->get();

        $getall = \App\scale_calibration::where('date',$today_no_time)->get();
        $count = $getall->count();

         if($count > 0)
        {
        return view('SomalyChecks/somalychecks_water_activity_check')->with(compact('today','today_no_time','count','get5','get7'))->with('message','Scale calibration finished today');
        }
        return view('SomalyChecks/somalychecks_water_activity_check', compact('today','today_no_time','count','get5','get7'));

        // $count = $getall->count();

        // if($count){
        //     return view('SomalyChecks/somalychecks_water_activity_check',compact('today','get5'));
        // }

        // if($count == 0)
        // {
        //     $retest = "false";
        // }
        // if($count == 2)
        // {
        //     $retest = "true";
        //     $firstset = \App\water_activity::where('day',$today_no_time)->where('retest','0')->get();
        //     return view('SomalyChecks/somalychecks_water_activity_check',compact('today','retest','firstset'));
        // }
        // if($count == 4)
        // {
        //     $retest ="finished";
        //      // return view('SomalyChecks/somalychecks_water_activity_check',compact('today','retest'))->with('message', 'Water activity finished today');

        //      return view('SomalyChecks/somalychecks_water_activity_check')->with(compact('today','retest'))->with('message','Water activity finished today');
  
        // }
        
       // return view('SomalyChecks/somalychecks_water_activity_check',compact('today','get5','get7'));
    }

    public function water_activity_store(Request $request)
    {
        $getUser = \Auth::user()->name;
        $today = $this->getTimeStuff()->format("Y-m-d");
        $data = $request->all();

        $check5 = \App\water_activity::where('test_type','0.500')->where('day',$today)->get();
        $check7 = \App\water_activity::where('test_type','0.760')->where('day',$today)->get();
        $count5 = $check5->count();
        $count7 = $check7->count();

        $data_1 = $request->point5;
        $data_2 = $request->point7;

        $retest = 0;


        if(sizeof($data_1) >0)
        {
            if ($count5 <= 3 )
            {
               
              $x = 0;
             foreach($data_1 as $d1 => $data_1)
            {
                   if(!is_null($data["point5"][$d1]) )
                   {
                    $x++;
                    $type = "point5";
                    if($count5 >= 2)
                    {
                        $retest = 1;
                    }
                    \App\water_activity::create([
                    'created_by' => $getUser,
                    'day' => $today,
                    'calibration_type' => $data[$type][$d1],
                    'calibration_set' => $d1+1,
                    'test_type' => '0.500',
                    'retest' => $retest
                     ]);
                }

            }
        }
    }
       
        if(sizeof($data_2) > 0)
        {
  
                 if($count7 <= 3 )
            {
                    
              $x = 0;

                    foreach($data_2 as $d2 => $data_2)
            {
                if(!is_null($data["point7"][$d2]) )
                {
                    $x++;
                    $type = "point7";
                    if($count7 >= 2)
                    {
                        $retest = 1;
                    }
                    \App\water_activity::create([
                    'created_by' => $getUser,
                    'day' => $today,
                    'calibration_type' => $data[$type][$d2],
                    'calibration_set' => $d2+1,
                    'test_type' => '0.760',
                    'retest' => $retest
                     ]);
                }

            }
}

        }
               // if($request->point5){
        //      $doobies = $request->point5;
        //      $type = "point5";
        // }
        // if($request->point7){
        //      $doobies = $request->point7;
        //       $type = "point7";
        // }
        // $doobies = $request->all();
     



        // if($doobies)
        // {

        //     foreach($doobies as $doobie => $doobies)
        //     {
        //         if($request->point5)
        //         {
        //             $x++;
        //             $type = "point5";
        //             \App\water_activity::create([
        //             'created_by' => $getUser,
        //             'day' => $today,
        //             'calibration_type' => $data[$type][$doobie],
        //             'calibration_set' => $x,
        //             'retest' => "0"
        //              ]);
        //         }
        //         if($request->point7)
        //         {
        //             $x++;
        //             \App\water_activity::create([
        //             'created_by' => $getUser,
        //             'day' => $today,
        //             'calibration_type' => $data[$type][$doobie],
        //             'calibration_set' => $x,
        //             'retest' => "0"
        //              ]);
        //         }
        //     }
        // }
        


    // return view('SomalyChecks/somalychecks_home');
 return back();

    }

    public function scale_calibration_check()
    {
        $today = now();
        $today_notime = now()->toDateString();
        $today_no_time = $today->format("Y-m-d");

        $getall = \App\scale_calibration::where('date',$today_no_time)->get();
        $count = $getall->count();

         if($count > 0)
        {
        return view('SomalyChecks/somalychecks_scale_calibration')->with(compact('today','today_notime','count'))->with('message','Scale calibration finished today');
        }
        return view('SomalyChecks/somalychecks_scale_calibration', compact('today','today_notime','count'));
    }

    public function scale_calibration_store(Request $request)
    {
        $getUser = \Auth::user()->name;
        $doobies = $request->sw;
        $data = $request->all();

         $this->validate($request,[
            'sw.*' => ['required', 'regex:/^(\d)*(\.)?([0-9]{1})?$/',new scale_calibration_rule],
        ]);


        // $request->validate([
        //     'sw[]' => ['required',new scale_calibration_rule],
        // ]);

        // for($x =0; $x = count($data['sw']) ; $x++){
        //     if($data['sw'].[$x] !== "0.100"){
        //           return view('SomalyChecks/somalychecks_scale_calibration')->with(compact('today','today_notime','count'))->with('message','Scale Calibration must be 0.100');
        //     }

        // }

        // dd($request->all(),$getUser);

            if($doobies){
            foreach($doobies as $doobie => $doobies)
            {
            \App\scale_calibration::create([
            'created_by' => $getUser,
            'date' => $data['dt'][$doobie],
            'scale_weight' => $data['sw'][$doobie]
        ]);

            }
        
         }
         // return view('SomalyChecks/somalychecks_home');
          return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created pouch check in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $machineID = $request->machineID;
        \Session::put( $machineID, $request->all());
        $product_used = $request->product_used;

        $update_key = \App\keyValues::where('machineName',$machineID)->first();
        $update_key->machineName = $machineID;
        $update_key->valueName = "last_used_sku";
        $update_key->value = $product_used;
        $update_key->save();

        $createPouchCheck = \App\pouchChecks::create([
            'machineID' => $machineID,
            'product_used' => $product_used,
            'created_by' => \Auth::user()->name,
            'made_date' => $request->save_md,
            'bb_date' => $request->save_bbd,
            'packed_date' => $request->save_pd,
            'mo_number' => $request->save_mo,
            'film_part' => $request->film_part,
            'version' => $request->film_version,
            'product_used_code' => $request->product_used_code

        ]);

        $data = $request->all();

        \App\pouchChecks_lines_weight::create([
            'check1' => $data['i1'][0],
            'check2' => $data['i1'][1],
            'check3' => $data['i1'][2],
            'check4' => $data['i1'][3],
            'check5' => $data['i1'][4],
            'average' => round($request->average,2),
            'pouchCheck_id' => $createPouchCheck->id
        ]);

        //if retest, create retest lines
        if($request->i2)
        {

            \App\pouchChecks_retest::create([
            'check1' => $data['i2'][0],
            'check2' => $data['i2'][1],
            'check3' => $data['i2'][2],
            'check4' => $data['i2'][3],
            'check5' => $data['i2'][4],
            'average' => round($request->average2,2),
            'pouchCheck_id' => $createPouchCheck->id
            ]);

            $createPouchCheck->is_retest = "1";
            $createPouchCheck->save();

        }


        $doobies = $request->ris;
          if($doobies){
            foreach($doobies as $doobie => $doobies)
            {
            \App\pouchChecks_lines::create([
            'pouchCheck_id' => $createPouchCheck->id,
            'specification' => $data['p2'][$doobie],
            'result_in_spec' => $data['ris'][$doobie],
            'comments' => $data['coms'][$doobie]

        ]);

            }
        
         }


        $get_mo = $request->save_mo;
        $check_mo = \App\pouchChecks_mo::where('mo_number',$get_mo)->first();

        if( is_null($check_mo))
        {
            \App\pouchChecks_mo::create([
                'sku_id' =>  $product_used,
                'pouch_id' => $createPouchCheck->id,
                'mo_number' => $get_mo

            ]);
        }




return redirect()->action(
'SomalyCheckController@index');
 // return view('SomalyChecks/somalychecks_home');
    }
    public function water_activity_check_product()
    {

        $prods = \App\Sku::where('product_type','T')
        ->orWhere('product_type','C1')
        ->orWhere('product_type','C2')
        ->orWhere('product_type','C3')
        ->orWhere('product_type','VFFS')
        ->orWhere('product_type','S')
        ->orderby('Code','ASC')
        ->get();

         return view('SomalyChecks/somalychecks_water_activity_bysku',compact('prods'));
    }

    public function getMos(Request $request)
    {
        $product = $request->prod;

        $mo = \App\pouchChecks_mo::where('sku_id',$product)->get();
        return($mo);
    }
    public function getMosLines(Request $request)
    {
        $mo = $request->mo;

        $molines = \App\pouchChecks_mo_lines::where('MOs_id',$mo)->get();
        return($molines);

    }

    public function getSyrupLines(Request $request)
    {
        $syrup = $request->mo;

        $syrup_lines = \App\syrups_lines::where('syrup_code',$syrup)->get();
        return($syrup_lines);
    }

    public function mo_store(Request $request)
    {
            // dd($request->all());
            $getUser = \Auth::user()->name;
            $data = $request->all();
            $mo_number = $request->moselector;


            //if update existing records
            $doobie = $request->ids;

            if($doobie)
            {
                foreach($doobie as $doob)
                {

                    $update = \App\pouchChecks_mo_lines::find($doob);
                    $update->c1 = $request->$doob[0];
                     $update->c2 = $request->$doob[1];
                      $update->c3 = $request->$doob[2];

                        $calc_avg =($request->$doob[0] + $request->$doob[1] + $request->$doob[2]) /3;

                      $update->avg = round($calc_avg,3);
                      $update->save();

                }
            }


            //if new lines, create new lines
            $doobies = $request->set1;
            if($doobies){
            foreach($doobies as $doobie => $doobies)
            {

            $calc_avg =($data['set1'][$doobie] + $data['set2'][$doobie] + $data['set3'][$doobie]) /3;

            \App\pouchChecks_mo_lines::create([
            'MOs_id' => $mo_number,
            'c1' => $data['set1'][$doobie],
            'c2' => $data['set2'][$doobie],
            'c3' => $data['set3'][$doobie],
            'avg' => round($calc_avg,3),
            'type' => $data['type'][$doobie],
            'created_by' =>  $getUser
        ]);

            }
        
         }
         return redirect()->back();
     
    }

    public function syrup_store(Request $request)
    {
         $data = $request->all();
         $getUser = \Auth::user()->name;




       //if update existing records
            $doobie = $request->ids;
            if($doobie)
            {
                foreach($doobie as $doob)
                {

                    $update = \App\syrups_lines::find($doob);
                    $update->type = $request->$doob[2];
                    $update->batch_number = $request->$doob[0];
                    $update->made_date = $request->$doob[1];
                    $update->c1 = $request->$doob[3];
                     $update->c2 = $request->$doob[4];
                      $update->c3 = $request->$doob[5];
 
                        $calc_avg =($request->$doob[3] + $request->$doob[4] + $request->$doob[5]) /3;

                      $update->avg = round($calc_avg,3);
                      $update->save();

                }
            }


        //create syrup lines
        $doobies = $request->set1;
        if($doobies)
        {

        //create syrup
        $abc = \App\syrups::create([
            'code' => $request->syrup_code
        
        ]);

            foreach($doobies as $doobie => $doobies)
            {
            $calc_avg =($data['set1'][$doobie] + $data['set2'][$doobie] + $data['set3'][$doobie]) /3;

             \App\syrups_lines::create([
            'batch_number' =>$data['batch'][$doobie],
            'Syrup_id' => $abc->id,
            'c1' => $data['set1'][$doobie],
            'c2' => $data['set2'][$doobie],
            'c3' => $data['set3'][$doobie],
            'avg' => round($calc_avg,3),
            'type' => $data['type'][$doobie],
            'made_date' =>  $data['mdate'][$doobie],
            'done_by' =>  $getUser,
            'syrup_code' => $request->syrup_code,
            'syrup_name' => $request->syrupname
        ]);
            }
        }

return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SomalyCheck  $somalyCheck
     * @return \Illuminate\Http\Response
     */
    public function show(SomalyCheck $somalyCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SomalyCheck  $somalyCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(SomalyCheck $somalyCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SomalyCheck  $somalyCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SomalyCheck $somalyCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SomalyCheck  $somalyCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(SomalyCheck $somalyCheck)
    {
        //
    }
}
