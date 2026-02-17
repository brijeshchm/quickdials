<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client\Client;
use Validator;
use DB;
use Excel;
use App\Models\Lead;

use App\Models\LeadFollowUp;
use App\Models\Status;
use App\Models\AssignedLead;

class EnquiryController extends Controller
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
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function followUp(Request $request, $id)
	{
		if ($request->ajax()) {

			$clientID = auth()->guard('clients')->user()->id;
			$lead = DB::table('leads')
				->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
				->select('leads.*', 'assigned_leads.client_id', 'assigned_leads.lead_id', 'assigned_leads.created_at as created')
				->orderBy('assigned_leads.created_at', 'desc')
				->where('assigned_leads.client_id', $clientID)->where('leads.id', $id)->first();

			$leadLastFollowUp = DB::table('lead_follow_ups as lead_follow_ups')
				->where('lead_follow_ups.lead_id', '=', $id)
				->where('lead_follow_ups.client_id', '=', $clientID)
				->select('lead_follow_ups.*')
				->orderBy('lead_follow_ups.id', 'desc')
				->first();

			$statuses = DB::table('status')->where('lead_follow_up', 1)->get();

 			$statusHtml = '';
			$disabled = '';
			$dateValue = '';
			if (count($statuses) > 0) {
				foreach ($statuses as $status) {
					if (strcasecmp($status->name, 'new lead')) {
						$selected = '';
						if (isset($leadLastFollowUp->status) && $leadLastFollowUp->status == $status->id) {
							$selected = 'selected';

							if ($leadLastFollowUp->expected_date_time != NULL) {
								$dateValue = date_format(date_create($leadLastFollowUp->expected_date_time), 'd-F-Y g:i A');
							}

						}
						$statusHtml .= '<option data-value="' . $status->show_exp_date . '" value="' . $status->id . '" ' . $selected . '>' . $status->name . '</option>';
					}
				}
			}

			$html = '<div class="row">
						<div class="x_content" style="padding:0">';
			$number = $lead->mobile;
			$html .= '<form class="form-label-left" method="post" onsubmit="return enquiryController.storeFollowUp(' . $id . ',this)">
				 
					 
				    <div class="row">
                        <div class="col-md-4" style="display:flex;">
                        <label for=" " class="col-md-3 col-lg-3 col-form-label">Name :</label>
                        
                        <p name="name" type="text" class="form-control-static" > ' . $lead->name . '</p>
                        </div>
                        	
                        <div class="col-md-4" style="display:flex;">
                        <label for="" class="col-md-3 col-lg-3 col-form-label">Email :</label>
                         	 <p name="email" type="text" class="form-control-static" > ' . $lead->email . '</p>
                        </div>
                        
                         <div class="col-md-4" style="display:flex;">
                         <label for=" " class="col-md-3 col-lg-3 col-form-label">Mobile :</label>
                         <p name="mobile" type="tel" class="form-control-static" > ' . $lead->mobile . '</p>
                        </div>
                        
                    </div>
				 					 
				     <div class="row">
                           <div class="col-md-4" style="display:flex;">
                         <label for="" class="col-md-3 col-lg-3 col-form-label">City :</label>
                         	 <p name="city name" type="text" class="form-control-static" > ' . $lead->city_name . '</p>
                        </div>
                       
                        <div class="col-md-4" style="display:flex;">
                         <label for="" class="col-md-3 col-lg-4 col-form-label">Keyword :</label>
                         	 <p name="keyword" type="text" class="form-control-static" > ' . $lead->kw_text . '</p>
                        </div>
                        
                         <div class="col-md-4" style="display:flex;">
                         <label for="" class="col-md-3 col-lg-3 col-form-label">Date :</label>
                         	 <p name="date" type="text" class="form-control-static" > ' . date('d M Y', strtotime($lead->created)) . '</p>
                        </div>                        
                    </div>
								 
                <div class="row mb-3">
                
                <div class="col-md-4">
                <label for="" class="">Status :</label>
                <select class="select2_single form-control" name="status" tabindex="-1">
                <option value="">-- SELECT STATUS --</option> 
                ' . $statusHtml . '
                </select>
                
                </div>
                
                <div class="col-md-4">
                <label for="expected_date_time">Expected Date &amp; Time <span class="required">*</span></label>
                <input type="text" id="expected_date_time" name="expected_date_time" class="form-control" value="' . $dateValue . '" placeholder="Expected Date &amp; Time" ' . $disabled . ' autocomplete="off">
                </div>
                
                <div class="col-md-4">
                <label for="remark">Counsellor Remark <span class="required">*</span></label>
                <textarea name="remark" rows="1" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
                </div>
                <div class="form-group" style="float:right;">
                <div class="col-md-11" style="float:right;">
                	<label style="visibility:hidden">Submit</label>
                	<button type="submit" class="btn btn-success btn-block" name="submit" value="Submit">Submit</button>
                </div>
                </div>
							</form>';

			$html .= '</div>
					</div> 
					<p style="margin-top:10px;margin-bottom:3px;"><strong>Follow Up Status</strong>  <select onchange="javascript:enquiryController.getAllFollowUps()" class="follow-up-count"><option value="5">Last 5</option><option value="all">All</option></select></p>
					<div class="" style="overflow-x: none;">
						<table id="datatable-enquiry-followups" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Date</th>
									<th>Counsellor Remark</th>
									<th>Status</th>
									<th>Expected Date</th>
								</tr>
							</thead>
						</table>
					</div>';

			return response()->json(['status' => 1, 'html' => $html], 200);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function storeFollowUp(Request $request, $id)
	{
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [

				'status' => 'required',
				'remark' => 'required',

			]);
			if ($validator->fails()) {
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
			}

			// check now expected date and time if status is not - not interested/location issue
			$statusModel = Status::find($request->input('status'));
			//if($statusModel->name!='Not Interested' && $statusModel->name!='Location Issue'){
			if ($statusModel->show_exp_date) {
				$validator = Validator::make($request->all(), [
					'expected_date_time' => 'required',
				]);
				if ($validator->fails()) {
					$errorsBag = $validator->getMessageBag()->toArray();
					return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
				}
			}

			$lead = Lead::find($id);
			if (!empty($lead)) {
				$leadFollowUp = new LeadFollowUp;
				$status = Status::findorFail($request->input('status'));
				if (!strcasecmp($status->name, 'npup')) {
					$npupCount = LeadFollowUp::where('lead_id', $id)->where('status', $status->id)->count();
					if ($npupCount >= 15) {
						$status = Status::where('name', 'LIKE', 'Not Interested')->first();
						$leadFollowUp->status = $status->id;
					} else {
						$leadFollowUp->status = $request->input('status');
					}
				} else {
					$leadFollowUp->status = $request->input('status');
				}


				$leadFollowUp->remark = trim($request->input('remark'));
				$leadFollowUp->lead_id = $id;
				$leadFollowUp->client_id = auth()->guard('clients')->user()->id;
				$leadFollowUp->expected_date_time = NULL;
				if ($request->input('expected_date_time') != '') {
					$leadFollowUp->expected_date_time = date('Y-m-d H:i:s', strtotime($request->input('expected_date_time')));
				}
				if ($leadFollowUp->save()) {
					return response()->json(['status' => 1], 200);
				}
			} else {

				return response()->json(['status' => 0, '' => "Enquiry not found"], 200);
			}
		}
	}

	 


	public function pauseLead(Request $request)
	{
		$clientID = auth()->guard('clients')->user()->id;

		$client = Client::find($clientID);

		if (!$client) {
			return response()->json(['status' => false, 'message' => 'Client not found'], 404);
		}

		if ($request->pauseLead == 'true') {

			$client->pauseLead = 1;
		} else {

			$client->pauseLead = 0;
		}
		if ($client->save()) {
			return response()->json(['status' => true, 'message' => 'Pause lead updated']);
		} else {
			return response()->json(['status' => false, 'message' => 'Pause lead updated']);

		}

		 

	}


	public function scrapLead(Request $request)
	{

		//echo $request->clientId;echo "<pre>";print_r($_POST);die;
		
		$assignedLead = AssignedLead::find($request->leadId);
		$coinsLeads = DB::table('assigned_leads')->where('lead_id',$assignedLead->lead_id)->where('scrapPay','0')->get();
		$scrapStatusLeads = DB::table('assigned_leads')->where('lead_id',$assignedLead->lead_id)->where('scrapLead','1')->get()->count();

		if(!empty($assignedLead)){
		if($coinsLeads->count() == $scrapStatusLeads + 1){
			foreach($coinsLeads as $coinsLead){
			$client = Client::find($coinsLead->client_id);
			$client->coins_amt =  $client->coins_amt + $coinsLead->coins;
			$client->save();
			$assignedclnLead = AssignedLead::find($coinsLead->id);
			$assignedclnLead->scrapPay = '1';
			$assignedclnLead->save();
			}
		}
			
		$assignedLead->scrapLead = '1';
		$assignedLead->scrapValue = $request->scrapValue;
		if($assignedLead->save()){
	 		$status = true;
	 		$msg = "Scrap update successfully";
			 
		} else {
			$status = false;
			$msg = "Scrap update successfully";
		}

		}
 
			return response()->json(['status' => $status, 'msg' =>$msg]);

	}

	public function readLead(Request $request)
	{

		$assignedLead = AssignedLead::find($request->assingId);

		if (!$assignedLead) {
			return response()->json(['status' => false, 'message' => 'assignedLead not found'], 404);
		}

		$assignedLead->readLead = '1';
		if ($assignedLead->save()) {
			return response()->json(['status' => true, 'message' => 'Pause lead updated']);
		} else {
			return response()->json(['status' => false, 'message' => 'Pause lead updated']);
		}
	}

	public function favoritleads(Request $request)
	{

		$assignedLead = AssignedLead::find($request->assingId);

		if (!$assignedLead) {
			return response()->json(['status' => false, 'message' => 'assignedLead not found'], 404);
		}

		$assignedLead->favorite_lead = '1';
		if ($assignedLead->save()) {
			return response()->json(['status' => true, 'message' => 'Pause lead updated']);
		} else {
			return response()->json(['status' => false, 'message' => 'Pause lead updated']);
		}
	}
	/**
	 * Return paginated resources.
	 *
	 * @return JSON Payload.
	 */
	public function getLeads(Request $request)
	{
		if ($request->ajax()) {

			$clientID = auth()->guard('clients')->user()->id;


			$leads = DB::table('leads')
				->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
				 
				->select('leads.*', 'assigned_leads.client_id', 'assigned_leads.lead_id', 'assigned_leads.created_at as created')
				->orderBy('assigned_leads.created_at', 'desc')

				->where('assigned_leads.client_id', $clientID)
				->paginate($request->input('length'));

			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $leads->total();
			$returnLeads['recordsFiltered'] = $leads->total();
			foreach ($leads as $lead) {
				$data[] = [
					$lead->name,
					$lead->mobile,
					$lead->email,
					$lead->kw_text,
					$lead->city_name,
					date_format(date_create($lead->created), 'd-m-Y H:i:s')
				];
			}
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);

		}
	}

	public function enquiry(Request $request)
	{
		$search = [];
		if ($request->has('search')) {
			$search = $request->input('search');
		}
		return view('business.leadlist', ['search' => $search]);
	}

