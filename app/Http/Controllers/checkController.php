<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        $checks = \App\Check::all();
        return view('viewchecks',['allChecks' => $checks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skus = \App\Sku::all();

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
            'newcheck_datetime' => 'required',
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


        \App\Check::create([
            'check_datetime' => $request->get('newcheck_datetime'),
            'check_product' => $request->get('newcheck_product_name'),
            'check_inv_1' => $request->get('individual_1'),
            'check_inv_2' => $request->get('individual_2'),
            'check_inv_3' => $request->get('individual_3'),
            'check_inv_4' => $request->get('individual_4'),
            'check_inv_5' => $request->get('individual_5'),
            'check_inv_target_range' => $request->get('newcheck_individual_target_range'),
            'check_inv_average' => $request->get('newcheck_individual_average'),
            'check_row_1' => $request->get('sample_1'),
            'check_row_2' => $request->get('sample_2'),
            'check_row_3' => $request->get('sample_3'),
            'check_row_target_range' => $request->get('newcheck_sample_target_range'),
            'check_row_average' => $request->get('newcheck_sample_average'),
            'check_dough_temp' => $request->get('newcheck_dough_temp'),
            'check_flour_temp' => $request->get('newcheck_flour_temp'),
            'check_butter_temp' => $request->get('newcheck_butter_temp'),
            'check_comments' => $request->get('newcheck_comments'),



        ]);
         return redirect('/checkPage');
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

         $skus = \App\Sku::all();
       
         
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

         $this->validate(request(), [
            'newcheck_datetime' => 'required',
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

         $checks = \App\Check::find($id);
         $checks->check_datetime = $request->get('newcheck_datetime');
         $checks->check_product = $request->get('newcheck_product_name');
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
}
