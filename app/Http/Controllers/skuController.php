<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class skuController extends Controller
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
          return view('admin/admin_main');
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

    public function returnskudetails(Request $request)
    {
        $first = $request->prod;
        $prod = \App\Sku::where('id', $first)->get();
           
        return response()->json($prod);
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
        $skuCode = $request->get('sc');
        $find = \App\Sku::where('Code', $skuCode)->first();
        $type = $request->get('pt');

        if($type != "RM" && $find !== null){
            return redirect()->back()->with('error','SKU already exists');
        }
        else{

            if($type === "QC")
            {
                    \App\Sku::create([
                    'Code' => $request->get('sc'),
                    'Description' => $request->get('desc'),
                    'product_type' => 'TBC',
                    'product_sub_type' => 'pouch',
                    ]);

            }
            else
            {
                \App\Sku::create([
                'Code' => $request->get('sc'),
                'Description' => $request->get('desc'),
                'target_range_ind_min' => $request->get('imin'),
                'target_range_ind_max' => $request->get('imax'),
                'target_range_row_min' => $request->get('rmin'),
                'target_range_row_max' => $request->get('rmax'),
                'product_type' => $request->get('pt'),
                'supplier' => $request->get('sup'),
                ]);
            }
        return redirect()->back()->with('message','sku has been added !');
        }



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
        //
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
