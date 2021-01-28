<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $ax = $request->ax;
     
        $batchCode = $request->batchID;
        $quantity = $request->release_amount;
        $Batch = \App\Batch::find($batchCode);
        $Batch_Remaining = $Batch->quantity_remaining;

        $New_Remaining = ($Batch_Remaining - $quantity);
        $Batch->quantity_remaining = $New_Remaining;
           if($ax){
            $Batch->released_in_AX = "Yes";
        }
        $Batch->save();


         \App\batchLines::create([
           'batchID' => $batchCode,
           'quantity_released' => $quantity
        ]);


        $igchecks = \App\IGCheck::all();
        // return view('IGCheck/IGCheckHome', ['alligchecks' => $igchecks]);
        return redirect()->back();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $input = Input::all();
        $FKey = $request->forkey;
        $data = $request->all();

        $hodors = $request->bcode;

        foreach($hodors as $hodor => $hodors)
        {
              \App\Batch::create([

           'foreign_key' => $FKey,
           'batch_code' => $data['bcode'][$hodor]
        ]);
           
        }

        // $entryArray = [

        //     $request->bcode

        // ];

//         foreach($entryArray as $entry){
//             $entryArray [] = [
//             'foreign_key' => $FKey
// ];
//         }

        // \App\Batch::insert($entryArray);

        // $batchID = \App\Batch::where('foreign_key', $FKey)->get();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
    {
       return view('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        //
    }
}
