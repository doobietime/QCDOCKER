<?php

namespace App\Http\Controllers;

use App\IGCheck;
use Illuminate\Http\Request;
use DateTime;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IGCheckController extends Controller
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
    public function index(Request $request)
    {
        $today = new DateTime('today');

        $allcount = IGCheck::count();
        $igcount = IGCheck::where('completed',NULL)->count();
        $rmcount = IGCheck::where('rms_completed',NULL)->count();
        $reviewcount = IGCheck::where('release_completed',NULL)->count();
        $vercount = IGCheck::where('verified_status',NULL)->count();

        $q = null;
        if ($request->has('q'))
        {
            $q = $request->query('q');
            $igchecks = IGCheck::search($q)->orderby('created_at','DESC')->paginate(100);
        }
        else{

        $igchecks = IGCheck::orderBy('created_at','DESC')->paginate(18)->setPath('IGCheck');
        }
        return view('IGCheck/IGCheckHome', ['alligchecks' => $igchecks, 'today' => $today],compact('q','igcount','rmcount','reviewcount','vercount','allcount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rms = \App\Sku::where('product_type', 'RM')->orderBy('Code','ASC')->get();
        return view('IGCheck/create_IGCheck', compact('rms'));

    }

    public function createIGS($id)
    {
        $global_params = \App\Parameters::where('RM_code','global_param')->get();
        $param_lines = \App\ParameterLines::where('igcheck_key',$id)->get();
        $igchecks = IGCheck::find($id);
        $getBatch = \App\Batch::where('foreign_key', $id)->get();
        $getVersion = \App\rmversions::where('RM_code','Global')->value('version');

         
        return view('IGCheck/create_IGCheckIGS',['igcheck' => $igchecks], compact('sku','getBatch','global_params','param_lines','getVersion'));


    }
    public function updateIGS(Request $request)
    {
        $FKey = $request->forkey;
        $getUser = \Auth::user()->name;
        $igcheck = \App\IGCheck::find($FKey);
        $igcheck->completed = "1";
        $igcheck->location = $request->location;
        $igcheck->PO_number = $request->get('ponumber');
         $getUser = \Auth::user()->name;
         $igcheck->igs_done_by = $getUser;
        $igcheck->save();

        $data = $request->all();
        $global_params = \App\Parameters::where('RM_code','global_param')->get();
        // $pm = \App\Parameters::where('id','15')->value('parameter_name');
        // $pd = \App\Parameters::where('id','15')->value('specification');


        //Attach Damaged Photo

         $dphotos = $request->file('dmgPhotos');
         if($dphotos){
         foreach($dphotos as $dphoto){
            $filename = $dphoto->getClientOriginalName();
            $extension = $dphoto->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($dphoto));
            \App\Images::create([
                'image_path' => $filename,
                'igcheck_id'=> $FKey
            ]);
         }
         }

        //to save parameter lines

         $doobies = $request->ris;
         if($doobies){
            foreach($doobies as $doobie => $doobies)
            {
            \App\ParameterLines::create([
            'igcheck_key' => $FKey,
            'parameter_name' => $data['p1'][$doobie],
            'specification' => $data['p2'][$doobie],
            'results_in_spec' => $data['ris'][$doobie],
            'comments' => $data['coms'][$doobie],
            'parameter_type' => "IGS"
        ]);

            }
        
         }

        //varaible to show ig home
         $igchecks = IGCheck::orderBy('created_at','DESC')->paginate(15)->setPath('IGCheck');

        //to create new batches
        $hodors = $request->bcode;
        if($hodors){
        foreach($hodors as $hodor => $hodors)
        {
            \App\Batch::create([
           'foreign_key' => $FKey,
           'batch_code' => $data['bcode'][$hodor],
           'best_before' => $data['bbd'][$hodor],
           'temperature' => $data['temp'][$hodor],
           'quantity' => $data['qty'][$hodor],
           'quantity_pallets' => $data['pqty'][$hodor],
           'quantity_remaining' => $data['qty'][$hodor]
        ]);
}
}
              // return view('IGCheck/IGCheckHome',['alligchecks' => $igchecks]);

              return redirect()->action(
'IGCheckController@index',['alligchecks'=> $igchecks]);



    }
    public function createRMS($id)
    {
    $param_lines = \App\ParameterLines::where('igcheck_key',$id)->get();

    $itemName = IGCheck::where('id',$id)->value('item_name');

    $igchecks = IGCheck::find($id);   
    $rmcode = IGCheck::where('id',$id)->value('item_code');
    $rm_id = \App\Sku::where('Code',$rmcode)->where('Description',$itemName)->value('id');
    $parameters = \App\Parameters::where('RM_id', $rm_id)->get();
    $getBatch = \App\Batch::where('foreign_key', $id)->get();
    $getVersion = \App\rmversions::where('RM_code','Global')->value('version');
    $getSpecVersion = \App\rmversions::where('RM_code',$rmcode)->value('version');

    return view('IGCheck/create_IGCheckRMS', compact('igchecks','parameters','getBatch','param_lines','rmcode','getVersion','getSpecVersion'));

    }

    public function finaliseRMS(Request $request)
    {
        $FKey = $request->forkey;
       
          $igcheck = IGCheck::find($FKey);
          $igcheck->release_completed = "1";
           $getUser = \Auth::user()->name;
           $igcheck->release_done_by = $getUser;
         
          $igcheck->save();
          $igchecks = IGCheck::orderBy('created_at','DESC')->paginate(15)->setPath('IGCheck');
return redirect()->action(
'IGCheckController@index',['alligchecks'=> $igchecks]);
        // return view('IGCheck/IGCheckHome', ['alligchecks' => $igchecks]);

    }

        public function updateRMS(Request $request)
    {
        $FKey = $request->forkey;
         $Ver = $request->version;
         $Notes = $request->QANotes;
          $igcheck = \App\IGCheck::find($FKey);

         $soas = $request->file('soa');
         foreach($soas as $soa){
            $filename = $soa->getClientOriginalName();
            $extension = $soa->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($soa));

            if ( (strpos($extension,'doc') !== false || strpos($extension,'docx') !== false )){

                 \App\Images::create([
                'image_path' => $filename,
                'igcheck_id'=> $FKey,
                'isdoc'=> "1"
            ]);

            }
            else{
                 \App\Images::create([
                'image_path' => $filename,
                'igcheck_id'=> $FKey
            ]);
            }
           
         }
         // $extension = $soa->getClientOriginalExtension();
        // Storage::disk('public')->put($soa->getFilename().'.'.$extension, File::get($soa));


       
        $igcheck->rms_completed = "1";
    
        // $igcheck->soa_image_path = $soa->getFilename().'.'.$extension;

         $getUser = \Auth::user()->name;
         $igcheck->rms_done_by = $getUser;
         $igcheck->qa_notes = $Notes;

        $igcheck->rmsversion_used = $Ver;
        $igcheck->save();


        $getBatch = \App\Batch::where('foreign_key', $FKey)->get();
        $param_lines = \App\ParameterLines::where('igcheck_key',$FKey)->get();
        $rmcode = IGCheck::where('id',$FKey)->value('item_code');
        $parameters = \App\Parameters::where('RM_code', $rmcode)->get();  
        $data = $request->all();
        
        $global_params = \App\Parameters::where('RM_code','global_param')->get();

        //to save parameter lines

         $doobies = $request->ris;
         if($doobies){
            foreach($doobies as $doobie => $doobies)
            {
            \App\ParameterLines::create([
            'igcheck_key' => $FKey,
            'parameter_name' => $data['p1'][$doobie],
            'specification' => $data['p2'][$doobie],
            'results_in_spec' => $data['ris'][$doobie],
            'comments' => $data['coms'][$doobie],
            'parameter_type' => "RMS"
        ]);

            }
        
         }

        //varaible to show ig home
 

$igchecks = IGCheck::orderBy('created_at','DESC')->paginate(15)->setPath('IGCheck');

return redirect()->action(
'IGCheckController@index',['alligchecks'=> $igchecks]);
        // return view('IGCheck/IGCheckHome',['alligchecks' => $igchecks]);



    }

    public function releaseIGCheck($id){

        $igchecks = IGCheck::find($id); 
        $param_lines = \App\ParameterLines::where('igcheck_key',$id)->where('parameter_type','IGS')->get();
        $param_lines_RMS = \App\ParameterLines::where('parameter_type','RMS')->where('igcheck_key',$id)->get();
        $igchecks = IGCheck::find($id);   
        $rmcode = IGCheck::where('id',$id)->value('item_code');
        $parameters = \App\Parameters::where('RM_code', $rmcode)->get();
        $getBatch = \App\Batch::where('foreign_key', $id)->get();

        $getVersion = \App\rmversions::where('RM_code','Global')->value('version');
        // $getSpecVersion = \App\rmversions::where('RM_code',$rmcode)->value('version');

        $getCoa = IGCheck::where('id',$id)->value('soa_image_path');
        $getNewSoa = \App\Images::where('igcheck_id',$id)->get();
        $notes = IGCheck::where('id',$id)->value('qa_notes');

        $eURL = [];
        $eURLdoc = [];
        foreach($getNewSoa as $newSoa)
        {
            if($newSoa->isdoc == NULL)
            {
            $hmm = rawurlencode($newSoa->image_path);
            array_push($eURL,$hmm);
            }
            else{
            $hmm = rawurlencode($newSoa->image_path);
            array_push($eURLdoc,$hmm);

            }
        }



         return view('IGCheck/release_IGCheck',compact('igchecks','parameters','getBatch','param_lines','rmcode','param_lines_RMS','getVersion','getSpecVersion','getCoa','getNewSoa','notes','eURL','eURLdoc'));


    }

    public function reviewIGCheck($id){
        $igchecks = IGCheck::find($id); 
        $param_lines = \App\ParameterLines::where('igcheck_key',$id)->where('parameter_type','IGS')->get();
        $param_lines_RMS = \App\ParameterLines::where('parameter_type','RMS')->where('igcheck_key',$id)->get();
        $igchecks = IGCheck::find($id);   
        $rmcode = IGCheck::where('id',$id)->value('item_code');
        $parameters = \App\Parameters::where('RM_code', $rmcode)->get();
        $getBatch = \App\Batch::where('foreign_key', $id)->get();
        $getNewSoa = \App\Images::where('igcheck_id',$id)->get();
        $eURL = [];
        $eURLdoc = [];
        foreach($getNewSoa as $newSoa)
        {
            if($newSoa->isdoc == NULL)
            {
            $hmm = rawurlencode($newSoa->image_path);
            array_push($eURL,$hmm);
            }
            else{
            $hmm = rawurlencode($newSoa->image_path);
            array_push($eURLdoc,$hmm);

            }
        }

 $notes = IGCheck::where('id',$id)->value('qa_notes');

        // $batches = \App\Batch::with('BatchLine:id,batchID')->get();
        // foreach ($batches as $batchy){
        //     echo $batchy->batchLine;
        // }

        // $batches = \App\Batch::with('BatchLine')->get();


       

         $batches = \App\batchLines::whereHas('batch', function($query) use ($id){ 
            $query->where('foreign_key',$id);
        })
         ->with(['Batch'])
         ->get();

         //dd($batches);


        $getVersion = \App\rmversions::where('RM_code','Global')->value('version');
        $getSpecVersion = \App\rmversions::where('RM_code',$rmcode)->value('version');

        $fnotes = $igchecks->notes()->value('note_body');


         return view('IGCheck/review_IGCheck',compact('igchecks','parameters','getBatch','param_lines','rmcode','param_lines_RMS','getVersion','getSpecVersion','batches','getNewSoa','notes','eURL','fnotes','eURLdoc'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fuck = $request->get('selected_product');
        // $shit = $request->get('selected_supplier');
        $getUser = \Auth::user()->name;
        $getSku = \App\Sku::where('id',$fuck)->value('Description');
         $getCode = \App\Sku::where('id',$fuck)->value('Code');
        $getsupp = \App\Sku::where('id', $fuck)->value('supplier');
    
        \App\IGCheck::create([
            'item_code' => $getCode,
            'item_name' => $getSku,
            'igcheck_supplier' => $getsupp
          

        ]);
         return redirect('/IGCheck');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IGCheck  $iGCheck
     * @return \Illuminate\Http\Response
     */
    public function show(IGCheck $iGCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IGCheck  $iGCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(IGCheck $iGCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IGCheck  $iGCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IGCheck $iGCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IGCheck  $iGCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(IGCheck $iGCheck)
    {
        //
    }
    public function ajaxRequest_getBatches(Request $request){

          $batch = $request->batch_selected;
          $key = $request->FKey;

          // $getBatch = \App\Batch::where('batch_code', $batch)->get();
          $getBatch = \App\Batch::where('id', $batch)->where('foreign_key', $key)->get()->toArray();

          $getID =  \App\Batch::where('batch_code', $batch)->where('foreign_key', $key)->value('id');

          $getBatchLines = \App\batchLines::where('batchID', $batch)->get()->toArray();

          // return response()->json($getBatch,$getBatchLines);
            return response()->json(array('batches'=>$getBatch,'batchLines'=>$getBatchLines));
        

    }
    public function offlineExportView(){

        $rms = \App\Sku::where('product_type', 'RM')->orderBy('Code','ASC')->get();

      

         return view('IGCheck/exportview_IGCheck', compact('rms'));
   
    }
    public function offlineExportAJAX(Request $request){

        $id = $request->p_selected;
        
          $getSpecVersion = \App\rmversions::where('RM_id',$id)->value('version');


         $selected_sku = $request->p_selected;
         // $rm_id = \App\Sku::where('Code',$selected_sku)->value('id');
         $parameters = \App\Parameters::where('RM_id', $selected_sku)->get();
         $global_params = \App\Parameters::where('RM_code','global_param')->get();

        $skus = \App\Sku::find($id); 

        $param_lines = \App\ParameterLines::where('igcheck_key',$id)->where('parameter_type','IGS')->get();
        $param_lines_RMS = \App\ParameterLines::where('parameter_type','RMS')->where('igcheck_key',$id)->get();

        $version = \App\rmversions::where('RM_code','Global')->value('version');


         //return response()->json($parameters);
       return response()->json(array('params'=>$parameters,'version'=>$version,'gparams'=>$global_params,'sku'=>$skus,'sversion'=>$getSpecVersion));

    }

    public function updateSoa(Request $request, $id){

         $igcheck = IGCheck::find($id); 
         $original_image = \App\Images::where('igcheck_id',$id)->delete();


         $soas = $request->file('updated_soa');

         foreach($soas as $sea){


            $filename = $sea->getClientOriginalName();
            $extension = $sea->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($sea));

           \App\Images::create([
                'image_path' => $filename,
                'igcheck_id'=> $id
            ]);

         }

          return redirect()->to('/igcheck_review/'.$id); 



    }

    public function verify(Request $request, $id){

        $fnote = $request->f_notes;

       

        $getUser = \Auth::user()->name;

        $igcheck = \App\IGCheck::find($id);
        $igcheck->verified_status = "1";
        $igcheck->finalised_date = now();
        $igcheck->verified_by = $getUser;

         $igcheck->notes()->create([
            'note_body' => $fnote,
            'note_type' => "2"
        ]);

        $igcheck->save();

         $igchecks = IGCheck::orderBy('created_at','DESC')->paginate(15)->setPath('IGCheck');

         return redirect()->action(
'IGCheckController@index',['alligchecks'=> $igchecks]);
        // return view('IGCheck/IGCheckHome', ['alligchecks' => $igchecks]);

    }
    public function ajaxRequest_removeIGLine(Request $request)
    {
        $lineToRemove = $request->line_selected;

        //delete batch lines and batch..should use model relationship
        $batch = \App\Batch::where('foreign_key', $lineToRemove)->value('id');

        $remove_batchlines = \App\batchLines::where('batchID', $batch )->delete();
        $remove_batches = \App\Batch::where('foreign_key', $lineToRemove)->delete();


        $remove_parameterlines = \App\ParameterLines::where('igcheck_key', $lineToRemove)->delete();
  

        $remove = \App\IGCheck::where('id', $lineToRemove)->delete();

         
    }
    public function ftp_to_ax($id)
    {
       
       $igcheck = \App\IGCheck::find($id);
       $batches = \App\Batch::where('foreign_key', $id)->get();

       $xml = new \XMLWriter();
       $xml->openMemory();
       $xml->setIndent(true);

       $xml->startDocument('1.0','utf-8');

       //Envelope
       $xml->startElement('Envelope');
       $xml->writeAttribute('xmlns','http://schemas.microsoft.com/dynamics/2011/01/documents/Message' );

       //Header
       $xml->startElement('Header');

       //Action
       $xml->writeElement('Action', 'http://schemas.microsoft.com/dynamics/2008/01/services/WMSReceiptJournalService_FUS/create');
       $xml->endElement();


       $xml->startElement('Body');
       $xml->startElement('MessageParts');
       $xml->startElement('WMSReceiptJournal_FUS');
        $xml->writeAttribute('xmlns', 'http://schemas.microsoft.com/dynamics/2008/01/documents/WMSReceiptJournal_FUS');
       $xml->startElement('WMSJournalTable');
       $xml->writeAttribute('class','entity');
       $xml->writeElement('Description',$igcheck->item_name);
       $xml->writeElement('InventTransRefId',$igcheck->PO_number);
       $xml->writeElement('PackingSlip','Sample Packing Slip');

foreach($batches as $batch){

    //foreach batch
       $xml->startElement('WMSJournalTrans');
       $xml->writeAttribute('class','entity');
       $xml->writeElement('ItemId',$igcheck->item_code);
       $xml->writeElement('Qty',$batch->quantity);

        $xml->startElement('InventDimTrans');
        $xml->writeAttribute('class','entity');
        // $xml->fullEndElement();

//batch tracking only
                        $xml->writeElement('InventBatchId',$batch->batch_code);
                        $xml->startElement('InventBatchTrans');
                        $xml->writeAttribute('class','entity');
                        // $xml->writeElement('ExpDate','2030-10-10');
                        $xml->writeElement('PdsBestBeforeDate',$batch->best_before);
                        // $xml->writeElement('PdsShelfAdviceDate',' ');
                        // $xml->writeElement('ProdDate',' ');
                        $xml->endElement();
                        $xml->endElement();
//end batch tracking

//endforeach batch          
        // $xml->endElement();
 $xml->endElement();
}


           
              $xml->endElement();
                $xml->endElement();
                  $xml->endElement();
                    $xml->endElement();
                      $xml->endElement();
                        $xml->endDocument();



       // $xml->writeElement('')

       // foreach ($igcheck as $ig){
       //  $xml->startElement('igchecks');
       //  $xml->writeAttribute('field1', $igcheck->item_code);
       //  $xml->writeAttribute('field2', $igcheck->PO_number);
       //   $xml->endElement();
       // }

       // $xml->endElement();
       // $xml->endDocument();

       $contents = $xml->outputMemory();
       $xml = null;

       $fname = "ctqc_inwards_".$id."_".$igcheck->item_code.".xml";

       Storage::put($fname ,$contents);

       //FTP

       $local_file = Storage::get($fname);
       $send = Storage::disk('ftp')->put($fname,$local_file);
       if($send)
       {
           $igcheck->sentToAX = "success";
           $igcheck->save();
       }
       else
       {
           $igcheck->sentToAX = "Failed";
           $igcheck->save();
       }

       // echo $igcheck->item_code. "<br />";
       // echo $igcheck->item_name. "<br /><br />";

       // echo "batch info". "<br />";

       // foreach($batches as $batch){
       //      echo $batch->batch_code. "<br />";
       //      echo $batch->best_before."<br />";
       //      echo $batch->quantity. "<br />";
       //      echo $batch->quantity_pallets. "<br />";
       // }
      

       


       return redirect()->back();

    }
}

