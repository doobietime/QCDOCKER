<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class adminController extends Controller
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
        $rms = \App\Sku::where('product_type', 'RM')->orderBy('Code','ASC')->get();

        $documentVersion = \App\rmversions::where('RM_code','Global')->value('version');
   
       return view('admin/admin_inwards', compact('rms','documentVersion'));
    }
    
    public function ccpchecks()
    {
        $skus = \App\Sku::where('product_type','Cookie')->get();
        return view('CCP/ccp',compact('skus'));

    }
    public function saveCcp(Request $request)
    {
        $data = $request->all();
        $user = \Auth::user()->name;
        //CREATE CCP CHECK
        $newccp = \App\ccpChecks::create([
            'created_by' => $user,
            'sku' => $request->selected_sku,
            'line' => $request->selected_line
        ]);

        //CREATE CCP CHECK LINES
        $doobies = $request->ris;
        if($doobies){
           foreach($doobies as $doobie => $doobies)
           {
           \App\ccpChecks_lines::create([
           'ccpID' => $newccp->idccpChecks,
           'test_piece' => $data['tpiece'][$doobie],
           'result' => $data['ris'][$doobie],
           'comments' => $data['coms'][$doobie]
       ]);

           }
       
        }



        //RETURN BACK
       return redirect()->back();
    }

    public function getTestPieces(Request $request)
    {
        $machine = $request->p_selected;
        $query = \App\keyValues::where('machineName',$machine)->get();

        return $query;

    }

    public function testDashboard()
    {
        $skus = \App\Sku::where('product_sub_type', 'pouch')
        ->whereIn('product_type',['T','VFFS','C1','C2','C3'])
        ->get();
       
        return view('admin/test', compact('skus'));
    }
    public function saveTestDashboard(Request $request)
    {

        $update = \App\Sku::where('id',$request->skuid);
        
        $update->update([
            'Code' => $request->code,
            'Description' => $request->desc,
            'best_before_days' => $request->bbd,
            'film_part_no' => $request->fpart,
            'pouch_version' => $request->fversion,
            'product_type' => $request->machine,
            'pouch_min' => $request->min,
            'pouch_max' => $request->max,
            'pouch_target' => $request->target,
            'product_sub_type' => $request->pstype

         ]);

      return redirect()->back()->with('message','SKU has been updated');
    }

    public function updatePouchSku(Request $request)
    {
        $line_requested = $request->line_selected;
        $line = \App\Sku::where('id', $line_requested)->first();


        $test1 = $request->line_details;
        // $line->Description = $request->s_desc;
        // $line->product_type = $request->s_type;
        // $line->pouch_min = $request->s_min;
        // $line->pouch_max = $request->s_max;
        // $line->pouch_target = $request->s_target;
        // $line->film_part_no = $request->s_film;
        // $line->pouch_version = $request->s_type;
        // $line->best_before_days = $request->s_type;

        // $line->save();

        return($test1);

    }

    public function saveGlobalParam(Request $request){
             
         $getgbversion = \App\rmversions::where('RM_code','Global')->first();
         $getgbversion->version = $request->globalparam;
         $getgbversion->save();

         // return view('admin/admin_inwards', compact('rms','documentVersion'));
         return redirect()->back()->with('message','Global Document Version Updated!');
        

    }

    public function getSKUParameters(Request $request){

         $selected_sku = $request->p_selected;
         // $rm_id = \App\Sku::where('Code',$selected_sku)->value('id');
         $parameters = \App\Parameters::where('RM_id', $selected_sku)->get();

         $version = \App\rmversions::where('RM_id', $selected_sku)->first();


         //return response()->json($parameters);
       return response()->json(array('params'=>$parameters,'version'=>$version));

    }

    public function getSkuFromAX(){

        $ax_ftp = "ax-cookietime.co.nz";
        $ftp_connection = ftp_connect($ax_ftp) or die ("Can't connect to server");
        $login = ftp_login($ftp_connection, $ftp_uname, $ftp_pass);

        $sku_file = "Live/Outbound/SalesLink/CTL_Stock.txt";
    }

    public function removeParam(Request $request){

        $lineToRemove = $request->line_selected;
        $remove = \App\Parameters::where('id', $lineToRemove)->delete();

    }
    public function saveSpecifications(Request $request){

        $rms = \App\Sku::where('product_type', 'RM')->orderBy('Code','ASC')->get();
        $documentVersion = \App\rmversions::where('RM_code','Global')->value('version');

        $rmVersion = $request->specVersionBox;
        $rm_id = $request->rmcodeselected;
        $rm_code = \App\Sku::where('id',$rm_id)->value('Code');
        $data = $request->all();
        $hodors = $request->description;

        $findrmVersion = \App\rmversions::where('RM_id',$rm_id)->first();
        if($findrmVersion){
            $findrmVersion->version = $rmVersion;
            $findrmVersion->save();
        }
        else{
            \App\rmversions::create([
                'RM_code' => $rm_code,
                'version' => $rmVersion,
                'RM_id' => $rm_id
            ]);
        }
        
        if($hodors){
        foreach($hodors as $hodor => $hodors)
            {
                \App\Parameters::create([
               'RM_code' => $rm_code,
               'RM_id' => $rm_id,
               'parameter_name' => $data['description'][$hodor],
               'specification' => $data['spec'][$hodor]
            ]);
            }
}
  // return view('admin/admin_inwards', compact('rms','documentVersion'));
    return back()->with(compact('rms','documentVersion'));
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
        //
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

    public function ftp_to_ax()
    {


    }
    public function create_xml()
    {
        
    }
}
