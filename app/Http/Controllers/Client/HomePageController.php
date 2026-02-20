<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddLeadRequest;
use DB;
use Mail;
use Artisan;
use Validator;
//model
use App\Models\Keyword;

use App\Models\Citieslists;
use App\Models\Lead;
use App\Models\ChildCategory;
use App\Models\ParentCategory;
use App\Models\ClientCategory;
use App\Models\Client\Client;
use App\AssignedClientCategory;
use App\Models\Blogdetails;
use App\Models\Testimonialsdetail;
use App\Models\LeadFollowUp;
use App\Models\Status;
use App\Models\Zone;
use App\Models\Contacts;
use App\Models\Client\Comment;
// use Illuminate\Support\Facades\Cache;
class HomePageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */


	public function index()
	{

		$parentSlugs = [
			'packers-movers',
			'hospitals',
			'computer-courses',
			'study-abroad',
			'spa-beauty',
			'restaurants',
			'schools--colleges',
			'home-services',
			'event-organizers'
		];

// 		$parentCategories = ParentCategory::with('childCategories')
// 			->whereIn('parent_slug', $parentSlugs)
// 			->limit(7)
// 			->get();

		// dd(md5(json_encode($parentSlugs)));


//  $parentCategories = Cache::remember(
//     'child_categories_' . md5(json_encode($parentSlugs)), 
//     600, 
//     function () use ($parentSlugs) {
//         return ParentCategory::with('childCategories')
//             ->whereIn('parent_slug', $parentSlugs)
//             ->limit(7)
//             ->get();
//     }
// );
 


		$featuredClient = DB::table('clients as c')
			->join('assigned_kwds as ak', 'c.id', '=', 'ak.client_id')
			->leftJoin('comments as cm', 'c.id', '=', 'cm.comment_client_ID')
			->leftJoin('keyword as k', 'ak.kw_id', '=', 'k.id')
			->select(
				'c.id',
				'c.business_name',
				'c.business_slug',
				'c.address',
				'c.trusted_status',
				'c.gst_status',
				DB::raw("
					SUBSTRING_INDEX(
						GROUP_CONCAT(DISTINCT k.keyword ORDER BY k.keyword SEPARATOR ', '),
						', ',
						5
					) as keywords
				"),
				DB::raw('COUNT(DISTINCT ak.id) as keyword_count'),
				DB::raw('COALESCE(AVG(cm.rating),0) as avg_rating'),
				DB::raw('COUNT(cm.comment_ID) as total_reviews')
			)
			->where('c.logo', '<>', '')
			->whereNotNull('c.address')
			->where('c.address', '<>', '')
			->groupBy('c.id', 'c.business_name')
			->having('keyword_count', '>', 5)
			->having('total_reviews', '>', 0)
			->inRandomOrder()
			->limit(8)
			->get();

//   dd($featuredClient);
		/** ---------------- Cities ---------------- */
// 		$cities = DB::table('citylists')
// 			->select('id', 'city')
// 			->orderBy('city')
// 			->get();

		/** ---------------- Blogs & Testimonials ---------------- */
		$blogdetails = Blogdetails::where('status', '1')
			->latest()
			->limit(3)
			->get();

// 		$testimonialsdetails = Testimonialsdetail::latest()
// 			->limit('3')
// 			->get();


		$parentIds = ParentCategory::whereIn('parent_slug', [
			'computer-courses',
			'entrance-exams-coaching',
			'study-abroad'
		])->pluck('id', 'parent_slug');

// 		$subcategory = ChildCategory::where('parent_category_id', $parentIds['computer-courses'] ?? 0)
// 			->limit(24)
// 			->get();

// 		$entranceExam = ChildCategory::where('parent_category_id', $parentIds['entrance-exams-coaching'] ?? 0)
// 			->limit(24)
// 			->get();

		$studyAbroad = ChildCategory::where('parent_category_id', $parentIds['study-abroad'] ?? 0)
			->limit(24)
			->get();


		 
		
		
		return view('client.index', compact(
			 
			'featuredClient',
// 			'cities',
			'blogdetails',
// 			'testimonialsdetails',
// 			'subcategory',
// 			'entranceExam',
			'studyAbroad'
		));
	}

	public function saveEnquiry(Request $request)
	{
		if ($request->ajax()) {
			$validator = Validator::make($request->all(), [
				'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
				'email' => 'required|email|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',
				'mobile' => 'required|numeric',
				'kw_text' => 'required',
			]);

			if ($validator->fails()) {
				$errorsBag = $validator->getMessageBag()->toArray();

				return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
			}
			$lead = new Lead;
			$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
			$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
			$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
			$lead->name = $name;
			$lead->email = $request->input('email');

			$lead->lead_form = $request->input('lead_form');
			$lead->from_page = filter_var($request->input('from_page'), FILTER_SANITIZE_STRING);
			$citySlug = $request->input('city_id');
			$cityName = $citySlug ? ucwords(str_replace('-', ' ', $citySlug)) : null;

			if (!empty($request->location)) {

				$zone = Zone::find($request->location);

				if ($zone) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;

					$city = Citieslists::find($zone->city_id);
					if ($city) {
						$lead->city_id = $city->id;
						$lead->city_name = $city->city;
					}
				}

			} else {

				$city = $cityName
					? Citieslists::where('city', $cityName)->first()
					: null;

				if ($city) {
					$lead->city_id = $city->id;
					$lead->city_name = $city->city;
				} else {
					// fallback
					$lead->city_name = $cityName ?: 'none';
				}
			}


			if ($request->has('b_end')) {
				$lead->b_end = $request->input('b_end');
			}

			$mobile = ltrim($request->input('mobile'), '0');
			$mobile = trim($mobile);
			$newmobile = preg_replace('/\s+/', '', $mobile);
			$lead->mobile = $newmobile;
			$keyword = Keyword::where('keyword', $request->input('kw_text'))->first();

			if (!empty($keyword)) {
				$lead->kw_id = $keyword->id;
				$lead->kw_text = $keyword->keyword;

			} else {
				$lead->kw_id = 0;
				$lead->kw_text = $request->input('kw_text');
			}


			$lead->status_id = Status::where('name', 'LIKE', 'New Lead')->first()->id;
			$lead->status_name = Status::where('name', 'LIKE', 'New Lead')->first()->name;
			$lead->remark = $request->input('remark');
			$lead->created_by = 101;

			$checklead = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->where('city_name', $cityName)->get()->count();
			if ($checklead > 0) {
				$currentdate = date('Y-m-d');
				$lastDate = date('', strtotime($currentdate . '- 4 day'));
				$checkday = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->whereDate('created_at', '>', date_format(date_create($lastDate), 'Y-m-d'))->get()->count();

				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);
				}


			} else {
				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);

				}
			}


		}

	}


	public function saveEnquiryWithoutZone(Request $request)
	{


		if ($request->ajax()) {

			$validator = Validator::make($request->all(), [
				'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
				'email' => 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',
				'mobile' => 'required|numeric',
				//	'phone' 	=> 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im',				
				'kw_text' => 'required',
				'terms' => 'accepted',
				// 'code' => 'required',
			]);

			if ($validator->fails()) {
				$errorsBag = $validator->getMessageBag()->toArray();

				return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
			}

			$lead = new Lead;
			$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
			$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
			$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
			$lead->name = $name;
			$lead->email = $request->input('email');
			$lead->lead_form = $request->input('lead_form');
			$lead->from_page = filter_var($request->input('from_page'), FILTER_SANITIZE_STRING);

			$citySlug = $request->input('city_id');
			$cityName = $citySlug ? ucwords(str_replace('-', ' ', $citySlug)) : null;

			if (!empty($request->location)) {

				$zone = Zone::find($request->location);

				if ($zone) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;

					$city = Citieslists::find($zone->city_id);
					if ($city) {
						$lead->city_id = $city->id;
						$lead->city_name = $city->city;
					}
				}

			} else {

				$city = $cityName
					? Citieslists::where('city', $cityName)->first()
					: null;

				if ($city) {
					$lead->city_id = $city->id;
					$lead->city_name = $city->city;
				} else {
					// fallback
					$lead->city_name = $cityName ?: 'none';
				}
			}


			if ($request->has('b_end')) {
				$lead->b_end = $request->input('b_end');
			}

			if ($request->frmcheck) {
				$lead->frmcheck = json_encode($request->frmcheck);
			}
			$mobile = ltrim($request->input('mobile'), '0');
			$mobile = trim($mobile);
			$newmobile = preg_replace('/\s+/', '', $mobile);
			$lead->mobile = $newmobile;
			if ($request->input(key: 'code')) {
				$lead->code = $request->input(key: 'code');
			}
			$kw_text = filter_var($request->input('kw_text'), FILTER_SANITIZE_STRING);
			$kw_text = preg_replace('/[^A-Za-z0-9]/', ' ', $kw_text);
			$kw_text = preg_replace('/\s+/', ' ', str_replace('&', '', trim($kw_text)));
			$keyword = Keyword::where('keyword', $kw_text)->first();

			if (!empty($keyword)) {
				$lead->kw_id = $keyword->id;
				$lead->kw_text = $keyword->keyword;
				$course_name = $keyword->keyword;
			} else {
				$lead->kw_id = 0;
				$lead->kw_text = $request->input('kw_text');
				$course_name = $request->input('kw_text');
			}

			$status = Status::where('name', 'New Lead')->first();
			if (!empty($status)) {
				$lead->status_id = $status->id;
				$lead->status_name = $status->name;
			}
			$lead->remark = $request->input('remark');
			$lead->created_by = 101;
			$lead->terms = $request->terms;
			if ($request->zone) {

				$zone = Zone::find($request->zone);
				$lead->zone_id = $zone->id;
				$lead->zone = $zone->zone;
			} else {
				if (!empty($city->id)) {
					$zone = Zone::where('city_id', $city->id)->first();
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;
				}
			}

			$today = date('Y-m-d');
			$checklead = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->where('city_name', $cityName)->whereDate('created_at', '=', date_format(date_create($today), 'Y-m-d'))->get()->count();

			$currentdate = date('Y-m-d');
			$lastDate = date('Y-m-d', strtotime($currentdate . '- 4 day'));

			$checkday = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->whereDate('created_at', '>', date_format(date_create($lastDate), 'Y-m-d'))->get()->count();

			if (!empty($checklead) && $checklead > 0) {
				return response()->json([
					'statusCode' => 1,
					'response' => [
						'responseCode' => 200,
						'payload' => '',
						'message' => 'Follow Up created successfully'
					]
				], 200);
			} else if (!empty($checkday) && $checkday > 0) {
				$lead->duplicate = '1';
				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					//leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);

				}
			} else {

				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);
				}
			}
		}
	}

	public function validateStep(Request $request)
	{

		$step = $request->step;
		// dd($request->all());
		$rules = [];

		if ($step == 1) {
			$rules = [
				'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
				'email' => 'nullable|email|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',


				'mobile' => [
					'required',
					'regex:/^(\+?[1-9]\d{1,14}|0?[6-9]\d{9})$/'
				],
				'location' => 'required',
				'code' => 'required',
			];
				$messages = [
			'name.required'     => 'Full name is required.',
			'email.required'    => 'Email is required.',
			'email.email'       => 'Email is invalid.',
			'mobile.required'   => 'Phone number is required.',
			'mobile.regex'      => 'Please enter a valid number.',
			'location.required' => 'Your location is required.',
			'code.required'     => 'Country code is required.',
			];
		}

		if ($step == 2) {
			$rules = [
				'age' => 'required',
				'frmcheck' => 'required|array',
				'frmcheck.*' => 'required',
				'plan' => 'required',
				'kw_text' => 'required',
				'experience' => 'required',
			];

			$messages = [
				'age' => 'Please select age',
				'plan' => 'Please select When you want',
				'experience' => 'Please select experience',
				'frmcheck.required' => 'Please select your experience level',
				'frmcheck.min' => 'Please select at least one option',
			];
		}

		if ($step == 3) {
			$rules = [
				'remark' => 'required|max:500',
			];

			$messages = [
				'remark' => 'Please Enter you message',
			];
		}

		$validator = Validator::make($request->all(), $rules, $messages);

		if ($validator->fails()) {

			$errorsBag = $validator->getMessageBag()->toArray();
			return response()->json(['status' => false, 'errors' => $errorsBag], 400);
		}

		return response()->json(['status' => true]);
	}

	public function saveEnquiryContact(Request $request)
	{

		if ($request->ajax()) {

			$validator = Validator::make($request->all(), [
				'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
				'email' => 'required|regex:/^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i',
				'mobile' => 'required|numeric',
				'subject' => 'required',


			]);

			if ($validator->fails()) {
				$errorsBag = $validator->getMessageBag()->toArray();

				return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
			}

			$lead = new Contacts;
			$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
			$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
			$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
			$lead->name = $name;
			$lead->email = $request->input('email');
			$lead->mobile = $request->input('mobile');
			$lead->subject = filter_var($request->input('subject'), FILTER_SANITIZE_STRING);

			$message = filter_var($request->input('message'), FILTER_SANITIZE_STRING);
			$message = preg_replace('/[^A-Za-z0-9]/', ' ', $message);
			$message = preg_replace('/\s+/', ' ', str_replace('&', '', trim($message)));
			$lead->message = $message;


			if ($lead->save()) {

				return response()->json([
					'statusCode' => 1,
					'response' => [
						'responseCode' => 200,
						'payload' => '',
						'message' => 'Form submited successfully'
					]
				], 200);
			} else {
				return response()->json([
					'statusCode' => 1,
					'response' => [
						'responseCode' => 200,
						'payload' => '',
						'message' => 'Some Error Follow up'
					]
				], 200);

			}
		}
	}

	public function saveTwoEnquiry(Request $request)
	{
//   dd($request->all());
		if ($request->ajax()) {

			$validator = Validator::make(
				$request->all(),
				[
					'name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:32',
					'mobile' => 'required|numeric',
					'kw_text' => 'required',
					'remark' => 'required',
					'terms' => 'required',
				],
				[
					'name' => 'Full name is required.',
					'mobile' => 'Phone no is required',
					'kw_text' => 'Service is required',
					'remark' => 'Remarks is required',
					'terms' => 'terms is required',
				]
			);

			if ($validator->fails()) {
				$errorsBag = $validator->getMessageBag()->toArray();
				return response()->json(['status' => 1, 'errors' => $errorsBag], 400);
			}

			$lead = new Lead;
			$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
			$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
			$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
			$lead->name = $name;
			$lead->email = $request->input('email');
			$lead->lead_form = $request->input('lead_form');
			$lead->from_page = filter_var($request->input('from_page'), FILTER_SANITIZE_STRING);
			$citySlug = $request->input('city_id');
			$cityName = $citySlug ? ucwords(str_replace('-', ' ', $citySlug)) : null;
 
			if (!empty($request->location)) {

			if (is_numeric($request->location)) {
				 
				$zone = Zone::find($request->location); 
				if (!empty($zone)) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;

					$city = Citieslists::find($zone->city_id);
 

					if (!empty($city)) {
						$lead->city_id = $city->id;
						$lead->city_name = $city->city;
					}
				}
			}else{
 
					$city = Citieslists::where('city',$request->location)->first();
					if (!empty($city)) {
						$lead->city_id = $city->id;
						$lead->city_name = $city->city;

					$zone = Zone::where('city_id',$city->id)->first();

					if (!empty($zone)) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;

					}
					}
			}

			} else {
 
				$city = $cityName
					? Citieslists::where('city', $cityName)->first()
					: null;

				if (!empty($city)) {
					$lead->city_id = $city->id;
					$lead->city_name = $city->city;

					$zone = Zone::where('city_id',$city->id)->first();
					if (!empty($zone)) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;
					}

				} else {
					// fallback
					$lead->city_name = $cityName ?: 'none';
				}
			}


			if ($request->has('b_end')) {
				$lead->b_end = $request->input('b_end');
			}

			$mobile = ltrim($request->input('mobile'), '0');
			$mobile = trim($mobile);
			$newmobile = preg_replace('/\s+/', '', $mobile);
			$lead->mobile = $newmobile;
			$lead->code = $request->code;
			$kw_text = filter_var($request->input('kw_text'), FILTER_SANITIZE_STRING);
			$kw_text = preg_replace('/[^A-Za-z0-9]/', ' ', $kw_text);
			$kw_text = preg_replace('/\s+/', ' ', str_replace('&', '', trim($kw_text)));
			$keyword = Keyword::where('keyword', $kw_text)->first();

			if (!empty($keyword)) {
				$lead->kw_id = $keyword->id;
				$lead->kw_text = $keyword->keyword;

			} else {
				$lead->kw_id = 0;
				$lead->kw_text = $request->input('kw_text');
			}
			$lead->remark = $request->input('remark');
			$lead->age = $request->input('age');
			$lead->experience = $request->input('experience');
			$lead->plan = $request->input('plan');
			$lead->created_by = 101;
			$lead->terms = $request->terms;


			$lead->status_id = Status::where('name', 'LIKE', 'New Lead')->first()->id;
			$lead->status_name = Status::where('name', 'LIKE', 'New Lead')->first()->name;
			$lead->remark = $request->input('remark');
			$lead->created_by = 101;

			if ($request->frmcheck) {
				$lead->frmcheck = json_encode($request->frmcheck);
			}

			$today = date('Y-m-d');
			$checklead = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->where('city_name', $cityName)->whereDate('created_at', '=', date_format(date_create($today), 'Y-m-d'))->get()->count();
			//echo "<pre>";print_r($checklead);die;
			$currentdate = date('Y-m-d');
			$lastDate = date('Y-m-d', strtotime($currentdate . '- 4 day'));

			$checkday = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->whereDate('created_at', '>', date_format(date_create($lastDate), 'Y-m-d'))->get()->count();
 
			if (!empty($checklead) && $checklead > 0) {
				return response()->json([
					'statusCode' => 1,
					'response' => [
						'responseCode' => 200,
						'payload' => '',
						'message' => 'Follow Up created successfully'
					]
				], 200);
			} else if (!empty($checkday) && $checkday > 0) {
				$lead->duplicate = '1';
				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					//leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);

				}
			} else {

				if ($lead->save()) {

					$followUp = new LeadFollowUp;
					$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
					$followUp->remark = $request->input('remark');
					//	$followUp->expected_date_time = date('Y-m-d H:i:s');
					$followUp->lead_id = $lead->id;
					//$followUp->remark_by =Auth::user()->id;
					$followUp->save();

					leadassignWithoutZoneCounsellor($lead);

					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Follow Up created successfully'
						]
					], 200);
				} else {
					return response()->json([
						'statusCode' => 1,
						'response' => [
							'responseCode' => 200,
							'payload' => '',
							'message' => 'Some Error Follow up'
						]
					], 200);
				}
			}
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function autoFormSave(Request $request)
	{
		$cityname = ucwords(str_replace("-", " ", $request->input('city_id')));
		$city = Citieslists::where('city', 'LIKE', ucwords(str_replace("-", " ", $request->input('city_id'))))->first();
		$lead = new Lead;
		if (!empty($city->id)) {
			$lead->city_id = $city->id;
			$lead->city_name = $city->city;
		} else {
			if ($cityname) {
				$lead->city_name = $cityname;
			} else {
				$lead->city_name = 'none';
			}
		}
		$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
		$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
		$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
		$lead->name = $name;

		if ($request->input('email') != '') {

			$lead->email = $request->input('email');
		}
		$mobile = ltrim($request->input('mobile'), '0');
		$mobile = trim($mobile);
		$newmobile = preg_replace('/\s+/', '', $mobile);
		$lead->mobile = $newmobile;
		$lead->lead_form = $request->input('lead_form');
		$lead->from_page = filter_var($request->input('from_page'), FILTER_SANITIZE_STRING);
		$keyword = Keyword::where('keyword', 'LIKE', $request->input('kw_text'))->get();
		if (!empty($keyword)) {
			$lead->kw_id = $keyword[0]->id;
			$lead->kw_text = $keyword[0]->keyword;
			$bucketIndex = $keyword[0]->bucket;
		}
		if ($request->has('b_end')) {
			$lead->b_end = $request->input('b_end');
		}
		$lead->status_id = Status::where('name', 'LIKE', 'New Lead')->first()->id;
		$lead->status_name = Status::where('name', 'LIKE', 'New Lead')->first()->name;
		$lead->remark = $request->input('remark');
		$lead->created_by = '1';

		$today = date('Y-m-d');
		$checklead = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->where('city_name', $cityname)->whereDate('created_at', '=', date_format(date_create($today), 'Y-m-d'))->get()->count();

		$currentdate = date('Y-m-d');
		$lastDate = date('Y-m-d', strtotime($currentdate . '- 4 day'));

		$checkday = Lead::where('mobile', $newmobile)->where('kw_text', $request->input('kw_text'))->whereDate('created_at', '>', date_format(date_create($lastDate), 'Y-m-d'))->get()->count();

		if (!empty($checklead) && $checklead > 0) {

		} else if (!empty($checkday) && $checkday > 0) {
			$lead->duplicate = '1';
			if ($lead->save()) {

				$followUp = new LeadFollowUp;
				$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
				$followUp->remark = $request->input('remark');

				$followUp->lead_id = $lead->id;

				$followUp->save();
			}
		} else {

			if ($lead->save()) {

				$followUp = new LeadFollowUp;
				$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
				$followUp->remark = $request->input('remark');
				//	$followUp->expected_date_time = date('Y-m-d H:i:s');
				$followUp->lead_id = $lead->id;
				//$followUp->remark_by =Auth::user()->id;
				$followUp->save();


			}
		}
		return response()->json([
			'status' => true,
			'response' => [
				'responseCode' => 200,
				'payload' => '',
				'message' => 'Lead successfully'
			]
		], 200);


	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if ($request->ajax()) {

			$lead = new Lead;
			$citySlug = $request->input('city_id');
			$cityName = $citySlug ? ucwords(str_replace('-', ' ', $citySlug)) : null;

			if (!empty($request->location)) {

				$zone = Zone::find($request->location);

				if ($zone) {
					$lead->zone_id = $zone->id;
					$lead->zone = $zone->zone;

					$city = Citieslists::find($zone->city_id);
					if ($city) {
						$lead->city_id = $city->id;
						$lead->city_name = $city->city;
					}
				}

			} else {

				$city = $cityName
					? Citieslists::where('city', $cityName)->first()
					: null;

				if ($city) {
					$lead->city_id = $city->id;
					$lead->city_name = $city->city;
				} else {
					// fallback
					$lead->city_name = $cityName ?: 'none';
				}
			}


			$string = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
			$string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
			$name = preg_replace('/\s+/', ' ', str_replace('&', '', trim($string)));
			$lead->name = $name;
			if ($request->input('email') != '') {

				$lead->email = $request->input('email');
			}
			$lead->mobile = $request->input('mobile');
			$lead->lead_form = $request->input('lead_form');
			$keyword = Keyword::where('keyword', 'LIKE', $request->input('kw_text'))->get();
			if (!empty($keyword)) {
				$lead->kw_id = $keyword[0]->id;
				$lead->kw_text = $keyword[0]->keyword;
				$bucketIndex = $keyword[0]->bucket;
			} else {
				return response()->json(['status' => 1, 'msg' => 'Keyword not found'], 404);
			}
			if ($request->has('b_end')) {
				$lead->b_end = $request->input('b_end');
			}
			$lead->status_id = Status::where('name', 'LIKE', 'New Lead')->first()->id;
			$lead->status_name = Status::where('name', 'LIKE', 'New Lead')->first()->name;
			$lead->remark = $request->input('remark');
			$lead->created_by = '1';

			if ($lead->save()) {
				$followUp = new LeadFollowUp;
				$followUp->status = Status::where('name', 'LIKE', 'New Lead')->first()->id;
				$followUp->remark = $request->input('remark');
				//	$followUp->expected_date_time = date('Y-m-d H:i:s');
				$followUp->lead_id = $lead->id;
				//$followUp->remark_by =Auth::user()->id;
				$followUp->save();
				leadassignWithoutZoneCounsellor($lead);
				return response()->json(['status' => 1, 'msg' => 'Lead added successfully'], 200);
			}

		}
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function searchUser(Request $request)
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Credentials: true');
		if ($request->wantsJson()) {
			$query = DB::table('users');
			$query = $query->select('users.id', 'users.first_name', 'users.last_name');
			$str = '';
			if ($request->input('q') != "") {
				$str = trim($request->input('q'));
				$query = $query->orWhere('users.first_name', 'LIKE', '%' . $str . '%');
				$query = $query->orWhere('users.last_name', 'LIKE', '%' . $str . '%');
			}
			$query = $query->get();
			return response()->json(['status' => 1, 'users' => $query]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function searchKWcc(Request $request)
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Credentials: true');
		if ($request->wantsJson()) {
			$query = DB::table('keyword')
				->select('keyword.keyword', 'keyword.id');
			$str = '';
			if ($request->input('q') != "") {
				$str = trim($request->input('q'));
				$query = $query->orWhere('keyword.keyword', 'LIKE', '%' . $str . '%');
				$query = $query->orderBy(DB::raw("CASE WHEN keyword.keyword LIKE '" . $str . "%' THEN 1 ELSE 2 END"));

				$query = $query->distinct()->get();
			}
			return response()->json(['status' => 1, 'areas' => $query]);
		}
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */

	public function searchKW(Request $request)
	{

		$query = DB::table('keyword')
			->select('keyword.keyword', 'keyword.id');
		$str = '';
		if ($request->input('search_kw') != "") {
			$str = trim($request->input('search_kw'));
			$query = $query->orWhere('keyword.keyword', 'LIKE', '%' . $str . '%');
			$query = $query->orderBy(DB::raw("CASE WHEN keyword.keyword LIKE '" . $str . "%' THEN 1 ELSE 2 END"));

			$query = $query->distinct()->get();

		}
		$html = "";
		foreach ($query as $q) {
			$html .= "<li><a href='#'><i class='fa fa-search'></i>" . trim($q->keyword) . "</a></li>";
		}
		$query = DB::table('clients')
			->select('clients.business_name');
		$str = '';
		if ($request->input('search_kw') != "") {
			$str = trim($request->input('search_kw'));
			$query = $query->orWhere('clients.business_name', 'LIKE', '%' . $str . '%');
			$query = $query->orderBy(DB::raw("CASE WHEN clients.business_name LIKE '" . $str . "%' THEN 1 ELSE 2 END"), 'DESC');
			$query = $query->distinct()->get();
		}

		foreach ($query as $q) {
			$html .= "<li><a href='#'><i class='fa fa-search'></i>" . trim($q->business_name) . "</a></li>";
		}
		return response()->json(['status' => 1, 'message' => $html]);
	}


	/**
	 * Get matches trainers based on ajax.
	 *
	 * @param  string
	 * @return JSON Object having matched course details
	 */
	public function getCountryCode(Request $request)
	{
		if ($request->ajax()) {

			$len = strlen($request->input('id'));
			if (null == $request->input('id')) {
				$countryies = Citieslists::whereIn('id', ['278', '596', '961', '428'])->get();

			} else {
				// $countryies = DB::table('citylists');
				// $countryies = $countryies->where(function ($query) use ($request) {
				// 	$query->where('city', 'LIKE', '%' . $request->input('id') . '%');
				// });
				// $countryies = $countryies->get();

					$countryies = DB::table('zones')
					->join('citylists', 'citylists.id', '=', 'zones.city_id')
					->where(function ($query) use ($request) {
					$q = $request->input('id');
					$query->where('zones.zone', 'LIKE', "%$q%")
					->orWhere('citylists.city', 'LIKE', "%$q%");				 
					})
					->select('zones.id as zone_id', 'zones.zone', 'citylists.city','zones.pincode')
					->distinct()
					->get();


			}

			$html = '<div class="resultCode"><ul>';
			if (!empty($countryies)) {

				foreach ($countryies as $data) {

					$pos = stripos($data->city, $request->input('id'));
					if ($pos >= 0) {
						$str = substr($data->city, $pos, $len);
						$strong_str = "<strong>" . $str . "</strong>";
						$final_str = str_replace($str, $strong_str, $data->city);
						$html .= '<li><a data-city="' . strtolower($data->city) . '" 
							data-area="' . strtolower($data->zone) . '">
							' . ucwords($final_str) . ', ' . ucwords($data->zone) . '
						</a>
						</li>';

						 
					} else {

						$html .= '<li><a data-city="' . strtolower($data->city) . '">' . ucwords($data->city) . '</a>
						</li>';

					}
				}

			}

			$zones = DB::table('zones')
					->join('citylists', 'citylists.id', '=', 'zones.city_id')
					->where(function ($query) use ($request) {
					$q = $request->input('id');
					$query->where('zones.zone', 'LIKE', "%$q%")					 
					->orWhere('zones.pincode', 'LIKE', "%$q%");
					})
					->select('zones.id as zone_id', 'zones.zone', 'citylists.city','zones.pincode')
					->distinct()
					->get();

			 
			if (!empty($zones)) {

				foreach ($zones as $zone) {

					$pos = stripos($zone->zone, $request->input('id'));
					if ($pos >= 0) {
						$str = substr($zone->zone, $pos, $len);
						$strong_str = "<strong>" . $str . "</strong>";
						$final_str = str_replace($str, $strong_str, $zone->zone);
						$html .= '<li><a data-city="' . strtolower($data->city) . '" 
							data-area="' . strtolower($data->zone) . '">
							' . ucwords($final_str) . ', ' . ucwords($data->zone) . ', ' . ucwords($data->pincode) . '
						</a>
						</li>';


						$html .= '<li><a data-city="' . strtolower($zone->city) . '" 
							data-area="' . strtolower($zone->zone) . '">
							' . ucwords($final_str) . ', ' . ucwords($zone->zone) . ', ' . ucwords($zone->pincode) . '
						</a>
						</li>';

 
					} else {

						$html .= '<li><a data-city="' . strtolower($zone->city) . '">' . ucwords($zone->zone) . ', ' . ucwords($zone->city) . '></a></li>';

					}
				}

			}


			$areas = DB::table('citylists');
			$areas = $areas->join('zones', 'citylists.id', '=', 'zones.city_id');
			$areas = $areas->join('areas', 'zones.id', '=', 'areas.zone_id');

			$areas = $areas->where(function ($query) use ($request) {
				$query->where('area', 'LIKE', '%' . $request->input('id') . '%');
			});

			$areas = $areas->get();

			if (!empty($areas)) {

				foreach ($areas as $area) {

					$pos = stripos($area->area, $request->input('id'));
					if ($pos >= 0) {
						$str = substr($area->area, $pos, $len);
						$strong_str = "<strong>" . $str . "</strong>";
						$final_str = str_replace($str, $strong_str, $area->area);

						$html .= '<li><a data-city="' . strtolower($area->city) . '" data-area="" data-zone="">' . ucwords($final_str) . ', ' . ucwords($area->city) . '</a></li>';
					} else {
						$html .= '<li><a data-city="' . strtolower($area->city) . '">' . ucwords($area->area) . ', ' . ucwords($area->city) . '</a></li>';
					}
				}
			}
			$html .= '</ul></div>';
			echo $html;
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getKWList(Request $request)
	{
		$kwdsList = Keyword::where('child_category_id', $request->input('child_cat_id'))
			->where('parent_category_id', $request->input('parent_cat_id'))
			->select('keyword')
			->distinct()
			->get();
		return response()->json(['status' => 1, 'message' => $kwdsList]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getCityKWList(Request $request)
	{
		$citiesList = DB::table('assigned_kwds')
			->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
			->select('citylists.city')
			->distinct()
			->get();
		return response()->json(['status' => 1, 'message' => $citiesList]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function callHtml($html)
	{
		if (view()->exists('client.html.' . $html)) {
			return view('client.html.' . $html);
		} else {
			return view('404');
		}
	}

	/**
	 * Display a listing of the client categories resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function clientCategories(Request $request)
	{
		$clientCategories = ClientCategory::all();
		return view('client.client_categories', ['clientCategories' => $clientCategories]);
	}


	/**
	 * Display a listing of the client categories resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function cityCategories(Request $request, $city, $part_slug)
	{
		$part_id = ParentCategory::where('parent_slug', $part_slug)->first();
		$subcategory = DB::table('keyword')
			->select('keyword.*', 'keyword.id as key_id', 'keyword.faqq1', 'keyword.faqa1', 'keyword.faqq2', 'keyword.faqa2', 'keyword.faqq3', 'keyword.faqa3', 'keyword.faqq4', 'keyword.faqa4', 'keyword.faqq5', 'keyword.faqa5', 'keyword.meta_title', 'keyword.meta_description', 'keyword.meta_keywords', 'keyword.top_description', 'keyword.bottom_description', 'keyword.ratingvalue', 'keyword.ratingcount')
			->where('keyword.parent_category_id', $part_id->id)->get();

		$cateoryClient = DB::table('clients')
			->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
			->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
			->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
			->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
			->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count')
			->where('citylists.city', 'LIKE', $city)
			->where('clients.active_status', '1')
			->where('assigned_kwds.parent_cat_id', $part_id->id)
			//->where('assigned_kwds.sold_on_position','!=','king')
			->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
			->groupBy('client_id')
			//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
			->get();

		return view('client.courseprogram_client', ['cateoryClient' => $cateoryClient, 'subcategory' => $subcategory, 'part_id' => $part_id, 'city' => $city]);
	}
	/**
	 * Display a listing of the client categories resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function subcategories(Request $request, $city, $part_slug, $child_slug)
	{
		$part_id = ParentCategory::where('parent_slug', $part_slug)->first();
		$child_id = ChildCategory::where('child_slug', $child_slug)->first();

		$subcategory = DB::table('child_category')
			->join('parent_category', 'child_category.parent_category_id', '=', 'parent_category.id')
			->where('parent_category_id', $part_id->id)
			->select('parent_category.*', 'child_category.*')->limit(24)
			->get();


		$kwdsList = Keyword::where('child_category_id', $child_id->id)
			->where('parent_category_id', $part_id->id)
			->select('keyword')
			->distinct()
			->get();


		$subCateoryClient = DB::table('clients')
			->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
			->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
			->rightJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count,comment_content  FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
			//->join('parent_category','assigned_kwds.parent_cat_id','=','parent_category.id')	

			->select('clients.id', 'clients.business_name', 'clients.business_slug', 'clients.website', 'clients.city', 'clients.logo', 'assigned_kwds.*', 'c.rating', 'c.comment_count', 'c.comment_content')
			->where('assigned_kwds.parent_cat_id', $part_id->id)
			->where('citylists.city', 'LIKE', $city)
			->where('assigned_kwds.child_cat_id', $child_id->id)
			->groupBy('client_id')
			->get();


		$subCateoryClient = DB::table('clients')
			->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
			->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
			->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
			->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
			->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count')
			->where('citylists.city', 'LIKE', $city)
			->where('clients.active_status', '1')
			->where('assigned_kwds.child_cat_id', $child_id->id)
			//->where('assigned_kwds.sold_on_position','!=','king')
			->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
			->groupBy('client_id')
			//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
			->get();



		$clientCategories = ClientCategory::all();
		return view('client.subcourseprogram_client', ['subCateoryClient' => $subCateoryClient, 'subcategory' => $subcategory, 'part_id' => $part_id, 'child_id' => $child_id, 'kwdsList' => $kwdsList, 'city' => $city]);
	}

	/**
	 * Display a listing of the clients of categories resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function clients(Request $request, $slug = null)
	{
		try {
			if (empty($slug)) {
				throw new Exception("Slug can't be null");
			}
		} catch (\Exception $e) {
			return $e->getMessage();
		}
		$clientCategory = ClientCategory::select('id', 'name')->where('name', 'LIKE', inverse_generate_slug($slug))->first();

		if (empty($clientCategory)) {
			return redirect('/clients');
		}
		$clients = DB::table('clients')
			->join('assigned_client_categories', 'assigned_client_categories.client_id', '=', 'clients.id')
			->join(DB::raw('(SELECT comment_client_ID, COUNT(comment_ID) as comments_count, SUM(rating) as ratings_sum FROM comments GROUP BY comment_client_ID) as cmts'), 'cmts.comment_client_ID', '=', 'clients.id')
			->select('clients.*', 'assigned_client_categories.client_id', 'assigned_client_categories.client_category_id', 'cmts.*')
			->where('assigned_client_categories.client_category_id', '=', $clientCategory->id)
			->whereNull('clients.deleted_at')
			->get();
		return view('client.clients', ['clients' => $clients, 'slug' => $slug, 'clientCategory' => $clientCategory]);
	}

	/**
	 * Display a listing of the clients of categories resource.
	 *
	 * @return \Illuminate\Http\Response
	 */


	public function city(Request $request, $city = null)
	{
		try {

			$clientLists = Client::where('logo', '<>', '')->where('business_intro', '<>', '')->limit(12)->get();
			$checkcity = Client::where('logo', '<>', '')->where('city', $city)->get();
 
			if ($checkcity->isNotEmpty()) {
				$cityclients = $checkcity;				
				$clientBanner = ChildCategory::whereNotNull('child_banner')->where('child_banner', '!=', '')->first();
				$keyword = "";
 
				return view('client.cityclients', ['cityclients' => $cityclients,'clientBanner'=>$clientBanner,'keyword'=>$keyword]);

			} else {

				$clientskeyword = DB::table('clients')
					->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
					->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
					->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
					->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
					->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count', 'keyword.*')

					->where('keyword.keyword', 'LIKE', ucwords(str_replace("-", " ", $city)))

					->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
					//	->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc')
					//->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'premium\' THEN 1 WHEN \'platinum\' THEN 2 WHEN \'royal\' THEN 3 WHEN \'preferred\' THEN 4 END)'),'asc')
					->groupBy('client_id')
					//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
					->get();

				$reviewsClientsList = DB::table('clients')
					->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
					->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
					->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
					->rightJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count,comment_content  FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
					->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count', 'c.comment_content')
					->where('keyword.keyword', 'LIKE', ucwords(str_replace("-", " ", $city)))
					->groupBy('client_id')
					->get();


				$parentCategories = DB::table('keyword')
					->join('parent_category', 'keyword.parent_category_id', '=', 'parent_category.id')
					->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
					->select('keyword.*', 'parent_category.*', 'child_category.*', 'parent_category.id as key_id', 'parent_category.faqq1', 'parent_category.faqa1', 'parent_category.faqq2', 'parent_category.faqa2', 'parent_category.faqq3', 'parent_category.faqa3', 'parent_category.faqq4', 'parent_category.faqa4', 'parent_category.faqq5', 'parent_category.faqa5', 'parent_category.meta_title', 'parent_category.meta_description', 'parent_category.meta_keywords', 'parent_category.top_description', 'parent_category.bottom_description', 'parent_category.ratingvalue', 'parent_category.ratingcount', 'keyword.child_category_id')
					->groupBy('child_category.child_slug')
					->where('parent_category.parent_slug', $city)->first();


				$keywordlist = DB::table('keyword')
					->join('parent_category', 'keyword.parent_category_id', '=', 'parent_category.id')
					->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
					->select('keyword.*', 'parent_category.*', 'child_category.*', 'keyword.id as key_id', 'keyword.faqq1', 'keyword.faqa1', 'keyword.faqq2', 'keyword.faqa2', 'keyword.faqq3', 'keyword.faqa3', 'keyword.faqq4', 'keyword.faqa4', 'keyword.faqq5', 'keyword.faqa5', 'keyword.meta_title', 'keyword.meta_description', 'keyword.meta_keywords', 'keyword.top_description', 'keyword.bottom_description', 'keyword.ratingvalue', 'keyword.ratingcount', 'keyword.child_category_id')
					->groupBy('child_category.child_slug')
					->where('parent_category.parent_slug', $city)->get();

				if (!empty($parentCategories)) {


					$clientskeyword = DB::table('clients')
						->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
						->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
						->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
						->join('parent_category', 'keyword.parent_category_id', '=', 'parent_category.id')
						->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
						->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count', 'keyword.*')


						->where('parent_category.parent_slug', $city)
						->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
						//	->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc')
						//->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'premium\' THEN 1 WHEN \'platinum\' THEN 2 WHEN \'royal\' THEN 3 WHEN \'preferred\' THEN 4 END)'),'asc')
						->groupBy('client_id')
						//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
						->get();

					return view('client.parentKeyword', ['clientskeyword' => $clientskeyword, 'keyword' => $parentCategories, 'reviewsClientsList' => $reviewsClientsList, 'clientLists' => $clientLists, 'city' => $city, 'keywordlist' => $keywordlist]);


				} else {


					$childCategories = DB::table('keyword')
						->join('parent_category', 'keyword.parent_category_id', '=', 'parent_category.id')
						->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
						->select('keyword.*', 'parent_category.*', 'child_category.*', 'child_category.id as key_id', 'child_category.faqq1', 'child_category.faqa1', 'child_category.faqq2', 'child_category.faqa2', 'child_category.faqq3', 'child_category.faqa3', 'child_category.faqq4', 'child_category.faqa4', 'parent_category.faqq5', 'child_category.faqa5', 'child_category.meta_title', 'child_category.meta_description', 'child_category.meta_keywords', 'child_category.top_description', 'parent_category.bottom_description', 'child_category.ratingvalue', 'child_category.ratingcount', 'keyword.child_category_id')
						->where('child_category.child_slug', $city)->first();

					if (!empty($childCategories)) {


						$clientskeyword = DB::table('clients')
							->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
							->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
							->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
							->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
							->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
							->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count', 'keyword.*')


							->where('child_category.child_slug', $city)
							->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
							//	->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc')
							//->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'premium\' THEN 1 WHEN \'platinum\' THEN 2 WHEN \'royal\' THEN 3 WHEN \'preferred\' THEN 4 END)'),'asc')
							->groupBy('client_id')
							//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
							->get();

						return view('client.childKeyword', ['clientskeyword' => $clientskeyword, 'keyword' => $childCategories, 'reviewsClientsList' => $reviewsClientsList, 'city' => $city, 'keywordlist' => $keywordlist]);

					} else {



						$keyword = DB::table('keyword')
							->join('parent_category', 'keyword.parent_category_id', '=', 'parent_category.id')
							->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
							->where('keyword', 'LIKE', ucwords(str_replace("-", " ", $city)))
							->select('keyword.*', 'parent_category.*', 'child_category.*', 'keyword.id as key_id', 'keyword.faqq1', 'keyword.faqa1', 'keyword.faqq2', 'keyword.faqa2', 'keyword.faqq3', 'keyword.faqa3', 'keyword.faqq4', 'keyword.faqa4', 'keyword.faqq5', 'keyword.faqa5', 'keyword.meta_title', 'keyword.meta_description', 'keyword.meta_keywords', 'keyword.top_description', 'keyword.bottom_description', 'keyword.ratingvalue', 'keyword.ratingcount', 'keyword.heading', 'keyword.courseabout', 'keyword.paragraph1', 'keyword.paragraph2', 'keyword.paragraph3', 'keyword.paragraph4', 'keyword.paragraph5', 'keyword.paragraph6')
							->first();


						if (!empty($keyword)) {
							$keyword = $keyword;


						} else {
							$keyword = DB::table('keyword')
								->join('child_category', 'keyword.child_category_id', '=', 'child_category.id')
								->join('parent_category', 'child_category.parent_category_id', '=', 'parent_category.id') // Added join for parent_category
								->select(
									'keyword.*',
									'child_category.*',
									'parent_category.*',
									'keyword.id as key_id',
									'keyword.faqq1',
									'keyword.faqa1',
									'keyword.faqq2',
									'keyword.faqa2',
									'keyword.faqq3',
									'keyword.faqa3',
									'keyword.faqq4',
									'keyword.faqa4',
									'keyword.faqq5',
									'keyword.faqa5',
									'keyword.meta_title',
									'keyword.meta_description',
									'keyword.meta_keywords',
									'keyword.top_description',
									'keyword.bottom_description',
									'keyword.ratingvalue',
									'keyword.ratingcount',
									'keyword.child_category_id',
									'child_category.child_slug',
									'keyword.heading',
									'keyword.courseabout',
									'keyword.paragraph1',
									'keyword.paragraph2',
									'keyword.paragraph3',
									'keyword.paragraph4',
									'keyword.paragraph5',
									'keyword.paragraph6'
								)
								->where('keyword.child_slug', str_replace('-', '', $city)) // Remove hyphen from $city
								->first();



							if (!empty($keyword)) {
								$keyword = $keyword;
							} else {


								$clients = Client::where('business_slug', $city)->where('logo', '<>', '')->get();
								$cities = Citieslists::select('id', 'city')->get();

								$clientLists = Client::where('logo', '<>', '')->where('business_intro', '<>', '')->where('city', 'noida')->where('paid_status', '1')->limit(12)->get();
								if (count($clients) > 0) {
									foreach ($clients as $c) {
										$client = $c;
										break;
									}

									$comments = Comment::where('comment_client_ID', $client->id)
										->where('comment_approved', 1)
										->orderBy('created_at', 'desc')
										->paginate(10);

									$sum = Comment::where('comment_client_ID', $client->id)
										->where('comment_approved', 1)
										->sum('rating');
									$count = Comment::where('comment_client_ID', $client->id)
										->where('comment_approved', 1)
										->count();
									$avgRating = 0;
									if ($count != 0)
										$avgRating = ($sum / ($count * 5)) * 5;

									$graphQuery = Comment::select(DB::raw('*'))
										->from(DB::raw('(SELECT COUNT(*) as count, SUM(`rating`) as sum_rating, MONTH(DATE(`created_at`)) as month, DATE(`created_at`) as created_at FROM `comments` WHERE `comment_client_ID`=' . $client->id . ' AND `comment_approved`=1 GROUP BY MONTH(DATE(`created_at`)) ORDER BY created_at desc LIMIT 0,3) AS temp'))
										->orderBy('created_at')
										->get();
									$barGraphQuery = Comment::select(DB::raw('*'))
										->from(DB::raw('(SELECT COUNT(*) as count, SUM(`rating`) as sum_rating, rating FROM `comments` WHERE `comment_client_ID`=' . $client->id . ' AND `comment_approved`=1 GROUP BY `rating`) AS temp'))
										->orderBy('rating', 'desc')
										->get();

									$assignedKwds = DB::table('assigned_kwds')
										->join('keyword', 'keyword.id', '=', 'assigned_kwds.kw_id')
										->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
										->join('child_category', 'child_category.id', '=', 'assigned_kwds.child_cat_id')
										->select('keyword.keyword', 'citylists.city', 'child_category.child_category as child_category_name')
										->where('assigned_kwds.client_id', '=', $client->id)
										->groupBy('kw_id')
										->get();

									$assignedCity = DB::table('assigned_kwds')
										->join('keyword', 'keyword.id', '=', 'assigned_kwds.kw_id')
										->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
										->join('child_category', 'child_category.id', '=', 'assigned_kwds.child_cat_id')
										->select('keyword.keyword', 'citylists.city', 'child_category.child_category as child_category_name')
										->where('assigned_kwds.client_id', '=', $client->id)
										->groupBy('assigned_kwds.city_id')
										->get();

									if (!empty($clients) && count($clients) > 0) {
										return view('client.client-detail', ['client' => $client, 'cities' => $cities, 'comments' => $comments, 'count' => $count, 'sum' => $sum, 'avgRating' => number_format($avgRating, 1, '.', ''), 'graphQuery' => $graphQuery, 'barGraphQuery' => $barGraphQuery, 'assignedKwds' => $assignedKwds, 'clientLists' => $clientLists, 'clients' => $clients, 'assignedCity' => $assignedCity]);

									} else {

										$parentCategories = ParentCategory::get();
										$childCategories = ChildCategory::get();
										$businessServices = DB::table('parent_category')
											->join('child_category', 'child_category.parent_category_id', '=', 'parent_category.id')
											->select('parent_category.*', 'child_category.*')
											->get();

										return view('client.businessServices', ['businessServices' => $businessServices, 'parentCategories' => $parentCategories, 'childCategories' => $childCategories]);
									}
								}

							}

						}

					}

				}

			}

			//   dd($clientskeyword);
			return view('client.searchkeyword', ['clientskeyword' => $clientskeyword, 'keyword' => $keyword, 'reviewsClientsList' => $reviewsClientsList, 'clientLists' => $clientLists, 'city' => $city]);
		} catch (\Exception $e) {
			return view('client.errorpage');
		}

	}





	/**
	 * Subscribe to our newsletter
	 *
	 */
	public function newsletter(Request $request)
	{
		try {
			if (null == $request->input('email')) {
				throw new Exception("Enter valid email address");
			}
		} catch (\Exception $e) {
			return response()->json(['status' => 0, 'message' => $e->getMessage()]);
		}
		$email = $request->input('email');
		Mail::send('emails.newsletter', ['email' => $email], function ($m) use ($email) {
			$m->from('info@quickdials.com', 'QuickDials');
			$m->to('info@quickdials.com', 'QuickDials')->subject('Newsletter Subscription');
		});

		return response()->json(['status' => 1, 'message' => 'Successfully subscribed to our newsletter']);
	}


	public function addLadsss(Request $request)
	{
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	}

	public function businessServices(Request $request)
	{
		$businessServices = DB::table('keyword')->get();
		$parentCategories = ParentCategory::get();
		$childCategories = ChildCategory::get();
		$businessServices = DB::table('parent_category')
			->join('child_category', 'child_category.parent_category_id', '=', 'parent_category.id')
			->select('parent_category.*', 'child_category.*')
			->get();
		return view('client.businessServices', ['businessServices' => $businessServices, 'parentCategories' => $parentCategories, 'childCategories' => $childCategories]);
	}



	public function category(Request $request)
	{
		$parentCategories = ParentCategory::get();
		$childCategories = ChildCategory::get();
		$businessServices = DB::table('parent_category')
			->join('child_category', 'child_category.parent_category_id', '=', 'parent_category.id')
			->select('parent_category.*', 'child_category.*')
			->groupBy('child_slug')
			->get();
		return view('client.businessServices', ['businessServices' => $businessServices, 'parentCategories' => $parentCategories, 'childCategories' => $childCategories]);
	}

	public function categories(Request $request, $slug)
	{
		$parentCategories = ParentCategory::get();
		$childCategories = ChildCategory::get();
		$businessServices = DB::table('parent_category')
			->join('child_category', 'child_category.parent_category_id', '=', 'parent_category.id')
			->select('parent_category.*', 'child_category.*')
			->where('parent_category.parent_slug', $slug)
			->groupBy('child_slug')
			->get();


		$keyword = DB::table('parent_category')->where('parent_slug', $slug)->first();

		if (!empty($keyword)) {
 


			$clientsList = DB::table('clients')
				->join('assigned_kwds', 'clients.id', '=', 'assigned_kwds.client_id')
				->join('keyword', 'assigned_kwds.kw_id', '=', 'keyword.id')
				->join('citylists', 'assigned_kwds.city_id', '=', 'citylists.id')
				->leftJoin(DB::raw('(SELECT SUM(rating) AS rating,comment_client_ID,COUNT(comment_ID) AS comment_count FROM comments GROUP BY comment_client_ID) c'), 'c.comment_client_ID', '=', 'clients.id')
				->select('clients.*', 'citylists.city', 'assigned_kwds.sold_on_position', 'c.rating', 'c.comment_count')
				//	->where('citylists.city','LIKE',"noida")
				//->where('clients.active_status','1')
				->where('assigned_kwds.parent_cat_id', '=', $keyword->id)
				//->where('assigned_kwds.sold_on_position','!=','king')
				->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 WHEN \'FreeListing\' THEN 3 END)'), 'asc')
				//	->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'platinum\' THEN 1 WHEN \'diamond\' THEN 2 END)'),'asc')
				//->orderby(DB::raw('(CASE `assigned_kwds`.`sold_on_position` WHEN \'premium\' THEN 1 WHEN \'platinum\' THEN 2 WHEN \'royal\' THEN 3 WHEN \'preferred\' THEN 4 END)'),'asc')
				->groupBy('client_id')
				//->orderby(DB::raw('(CASE `clients`.`certified_status` WHEN \'1\' THEN 1 END)'),'DESC')		
				->get();
			$city = "";
			return view('client.category', ['businessServices' => $businessServices, 'parentCategories' => $parentCategories, 'childCategories' => $childCategories, 'keyword' => $keyword, 'clientsList' => $clientsList, 'city' => $city]);
		} else {

			return view('client.errorpage');

		}

	}



	public function child(Request $request, $child_slug)
	{
		// $keyword = ChildCategory::where('child_slug', $child_slug)->first();
		// dd($keyword);

			$keyword = DB::table('parent_category')
			->join('child_category', 'child_category.parent_category_id', '=', 'parent_category.id')
			->select('parent_category.*', 'child_category.*')
			->where('child_category.child_slug', $child_slug)
			->groupBy('child_slug')
			->first();
 
		if (!empty($keyword)) {
			$childCategory = DB::table('child_category')
				->join('keyword', 'keyword.child_category_id', '=', 'child_category.id')
				->select('child_category.*', 'keyword.*')
				->where('child_slug', $child_slug)
				->groupBy('keyword')
				->get();

			$part_id = DB::table('parent_category')->where('id', operator: $keyword->parent_category_id)->first();
			$city = "";
			return view('client.child', ['childCategory' => $childCategory, 'part_id' => $part_id, 'keyword' => $keyword, 'city' => $city]);
		} else {
			return view('client.errorpage');
		}
	}





	public function weddingPannel(Request $request)
	{
		$city = "";
		$keyword = "";
		return view('client.wedding-planning', ['city' => $city, 'keyword' => $keyword]);

	}




	public function getZones($city_id)
	{

		$zones = DB::table('zones');
		$zones = $zones->join('citylists', 'citylists.id', '=', 'zones.city_id');
		$zones = $zones->where('citylists.city', $city_id);
		$zones = $zones->get();

		return response()->json($zones);
	}



}
