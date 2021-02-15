<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class checkController extends Controller
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
    public function index()
     {

        // $checks = \App\Check::all();

        $checks = \App\Check::all();


        // ->orderBy('name', 'desc')
        // ->take(10)
        // ->get();

        // $checks = \App\Check::where('created_at', '2019-05-30 00:51:45')->get();
        //$checks = \App\Check::whereDate('created_at', '=', date('Y-m-d'));
       //$query->whereDate('created_at', '=', date('Y-m-d'));
       // $checks = \App\Check::whereDate('created_at', Carbon::today())->get();
        $checks = \App\Check::whereDate('created_at', date('Y-m-d'))
         ->orderBy('check_datetime', 'dsc')
        ->get();


        return view('viewchecks',['allChecks' => $checks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod_type = "cookie";
        //$skus = \App\Sku::all();
        $skus = \App\Sku::where('product_type', '=' ,$prod_type)->get();

     return view('newcheck',['allSkus' => $skus]);
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
           // 'newcheck_datetime' => 'required',
            'newcheck_product_name' => 'required',
            // 'individual_1' => 'required',
            // 'individual_2' => 'required',
            // 'individual_3' => 'required',
            // 'individual_4' => 'required',
            // 'individual_5' => 'required',
            // 'newcheck_individual_target_range' => 'required',
            // 'newcheck_individual_average' => 'required',
            //  'sample_1' => 'required',
            //   'sample_2' => 'required',
            //    'sample_3' => 'required',
            //    'newcheck_sample_target_range' => 'required',
            //    'newcheck_sample_average' => 'required',
            // 'newcheck_dough_temp' => 'required',
            // 'newcheck_flour_temp' => 'required',
            // 'newcheck_butter_temp' => 'required',

        ]);

$getUser = \Auth::user()->name;


 // $findTarget = $request->get('newcheck_product_name');
 // $prod = \App\Sku::where('Code', $findTarget)->first();
 // $prod_min= $prod->attributes['target_range_ind_min'];
 // $prod_max = $prod->attributes['target_range_ind_max'];


        \App\Check::create([
            'check_datetime' => $request->get('newcheck_datetime'),
            'check_product' => $request->get('newcheck_product_name'),
            'check_inv_1' => $request->get('individual_1'),
            'check_inv_2' => $request->get('individual_2'),
            'check_inv_3' => $request->get('individual_3'),
            'check_inv_4' => $request->get('individual_4'),
            'check_inv_5' => $request->get('individual_5'),
            'check_inv_target_range' => $request->get('trange1'),
            'check_inv_average' => $request->get('newcheck_individual_average'),
            'check_row_1' => $request->get('sample_1'),
            'check_row_2' => $request->get('sample_2'),
            'check_row_3' => $request->get('sample_3'),
            'check_row_target_range' => $request->get('trange2'),
            'check_row_average' => $request->get('newcheck_sample_average'),
            'check_dough_temp' => $request->get('newcheck_dough_temp'),
            'check_flour_temp' => $request->get('newcheck_flour_temp'),
            'check_butter_temp' => $request->get('newcheck_butter_temp'),
            'check_comments' => $request->get('newcheck_comments'),

            're_check_inv_1' => $request->get('re_individual_1'),
            're_check_inv_2' => $request->get('re_individual_2'),
            're_check_inv_3' => $request->get('re_individual_3'),
            're_check_inv_4' => $request->get('re_individual_4'),
            're_check_inv_5' => $request->get('re_individual_5'),
            're_check_inv_average' => $request->get('re_newcheck_individual_average'),

            're_check_row_1' => $request->get('re_sample_1'),
            're_check_row_2' => $request->get('re_sample_2'),
            're_check_row_3' => $request->get('re_sample_3'),
            're_check_row_average' => $request->get('re_newcheck_sample_average'),

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
         $checks = \App\Check::find($id);

           $skus = \App\Sku::orderBy('product_type', 'ASC')->get();
       
         
        return view('editcheck',compact('checks'),['allSkus' => $skus] );

     
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
        //

        // $this->validate(request(), [
        //    'newcheck_datetime' => 'required',
       //     'newcheck_product_name' => 'required',
            // 'individual_1' => 'required',
            // 'individual_2' => 'required',
            // 'individual_3' => 'required',
            // 'individual_4' => 'required',
            // 'individual_5' => 'required',
            // 'newcheck_individual_target_range' => 'required',
            // 'newcheck_individual_average' => 'required',
            //  'sample_1' => 'required',
            //   'sample_2' => 'required',
            //    'sample_3' => 'required',
            //    'newcheck_sample_target_range' => 'required',
            //    'newcheck_sample_average' => 'required',
            // 'newcheck_dough_temp' => 'required',
            // 'newcheck_flour_temp' => 'required',
            // 'newcheck_butter_temp' => 'required',

      //  ]);

         $checks = \App\Check::find($id);
       //  $checks->check_datetime = $request->get('newcheck_datetime');
        // $checks->check_product = $request->get('newcheck_product_name');
         $checks->check_inv_1 = $request->get('individual_1');
         $checks->check_inv_2 = $request->get('individual_2'); 
         $checks->check_inv_3 = $request->get('individual_3'); 
         $checks->check_inv_4 = $request->get('individual_4'); 
         $checks->check_inv_5 = $request->get('individual_5'); 
         $checks->check_inv_target_range = $request->get('newcheck_individual_target_range');
         $checks->check_inv_average = $request->get('newcheck_individual_average');
         $checks->check_row_1 = $request->get('sample_1');
         $checks->check_row_2 = $request->get('sample_2');
         $checks->check_row_3 = $request->get('sample_3');
         $checks->check_row_target_range = $request->get('newcheck_sample_target_range');
         $checks->check_row_average = $request->get('newcheck_sample_average');
         $checks->check_dough_temp = $request->get('newcheck_dough_temp');
         $checks->check_flour_temp = $request->get('newcheck_flour_temp');
         $checks->check_butter_temp = $request->get('newcheck_butter_temp');
         $checks->check_comments = $request->get('newcheck_comments');
         $checks->save();

        return redirect('/checkPage')->with('success', 'Check has been updated'); 


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
        // $checks = \App\Check::all();
       
         //$checks = \App\Check::orderBy('check_datetime', 'DSC')->get();
         $allChecks = \App\Check::orderBy('created_at', 'DSC')->simplePaginate(6);

         //return view('/reports/checkReport',['allChecks' => $checks]);
         //return view('/reports/checkReport')->with('allChecks',$checks);
         return view ('/reports/checkReport', compact('allChecks'));

    }

    public function ajaxRequest(Request $request){
            //$input = $request->all();
        //find product in Sku table
            //$checks = \App\Sku::where('Code', $input)->get();
        $first = $request->prod;
           $prod = \App\Sku::where('Code', $first)->first();
       
        return response()->json($prod);
    }

    public function test(){
         $skus = \App\Sku::all();

     return view('test/checktest',['allSkus' => $skus]);

    }

     public function ajaxRequest_updateStatus(Request $request){

        $id = $request->id;
        $getUser = \Auth::user()->name;

        $checks = \App\Check::find($id);
        $checks->verify = $request->status;
        $checks->verified_by = $getUser;
        $checks->save();

        
    }

    public function export_to_csv(){
        $headers = [
                    'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
                    'Content-type'  => 'text/csv',
                    'Content-Disposition' => 'attachment; filename=ctqc_export.csv',
                    'Expires' => '0',
                    'Pragma' => 'public'
                ];

                $list = \App\Check::all()->toArray();

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
