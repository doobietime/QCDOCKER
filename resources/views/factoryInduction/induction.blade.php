@extends('layouts.app')
@section('content')

<head>
 <style>
  body {
      position: relative; 
  }

  .img{
  	max-width: 200px;
  	max-height: 200px;
}
  
  	#img01{
  		min-width:300px;
  		min-height:210px;
  	}
  }
  </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="50">


    <nav class="col-sm-3 col-4 small" id="myScrollspy">
      <ul class="nav nav-pills flex-column" style="position:fixed; max-width:200px;">

      	<li class="nav-item">
      <a class="nav-link" href="#sectionIntro">Welcome !</a>
    </li>


         <li class="nav-item">
      <a class="nav-link" href="#section1">Health & Safety Policy</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section2">Hazard Management System </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section3">Incident Management System</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#section4">First Aid</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#section5">Emergency Evacuation Plan</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#section6">Personal Protective Equipment - PPE</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section7">Manual Handling and Lifting</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section8">Rehabilitation and Injury Claims</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section9">Discomfort, Pain and Injury Process - DPI</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section10">5 Seconds for Safety</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section11">Team Organisational Chart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section12">Food Safety Induction</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section13">Sickness & Infectious Disease Policy</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section14">Personal Hygiene</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section15">Hand Washing Procedure</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section16">Uniform Policy</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#section17">Eating and Drinking Policy</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#section18">Allergens and Cross Contamination</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#section19">Foreign Matter</a>
    </li>

       
      </ul>
    </nav>



<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-10">
            <div class="card ">
            	
            	
            	<div id="sectionIntro" class="container-fluid shadow-sm text-center" style="padding-top:20px;">
            		<h1 class="display-3">Welcome to Factory Induction</h1>
            		<img class="rounded img img-fluid float-left" src="{{ URL::to('/images/homesafe.png') }}">

            	<img class="img rounded img-fluid float-right " src="{{ URL::to('/images/magnifying.png') }}">
            	</div>



<div id="section1" class="container-fluid bg-light" style="padding-top:20px;padding-bottom:70px">



  <h1 class="display-4">Health & Safety Policy</h1>
   <img class="rounded float-right" src="{{ URL::to('/images/hns1.png') }}">
 <img class ="rounded float-right" src="{{ URL::to('/images/hns2.png') }}">
  <p>Cookie Time Limited is committed to providing and maintaining a safe and healthy work environment 
for our employees and the other people in the workplace. 
This includes employees, contractors, subcontractors on CTL premises. 

</p>
<h2>Health and Safety Committee</h2>

  <p>The Health and Safety Committee includes senior management representatives and other nominated employees representatives. The committee is responsible for the implementation, monitoring, review and planning of health and safety policies, systems and practices. 

</p>
<h2>Responsibility</h2>
<h3>Employees</h3>

	<ul>
<li>Every employee of Cookie Time limited is expected to share in the commitment to health and safety by observing all safe work procedures, rules and instructions, by the early reporting of pain and discomfort and ensure all incidents, injuries and hazards are accurately reported to the appropriate person.</li>
<li>Each manager and supervisor has a responsibility for the health and safety of those employees working under their direction. Equally, every employee has an obligation to perform their tasks in a safe manner, be aware of their environment and hold their fellow colleagues accountable for their health and safety behaviour and actions.</li>
</ul>
<img class="rounded img img-fluid float-right" src="{{ URL::to('/images/homesafe.png') }}">

<h3>Employer</h3>
<ul>
<p>We shall ensure a safe and healthy work environment for all employees by:</p>
<li>Setting health and safety objectives for all employees and reviewing these.</li>
<li>Actively encouraging the accurate and timely reporting and recording of all incidents, injuries and of any employees pain and discomfort.</li>
<li>Investigate all reported incidents and injuries to ensure all contributing factors are identified to take corrective action where appropriate.</li>
<li>Identify all existing and new hazards and take all practicable steps to eliminate, isolate or minimise the exposure to any hazards deemed to be significant.</li>
<li>Ensure that all employee are made aware of the hazards in their work area and are adequately trained to enable them to perform their duties in a safe manner. </li>
<li>Encourage employee consultation and participation in all matters relating to health and safety.</li>
<li>Promote a system of continuous improvement, including the annual review of policies and procedures.</li>
<li>Meet our obligations under the Health and Safety Employment Act 2015, the Health and Safety Employment Regulations 2015, Codes of Practice and any relevant standards or guidelines.</li>
<li>Support the return to work of employees in relation to the rehabilitation policy.</li>
</ul>