public function newEnquiry(Request $request)
{
    $clientID = auth()->guard('clients')->id();

    // =========================
    // Get Leads
    // =========================
    $leads = DB::table('leads')
        ->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
        ->leftJoin('citylists', 'leads.city_id', '=', 'citylists.id')
       
        ->leftJoin('zones', 'leads.zone_id', '=', 'zones.id')
        ->select(
            'leads.*',
            'assigned_leads.*',
            'assigned_leads.id as assignId',
            'assigned_leads.created_at as created',
            'citylists.city as city_name',
            'zones.zone'
        )
        ->where('assigned_leads.client_id', $clientID)
		->where('assigned_leads.readLead', '0')
        ->orderByDesc('assigned_leads.created_at')

        ->limit(20)
        ->get();

    // =========================
    // Get Client
    // =========================
    $client = Client::select(
        'id',
        'address',
        'business_name',
        'business_slug',
        'business_map'
    )->find($clientID);

    $businessName = $client->business_name ?? 'our company';
    $addressText  = $client->address ?? '';
    $profile_url  = url('business-details/'.$client->business_slug);
    $mapText      = $client->business_map ?? '';

    // =========================
    // Get Rating
    // =========================
    $rating = DB::table('comments')
        ->where('comment_client_ID', $clientID)
        ->selectRaw('COUNT(*) as count, COALESCE(SUM(rating),0) as total')
        ->first();

    $ratingCount = $rating->count ?? 0;
    $avgRating   = $ratingCount > 0 ? round($rating->total / $ratingCount, 1) : 0;

    // =========================
    // Build Leads List
    // =========================
    $leads_list = [];

    foreach ($leads as $val) {

        $cityName = trim(($val->city_name ?? '') .
            (!empty($val->zone) ? ', '.$val->zone : ''));

        $coins = !empty($val->scrapLead)
            ? ['color' => 'green', 'coin' => $val->coins]
            : (!empty($val->coins)
                ? ['color' => 'red', 'coin' => $val->coins]
                : null);

        $remark = collect([
            $val->kw_text ? "Interested in {$val->kw_text}" : null,
            $val->zone ? "Location {$val->zone}" : null,
            $val->plan ? "Plan {$val->plan}" : null,
            $val->age ? "Age {$val->age}" : null,
            $val->experience ? "Experience {$val->experience}" : null,
            $val->remark ?? null,
        ])->filter()->implode(' • ');

        $user_share = [
            'address_share' =>
                "Greetings from {$businessName},\n" .
                "We’re following up on your enquiry made on Quickdials for {$val->kw_text}.\n" .
                ($addressText ? "Visit us at {$addressText}" : ""),

            'for_service' =>
                "Greetings from {$businessName},\n" .
                "For more services visit {$profile_url}",

            'for_review' =>
                "Greetings from {$businessName}, Rated {$avgRating} out of {$ratingCount} votes.\n" .
                "Visit our profile: {$profile_url}",

            'share_lead' =>
                "Name: {$val->name}, Mobile: {$val->mobile}, Email: {$val->email}, Service: {$val->kw_text}, Location: {$cityName}",
        ];

        $leads_list[] = [
            'lead_id'      => $val->lead_id ?? null,
            'assignId'     => $val->assignId ?? null,
            'favorite'     => $val->favorite_lead ?? 0,
            'readLead'     => $val->readLead ?? 0,
            'scrapLead'    => $val->scrapLead ?? 0,
            'primeLead'    => $val->primeLead ?? 0,
            'name'         => trim($val->name ?? '') ?: null,
            'mobile'       => trim($val->mobile ?? '') ?: null,
            'email'        => trim($val->email ?? '') ?: null,
            'remark'       => $remark ?: null,
            'cityName'     => $cityName ?: null,
            'kw_text'      => trim($val->kw_text ?? '') ?: null,
            'createdDate'  => get_time(strtotime($val->created)).' ago',
            'coins'        => $coins,
            'user_share'   => $user_share,
        ];
    }

    return view('business.new-enquiry', compact('leads_list'));
}


	public function newEnquiry_old(Request $request)
	{
		$search = [];
		if ($request->has('search')) {
			$search = $request->input('search');
		}

		$clientID = auth()->guard('clients')->user()->id;


		$leads = DB::table('leads')
			->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
			->leftjoin('citylists', 'leads.city_id', '=', 'citylists.id')
			->leftjoin('areas', 'leads.area_id', '=', 'areas.id')
			->leftjoin('zones', 'leads.zone_id', '=', 'zones.id')
			->select('leads.*', 'assigned_leads.*', 'assigned_leads.client_id as clientId', 'assigned_leads.lead_id', 'assigned_leads.id as assignId', 'assigned_leads.created_at as created', 'areas.area', 'zones.zone')

			->orderBy('assigned_leads.created_at', 'desc')
			// ->where('assigned_leads.readLead', '0')
			->where('assigned_leads.client_id', $clientID)->limit('20')->get();


			$client = Client::select('id', 'address', 'business_name', 'business_slug')->where('id', $clientID)->first();

		if ($client->address) {
			$address = urlencode($client->address);
			$url = "https://nominatim.openstreetmap.org/search?q={$address}&format=json&limit=1";

			$options = [
				"http" => [
					"header" => "User-Agent: MyWebsite/1.0 (contact@mywebsite.com)\r\n"
				]
			];

			$context = stream_context_create($options);
			$response = file_get_contents($url, false, $context);
			$geodata = json_decode($response, true);

			if (!empty($geodata[0])) {
				$latitude = $geodata[0]['lat'];
				$longitude = $geodata[0]['lon'];
				$map = 'https://www.google.com/maps?q=' . $latitude . ',' . $longitude;
			}


		} else {
			$map = "";
		}


		$rating = DB::table('comments')
			->where('comment_client_ID', $clientID)
			->selectRaw('
				COUNT(*) as comment_count,
				COALESCE(SUM(rating),0) as total_rating
			')
			->first();
		if (!empty($rating)) {
			$avgRating = ($rating->comment_count > 0)
				? round($rating->total_rating / $rating->comment_count, 1)
				: 0;
			$ratingCount = $rating->comment_count;
		} else {
			$avgRating = 0;
			$ratingCount = 0;
		}

		//  dd($leads);
	if (!empty($leads)) {
			 
	$leads_list = [];

$businessName = $client->business_name ?? 'our company';
$addressText  = $client->address ?? '';
$mapText      = !empty($client->business_map) ? '\n Directions: '.$client->business_map : '';
$profile_url  = 'https://www.quickdials.com/business-details/'.$client->business_slug;

foreach ($leads as $val) {

    $keyword = $val->kw_text ?? 'your enquiry';

    $coins = !empty($val->scrapLead)
        ? ['color' => 'green', 'coin' => $val->coins]
        : (!empty($val->coins) ? ['color' => 'red', 'coin' => $val->coins] : null);

    $created = get_time(strtotime($val->created)).' ago';

    $cityName = trim(($val->city_name ?? '').(!empty($val->zone) ? ', '.$val->zone : ''));

    $frmcheckText = !empty($val->frmcheck) && is_array($val->frmcheck)
        ? implode(', ', $val->frmcheck)
        : '';

    $remarkParts = array_filter([
        $val->kw_text ? "Interested in {$val->kw_text}" : null,
        $frmcheckText ? "Mode of {$frmcheckText}" : null,
        $val->zone ? "Location {$val->zone}" : null,
        $val->plan ? "Plan {$val->plan}" : null,
        $val->age ? "Age {$val->age}" : null,
        $val->experience ? "Experience {$val->experience}" : null,
    ]);

    $remark = trim(implode(' • ', $remarkParts).' '.($val->remark ?? ''));

    $user_share = [
        'address_share' => "Greetings from {$businessName},\n"
            ."We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
            ."For more information"
            .($addressText ? ", you can visit us at {$addressText}" : "")
            ."{$mapText}",

        'for_service' => "Greetings from {$businessName},\n"
            ."We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
            ."For more information of the services offered by our business"
            .($addressText ? ", you can visit us at {$addressText}" : "")
            .", Or {$profile_url}",

        'for_review' => "Greetings from {$businessName}, Rated {$avgRating} Rating out of {$ratingCount} Votes.\n"
            ."We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
            ."For more information about the services offered by our business"
            .($addressText ? ", you can visit us at {$addressText}" : "")
            .". Or visit our profile: {$profile_url}",

        'share_lead' => 'Name: '.trim($val->name ?? '').
            ', Mobile: '.trim($val->mobile ?? '').
            ', Email: '.trim($val->email ?? '').
            ', Service: '.trim($val->kw_text ?? '').
            ', Location: '.$cityName,
    ];

    $leads_list[] = [
        'lead_id' => $val->lead_id ?? null,
        'assignId' => $val->assignId ?? null,
        'favorite_lead' => $val->favorite_lead ?? 0,
        'readLead' => $val->readLead ?? 0,
        'scrapLead' => $val->scrapLead ?? 0,
        'scrapPay' => $val->scrapPay ?? 0,
        'scrapValue' => $val->scrapValue ?? 0,
        'primeLead' => $val->primeLead ?? 0,
        'name' => trim($val->name ?? '') ?: null,
        'mobile' => trim($val->mobile ?? '') ?: null,
        'email' => trim($val->email ?? '') ?: null,
        'remark' => $remark ?: null,
        'cityName' => $cityName ?: null,
        'kw_text' => trim($val->kw_text ?? '') ?: null,
        'client_id' => $val->client_id ?? null,
        'createdDate' => $created,
        'coins' => $coins,
        'user_share' => $user_share,
    ];
	
	}
//  dd($leads_list);	

	}

return view('business.new-enquiry', ['leads' => $leads_list]);
	}

	public function myLead(Request $request)
	{

		$clientID = auth()->guard('clients')->user()->id;
		$leads = DB::table('leads')
			->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
			->leftjoin('citylists', 'leads.city_id', '=', 'citylists.id')
			->leftjoin('areas', 'leads.area_id', '=', 'areas.id')
			->leftjoin('zones', 'leads.zone_id', '=', 'zones.id')
			->select('leads.*', 'assigned_leads.*', 'assigned_leads.client_id as clientId', 'assigned_leads.lead_id', 'assigned_leads.id as assignId', 'assigned_leads.created_at as created', 'areas.area', 'zones.zone')

			->orderBy('assigned_leads.created_at', 'desc')
			->where('assigned_leads.favorite_lead', '!=', '1')

			->where('assigned_leads.client_id', $clientID)->limit('200')->get();

		return view('business.myLead', ['leads' => $leads]);
	}

	public function favoriteEnquiry(Request $request)
	{
		$clientID = auth()->guard('clients')->user()->id;
		$leads = DB::table('leads')
			->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
			->leftjoin('citylists', 'leads.city_id', '=', 'citylists.id')
			->leftjoin('areas', 'leads.area_id', '=', 'areas.id')
			->leftjoin('zones', 'leads.zone_id', '=', 'zones.id')
			->select('leads.*', 'assigned_leads.*', 'assigned_leads.client_id as clientId', 'assigned_leads.lead_id', 'assigned_leads.id as assignId', 'assigned_leads.created_at as created', 'areas.area', 'zones.zone')

			->orderBy('assigned_leads.created_at', 'desc')
			->where('assigned_leads.favorite_lead', '1')
			->where('assigned_leads.client_id', $clientID)->limit('200')->get();

		return view('business.favorite-enquiry', ['leads' => $leads]);
	}


	/**
	 * Return paginated resources.
	 *
	 * @return JSON Payload.
	 */
	public function getEnquiry(Request $request)
	{
		if ($request->ajax()) {

			$clientID = auth()->guard('clients')->user()->id;
			$leads = DB::table('leads')
				->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
				->select('leads.*', 'assigned_leads.client_id', 'assigned_leads.lead_id', 'assigned_leads.created_at as created')
				->orderBy('assigned_leads.created_at', 'desc')
				->where('assigned_leads.client_id', $clientID);
			if ($request->input('search.leaddf') != '') {
				$leads = $leads->whereDate('assigned_leads.created_at', '>=', date_format(date_create($request->input('search.leaddf')), 'Y-m-d'));
			}
			if ($request->input('search.leaddt') != '') {
				$leads = $leads->whereDate('assigned_leads.created_at', '<=', date_format(date_create($request->input('search.leaddt')), 'Y-m-d'));
			}

			$leads = $leads->paginate($request->input('length'));
			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $leads->total();
			$returnLeads['recordsFiltered'] = $leads->total();
			$returnLeads['recordCollection'] = [];
			foreach ($leads as $lead) {

				$action = '';
				$separator = '';

				$action .= $separator . '<a href="javascript:enquiryController.getfollowUps(' . $lead->id . ')" title="followUp"><i class="bi bi-eye" aria-hidden="true"></i></a>';
				$separator = ' | ';
				$data[] = [
					$lead->name,
					$lead->mobile,
					$lead->email,
					$lead->kw_text,
					$lead->city_name,
					date_format(date_create($lead->created), 'd M, Y H:i'),
					$action
				];
				$returnLeads['recordCollection'][] = $lead->id;
			}
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getFollowUps(Request $request, $id)
	{
		if ($request->ajax()) {

			$leads = DB::table('lead_follow_ups as lead_follow_ups')
				->join('status as status', 'status.id', '=', 'lead_follow_ups.status')
				->where('lead_follow_ups.lead_id', '=', $id)
				->where('lead_follow_ups.client_id', '=', auth()->guard('clients')->user()->id)
				->select('lead_follow_ups.*', 'status.name as status_name')
				->orderBy('lead_follow_ups.id', 'desc');
			if ($request->input('count') != 'all') {
				$leads = $leads->take($request->input('count'));
			} else {
				$leads = $leads->take(100);
			}
			$leads = $leads->paginate($request->input('length'));
		 

			$returnLeads = [];
			$data = [];
			$returnLeads['draw'] = $request->input('draw');
			$returnLeads['recordsTotal'] = $leads->total();
			$returnLeads['recordsFiltered'] = $leads->total();
			foreach ($leads as $lead) {
				$data[] = [
					(date('d-m-y h:i:s', strtotime($lead->created_at))),
					$lead->remark,
					$lead->status_name,
					(isset($lead->expected_date_time) ? date('d-m-y h:i A', strtotime($lead->expected_date_time)) : "")
				];
			}
			$returnLeads['data'] = $data;
			return response()->json($returnLeads);
		}
	}
	/**
	 * Export assigned leads.
	 */
	public function getLeadsExcel(Request $request)
	{
		$clientID = auth()->guard('clients')->user()->id;

		$assignedKWDS = DB::table('leads')
			->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
			->join('cities', 'leads.city_id', '=', 'cities.id')
			->select('leads.*', 'assigned_leads.client_id', 'assigned_leads.lead_id', 'cities.city')
			->orderBy('leads.created_at', 'desc')
			->where('assigned_leads.client_id', $clientID)
			->get();

		$arr = [];
		foreach ($assignedKWDS as $assKWDS) {
			$arr[] = [
				'Name' => $assKWDS->name,
				'Mobile' => $assKWDS->mobile,
				'Email' => $assKWDS->email,
				'Course' => $assKWDS->kw_text,
				'City' => $assKWDS->city,
				'Date' => date_format(date_create($assKWDS->created_at), 'd M, Y H:i:s'),
			];
		}
		$excel = \App::make('excel');
		Excel::create('assigned_leads', function ($excel) use ($arr) {
			$excel->sheet('Sheet 1', function ($sheet) use ($arr) {
				$sheet->fromArray($arr);
			});
		})->export('xls');
	}



	public function manageEnquiry(Request $request)
	{
		$clientID = auth()->guard('clients')->user()->id;
		$leads = DB::table('leads')
			->join('assigned_leads', 'leads.id', '=', 'assigned_leads.lead_id')
			->leftjoin('citylists', 'leads.city_id', '=', 'citylists.id')
			->leftjoin('areas', 'leads.area_id', '=', 'areas.id')
			->leftjoin('zones', 'leads.zone_id', '=', 'zones.id')
			->select('leads.*', 'assigned_leads.*', 'assigned_leads.client_id as clientId', 'assigned_leads.lead_id', 'assigned_leads.id as assignId', 'assigned_leads.created_at as created', 'areas.area', 'zones.zone')

			->orderBy('assigned_leads.created_at', 'desc')
			->where('assigned_leads.client_id', $clientID)->limit('20')->get();

		return view('business.manage-enquiry', ['leads' => $leads]);
	}

}
