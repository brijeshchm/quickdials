<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Client\Client; //model
use Validator;
use Illuminate\Support\Facades\Input;
use Image;
use DB;
use Mail;
use Excel;
use session;
use App\Http\Controllers\SitemapsController as SMC;
use App\Models\PaymentHistory;  
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\Zone;
use App\Models\Lead;
use App\Models\User;
use App\Models\Keyword;
use App\Models\LeadFollowUp;
use App\Models\Status;
use App\Models\AssignedLead;
 
use App\Models\Occupation;
use App\Models\Citieslists;
use App\Models\AssignedZone;
use App\Models\KeywordSellCount;
use App\Models\Client\AssignedKWDS;
class ProfileController extends Controller
{
	protected $danger_msg = '';
	protected $success_msg = '';
	protected $warning_msg = '';
	protected $info_msg = '';
    protected $redirectTo = '/business-owners';
	
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		    
    }
     	
	public function profileInfo(Request $request)
    { 
		$clientID = auth()->guard('clients')->user()->id;	 
        $client = Client::find($clientID);
        return view('business.profile',['client'=>$client]);
    }
		

    
    public function saveProfileInfo(Request $request,$id)
    {
		//echo "<pre>";print_r($_POST);die;
		 
        if($request->ajax()){
			
			$validator = Validator::make($request->all(),[	

			'business_name' 	=> 'required|max:255',
			'email' => 'required',
			'landmark' => 'required',
			'address' => 'required',
			'business_city' => 'required',
			'state' => 'required',
			'country' => 'required',
			 

			]);


			if($validator->fails()){
			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	


			$client = Client::find($id);					
			$client->business_name = trim($request->input('business_name'));
			$client->email = $request->input('email');
			$client->address = $request->input('address');
			$client->landmark = $request->input('landmark');
			$client->business_city = $request->input('business_city');
			$client->state = $request->input('state');
			$client->country = $request->input('country');
			$client->area = $request->input('area');
			$client->year_of_estb = $request->input('year_of_estb');
			$client->business_intro = $request->input('business_intro');
			$client->certifications = $request->input('certifications');
			$client->display_hofo = $request->input('display_hofo');
		 
			if(!empty($request->input('time'))){
				$client->time = serialize($request->input('time'));
			}

			if($client->save()){
			$status=1;
			$msg="Personal Details updated successfully !";
			}else{
			$status=0;
			$msg="Personal Details could not be successfully, Please try again !";	
			}		
			return response()->json(['status'=>$status,'msg'=>$msg],200); 			
		}
        
    }
    
    
    public function saveBusinessLocation(Request $request,$id)
    {
		 
	 
        if($request->ajax()){
	 
		if($request->input('zone_id') == "Other"){

			 
			$validator = Validator::make($request->all(),[	
			'city_id' 	=> 'required|max:25',
			//'other' 	=> 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',	
			'other' 	=> 'required|min:3|max:32|regex:/^(?!.*(.)\1{3,}).+$/',	
			]);

		 
		}else{
			$validator = Validator::make($request->all(),[	
			'city_id' 	=> 'required|max:255',
			'zone_id' => 'required|max:255',
		 
			]);
		}

			if($validator->fails()){
			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	

 
			$assignedZone = New AssignedZone;				
			$assignedZone->city_id = $request->input('city_id');
			if($request->input('zone_id') == "Other"){
			$checkZone = Zone::where('zone',$request->input('other'))->where('city_id',$request->input('city_id'))->first();
				if(empty($checkZone)){
					$zone = New Zone;
					$zone->city_id = $request->input('city_id');
					$zone->zone = ucfirst($request->input('other'));
					$zone->save();
					$zone_id = $zone->id;
				}else{
					$zone_id = $checkZone->id;
				}

			}else{
				$zone_id = $request->input('zone_id');
			}
			$assignedZone->zone_id = $zone_id;
			$assignedZone->client_id = $request->input('client_id'); 
		 
			$checkAssignedZone = AssignedZone::where('client_id',$request->input('client_id'))->where('zone_id',$zone_id)->where('city_id',$request->input('city_id'))->first();
 
			if(empty($checkAssignedZone)){
				if($assignedZone->save()){
				
				$status=1;
				$msg="Business Location updated successfully !";
				}else{
				$status=0;
				$msg="Business Location could not be successfully, Please try again !";	
				}	
			}else{
				$status=0;
				$msg="Already exists <strong>".$request->input('other')."</strong> Please add right zone !";
			}	
			return response()->json(['status'=>$status,'msg'=>$msg],200); 			
		}
        
    }
    
	
	
}
