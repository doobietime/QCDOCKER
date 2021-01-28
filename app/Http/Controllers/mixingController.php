<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mixingController extends Controller
{

     public function __construct(){
    $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //$mixing_checks = \App\mixing::all();
        //$mixing_checks = \App\mixing::whereDate('created_at', date('Y-m-d'))->get();

        //return $model->where('created_at', '>=', date('Y-m-d').' 00:00:00');

        $mixing_checks = \App\mixing::where('created_at', '>=', date('Y-m-d'))
         ->orderBy('mixing_datetime', 'dsc')
        ->get();

        return view('mixing',['allMixing' => $mixing_checks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $skus = \App\Sku::all();


      $mixing_checks = \App\mixing::all();
        return view('createMixing',['allMixing' => $mixing_checks],['allSkus' => $skus]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {

         
        $this->validate(request(), [
            // 'mixing_datetime_1' => 'required',
            'mixing_product_name' => 'required',

        ]);

$getUser = \Auth::user()->name;

        \App\mixing::create([
            'mixing_datetime' => $request->get('mixing_datetime_1'),
            'mixing_product' => $request->get('mixing_product_name'),
            'mixing_no_of_mixes' => $request->get('mixing_number_of_mixes'),
            'correct_ingredients' => $request->get('CI'),
            'correct_weights' => $request->get('CW'),
            'mixing_sop_followed' => $request->get('MSF'),
            'checksheets_completed' => $request->get('CC'),
            'comments_observation' => $request->get('mixing_comments'),
            'mixing_type' => $request->get('mixing_type_1'),
            'recorded_by' => $getUser,


        ]);
         return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mixings = \App\mixing::find($id);
        $skus = \App\Sku::all();
       
        return view('editmixing',compact('mixings'),['allSkus' => $skus] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mixings = \App\mixing::find($id);
         $mixings->mixing_type = $request->get('mixing_type_1');
         $mixings->mixing_product = $request->get('mixing_product_name');
         $mixings->mixing_no_of_mixes = $request->get('mixing_number_of_mixes');
         $mixings->correct_ingredients = $request->get('CI'); 
         $mixings->correct_weights = $request->get('CW'); 
         $mixings->mixing_sop_followed = $request->get('MSF'); 
         $mixings->checksheets_completed = $request->get('CC'); 
         $mixings->comments_observation = $request->get('mixing_comments');
         $mixings->mixing_datetime = $request->get('mixing_datetime_1');
         
        
         $mixings->save();

        return redirect('/mixing')->with('success', 'Check has been updated'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      public function getAll(){



         $allMixing = \App\mixing::orderBy('created_at', 'DSC')->simplePaginate(6);

         return view('/reports/mixingReport',compact('allMixing'));

    }

       public function ajaxRequest_updateStatus(Request $request){

        $id = $request->id;
        $getUser = \Auth::user()->name;

        $mixings = \App\mixing::find($id);
        $mixings->verify = $request->status;
        $mixings->verified_by = $getUser;
        $mixings->save();

        
    }

        public function export_to_csv(){
        $headers = [
                    'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'  => 'text/csv',
                    'Content-Disposition' => 'attachment; filename=ctqc_export.csv',
                    'Expires' => '0',
                    'Pragma' => 'public'
                ];

                $list = \App\mixing::all()->toArray();

                array_unshift($list, array_keys($list[0]));

                $callback = function() use ($list)
                {
                    $FH = fopen('php://output', 'w');
                    foreach ($list as $row){
                        fputcsv($FH, $row);
                    }
                    fclose($FH);
                };
        

            return response()->stream($callback, 200, $headers)->send();
            //return response()->stream($callback, 200, $headers)->sendContent();
    }

    public function ajaxRequest_getSKUs(Request $request){

           $type = $request->p_selected;
           $skus = \App\Sku::where('product_type' , '=', $type)->get();

           // return ['newskus' => $skus];
           return response()->json($skus);



    }
}