</div>


<div id="section2" class="container-fluid " style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Hazard Management System</h1>
  <p>All significant hazards onsite are found in the Hazard Register. The company has attempted to identify and control these hazards in order to minimise risk to staff and visitors to the site. If you think you have identified a hazard which is not documented within the hazard register, or adequately controlled, you have a responsibility to report this to your Team Leader. The hazard will be entered into Peoplesafe and discussed at the health and safety meeting.

</p>
 <img class="rounded img-fluid" src="{{ URL::to('/images/hazardmgmtsystem.png') }}">
</div>


<div id="section3" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Incident Management System</h1>
  <p>In the event of an accident or other need of first aid supplies, you need to notify your Team Leader. First Aid should be administered outside the factory unless the situation prevents it. 
An incident form must be completed for all injuries. The process is outlined above.
Please ensure you are familiar with this process. If you do not complete an incident form and it eventuates that you have had a injury, near miss or damaged property then you could face disciplinary actions.
</p>
 <img class="rounded img-fluid" src="{{ URL::to('/images/incidentmgmtsystem.png') }}">

</div>


<div id="section4" class="container-fluid " style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">First Aid</h1>
  <p>If you are requiring first aid and you are able, you must go directly to a designated first aider (list is on the wall). You or the Team leader must complete an incident form on people safe.
</p>

 <table class="table table-bordered table-sm text-center">
 		<tr class="table-info">
 		<th>Main Factory</th>
 		<th>Main Factory</th>
 		<th>Main Factory</th>
 		<th>Main Factory</th>
 		<tr>
 		<td ><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Sopich.png') }}">
 		Sopich Lim</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Yasmin.png') }}">
 		Yasmin Puru-Tongia</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Guil.png') }}">Guil Difen</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Felicia.png') }}">Felicia Indra</td>
 	</tr>
 </tr>
</table>

 <table class="table table-bordered table-sm text-center">
 		<tr class="table-info">
 		<th>Logistics/Front Store</th>
 		<th>Creative</th>
 		<th>Main Administration</th>
 		<th>Sales Portacom</th>
 		<tr>
 		<td ><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Lorenzo.png') }}">
 		Lorenzo Testasecca</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Himi.png') }}">
 		Himi Ratnakar</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Noel.png') }}">Noel MacDonald</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Sam.png') }}">Sam Pollock</td>
 	</tr>
 </tr>
</table>

 <table class="table table-bordered table-sm text-center">
 		<tr class="table-info">
 		<th>Engineering</th>
 		<th>Engineering</th>
 		<th>Innovation</th>
 		<th>Innovation</th>
 		<tr>
 		<td ><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Dean.png') }}">
 		Dean Gibbs</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Ley.png') }}">
 		Ley Correos</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Siti.png') }}">Siti Anurddin</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Victoria.png') }}">Victoria Wilton</td>
 	</tr>
 </tr>
</table>


 
<p>Frist Aid Kits (FA) are located in the map below ;</p>
 <img class="rounded img-fluid" src="{{ URL::to('/images/firstaid.png') }}">

</div>

<div id="section5" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Emergency Evacuation Plan</h1>
   
   <img  class="rounded img-fluid mx-auto d-block img-thumbnail"  src="{{ URL::to('/images/firewarden.png') }}">
    <hr />
<h2>Current Fire Wardens</h2>
    <table class="table table-bordered table-sm text-center smtable">
    	<tr>
 		<td ><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Dean.png') }}">
 		Dean Gibbs</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Shannon.png') }}">
 		Shannon Heese</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Lorenzo.png') }}">Lorenzo Testasecca</td>
 		
 		</tr>
 	<tr>
 		
<td ><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Yasmin.png') }}">
 		Yasmin Puru-Tongia</td>
<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Sopich.png') }}">
 		Sopich Lim</td>
 		<td><img class="rounded img-fluid img mx-auto d-block"  src="{{ URL::to('/images/Himi.png') }}">Himi Ratnakar</td>
 </tr>

