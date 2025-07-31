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
class AccountController extends Controller
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
  

	
	public function package(Request $request)
    { 
        	$clientID = auth()->guard('clients')->user()->id;
        	$client = Client::find($clientID);
        $search = [];
		if($request->has('search')){
			$search = $request->input('search');
		}
        return view('business.package',['search'=>$search,'client'=>$client]);
    }
    
		
	
	public function accountSettings(Request $request)
    { 
		$clientID = auth()->guard('clients')->user()->id;
		$client = Client::find($clientID);
        $search = [];
		if($request->has('search')){
			$search = $request->input('search');
		}
        return view('business.account-settings',['search'=>$search,'client'=>$client]);
    }
    

	
    
    public function buyPackage(Request $request)
    { 
        	$clientID = auth()->guard('clients')->user()->id;
        	$client = Client::find($clientID);
        $search = [];
		if($request->has('search')){
			$search = $request->input('search');
		}
        return view('business.buyPackage',['search'=>$search,'client'=>$client]);
    }
    	
	
}
