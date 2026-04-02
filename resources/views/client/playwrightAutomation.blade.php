@extends('client.layouts.app')
@section('title')
<?php 
 

if (!empty($keyword->meta_title)) {
$key =  $keyword->meta_title;
echo trim($key);
}  
?>
@endsection
@section('description')
<?php if (!empty($keyword->meta_description)) { $descrip = $keyword->meta_description;
 echo trim($descrip); }   ?>
@endsection
@section('keyword')
<?php if (!empty($keyword->meta_keywords)) { 	
$msg = $keyword->meta_keywords; 
$msg = preg_replace('/\s+,/', ',', $msg);
$msg = preg_replace('/\s+/', ' ', $msg);	
echo trim($msg); } ?>
@endsection

@section('content')

<script type="application/ld+json">
{
 "@context": "https://schema.org",
 "@type": "WebPage",
 "name": "{{ $key ?? 'Quick Dials' }}",
 "description": "{{ $descrip ?? $key .' in India' }}",
 "url": "{{ url()->current() }}"
} 
</script>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 third-add-section">

				 

				<img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>"
					alt="computer-courses-training">
				 

			</div>
		</div>
	</div>
	<?php 
		if (!empty($keyword) ) { ?>
	<div class="clearfix"></div>

	<div class="container">
		<div class="form-section">
			<div class="removeLeftSpace">
				<div class="hdTitle">
					@if(!empty($keyword))
								<?php
						$rating = $keyword->ratingvalue;
						$stars = 'star_4.75_new.png';
						$ext = '.png';
						switch ($rating) {
							case 0:
								$stars = 'star_1' . $ext;
								break;
							case 2:
								$stars = 'star_2' . $ext;
								break;
							case 3:
								$stars = 'star_3' . $ext;
								break;
							case 3.5:
								$stars = 'star_3.5_new' . $ext;
								break;
							case 4:
								$stars = 'star_4' . $ext;
								break;
							case 4.5:
								$stars = 'star_4.5_new' . $ext;
								break;
							case 4.75:
								$stars = 'star_4.75_new' . $ext;
								break;
							case 5:
								$stars = 'star_5_new' . $ext;
								break;
						}
										?>
								<div itemscope itemtype="https://schema.org/Product" style="font-size: 12px;font-weight: 500;">
									<div class="text-primary" itemprop="name">
										<h1 title="<?php  if (!empty($keyword->keyword)) { $key = preg_replace('/{{city}}/i', ucfirst($city), $keyword->keyword);
							echo trim($key); } ?> "><?php  if (!empty($keyword->keyword)) { $key = preg_replace('/{{city}}/i', ucfirst($area), $keyword->keyword);
							echo trim($key); } ?></h1>
									</div>
									<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
										<img loading="lazy" itemprop="image" src="{{ asset('client/images/' . $stars) }}"
											alt="5 Star Rating: Very Good" />
										<span itemprop="ratingValue"><?php if (!empty($keyword->ratingvalue)) {
							echo number_format((float) $keyword->ratingvalue, 1, '.', '');
						} else {
							echo "1.0";
						} ?></span>out of <span itemprop="bestRating"></span>based on <span itemprop="ratingCount">{{$keyword->ratingcount }}</span> ratings
									</div>
								</div>
					@endif
					<div class="keyword-cotegory-text">
					 

					<script type="application/ld+json">
					{
					"@context": "https://schema.org",
					"@type": "BreadcrumbList",
					"itemListElement": [
					{
						"@type": "ListItem",
						"position": 1,
						"name": "Home",
						"item": "{{ url('/') }}"
					},
					{
						"@type": "ListItem",
						"position": 2,
						"name": "noida",
						"item": "{{ url(generate_slug(strtolower('noida'))) }}"
					},
					{
						"@type": "ListItem",
						"position": 3,
						"name": "{{ $keyword->keyword }}",
						"item": "{{ url(generate_slug(strtolower('noida')).'/'.$keyword->slug) }}"
					}
					]
					}
					</script>
					</div>
				</div>
			</div>
			<div class="removeRightSpace">
				<div class="btn btn-primary top-btn">Send Enquiry</div>
			</div>
		</div>

	</div>
	<div class="clearfix"></div>
	<script>
		$(document).ready(function () {
			$('.proceedBtn').click(function () {
				$('.proceedBtn').hide();
				$('.stopprocess').show();
				$('.formDiv').slideDown();
			});

			$('.stopprocess').click(function () {
				$('.stopprocess').removeAttr("style");
				$('.proceedBtn').show();
				$('.formDiv').slideUp();
			});

			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	<div class="container">

		<div class="col-sm-9 col-md-9 reviews-box-main mainContainer">
			<a href="#top"></a>

			@if(isset($keyword) && null != $keyword->top_description)
				<div class="col-xs-12 top_description" style="margin-top:20px;color:#033967">
					<h2>Trusted <?php  if (!empty($keyword->keyword)) { $key = $keyword->keyword; echo trim($key); } ?> in <?php echo ucwords(str_replace("-", " ", Request::segment(1))); ?></h2>
					<p title="<?php if (!empty($keyword->keyword)) { echo $keyword->keyword; } ?> "><?php  if (!empty($keyword->top_description)) {
					$keydescription = $keyword->top_description; echo trim($keydescription); } ?>
					Top {{ $keyword->keyword }} with verified businesses  
					In noida, you can find {{ rand(00,10) }} providers offering services.
					and We provide best services in your . Contact us now. <a href="tel:917559435943">+91-75-5943-5943</a>
				</p>					 
				</div>
			@endif
			 
		<div class="services">
			<div id="recentSearchContainer">
			</div>
		</div>
 
			 
				<?php 
						if (!empty($keyword->heading)) {

					$i = 0;
					$i++;	?>

				<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
					<div class="client-list-first">
						<style>
							.abt-accordion .card {
								border-radius: 0;
								border: 1px solid rgba(179, 179, 179, 0.45);
								margin-bottom: 10px;
								max-width: 960px;
								border-radius: 0;
								box-shadow: 0 0 5px 3px #d4d4d466;
							}


							.card {
								position: relative;
								display: -ms-flexbox;
								display: flex;
								-ms-flex-direction: column;
								flex-direction: column;
								min-width: 0;
								word-wrap: break-word;
								background-color: #fff;
								background-clip: border-box;
								border: 1px solid rgba(0, 0, 0, .125);
								border-radius: .25rem;
							}

							.abt-accordion .card .card-header {
								padding: 7px;
								background: none;
								border: none;
							}

							.card-header:first-child {
								border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
							}

							.abt-accordion .card .card-header h2 button {
								display: flex;
								align-items: center;
								justify-content: space-between;
								width: 100%;
								text-decoration: none;
								border-radius: 0;
								font-weight: 700;
								margin-left: 3%;
							}

							.abt-accordion .card .collapse.show {
								position: relative;
							}

							.card-body {
								-ms-flex: 1 1 auto;
								flex: 1 1 auto;
								padding: 1.25rem;
								font-weight: 400;
								font-size: 13px !important;
								margin-bottom: 0;
								line-height: 1.7;
								padding-left: 1.5em;
								color: #212529 !important;
							}

							.about-accordian .card-body p {
								padding-left: 0;
								margin-bottom: 0;
							}

							.card-body p {
								font-weight: 400;
								font-size: 13px;
								margin-bottom: 10px;
								line-height: 1.7;
								padding-left: 1.5em;
							}

							.about-accordian ul {
								list-style: none;
							}

							.about-accordian .card-body ul li:first-child {
								margin-top: 0;
							}

							.about-accordian .card-body ul li {
								position: relative;
								font-weight: 400;
								font-size: 13px !important;
								line-height: 1.7;
								margin-left: 0;
								margin-bottom: 11px;
								margin-top: 10px;
								text-align: justify;
							}

							.about-accordian .card-body ul ul {
								position: relative;
								font-weight: 400;
								font-size: 13px !important;
								line-height: 1.7;
								margin-left: 22px;
							}

							.about-accordian ul {
								list-style: none;
							}

							.abt-accordion .card .collapse.show::before {
								content: '';
								width: 94%;
								height: 1px;
								position: absolute;
								top: 0;
								left: 0;
								background-color: #02b0af;
								margin-left: 3%;
							}

							.about-accordian .card-body ul ul li {
								margin-bottom: 0;
								margin-top: 0;
							}

							.about-accordian ul ul p::before {
								content: " ";
								position: absolute;
								top: 3px;
								left: -16px;
								display: inline-block;
								-webkit-transform: rotate(45deg);
								-ms-transform: rotate(45deg);
								transform: rotate(45deg);
								height: 1em;
								width: .5em;
								border-bottom: .2em solid #ff5f14;
								border-right: .2em solid #ff5f14;
							}
						</style>

						<div class="about-accordian">

							<div class="abt-accordion" id="courseAcrdMain">

								<div class="card">
									<div class="card-header" id="abthdgOne">
										<h2 class="mb-0"><button type="button" class="btn-link"
												data-target="#heading_4"
												data-parent="#courseAcrdMain">
												<span>{!!$keyword->heading!!}</span> </button> </h2>
									</div>
									<div id="heading_4" class="collapse <?php if ($i == 1) {
						echo "show";
					} ?>" aria-labelledby="abthdgOne">
										<div class="card-body">
											<ul>

												@if($keyword->courseabout)
																			<li style="font-size: 13px;">
																				<?php $courseabout = $keyword->courseabout;
													echo trim($courseabout); ?>

																			</li>
												@endif
												<ul>
													@if($keyword->paragraph1)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph1 = $keyword->paragraph1;
														echo trim($paragraph1); ?>

																						</p>
																					</li>

													@endif
													@if($keyword->paragraph2)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph2 = $keyword->paragraph2;
														echo trim($paragraph2); ?>

																						</p>
																					</li>
													@endif

													@if($keyword->paragraph3)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph3 =$keyword->paragraph3;
														echo trim($paragraph3); ?>

																						</p>
																					</li>
													@endif

													@if($keyword->paragraph4)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph4 = $keyword->paragraph4;
														echo trim($paragraph4); ?>
																						</p>
																					</li>
													@endif

													@if($keyword->paragraph5)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph5 = $keyword->paragraph5;
														echo trim($paragraph5); ?>
																						</p>
																					</li>
													@endif


													@if($keyword->paragraph6)
																					<li>
																						<p style="font-size: 13px;">

																							<?php $paragraph6 = $keyword->paragraph6;
														echo trim($paragraph6); ?>
																						</p>
																					</li>
													@endif
												</ul>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php  } ?>
			 
			<style>
				.current .btn-info {
					color: green;
				}

				#pagin li {
					display: inline-block;
					padding: 6px;
					margin: 5px;
					background-color: #C94A30;
				}

				#pagin li a {
					color: #fff;
				}
			</style>
			 

 
		</div>

		<div class="col-sm-3 col-md-3 side-data reviews-box-1 scroll-on rightsidedata">
			 
		</div>
	</div>


	<div class="clearfix"></div>
	<br>
	@if(!empty($keyword->bottom_description))
		<div class="container">
			<div class="category-description">
				<?php  if (!empty($keyword->bottom_description)) {
					$keydescription = $keyword->bottom_description;
					echo $keydescription;
				}
						  ?>