</table>

  <hr />
  
  <h2>Emergency Evacuation Point</h2> <img class="rounded img-fluid  mx-auto d-block img-thumbnail"  src="{{ URL::to('/images/assemblypoint.png') }}"><br />


  <p>Evacuation Point : Located in the far corner of the Staff Car Park next to gate (near Trents Road). If it is not possible to meet in this location, the second evacuation point is grass area outside the red house/creative portacom.</p>
  <img class="rounded img-fluid float-right img-thumbnail"  src="{{ URL::to('/images/evacpoint.png') }}">
<ul>
<li>Upon hearing continuous sounding of fire alarm (‘please evacuate the building’), leave the building immediately via the nearest exit. Or if your Fire Warden instructs you to evacuate the building you must do even if you can not hear the alarm sound. </li>
<li>Fire Wardens are required to wear fire warden jackets and hard hats. </li>
<li>In an emergency situation you must disregard the boot exchange procedure and exit via the nearest fire exit. </li>
<li>Do not stop and grab personal belongings, food or drinks during an evacuation. You must evacuate immediately.</li>
<li>If you are operating the X-ray machine, you must press the Emergency stop button and remove the key before leaving the factory.</li>
<li>Do not return to the building for any reason until the Chief Fire Warden indicates that it is safe.</li>
<li>After the all clear is given and it is safe to enter the factory, all staff must collect a clean uniform and re-enter the factory and follow the redline procedures. Boots are required to be cleaned thoroughly via boot washer before entering. </li>
</ul>

</div>


<div id="section6" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Personal Protective Equipment - PPE</h1>
  <p>In order to maintain our safety and hygiene requirements there is a strict dress code for personal entering and working in our factory. These items should not be taken home and are for work purposes only.
</p>

<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/mask.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/overalls.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/earprotection.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/earprotection2.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/boots.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/gloves.png') }}">
<img class="rounded img-fluid img mx-auto "  src="{{ URL::to('/images/whatisthis.png') }}">

This includes;
<ul>
<li>Protective Clothing - uniform</li>
<li>Hair coverings (hair net/beard net)</li>
<li>Safety Boots</li>
<li>Ear Muffs or Ear Plugs - ear protection</li>
</ul>

Additional PPE is required during specific tasks. This includes;
<ul>
<li>Oven Operation - Gloves & Mitts
<li>Protection on hands from sharp edges (gloves) and heat (mitts) produced in the oven area while handling trolleys.</li>
<li>Handling sharp objects (trays, cleaning blades, cartoning etc) - Cut proof gloves
Prevents cuts on hands from cartons,  Stops fingers getting cut when rolling bars & prevents injury when cleaning sharp objects such as slice cutter blade. </li>
<img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/muncher_lab.png') }}"></ul>

<p>Team Leaders will regularly check condition and use of PPE however, you are responsible to report to your Team Leader if any PPE you are using is looking worn and needs assessing (ie mitts worn through).
</p>


</div>

<div id="section7" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Manual Handling and Lifting</h1>
  <div class=" row text-center">
  	<div class="col-md-6">
<img class="rounded img-fluid  mx-auto img-thumbnail"  src="{{ URL::to('/images/lift_good.png') }}">
<img class="rounded img-fluid  mx-auto img-thumbnail"  src="{{ URL::to('/images/lift_bad.png') }}">
<p>Load close to body</p>
</div>
<div clas="col-md-6">
<img class="rounded img-fluid  mx-auto img-thumbnail"  src="{{ URL::to('/images/push_good.png') }}">
<img class="rounded img-fluid  mx-auto img-thumbnail"  src="{{ URL::to('/images/push_bad.png') }}">
<p>Using trolley correctly
	<br />*Good posture
<br />*Feet under body
</p>
</div>
</div>
  <p>The factory environment has many manual handling processes which sometimes involve lifting. 
Please ensure you practice these lifting techniques.</p> 

<ul>
<li>Hold the load close to the body </li>
<li>Use your legs to make a wide stable base when lifting</li>
<li>If you need to carry load for a long distance use a trolley or as a co-worker to help. This will reduce the load on your body.</li>
</ul><img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/muncher_lift.png') }}">
Safe Manual Handling
<ol>
<li>Assess the load and the task.  Two man lift for any lifting over 25kg. </li>
<li>Plan the route. Make sure the area is clear of trip hazards and clutter. If able use a trolley.</li>
<li>Position the feet. Make a wide stable base when lifting.</li>
<li>Get a good grip. Grip with both hands and maintain a good posture. </li>
<li>Lift carefully. Bend at the knees, hold load close to the body and look ahead where you are moving.</li>
<li>Put the load down. Don’t twist your body while placing load down. Reposition load after placing.</li>
</ol>

