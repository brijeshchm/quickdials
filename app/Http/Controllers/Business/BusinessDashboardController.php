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
class BusinessDashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
	 
    	$clientID = auth()->guard('clients')->user()->id;	 
        $clientDetails = 	DB::table('clients')->where('id',$clientID)->first();
		$leads = DB::table('leads')
				   ->join('assigned_leads','leads.id','=','assigned_leads.lead_id')		 
				  ->leftjoin('citylists','leads.city_id','=','citylists.id')		 
				   ->leftjoin('areas','leads.area_id','=','areas.id')		 
				   ->leftjoin('zones','leads.zone_id','=','zones.id')		 
				   ->select('leads.*','assigned_leads.client_id','assigned_leads.lead_id','assigned_leads.created_at as created','areas.area','zones.zone')				 
				   
				   ->orderBy('assigned_leads.created_at','desc')
				    //  ->where('assigned_leads.readLead','0')
				   ->where('assigned_leads.client_id',$clientID)->get();
		//	echo "<pre>";print_r($clientDetails);	   die;
	 
		return view('business.dashboard',['leads'=>$leads,'clientDetails'=>$clientDetails]);
    }

   
	
	
}
