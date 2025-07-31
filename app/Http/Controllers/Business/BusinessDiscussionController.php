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
class BusinessDiscussionController extends Controller
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
  

	
    /**
     * Return paginated resources.
     *
     * @return JSON Payload.
     */
    public function getDiscussion(Request $request){
		if($request->ajax()){
			 
			$clientID = auth()->guard('clients')->user()->id;
			$discussion = DB::table('client_discussion')			 
					   ->orderBy('id','desc')					  
					   ->where('client_id',$clientID)
					   ->paginate($request->input('length'));
					   
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $discussion->total();
			$returnLeads['recordsFiltered'] = $discussion->total();
			 
			foreach($discussion as $lead){
				$data[] = [								 
					date_format(date_create($lead->createdate),'d-m-Y H:i:s'),
					$lead->discussion,	
				];
			}
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);
			 
		}
    }


	
	
}