<p>
Discover trusted {{ $keyword->keyword }} services in noida with verified professionals and top-rated providers. 
In noida, you can explore multiple service options tailored to your needs, ensuring quality and reliability. 
Our platform connects you with experienced providers who offer competitive pricing and quick response. 
Get the best service experience in noida today. 
Call now: <a href="tel:917559435943">+91-75-5943-5943</a>
</p>






			</div>


		</div>
	@endif
	 
	@if(!empty($keyword->faqq1))
		<div class="container">
			<div class="category-description">
				<h4>FAQ:- <?php  if (!empty($keyword->keyword)) {
					$key = preg_replace('/{{city}}/i', ucfirst($area), $keyword->keyword); echo trim($key); } ?> in <?php echo $area; ?></h4>
				<div itemscope itemtype="https://schema.org/FAQPage">
					<?php if (!empty($keyword->faqq1)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq1)) {
						$faqq1 = preg_replace('/{{city}}/i', $area, $keyword->faqq1);
						echo trim($faqq1);
					} ?>?</strong></h5><div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;"><div itemprop="text"><?php  if (!empty($keyword->faqa1)) {
						$faqa1 = preg_replace('/{{city}}/i', $area, $keyword->faqa1);
						echo trim($faqa1);
					} ?></div></div></div>
					<?php } ?><?php if (!empty($keyword->faqq2)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq2)) {
						$faqq2 = preg_replace('/{{city}}/i', $area, $keyword->faqq2);
						echo trim($faqq2);
					} ?>?</strong></h5><div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div itemprop="text"><?php  if (!empty($keyword->faqa2)) {
						$faqa2 = preg_replace('/{{city}}/i', $area, $keyword->faqa2);
						echo trim($faqa2);
					} ?></div></div></div>
					<?php } ?><?php if (!empty($keyword->faqq3)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq3)) {
						$faqq3 = preg_replace('/{{city}}/i', $area, $keyword->faqq3);
						echo trim($faqq3);
					} ?>?</strong></h5><div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text"><?php  if (!empty($keyword->faqa3)) {
						$faqa3 = preg_replace('/{{city}}/i', $area, $keyword->faqa3);
						echo trim($faqa3);
					} ?></div></div></div>
					<?php } ?><?php if (!empty($keyword->faqq4)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq4)) {
						$faqq4 = preg_replace('/{{city}}/i', $area, $keyword->faqq4);
						echo trim($faqq4);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text"><?php  if (!empty($keyword->faqa4)) {
						$faqa4 = preg_replace('/{{city}}/i', $area, $keyword->faqa4);
						echo trim($faqa4);
					} ?></div></div></div>
					<?php } ?><?php if (!empty($keyword->faqq5)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq5)) {
						$faqq5 = preg_replace('/{{city}}/i', $area, $keyword->faqq5);
						echo trim($faqq5);
					} ?>?</strong></h5><div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div itemprop="text"><?php  if (!empty($keyword->faqa5)) {
						$faqa5 = preg_replace('/{{city}}/i', $area, $keyword->faqa5);
						echo trim($faqa5);
					} ?></div></div></div>
					<?php } ?><?php if (!empty($keyword->faqq6)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq6)) {
						$faqq6 = preg_replace('/{{city}}/i', $area, $keyword->faqq6);
						echo trim($faqq6);
					} ?>?</strong></h5><div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div itemprop="text"><?php  if (!empty($keyword->faqa6)) {
						$faqa6 = preg_replace('/{{city}}/i', $area, $keyword->faqa6);
						echo trim($faqa6);
					} ?></div></div></div>
					<?php } ?>
				</div></div></div>
	@endif
	@if(!empty($keyword))
		<div class="container">
			<div class="category-box">
				<div class="course-program">
					<h5>Find <?php if (!empty($keyword->keyword)) {
					echo $keyword->keyword;
				} ?> other Location</h5>
					<ul class=""><?php $cities = getCity(); ?>
						@if(!empty($cities))
							<?php $i = 0; $x = 5; ?>
								@foreach($cities as $citys) <li><a href="{{url(generate_slug(strtolower($citys->city)))}}/<?php if (!empty($keyword->slug)) { echo $keyword->slug; } ?>" >@if(!empty($keyword->keyword)){!!$keyword->keyword!!}@endif in {{$citys->city}} |</a></li>
								@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	@endif
	<div class="clearfix"></div>
	<br>
	<?php } ?>
	 

	 

	<div class="inquiry-popup"></div>

	<a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>
		<style>
		.form-container {
			max-height: 420px;
			/* adjust height */
			overflow-y: auto;
			padding-right: 8px;
			/* space for scrollbar */
		}


		.form-container {
			max-height: 420px;
			overflow-y: auto;
			padding-right: 8px;
		}

		/* Scrollbar width */
		.form-container::-webkit-scrollbar {
			width: 6px;
		}

		/* Track */
		.form-container::-webkit-scrollbar-track {
			background: #f1f1f1;
			border-radius: 10px;
		}

		/* Thumb */
		.form-container::-webkit-scrollbar-thumb {
			background: linear-gradient(180deg, #0a5bd3, #0a6adf);
			border-radius: 10px;
		}

		/* Hover */
		.form-container::-webkit-scrollbar-thumb:hover {
			background: #084298;
		}
	</style>




	<script type="text/javascript">
		document.addEventListener('input', function (e) {

			// ✅ run only for mobile field inside autoLeadForm
			if (!e.target.matches('.autoLeadForm input[name="mobile"]')) return;

			let form = e.target.closest('.autoLeadForm');
			if (!form) return;

			let formData = new FormData(form);

			let name = formData.get('name');
			let mobile = formData.get('mobile');
			let kw_text = formData.get('kw_text');
			let city_id = formData.get('city_id');
			let from_page = formData.get('from_page');

			if (name && mobile && mobile.length >= 10 && mobile.length <= 16) {

				fetch('lead/auto-form-save', {
					method: 'POST',
					headers: {
						'Accept': 'application/json',
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					body: formData
				})
					.then(res => res.json())
					.then(data => {
						// console.log('Saved', data);
					})
					.catch(err => {
						console.error('Error:', err);
					});
			}
		});
	</script>

	<div class="searchPopup">
		<a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>


		<div class="callback-wrapper">
			<div class="left-panel">
				<h2>Begin your journey with QuickDials</h2>
				<p><strong>Connect with trusted experts effortlessly</strong></p>
				<div class="benefits">
					<h4>Trust & Benefits:</h4>
					<ul>
						<li>✔ Shared only with selected experts</li>
						<li>✔ Get Free Expert Online Counseling</li>
						<li>✔ Industry-Certified Instructors</li>
						<li>✔ Book Your Free Education Demo Class</li>
						<li>✔ Get Fees & Discounts</li>
					</ul>
				</div>
			</div>
			<div class="right-panel">
				<h2>Need Expert Advice ?</h2>
				<p>Fill this form to Grab the best Deals on "<span
						class="orng"><?php echo isset($searchedKW) ? $searchedKW : ''; ?> In {{Request::segment(1)}}</span>"
				</p>

				<div class="popup-box">



					<!-- Progress -->
					<div class="popupSteps">
						<span class="active"></span>
						<span></span>
						<!-- <span></span> -->
						<span></span>
					</div>

					 
					<form class="popup-form" id="leadForm" onsubmit="return homeController.saveTwoEnquiry(this)"
						method="POST">

						<!-- STEP 1 -->
						<div class="popup-step active">
							<span>Your Details</span>

							<div class="erbr">
								<input type="text" name="name" placeholder="Full Name">
							</div>
							<div class="erbr">
								<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
							</div>


							<input type="hidden" name="lead_form" value="1" />
							<input type="hidden" name="kw_text" id="kw_text"
								value=" playwright-automation" />
							<input type="hidden" name="city_id" id="city_id" class="city" value="noida" />
							<input type="hidden" name="from_page" id="from_page" value="{{ request()->path() }}">


							<div class="div-code">
								<div class="drop-number dropwn">
									<div class="dropdown">
										<div class="drop-input-wrapper form-group">
											<img loading="lazy" class="flag-icon selectedFlag" src="https://flagcdn.com/w40/in.png"
												alt="Flag">

											<input type="text" class="dropwn-input" placeholder="Search country">
											<span class="clear-icon removeFlag">&#10005;</span>
											<span class="dropdown-icon">&#9662;</span>
										</div>
										<div class="erbr">
											<input type="hidden" class="countryCode" name="code">
										</div>
										<div class="dropdown-list"></div>
									</div>

									<div class="quick_arrow form-group erbr">
										<input type="tel" class="quick-remove" name="mobile" maxlength="15"
											placeholder="Phone No*">
									</div>
								</div>
							</div>
							<div class="erbr">
								What is your <strong>Location?</strong>
								<select name="location" class="select2_location">
						<option value="noida">Noida</option>			 
								</select>
							</div>


							<div class="btn-center">
								<button type="button" onclick="validateStep(this, 1)">Save & Continue</button>
							</div>
						</div>
						<!-- STEP 2 -->
						<div class="popup-step">
							
							<input type="hidden" name="kw_text" id="kw_text"
								value="playwright-automation" />
							<div class="fieldblock">

								<div class="erbr">
									@if($keyword->form_type == 'form_edu')

										<div class="fieldblock-form">

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="fresher">
												<span>Fresher</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="online" checked>
												<span>Online</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="offline">
												<span>Offline</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="crashcourse">
												<span>Crash Course</span>
											</label>
										</div>
									@elseif($keyword->form_type == 'form_pg')

										<div class="fieldblock-form">
											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="shared">
												<span>Shared</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="single">
												<span>Single</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="male">
												<span>Male</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="female">
												<span>Female</span>
											</label>
										</div>
									@elseif($keyword->form_type == 'form_doctor')

										<link
											href="{{asset('vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"
											rel="stylesheet">
										<link href="{{asset('admin/vendor/datepicker/jquery-ui.css')}}" rel="stylesheet">
										<link href="{{asset('business/assets/css/daterangepicker.css')}}" rel="stylesheet">


										<div class="fieldblock-form">
											<label class="radio-item">
												<span>Appointment</span>
											</label>
											<div class="form-group input-icon">
											<input type="hidden" name="frmcheck[]" value="none">	

												<input type="text" name="appointment" placeholder="Select Date"
													class="appointment">

												<link rel="stylesheet"
													href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
												<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

												<script>
													$(document).ready(function () {
														$('.appointment').datepicker({
															minDate: 0,
															dateFormat: 'yy-mm-dd',
															changeMonth: true,
															changeYear: true
														});
													});
												</script>
											</div>
										</div>

									@elseif($keyword->form_type == 'form_serv')

										<div class="fieldblock-form">
											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="ac_split">
												<span>AC Split</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="ac_window">
												<span>AC Window</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="freez_single_door">
												<span>Freeze Single Door</span>
											</label>
										</div>
									@else
										<div class="fieldblock-form">
											<input type="hidden" name="frmcheck[]" value="none">

										</div>
									@endif
								</div>
							</div>

							<div class="erbr">
								What’s your <strong>Age</strong>
								<select name="age" class="select2_age">
									<option value="">Select Age*</option>
									@for($i = 1; $i < 100; $i += 2)
										<option value="{{$i}}" {{ $i == 19 ? 'selected' : '' }}>{{ $i }} + Age</option>
									@endfor
								</select>
							</div>
							<div class="erbr">
								When you want to <strong>Start</strong>
								<select name="plan" class="select2_plane">
									<option value="Immediate" selected>Immediate</option>
									<option value="Within week">Within Week</option>
									<option value="Within months">Within Months </option>
									<option value="Not planned yet">Not Planned Yet</option>
								</select>
							</div>


							<div class="erbr">

								<select name="experience">

									<option value="">Select Experience*</option>

									@for($i = 1; $i < 50; $i += 2)
										<option value="{{$i}}" {{ $i == 3 ? 'selected' : '' }}>{{ $i }} + Exp</option>
									@endfor
								</select>
							</div>


							<div class="btn-center">
								<button type="button" onclick="prevPopupStep()">Back</button>
								<button type="button" onclick="validateStep(this,2)">Save & Continue</button>
							</div>
						</div>

						<!-- STEP 3 -->
						<div class="popup-step">
							<span>Confirm</span>
							<div class="erbr">
								<textarea name="remark" placeholder="Enter Remarks"></textarea>
							</div>

							<div class="terms">
								<input type="checkbox" name="terms" value="1" checked />
								I agree to the Quickdials terms and conditions <a href="{{ url('terms-conditions') }}">Terms
									& Conditions</a>
							</div>

							<div class="btn-center">
								<button type="button" onclick="prevPopupStep()">Back</button>
								<button type="submit">Submit</button>
							<div class="loaderForm" style="display:none;">
							<img src="/public/client/images/btn-ajax-loader.gif" width="20">
							Processing...
							</div>
							</div>
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>
	<script>

		let currentPopupStep = 0;
		const popupSteps = document.querySelectorAll(".popup-step");

		const popupIndicators = document.querySelectorAll(".popupSteps span");


		function validateStep(THIS, step) {

			var $this = $(THIS);
			let form = document.getElementById('leadForm');
			let formData = new FormData(form);

			// add extra value
			formData.append('step', step);

			fetch('/form/validate-step', {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: formData
			})
				.then(res => res.json())
				.then(res => {
					if (res.status) {
						nextPopupStep();
					} else {
						showsErrors($('#leadForm'), res.errors);
					}
				});
		}




		function showsErrors($form, errors) {

			// remove old errors
			$form.find('.erbr').removeClass('has-error');
			$form.find('.help-block').remove();

			$.each(errors, function (key, messages) {

				if (key === 'frmcheck') {

					$input = $form.find('input[name="frmcheck[]"]');

				} else {
					let name = key.replace(/\./g, '\\.');
					$input = $form.find('[name="' + name + '"]');
				}

				if ($input.length) {
					let $wrapper = $input.closest('.erbr');

					$wrapper.addClass('has-error');

					$wrapper.append(
						'<span class="help-block"><strong>' + messages[0] + '</strong></span>'
					);
				}
			});
		}



		function nextPopupStep() {

			if (currentPopupStep < popupSteps.length - 1) {
				popupSteps[currentPopupStep].classList.remove("active");
				popupIndicators[currentPopupStep].classList.remove("active");
				currentPopupStep++;
				popupSteps[currentPopupStep].classList.add("active");
				popupIndicators[currentPopupStep].classList.add("active");
			}
		}

		function prevPopupStep() {
			if (currentPopupStep > 0) {
				popupSteps[currentPopupStep].classList.remove("active");
				indicators[currentPopupStep].classList.remove("active");
				currentPopupStep--;
				popupSteps[currentPopupStep].classList.add("active");
				indicators[currentPopupStep].classList.add("active");
			}
		}


	</script>





@endsection