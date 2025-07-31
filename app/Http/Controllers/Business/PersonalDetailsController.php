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
class PersonalDetailsController extends Controller
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
     
	public function personalDetails(Request $request)
    { 
		$clientID = auth()->guard('clients')->user()->id;	 
        $edit_data = Client::find($clientID);
		$occupations = Occupation::where('status','1')->get();
		 $citys = Citieslists::get(); 
        
        return view('business.personal-details',['edit_data'=>$edit_data,'occupations'=>$occupations,'citys'=>$citys]);
    }
    
    public function savePersonalDetails(Request $request,$id)
    {
        if($request->ajax()){
			
			$validator = Validator::make($request->all(),[	

			'first_name' 	=> 'required|max:255',	
			'dob' => 'required',
			'email' => 'required',
			'marital' => 'required',		 
			'mobile' => 'required',		 
			'city' => 'required',		 
			'sirName' => 'required',		 

			]);


			if($validator->fails()){
			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status'=>1,'errors'=>$errorsBag],400);
			}	


			$client = Client::find($id);
		 
			$client->sirName = $request->input('sirName');
			$client->first_name = ucfirst($request->input('first_name'));
			$client->middle_name = $request->input('middle_name');
			$client->last_name = $request->input('last_name');
			$client->dob = date('Y-m-d',strtotime($request->input('dob')));
			$client->email = $request->input('email'); 
			$client->marital = $request->input('marital'); 
			$client->mobile = $request->input('mobile'); 
			$client->sec_mobile = $request->input('sec_mobile'); 
			$client->city = $request->input('city'); 
			$client->area = $request->input('area'); 
			$client->pincode = $request->input('pincode'); 
			$client->occupation = $request->input('occupation'); 
			$client->gender = $request->input('gender'); 	 
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
     
	
}