</div>

<div id="section8" class="container-fluid " style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Rehabilitation and Injury Claims</h1>

  <img class="rounded img-fluid img float-left"  src="{{ URL::to('/images/muncher_slingshot.png') }}">
  <p>If you have an injury at work and do not complete an incident form, then we may refuse your claim as a work related work injury. </p>

<p>When you visit your doctor or specialist and claim that your injury is a work related injury (it happened at work), ACC will send a letter to Cookie Time. This letter will advise the company that ACC has accepted this claim as a work related injury or it has not been accepted. If we have not been advised of the injury prior to receiving the ACC letter, we may fail to accept the claim as a work related injury. </p>

<p>Always complete an incident form for all work related injuries. If you do not, you may not only be refused ACC treatment costs, but may also face disciplinary actions by CTL.</p>


<p>We support our staff to return to work after an injury and will seek to find alternative duties or light duties where possible.  For this to occur it is important that you are open, honest and proactive by communicating with us straight away of your injury. Ensure you keep us informed of any doctor appointments or outcomes if you are away on ACC compensation.</p>

</div>

<div id="section9" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
	<img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/mucher_toiletpaper.png') }}">
  <h1 class="display-4">Discomfort, Pain and Injury Process - DPI</h1>

  <p>CTL takes a proactive approach to manage discomfort and pain. You must report any pain you experience at work. This includes dull aches or any other pain occurring from the tasks you are completing. 
We will then complete the DPI process as outlined below:

</p>
<img class="rounded img-fluid float-left"  src="{{ URL::to('/images/dpiprocess.png') }}">
</div>

<div id="section10" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
	<img class="rounded img-fluid float-right"  src="{{ URL::to('/images/5secondrule.png') }}">
  <h1 class="display-4">5 Seconds For Safety</h1>

  <p>If every employee asked themselves the following questions before starting a new task or when changing from one area to another, many of the reported incidents would be reduced. At CTL we encourage all our staff to ask themselves 5 questions.</p>

<ol>
<li>What can go wrong?</li>
<li>Have I got all the right equipment to do the job?</li>
<li>Have I been trained and authorised to do the job?</li>
<li>Do I need some help?</li>
<li>Will I be safe?</li>
</ol>
<p>
Regular checks will be made to see if you know your 5S with an added prize to those staff that not only know their 5S but can also apply this to their work.
</p>
</div>

<div id="section11" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Team Organisational Chart</h1>
<img class="rounded img-fluid  "  src="{{ URL::to('/images/teamchart.png') }}">
</div>

<div id="section12" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Food Safety Induction</h1>
  <div class="text-center">
  <img class="rounded img img-fluid float-left"  src="{{ URL::to('/images/mucher_juggle.png') }}">
  <img class="rounded img img-fluid "  src="{{ URL::to('/images/muncher_factory.png') }}">
  <img class="rounded img img-fluid float-right "  src="{{ URL::to('/images/magnifying.png') }}">
</div>
</div>

<div id="section13" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Sickness & Infectious Disease Policy</h1>
  <p>When working in our factory you will be handling food products or be in close proximity. Because of this, we must ensure employees who are ill will not compromise the safety of our products or the public who consume the product. </p>

<p>When to notify your Team Leader or Manager if you :</p>
<ul>
<li>Are suffering from two or more episodes of vomiting and/or diarrhoea (unexplained) within the last 48 hours. </li>
<li>Have infected wounds, skin infections or sores that cannot be safely covered.</li>
<li>Have Jaundice (yellowing of the skin) who is suspected of having or has hepatitis A is not permitted in the food handling area.</li>
</ul>
<p>
If in doubt please talk to your Team Leader or Manager before entering into the food production area

</p>
</div>

<div id="section14" class="container-fluid " style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Personal Hygiene</h1>

  <div class="text-center">  
