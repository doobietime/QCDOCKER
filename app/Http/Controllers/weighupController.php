<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weighupController extends Controller
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
         $weighups = \App\Weighup::where('created_at', '>=', date('Y-m-d'))
          ->orderBy('datetime', 'dsc')   
         ->get();

        return view('weighup',['allWeighups' => $weighups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {
      $weighups = \App\Weighup::all();
      // $skus = \App\Sku::all();

       $prod_type = "preweigh";
        $skus = \App\Sku::where('product_type', '=' ,$prod_type)->get();

     
      return view('createweighup',['allWeighups' => $weighups],['allSkus' => $skus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                  
$getUser = \Auth::user()->name;

        \App\Weighup::create([
            'type' => $request->get('WTYPE'),
            'ingredient' => $request->get('w_ingredient'),
            'number_of_weighup' => $request->get('NWEIGH'),
            'correct_weight' => $request->get('CWEIGHT'),
            'correct_ingredient' => $request->get('CORRECTI'),
            'correct_label' => $request->get('CORRECTL'),
            'checksheet_completed' => $request->get('CHECKCOMP'),
            'comments' => $request->get('weigh_comments'),
            'datetime' => $request->get('w_datetime'),
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
        $weighups = \App\Weighup::find($id);
        $skus = \App\Sku::all();
       
        return view('editweighup',compact('weighups'),['allSkus' => $skus] );
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
         $weighups = \App\Weighup::find($id);
         $weighups->type = $request->get('WTYPE');
         $weighups->ingredient = $request->get('w_ingredient');
         $weighups->number_of_weighup = $request->get('NWEIGH');
         $weighups->correct_weight = $request->get('CWEIGHT'); 
         $weighups->correct_ingredient = $request->get('CORRECTI'); 
         $weighups->correct_label = $request->get('CORRECTL'); 
         $weighups->checksheet_completed = $request->get('CHECKCOMP'); 
         $weighups->comments = $request->get('weigh_comments');
         $weighups->datetime = $request->get('w_datetime');
         
        
         $weighups->save();

        return redirect('/weighup')->with('success', 'Check has been updated'); 
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

         $allWeighups = \App\Weighup::orderBy('created_at','DSC')->simplePaginate(6);
         return view('/reports/weighupReport',compact('allWeighups'));

    }
        public function ajaxRequest_updateStatus(Request $request){

        $id = $request->id;
        $getUser = \Auth::user()->name;

        $weighups = \App\Weighup::find($id);
        $weighups->verify = $request->status;
        $weighups->verified_by = $getUser;
        $weighups->save();

        
    }

     public function export_to_csv(){
        $headers = [
                    'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'  => 'text/csv',
                    'Content-Disposition' => 'attachment; filename=ctqc_export.csv',
                    'Expires' => '0',
                    'Pragma' => 'public'
                ];

                $list = \App\Weighup::all()->toArray();

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
}
