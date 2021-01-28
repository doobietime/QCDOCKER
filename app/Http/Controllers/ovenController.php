<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ovenController extends Controller
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
        //

        $oven_checks = \App\Oven::where('created_at', '>=', date('Y-m-d'))
         ->orderBy('datetime', 'dsc')    
        ->get();

        return view('oven',['allOvens' => $oven_checks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

         $SKUfilter = ['product_type' => 'Cookie'];
         $SKUfilter2 = ['product_type' => 'BUMPERBARS'];

         $skus = \App\Sku::where($SKUfilter)
         ->orWhere($SKUfilter2)
         ->get();
        // $skus = \App\Sku::where($SKUfilter)->get();
         //$skus = \App\Sku::orderBy('product_type', 'ASC')->get();
      $oven_checks = \App\Oven::all();
      return view('createoven',['allOvens' => $oven_checks],['allSkus' => $skus]);
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

        \App\Oven::create([
            'oven_product' => $request->get('oven_product'),
             'datetime' => $request->get('oven_datetime'),
            'trolley_number' => $request->get('TNUM'),
            'colour' => $request->get('COLOUR'),
            'spread' => $request->get('SPREAD'),
            'correct_temp' => $request->get('CTEMP'),
            'correct_time' => $request->get('CTIME'),
            'checklist_completed' => $request->get('CHECKCOMP'),
            'comments' => $request->get('oven_comments'),
            'oven_number' => $request->get('oven_num'),
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
        $ovens = \App\Oven::find($id);
          $skus = \App\Sku::orderBy('product_type', 'ASC')->get();
       
        return view('editoven',compact('ovens'),['allSkus' => $skus] );

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
         $ovens = \App\Oven::find($id);
         $ovens->oven_product = $request->get('oven_product');
         $ovens->trolley_number = $request->get('TNUM');
         $ovens->colour = $request->get('COLOUR');
         $ovens->spread = $request->get('SPREAD'); 
         $ovens->correct_temp = $request->get('CTEMP'); 
         $ovens->correct_time = $request->get('CTIME'); 
         $ovens->checklist_completed = $request->get('CHECKCOMP'); 
         $ovens->comments = $request->get('oven_comments');
         $ovens->datetime = $request->get('oven_datetime');
         
        
         $ovens->save();

        return redirect('/oven')->with('success', 'Check has been updated'); 

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


         $allOvens = \App\Oven::orderBy('created_at','DSC')->simplePaginate(6);

         return view('/reports/ovenReport',compact('allOvens'));

    }

        public function ajaxRequest_updateStatus(Request $request){

        $id = $request->id;
        $getUser = \Auth::user()->name;

        $ovens = \App\Oven::find($id);
        $ovens->verify = $request->status;
        $ovens->verified_by = $getUser;
        $ovens->save();

        
    }
     public function export_to_csv(){
        $headers = [
                    'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'  => 'text/csv',
                    'Content-Disposition' => 'attachment; filename=ctqc_export.csv',
                    'Expires' => '0',
                    'Pragma' => 'public'
                ];

                $list = \App\Oven::all()->toArray();

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