<img class="rounded img-fluid  img-thumbnail"  src="{{ URL::to('/images/nails.png') }}">
<p>Clean & Short</p>
<img class="rounded img-fluid  img-thumbnail"  src="{{ URL::to('/images/nails_dirty.png') }}">
<p>Long & Dirty</p>

</div>

  <p>When working with food there is an expectation you will maintain a high level of personal hygiene. </p>

<p>This include hair being kept clean and tidy, nails are kept short and unpainted (no acrylic nails) and no fake eyelashes to be worn.</p>
  
<p>Showers are available for all employees to use. Do not wear perfume or excessive make up in the factory. 

</p>
<img class="rounded img-fluid  img-thumbnail float-right"  src="{{ URL::to('/images/earring.png') }}">
<h2>Jewellery Policy</h2>

  <p>No jewellery (including watches) are to be worn inside the food processing area except a plain wedding band and plain sleeper earrings. 

Where the jewellery are unable to be removed, blue plaster may be placed over the top of the jewellery to cover it. 

Medic alert bracelets may be worn inside the factory. Other jewellery worn for medical reasons may be permitted at discretion of technical and compliance manager.

</p>
</div>

<div id="section15" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Hand Washing Procedure</h1>
  <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/muncher_washhands.png') }}">
  <p>Hands must be washed using antibacterial soap provided, rinsed thoroughly, 
dried using clean paper towel, and sanitised using alcohol based hand sanitiser.</p>

 When you are required to wash our hands
 <ul>
<li>Before entering the food processing area,</li>
<li>After visiting the toilet, washing them before leaving the toilets even if you are going into the boot exchange where you will wash them again.</li>
<li>After blowing your nose / face,</li>
<li>After handling floor cleaning equipment / dropped products,</li>
<li>After smoking.</li>
</ul>
<p>
Blue disposable gloves are provided in the food processing area and must be worn when handling cooked product. Gloves may be worn when handling raw product, however gloves must be replaced between handling raw food and cooked food product, and after touching face/nose. Gloves must be replaced immediately at the first signs of wear and tear. </p>
<p>
Smoking is only allowed in the dedicated smoking area, located on the far side of the staff car-park. 
Smokers are required to keep this area clean and tidy, cigarettes butts are to be disposed appropriately in rubbish bin provided. Hands must be washed after smoking. 

</p>
</div>

<div id="section16" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
  <h1 class="display-4">Uniform Policy</h1>

  <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/muncher_factory2.png') }}">

  <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/bluelady.png') }}">
  <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/overalls.png') }}">
    <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/boots.png') }}">

  <p>All personnel entering the production area will be assigned a uniform. This will consist of:</p>
<ul>
<li>Oven Operators; white smock or white t-shirt, and white trousers,</li>
<li>Technical / Quality Team and Visitors; white lab coat,</li>
<li>Engineering; blue overalls,</li>
<li>Factory staff, excluding oven operators; white overalls.</li>
</ul>

<p>Protective clothing are to be worn inside the food production area only. They are not to be taken home for laundering and replaced daily with a fresh new one.</p>

<p>Personal belongings including mobile phones must be kept in designated lockers provided not in uniform pockets. Mobile phones pose a foreign contamination risk when they break, therefore to manage this risk mobile phones are not to be brought into the food processing area unless they are authorised and have a fully enclosed case. </p>

<p>Disposable hair nets are provided prior to entering the production area. These must be worn to cover all hair. Male personnel with facial hair (any growth over 48 hours) must be covered using beard net. 
</p>

<p>
Personnel are issued with White Safety Boots to be worn inside the food processing  area only.  White Safety boots are to be cleaned regularly and kept in the cubby provided in the Red Line Area. Special exception can be made by the Technical and Compliance Manager for staff who required a different shoe due to a medical reason with confirmation by a physician.
</p>

<p>
Cut proof gloves are to be worn when handling sharp surfaces. This includes packing area when handling cardboard cartons and any process that involves trays (cookie or bar area). These gloves are not be be taken home for laundering.
</p>

<p>
Disposable aprons and arm sleeves are also used in areas to keep uniform clean or prevent product touching the arm (area that is not covered by overalls).   
</p>
</div>

<div id="section17" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:70px">
	  <img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/mucher_juggle.png') }}">
  <h1 class="display-4">Eating and Drinking Policy</h1>

  <p>Food must not be consumed inside the food processing area unless authorised. </p>

<p>Perishable food must only be kept in the storage area (hot cabinet and fridge) provided in the staff lunch room. Non-perishable food must not be kept in your locker only not in the changing room.</p>

<p>Drinking from a plastic or metal water bottle containing only water is allowed in the oven area, especially in warmer weather due to health & safety reasons. 
A drinking fountain is available in the food processing area if you are thirsty.</p>

<div class="row">
	<div class="col-md-6 text-center">
		 <img class="rounded img-fluid  "  src="{{ URL::to('/images/food.png') }}">
		 <p>Perishable Food</p>
		
	</div>
	<div class="col-md-6 text-center">
		
		  <img class="rounded img-fluid  "  src="{{ URL::to('/images/PASTA.png') }}">
		   <p>Non-perishable Food</p>
	</div>
</div>

</div>

<div id="section18" class="container-fluid" style="padding-top:70px;padding-bottom:70px">
	<img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/deeznuts.png') }}">
  <h1 class="display-4">Allergens and Cross Contamination</h1>
  <p>Food allergies affect a small proportion of the population.  Reactions to allergens can be life threatening or fatal. </p>

<img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/bread.png') }}">

<img class="rounded img-fluid img  float-right"  src="{{ URL::to('/images/seeds.png') }}">
The following allergens are present onsite;
<ul>
<li>milk and milk products.</li>
<li>peanuts and soybeans and their products.</li>
<li>egg and egg products.</li>
<li>tree nuts</li>
<li>sesame seeds</li>
<li>soy and soy products</li>
<li>cereals containing gluten and their products, namely, wheat, rye, barley, oats, spelt.</li>
<li>added sulphites in concentrations of 10 mg/kg or more.</li>
</ul>
<img class="rounded img-fluid img float-right"  src="{{ URL::to('/images/apricot.png') }}">
<p>
Production staff are responsible for carrying out processing schedules and cleaning requirements when required. Allergen testing will confirm the effectiveness of the cleaning and recleans may need to occur. 
</p>
<p>
Cross contamination is transferring a substance from one object to another. 
An example of this is staff moving through different areas after handling nuts. 
</p>
<p>To prevent cross contamination;</p>
<ul>
<li>Gloves/aprons will need to be changed when moving from cooked/raw areas,</li>
<li>Equipment must be cleaned (Allergen wash),</li>
<li>Handwashing.</li>
<img class="rounded img-fluid img  float-right"  src="{{ URL::to('/images/eggs.png') }}">
<img class="rounded img-fluid float-right"  src="{{ URL::to('/images/peanuts.png') }}">
<img class="rounded img-fluid  img  float-right"  src="{{ URL::to('/images/cheese.png') }}">
</ul>
</p>
</div>

<div id="section19" class="container-fluid bg-light" style="padding-top:70px;padding-bottom:250px">
  <h1 class="display-4">Foreign Matter</h1>
  <p>Foreign matter can be in the form of; </p>
<ul>
<li>Physical - hair, plastic & metal,</li> 
<li>Biological  - bacteria & viruses, </li>
<li>Chemical - cleaning chemicals dose too high & adding incorrect ingredient weight (eg vitamin/mineral premix).</li>
</ul>
<div class="row">
	<div class="col-md-6 text-center">
		 <img class="rounded img-fluid  "  src="{{ URL::to('/images/butter.png') }}">
		  <img class="rounded img-fluid  "  src="{{ URL::to('/images/cookie_hair.png') }}">
		 <p>Physical</p>
		
	</div>
	<div class="col-md-6 text-center">
		
		  <img class="rounded img-fluid  "  src="{{ URL::to('/images/germs.png') }}">
		   <p>Biological</p>
	</div>
</div>
<img class="rounded img-fluid  img float-right"  src="{{ URL::to('/images/muncher_bluecard.png') }}">
<p>It is important to immediately report any foreign matter  to an Area Leader, Team Leader or QC as it may cause illness or injury to the consumer. </p>


<p>Foreign matter controls in the factory are;</p>
<ul>
<li>No wood in the factory except in Chocolate room/Pre-weigh, Store, Chiller and Annex.</li>

<li>No glass in the factory.</li>

<li>Only metal detectable pens used in the factory.</li>
</ul>
</p>
</div>



</div>
</div>
</div>
</div>

</body>

@endsection