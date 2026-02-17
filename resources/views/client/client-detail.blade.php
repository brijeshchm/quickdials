@extends('client.layouts.app')
@section('title')
	 {{$client->business_name}} | Quick Dials
@endsection
@section('keyword')
	{{$client->business_name}} | Quick Dials
@endsection
@section('description')
 {{$client->business_name}} | Quick Dials
@endsection
@section('content')

	<div class="container">
		<?php

	$profile_pic = [];
	$profile_pic['large']['src'] = 'client/images/default_profile_pic.jpg';
	if (null != $client->profile_pic) {
		$profile_pic = unserialize($client->profile_pic);
	}		
if(!empty($client->pictures)){
			?>
 
<div class="photo-collage">
<style>

.photo-collage {
    display: grid;
    /* grid-template-columns: 2.2fr 1fr; */
    gap: 6px;
    height: auto;
    border-radius: 12px;
    overflow: hidden;
    background: #eee;
	margin-top: 82px;
}

/* Left big image */
.photo.big {
    background-size: cover;
    background-position: center;
}

/* Right grid */
.photo-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-auto-rows: 1fr;
    gap: 6px;
}

/* Image boxes */
.photo {
    position: relative;
    background-size: cover;
    background-position: center;
    cursor: pointer;
}

/* Hover effect */
.photo:hover {
    filter: brightness(0.9);
}

/* +More overlay */
.more-overlay {
    position: relative;
    inset: 0;
    background: rgba(0,0,0,0.55);
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

/* Add more photo box */
.add-more {
    background: #111;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    text-align: center;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .photo-collage {
        grid-template-columns: 2fr 0fr;
        height: auto;
		    margin-top: 53px;
    }

    .photo.big {
        height: 220px;
    }

    .photo-grid {
        grid-template-columns: repeat(5, 1fr);
    }
}
</style>
    <!-- Left Big Image -->
    <!-- <div class="photo big"
         style="background-image:url('<?php echo asset('' . $profile_pic['large']['src']); ?>');">
    </div> -->
<?php 
$pictures = unserialize($client->pictures); 
 
?>
    <!-- Right Grid -->
    <div class="photo-grid">
        <?php foreach (array_slice($pictures, 1, 6) as $key => $img): 
				 		
			?>
            <div class="photo small"
                 style="background-image:url('<?php echo asset($img['large']['src']); ?>');">
				 <a href="javascript:void(0);" data-t_img="#<?php echo ($key + 1); ?>" class="lightBox"><span>
									<?php if ($img['large']['src']) {?>
									<img loading="lazy" src="<?php echo asset('' . $img['large']['src']); ?>"
										alt="{{ $img['large']['name'] }}" class="img-responsive">
									<?php } ?>
								</span></a>
                 
                <?php if ($key == 3 && count($pictures) > 6): ?>
                    <div class="more-overlay">
						 <a href="javascript:void(0);"
								data-t_img="#<?php echo ($key + 1); ?>" class="lightBox"></a>
                        +<?php echo count($pictures) - 5; ?><br>More
                    </div>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
	<?php if (!Auth::guard('clients')->check()) { ?>
      
        <div class="photo add-more" id="loginPopup">
            <span>📷<br>				
		 <a href="javascript:void(0);">Add More Photo</a>		
		</span>
        </div>
	<?php }else{ ?>
 <div class="photo add-more">
            <span>📷<br>	
			<a href="{{ url('business/gallery-pictures') }}" >Add More Photo</a>		
		</span>
        </div>


	<?php  } ?>
    </div>

</div>



<?php }else{ ?>
		<div class="banner innerbanner"
			style="background-image:url(<?php echo asset('' . $profile_pic['large']['src']); ?>);">
			<div class="transbox"></div>
			<div class="row">
				<div class="col-sm-12 col-md-12 banner-details">


				</div>
			 
			</div>
		</div>
		<?php  } ?>
	</div>
	
	<div class="container">
		<div class="form-section">
			<div class="removeLeftSpace">
				<h3 class="hdTitle">
					Are you looking for options other than <span
						class="croma-txt">{{isset($client->business_name) && !empty($client->business_name) ? $client->business_name : ""}}
					</span>? </h3>
			</div>
			<div class="removeRightSpace">
			 
			<div class="btn btn-primary common_popup_form top-btn">Send Enquiry</div>
				<a href="javascript:void()" class="btn btn-primary submit-btn stopprocess">Minimize</a>
			</div>
			 
		</div>
		
		<div class="add-section">
			<div class="col-xs-12 col-sm-4 col-md-3  leftBlock">
				<aside>
					<div class="col-md-10 col-md-offset-1">
						<?php
					$image = '#';
					$imageName = 'logo';
					if (!empty($client->logo)) {
						$logo = unserialize($client->logo);
						if (!isset($logo['thumbnail'])) {
							$logo['thumbnail'] = $logo['large'];
						}
						$image = $logo['large']['src'];
						$imageName = $logo['large']['name'];

											?>
										<img loading="lazy" src="<?php echo asset('' . $image); ?>" style="margin-bottom:15px;border-radius:0"
											class="img-responsive" alt="{{ $imageName }}">
										<?php } ?>
									</div>
					
				</aside>





				<aside class="addressBlock">
					<ul>

						<?php
					if (!empty($addr->ispositiveresponse)) {
							?>
						<li><i class="fa fa-fw fa fa-building-o location-icon-1" aria-hidden="true"></i><span
								class="phone-txt-1">
								<?php if ($addr->issubstr): ?>
								{{ $addr->fullstr }}
								<a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"
									title="{{ $addr->fullstr }}">more</a>
								<?php else: ?>
								{{ $addr->fullstr }}
								<?php endif; ?>
							</span></li>
						<?php
	}
							?>
						<li><i class="fa fa-fw fa fa-envelope location-icon-1" aria-hidden="true"></i><a
								href="{{isset($client->email) && !empty($client->email) ? "mailto:" . $client->email : "#"}}">Send
								Enquriy By Mail</a></li>
						<li><i class="fa fa-fw fa fa-chrome location-icon-1" aria-hidden="true"></i>


							<a target="_blank"
								href="{{isset($client->website) && !empty($client->website) ? buildWebsiteURL($client->website) : 'javascript:void(0)'}}">


								{{isset($client->website) && !empty($client->website) ? $client->website : 'Website Not Available'}}
							</a>


						</li>
					</ul>
				</aside>

				<aside>
					<h4>Year Established</h4>
					<ul>
						<li><?php if (!empty($client->year_of_estb)) {
							echo $client->year_of_estb;
							}  ?></li>
					</ul>
				</aside>
				<?php if ($client->display_hofo) { ?>
				<aside>
					<h4>Business Hours of Operation </strong><small style="cursor:pointer"
							class="orangeColor pull-right max-min today">Maximize</small><small style="cursor:pointer"
							class="orangeColor pull-right hide otherday max-min">Minimize</small>
					</h4>
					<table class="table">
						<?php
						
		if (!empty($client->time)) {
			$times = json_decode($client->time);
			$today = strtolower(date('l'));
									?>
						<tr class="today">
							<td><?php echo "Today"; ?></td>
							<td><?php echo $times->$today->from . " - " . $times->$today->to?></td>
						</tr>
						<?php
						if($times){
			foreach ($times as $day => $time) {
									?>
						<tr class="hide otherday">
							<td><?php echo ucfirst($day); ?></td>
							<td><?php echo $time->from . " - " . $time->to; ?></td>
						</tr>
						<?php
			}
						}
		} else {
			echo "<tr><td>No working hours available</td></tr>";
		}
							?>

					</table>
				</aside>
				<?php } ?>


				<aside>
					
				</aside>
				<?php


	if (isset($client->certifications) && !empty($client->certifications)) { 				

						?>
				<aside>
					<h4>Certifications </strong>
					</h4>
					<?php echo $client->certifications; ?>
					
				</aside>
				<?php } ?>

 				@if($client->certified_status)			
				<aside>
					<h4>Certifications 	@if($client->certified_status)					 
							<img loading="lazy" src="{{ asset('img/q_verified.gif')}}">
							@endif </strong>
					</h4>
				 				
				</aside>
					@endif
					@if($client->trusted_status)	
				<aside>
					<h4>Trusted	@if($client->trusted_status)
							<img loading="lazy" src="{{ asset('img/q_trust.gif')}}">
							@endif</strong>
					</h4>
				 
					
				</aside>
				@endif
				@if($client->msme_certificate)	
				<aside>
					<h4>GST 	@if($client->gst_status) 
							<img loading="lazy" src="{{ asset('img/q_gst.gif')}}">
							@endif		@if(!empty($client->gst_no))
					{{ $client->gst_no }}
					@endif</strong>				 
					</h4>
				 
					<h5>			 
					@if($client->msme_certificate)
					<?php   

					$msme_certificate = json_decode($client->msme_certificate);            							
					$msme_certificate = $msme_certificate->large->src; ?>
					<img loading="lazy" src="<?php echo asset('/'.$msme_certificate); ?>" alt="Profile">
					@endif
						 
					</h5>
					
				</aside>

				@endif

				@if($client->cin_certificate)	
				<aside>
					<h4>CIN no 	@if(!empty($client->cin_no))
					{{ $client->cin_no }}
					@endif	</strong>

					<h5>			 
					@if($client->cin_certificate)
					<?php   

					$cin_certificate = json_decode($client->cin_certificate);            							
					$cin_certificate = $cin_certificate->large->src; ?>
					<img loading="lazy" src="<?php echo asset('/'.$cin_certificate); ?>" alt="Profile">
					@endif
						 
					</h5>
					</h4>
				 
					
				</aside>				
				@endif
				@if($client->iso_certificate)	
				<aside>
					<h4>ISO No 	@if(!empty($client->iso_no))
					{{ $client->iso_no }}
					@endif	</strong>

					<h5>
					 
							@if($client->iso_certificate)
							<?php   

							$iso_certificate = json_decode($client->iso_certificate);            							
							$iso_certificate = $iso_certificate->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$iso_certificate); ?>" alt="Profile">
						@endif
						 
					</h5>
					</h4>
				 
					
				</aside>

				@endif
				@if($client->msme_no)	
				<aside>
					<h4>MSME No 	@if(!empty($client->msme_no))
					{{ $client->msme_no }}
					@endif	</strong>

					<h5>
					
					</h5>
					</h4>
				 
					
				</aside>
					@endif
				@if(!empty($client->award_img1))
					<aside>
						<h4>Award </strong>

						<h5>
							@if($client->award_img1)
							<?php   

							$award_img1 = json_decode($client->award_img1);            							
							$award_name1 = $award_img1->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$award_name1); ?>" alt="Profile">
						@endif
						</h5>
						</h4>								
					</aside>
				@endif
				@if(!empty($client->award_img2))
					<aside>
						<h4>Award </strong>

						<h5>
							@if($client->award_img2)
							<?php   

							$award_img2 = json_decode($client->award_img2);            							
							$award_img2 = $award_img2->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$award_img2); ?>" alt="Profile">
						@endif
						</h5>
						</h4>								
					</aside>
				@endif
				@if(!empty($client->award_img3))
					<aside>
						<h4>Award </strong>

						<h5>
							@if($client->award_img3)
							<?php   

							$award_img3 = json_decode($client->award_img3);            							
							$award_img3 = $award_img3->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$award_img3); ?>" alt="Profile">
						@endif
						</h5>
						</h4>								
					</aside>
				@endif

				@if(!empty($client->award_img4))
					<aside>
						<h4>Award </strong>

						<h5>
							@if($client->award_img4)
							<?php   

							$award_img4 = json_decode($client->award_img4);            							
							$award_img4 = $award_img4->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$award_img4); ?>" alt="Profile">
						@endif
						</h5>
						</h4>								
					</aside>
				@endif
				@if(!empty($client->award_img5))
					<aside>
						<h4>Award </strong>

						<h5>
							@if($client->award_img5)
							<?php   

							$award_img5 = json_decode($client->award_img5);            							
							$award_img5 = $award_img5->large->src; ?>
						<img loading="lazy" src="<?php echo asset('/'.$award_img5); ?>" alt="Profile">
						@endif
						</h5>
						</h4>								
					</aside>
				@endif



			</div>
			<div class="col-xs-12 col-sm-8 col-md-9 aside-section">

				<div class="about-company">
					
					<div class="top-details">
						<aside>
							<h2 class="details-txt"><a target="_blank"
									href="{{isset($client->website) && !empty($client->website) ? buildWebsiteURL($client->website) : 'javascript:void(0);'}}">{{isset($client->business_name) && !empty($client->business_name) ? $client->business_name : ""}}</a>

							</h2>
							<div class="rating"><span class="green">{{ $avgRating }}</span> <span class="starvote">
							<?php
								$whole = floor($avgRating);
								$fraction = $avgRating - $whole;
								$remain = 5 - $whole;
								for ($i = 0; $i < $whole; ++$i) {
									echo "<i class=\"fullStar\"></i>";
								}
								if ($fraction > 0 && $fraction < 1) {
									echo "<i class=\"hlfStar\"></i>";
									--$remain;
								}
								for ($i = 0; $i < $remain; ++$i) {
									echo "<i class=\"emptyStar1\"></i>";
								}
							?>

								</span> <span class="vote">{{ $count }} Votes</span></div>

							<br>
							<?php
							$arr = [];
							if (!empty($client->address)) {
								$arr['address'] = $client->address;
							}
							if (!empty($client->landmark)) {
								$arr['landmark'] = $client->landmark;
							}
							if (!empty($client->city)) {
								$arr['city'] = $client->city;
							}
							if (!empty($client->state)) {
								$arr['state'] = $client->state;
							}
							if (!empty($client->country)) {
								$arr['country'] = $client->country;
							}
							$addr = getAddress($arr, 30);


						if ($addr->ispositiveresponse) {
							?>
							<i class="fa fa-fw fa fa-street-view icon" aria-hidden="true"></i>
							<div class="location-txt">

								<script>var clientAddr = "<?php echo $client->address; ?>";</script>
								<?php if ($addr->fullstr): ?>
								{{ $addr->fullstr }}
								<?php endif; ?>
							</div>
							<?php						
							}
						?>
							<br>
							<br>

						</aside>

						<div>
							<iframe style="width:100%;height:50px" frameborder="0" scrolling="no" style="border:0"
								width="520" height="50" frameborder="0" style="border:0;"
								src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php echo $client->address; ?>">
							</iframe>
						</div>
					</div>

					

		<div class="section">
		<div class="heading">

		<h3>About Company</h3>
		</div>
	<div id="intro"> 
		<h1><i class="fa fa-user fa-fw" style="margin-right:5px;"></i>{{ $client->business_name}}
		&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-fw"
		style="margin-right:5px;"></i>{{ $client->city}}</h1>
		<div class="inner-intro">
		<p style="text-align:justify;margin-left: 27px;">

							
		@if($client->business_intro)
		{!! $client->business_intro !!}
	 

		@endif


		</p>

		</div>
		</div>

		</div>

		
		<div class="section">
  

	<div class="heading">										
	<h3><i class="fa fa-cog fa-fw" style="margin-right:5px;"></i>Services Offered</h3>
	</div>
		<div class="services">

		<?php

		$firstHalf = [];
		$secondHalf = [];
		$i = 1;
		$inPopupArr = [];


		foreach ($assignedKwds as $assignedKwd) {
		$inPopupArr[$assignedKwd->child_category_name][] = $assignedKwd->keyword;


		if ($i <= 40):

			
		echo "<span class='service'>
        <a href='" . generate_slug($assignedKwd->keyword) . "' class='keystore'>
            " . $assignedKwd->keyword . "
        </a>
      </span>";
	 
		endif;
		}
		 ?>

		 
		  
		</div>
 
	
	
		</div>
		
		<div class="section">
  

	<div class="heading">										
	<h3><i class="fa fa-map-marker fa-fw" style="margin-right:5px;"></i>Serving in City/Cities</h3>
	</div>
		<div class="services">

				@if(!empty($assignedCity))
				@foreach($assignedCity as $city)
			 
				<span class='service'>{{ $city->city}}</span>
				@endforeach
				@endif

		 
		  
		</div>
 
	
	
		</div>


<div class="section">

    <div class="heading">
        <h3><i class="fa fa-camera"></i> Gallery</h3>
    </div>

    <div class="gallery-grid">

        <?php
        $pictures = [];
	
		 
        if (!empty($client->pictures)) {
            $pictures = unserialize($client->pictures);
            $pictures = is_array($pictures) ? $pictures : [];
        }

        $pictures = array_slice($pictures, 0, 15);
        $count = count($pictures);
        ?>

        <!-- Uploaded Images -->
        <?php foreach ($pictures as $key => $picture):
		
			
			?>
            <div class="gallery-item">
                <a href="javascript:void(0);" class="lightBox" data-t_img="#<?= $key + 1 ?>">
                    <img loading="lazy"
                        src="<?= asset($picture['large']['src']) ?>"
                        alt="<?= $picture['large']['name'] ?? 'Gallery Image' ?>">
                </a>
            </div>
        <?php endforeach; ?>

        <!-- Default Placeholder Images -->
        <?php for ($i = $count; $i < 9; $i++): ?>
            <div class="gallery-item placeholder">
                <a href="javascript:void(0);" class="lightBox">
                    <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add Photo">
                </a>
            </div>
        <?php endfor; ?>

    </div>
</div>


<div class="section">

    <div class="heading">
        <h3><i class="fa fa-camera"></i> Certificate</h3>
    </div>

    <div class="certificate-layout">

        <!-- CERTIFICATE GALLERY -->
        <div class="certificate-gallery">
		@if(!empty($client->msme_certificate))
			@php
				$msme = json_decode($client->msme_certificate, true);
	 
				$msmeImage = $msme['large']['src'] ?? null;

		 
			@endphp

			@if($msmeImage)
				<div class="cert-item">
					<a href="javascript:void(0);"
					class="lightbox-trigger"
					data-image="{{ asset($msmeImage) }}">
					
						<img loading="lazy" src="{{ asset($msmeImage) }}" alt="MSME Certificate">
					</a>
				</div>
			@endif

			@else

			<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add MSME Certificate">
            </a>
        </div>
		@endif
				
	 

	 

@if(!empty($client->cin_certificate))
    @php
        $cin = json_decode($client->cin_certificate, true);
        $cinImage = $cin['large']['src'] ?? null;
    @endphp

    @if($cinImage)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($cinImage) }}">
               
                <img loading="lazy" src="{{ asset($cinImage) }}" alt="CIN Certificate">
            </a>
        </div>
    @endif
	@else
	<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add CIN Certificate">
            </a>
        </div>
@endif


 

@if(!empty($client->iso_certificate))
    @php
        $iso = json_decode($client->iso_certificate, true);
        $isoImage = $iso['large']['src'] ?? null;
    @endphp

    @if($isoImage)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($isoImage) }}">
               
                <img loading="lazy" src="{{ asset($isoImage) }}" alt="ISO Certificate">
            </a>
        </div>
    @endif

	@else
	<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add ISO Certificate">
            </a>
        </div>
@endif
 

@if(!empty($client->award_img1))
    @php
        $award_img1 = json_decode($client->award_img1, true);
        $awardImg1 = $award_img1['large']['src'] ?? null;
    @endphp

    @if($awardImg1)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($awardImg1) }}">
               
                <img loading="lazy" src="{{ asset($awardImg1) }}" alt="Award 1">
            </a>
        </div>
    @endif

	@else
	<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add Award">
            </a>
        </div>
@endif
 

@if(!empty($client->award_img2))
    @php
        $awardimg2 = json_decode($client->award_img2, true);
        $award2Img = $awardimg2['large']['src'] ?? null;
    @endphp

    @if($award2Img)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($award2Img) }}">
               
                <img loading="lazy" src="{{ asset($award2Img) }}" alt="Award 2">
            </a>
        </div>
    @endif

	@else
	<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add Award">
            </a>
        </div>
@endif

@if(!empty($client->award_img3))
    @php
        $awardimg3 = json_decode($client->award_img3, true);
        $award3Img = $awardimg3['large']['src'] ?? null;
    @endphp

    @if($award3Img)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($award3Img) }}">
               
                <img loading="lazy" src="{{ asset($award3Img) }}" alt="Award 3">
            </a>
        </div>
    @endif

	@else
	<div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="<?= asset('client/images/photo-add.png') ?>">
               
                <img loading="lazy" src="<?= asset('client/images/photo-add.png') ?>" alt="Add Award">
            </a>
        </div>
@endif

@if(!empty($client->award_img4))
    @php
        $awardimg4 = json_decode($client->award_img4, true);
        $award4Img = $awardimg4['large']['src'] ?? null;
    @endphp

    @if($award4Img)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($award4Img) }}">
               
                <img loading="lazy" src="{{ asset($award4Img) }}" alt="Award 4">
            </a>
        </div>
    @endif
	
@endif
 
@if(!empty($client->award_img5))
    @php
        $awardimg5 = json_decode($client->award_img5, true);
        $award5Img = $awardimg5['large']['src'] ?? null;
    @endphp
<iframe src="{{ asset($award5Img) }}" style="width: 100px;height: 100px;border: none;"></iframe>
    @if($award5Img)
        <div class="cert-item">
            <a href="javascript:void(0);"
               class="lightbox-trigger"
               data-image="{{ asset($award5Img) }}">
               
                <img loading="lazy" src="{{ asset($award5Img) }}" alt="Award 3">
            </a>
        </div>
    @endif
@endif


  


 
		 
	  
 
	 
 
     

        </div>

        <!-- ENQUIRY FORM -->
        <div class="certificate-form">
		<form class="formaling lead_form" action="" method="post"
		onsubmit="return homeController.saveEnquiry(this)">

		<input type="hidden" name="lead_form" value="1">
		<input type="hidden" name="city_id" class="cityList">
		<input type="hidden" name="terms"  value="1">
 
		<input type="hidden" name="from_page" value="{{ request()->path() }}">

			<div class="fieldblock">
			<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Interested in*</span></div>
			<div class="col-xs-8 col-sm-8 col-md-8">
			<select name="kw_text" class="select2_service">
			<option value="">Select Service</option>
			</select>
			</div>
			</div>


		<div class="fieldblock">
		<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Your Name*</span>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8">
		<input type="text" placeholder="Your Name" class=" form-control city-form"
		name="name">
		</div>
		</div>
		<div class="fieldblock">
		<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Mobile*</span></div>
		<div class="col-xs-8 col-sm-8 col-md-8">
		<input type="tel" placeholder="Enter Mobile" class="form-control city-form"
		name="mobile">
		</div>
		</div>
		<div class="fieldblock">
		<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Email*</span></div>
		<div class="col-xs-8 col-sm-8 col-md-8">
		<input type="text" placeholder="Email" class="form-control city-form"
		name="email">
		</div>
		</div>
		<div class="fieldblock">
		<div class="col-xs-4 col-sm-4 col-md-4"><span class="form-txt">Remarks</span></div>
		<div class="col-xs-8 col-sm-8 col-md-8">
		<textarea class="form-control city-form" id="exampleTextarea" rows="3"
		placeholder="Provide any specific details for your need"
		name="remark"></textarea>


		<input type="submit" class="btn btn-primary submit-btn-2" value="Get Quotes">
		</div>
		</div>
		</form>
						
        </div>

    </div>
</div>

<style>
	.section {
    padding: 20px;
}

.heading h3 {
    font-size: 18px;
    margin-bottom: 15px;
    display: flex;
    gap: 8px;
    align-items: center;
}

.heading i {
    color: #0d6efd;
}

/* Main Layout */
.certificate-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

/* Gallery Grid */
.certificate-gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

.cert-item {
    /* background: #f5f7fb; */
    border-radius: 12px;
    overflow: hidden;
    animation: fadeUp 0.4s ease;
}

.cert-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.cert-item:hover img {
    transform: scale(1.08);
}

.cert-item.placeholder img {
    object-fit: contain;
    padding: 14px;
    opacity: 0.8;
}

/* Form */
.certificate-form {
    background: #fff8dc;
    padding: 20px;
    border-radius: 14px;
}

.lead-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.form-group label {
    font-size: 13px;
    font-weight: 500;
}

.form-group input,
.form-group textarea {
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 14px;
}

.submit-btn {
    margin-top: 10px;
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: #0d6efd;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
}

.submit-btn:hover {
    background: #084298;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .certificate-layout {
        grid-template-columns: 1fr;
    }

    .certificate-gallery {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>











</div>

					<div class="tab-content" style="padding-top: 20px;">
					 
						
						<div class="heading">
							<h3>WRITE A REVIEW</h3>
						</div>
						<div id="c_trigger" class="tab-pane fade fade in active">
							 
							<div>
								<div class="col-md-12 review-form ">
									<div class="col-md-6 removeLeftSpace">
										<p class="p-txt">Add Reviews</p>
									</div>
									 
									<div class="clearfix">&nbsp;</div>
									<div class="commentform">
										<form class="review_form"  method="post" onsubmit="return homeController.saveReview(this)">
											
											<div class="row">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Rating
													<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
															style="color:red;"></i></sup></label>
														<div class="rating-box">
														<i class="s_rating emptyStar" data-s_rating="1"></i>
														<i class="s_rating emptyStar" data-s_rating="2"></i>
														<i class="s_rating emptyStar" data-s_rating="3"></i>
														<i class="s_rating emptyStar" data-s_rating="4"></i>
														<i class="s_rating emptyStar" data-s_rating="5"></i>
													<input type="hidden" name="s_rating" class="col-xs-12 col-sm-5 col-md-5 txtfld jinp">

														<input type="hidden" name="currentClient" value="{{ $client->id }}">
																	</div>
											</div>
											 
											<div class="row">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Name
													<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
															style="color:red;"></i></sup></label>
												<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
													name="comment_author" placeholder="Enter Name">
											</div>
											<div class="row">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Mobile
													<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
															style="color:red;"></i></sup></label>
												<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
													name="comment_author_phone" placeholder="Enter phone">
											</div>
											<div class="row">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Email Id
													<sup><i class="fa fa-fw fa-asterisk" aria-hidden="true"
															style="color:red;"></i></sup></label>
												<input class="col-xs-12 col-sm-5 col-md-5 txtfld jinp" type="text"
													name="comment_author_email" placeholder="Enter Email">
											</div>
											<div class="row">
												<div class="area-box">
												<label class="col-xs-12 col-sm-2 col-md-2 contlftspce review-txt">Comment
													Here</label>
											<textarea rows="4" name="comment_content" class="enter-txt jinp"
												placeholder="Enter text here..."></textarea>
											</div>
											</div>
											<div class="row">
											
											<input type="submit" class="btn btn-primary submit-btn-2" value="Submit" style="    width: 40%;margin-left: 15%;">
											<input type="reset" id="comment_reset" class="" value="Reset"
												style="visibility:hidden">
												</div>
										</form>
									</div>
								
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
										aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="vertical-alignment-helper">
											<div class="modal-dialog vertical-align-center modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"><span
																aria-hidden="true">&times;</span><span
																class="sr-only">Close</span></button>
														<h4 class="modal-title" id="myModalLabel">Rating and Review Alert
														</h4>
													</div>
													<div class="modal-body">
														Please provide your <span class="orng"
															style="font-weight:normal">"Name", "Mobile", "Email" &amp;
															"Comment"</span> to submit your<br>review and
														rating.<br><br><br>
														<strong>
															Thanks,<br>
															Quick Dials- Team<br>
														</strong>
													</div>
													<!--div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary">Save changes</button>
														</div-->
												</div>
											</div>
										</div>
									</div>
								 
									
									
								</div>
							</div>
						</div>

					 
						<div id="" class="tab-pane fade fade in active">			 
							
							@if(!empty($comments))
								<div class="col-xs-12 col-sm-12 col-md-12" id="reviews-result-resp">
									@foreach($comments as $comment)
															<div class="reviews-box">
																<div class="alllearners_reviews clearfix">
																	<div class="alllearners_reviews_img_box"><img loading="lazy"
																			src="<?php echo asset('client/images/user.png'); ?>" alt="user"> </div>
																	<div class="alllearners_reviews_info_box">
																		<h5><span style="color:#333;">{{ $comment->comment_author }} </span> <span
																				class="star-rating pull-right">
																				<?php
										$whole = floor($comment->rating);
										$fraction = $comment->rating - $whole;
										$remain = 5 - $whole;
										for ($i = 0; $i < $whole; ++$i) {
											echo "<a href=\"javascript:void(0)\" class=\"emptystar fullstar\"></a>";
										}
										if ($fraction > 0 && $fraction < 1) {
											echo "<a href=\"javascript:void(0)\" class=\"emptystar halfstar\"></a>";
											--$remain;
										}
										for ($i = 0; $i < $remain; ++$i) {
											echo "<a href=\"javascript:void(0)\" class=\"emptystar\"></a>";
										}
																				?>

																			</span>
																		</h5>
																		<h6 class="reviewer_profession" style="color:#2874F0">
																			[{{ getStarCodedStr($comment->comment_author_email, 'email') }} |
																			{{ getStarCodedStr($comment->comment_author_phone, 'number') }}] <span
																				class="com-date pull-right">{{ date_format(date_create($comment->created_at), "dS-M\' Y") }}</span>
																		</h6>
																	</div>
																</div>
																<div class="reviewsquots_box">
																	<?php
										$arr = [];
										if (!empty($comment->comment_content)) {
											$arr[] = $comment->comment_content;
										}
										$addr = getAddress($arr, 300);
										if ($addr->ispositiveresponse) {
																		?>
																	<?php if ($addr->issubstr): ?>
																	<p class="reviewsquots_info reviewsquots_txt">{{ $addr->substr }} </p>
																	<a data-content="{{ $addr->fullstr }}" class="r-more-info" type="button">More
																		&gt;&gt;</a>
																	<?php else: ?>
																	<p class="reviewsquots_info reviewsquots_txt">{{ $addr->fullstr }}</p>
																	<?php endif; ?>
																	<?php
										}
																		?>
																</div>
															</div>
									@endforeach
								 
								</div>
							@endif
						</div>








					</div>
				</div>


<div class="modal fade" id="g_MapsModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true" style="height:98%;">
		<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center" style="width:95%;">
		<div class="modal-content" style="min-height:100%;height:auto;">
		<div class="modal-header" style="background-color:#F2F2F2;color:#000;">
		<button type="button" class="close" data-dismiss="modal"><span
		aria-hidden="true" style="color:#000">&times;</span><span
		class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myModalLabel">Google Maps</h4>
		</div>
		<div class="modal-body">
		<div class="row">
		<div class="col-md-3">
		<div class="col-md-12">
		<div class="row">

		<ul style="list-style-type:none;margin-left:-30px;">
		<li><i class="fa fa-fw fa fa-institution location-icon-1"
				aria-hidden="true"></i><span class=""
				style="font-weight:bold;font-size:20px;"><strong>{{ $client->business_name }}</strong></span>
		</li>
		<li><i class="fa fa-fw fa-map-marker location-icon-1"
				aria-hidden="true"></i><span
				class="phone-txt"
				id="g_MapName">{{$client->address}}</span>
		</li>
		<!--<li><i class="fa fa-fw fa fa-phone-square location-icon-1" aria-hidden="true"></i><span class="phone-txt">{{isset($client->landline)&&!empty($client->landline)?"(+91)"."-".$client->stdcode."-".$client->landline:""}}</span></li>
		<li><i class="fa fa-fw fa fa-mobile location-icon-1" aria-hidden="true"></i><span class="phone-txt">{{isset($client->mobile)&&!empty($client->mobile)?"(+91)".$client->mobile:""}}{{(isset($client->mobile,$client->sec_mobile)&&!empty($client->sec_mobile)&&!empty($client->mobile))?", ":""}}{{isset($client->sec_mobile)&&!empty($client->sec_mobile)?"(+91)".$client->sec_mobile:""}}</span></li>-->
		<li><i class="fa fa-fw fa fa-envelope location-icon-1"
				aria-hidden="true"></i><a
				href="{{isset($client->email) && !empty($client->email) ? "mailto:" . $client->email : "#"}}">Send
				Enquriy By Mail</a></li>
		<li><i class="fa fa-fw fa fa-chrome location-icon-1"
				aria-hidden="true"></i><a
				href="{{isset($client->website) && !empty($client->website) ? $client->website : 'javascript:void(0)'}}">{{isset($client->website) && !empty($client->website) ? $client->website : 'Website Not Available'}}</a>
		</li>
		</ul>
		</div>
		</div>
		</div>
		<div class="col-md-9" style="height:570px">
		<!--<div id="map_canvas" style="width:100%;height:100%;background-color:#e3e3e3;"></div>-->

		<div class="map-area">
		<div style="wdith:100%" class="map-container">
		<?php if (!empty($client->address)) {?>
		<iframe style="width:100%;height:695px"
		frameborder="0" scrolling="no" style="border:0"
		src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php echo $client->address; ?>"
		allowfullscreen>
		</iframe>
		<?php } else { ?>
		<iframe style="width:100%;height:695px"
		frameborder="0" scrolling="no" style="border:0"
		src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q=<?php if ($client->city) {
		echo $client->city;
		} ?>"
		allowfullscreen>
		</iframe>

		<?php  } ?>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>


				


				
			</div>




		</div>
	

<div class="container"> 
		<?php 

	if (!empty($assignedKwds) && isset($assignedKwds[0]->child_id)) {
				?>
		<div class="related-seach">

			<div class="col-xs-12">
				<h3>Related Searches</h3>
				<script>
					localStorage.getItem('keyword');

				</script>

				<ul>
					<?php


		$relKeywords = App\Models\Keyword::where(
			'child_category_id',
			$assignedKwds[0]->child_id
		)->pluck('keyword');

		if ($relKeywords->isNotEmpty()) {
			foreach ($relKeywords as $keyword) {
				?>
					<li>
						<a href="<?php echo generate_slug($keyword) ?>" class="keystore">
							{{ $keyword }} |
						</a>
					</li>
					<?php
			}
		}


	?>



				</ul>

			</div>
		</div>
		<?php  } ?>

		<div class="col-xs-12">
			<article class="jsx-5f2699f63e338e40">

				<div class="jsx-5f2699f63e338e40 jdwrapper dtlboxleft_section jddtl_overview mt-20 mb-20 pl-20 pr-20">
					<div class="jsx-5f2699f63e338e40 overview_content font16 fw400 color111">
						<h2> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?> located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?> </h2>
						<p> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?>, located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?>, has been a leader in skill development since
							many years. The company specializes in providing a comprehensive range of training programs
							designed to equip individuals with the practical knowledge and expertise needed to excel in
							their chosen fields.</p>

						<h3>Overview of Business</h3>
						<p> <?php if ($client->business_name) {
		echo $client->business_name;
	} ?> located in
							<?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?> is a prominent training institute offering specialized programs in 
	<?php 
$firstHalf = [];
	$secondHalf = [];
	$i = 1;
	$inPopupArr = [];
	foreach ($assignedKwds as $assignedKwd) {
		$inPopupArr[$assignedKwd->child_category_name][] = $assignedKwd->keyword;


		if ($i <= 40):
			if ($i % 2 == 0) {
				$secondHalf[] = "<span>" . $assignedKwd->keyword . "</span>,";
			} else {
				$firstHalf[] = "<span>" . $assignedKwd->keyword . "</span>";
			}
			++$i;
		endif;
	}
	$common = array_intersect($secondHalf, $firstHalf); 
 
echo implode(", ", $firstHalf); 
?>
	
 . The institute is dedicated to delivering skill-focused to meet the demands of today’s competitive job market.</p><p>With flexible operating hours from
							<?php
 

						if (!empty($client->time)) {
							$times = json_decode($client->time);
							$today = strtolower(date('l'));
						
								?>
												<tr class="today">
													<td><?php echo "Today"; ?></td>
													<td><?php echo $times->$today->from . " - " . $times->$today->to?></td>
												</tr>
												<?php
							foreach ($times as $day => $time) {
								?>
												<tr class="hide otherday">
													<td><?php echo ucfirst($day); ?></td>
													<td><?php echo $time->from . " - " . $time->to; ?></td>
												</tr>
												<?php
							}
						} else {
							echo "<tr><td>No working hours available</td></tr>";
						}

			?>
				<?php if ($client->business_name) {
		echo $client->business_name;
	} ?>			makes it easy for learners to upgrade their skills while balancing other commitments. The institute is backed by a team of highly experienced professionals who are committed to providing quality training and personalized attention to every participant.
							<?php if ($client->business_name) {
		echo $client->business_name;
	} ?> is committed to delivering
							high-quality training to each participant.
						</p>
						<p>Whether you're looking to improve your technical skills, leadership capabilities, or
							industry-specific knowledge, <?php if ($client->business_name) {
		echo $client->business_name;
	} ?>
							in <?php if ($client->area) {
		echo $client->area;
	} ?>,
							<?php if ($client->city) {
		echo $client->city;
	} ?> has the right program for you. With a wide
							range of offerings, including IT, management, soft skills, and vocational training,
							<?php if ($client->business_name) {
		echo $client->business_name;
	} ?> stands as a comprehensive
							solution for all your skill development needs.</p>
					</div>
				</div>

				<div class="mt-20 mb-20 pl-20 pr-20">
					<div class="jsx-5f2699f63e338e40 overview_content font16 fw400 color111">

					 

					</div>
				</div>
			</article>



		</div>
	 




	</div>


<div class="modal fade" id="smsEmailModal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="vertical-alignment-helper">
<div class="modal-dialog vertical-align-center">
<div class="modal-content">
<div class="modal-header"
style="padding:8px 50px;border-radius:4px 4px 0 0">
<button type="button" class="close"
data-dismiss="modal">&times;</button>
<h4><!--span class="glyphicon glyphicon-lock"></span--> Post Your
Requirement</h4>
</div>
<div class="modal-body" style="padding:22px 50px;">
<form action="" method="post"
onsubmit="return homeController.saveEnquiry(this)"
class="lead_form">
{{csrf_field()}}
<div class="form-group">
<label for="name"><span
	class="glyphicon glyphicon-user"></span>
Name</label>
<input type="text" class="form-control" name="name"
placeholder="Name">
</div>
<div class="form-group">
<label for="mobile"><span
	class="glyphicon glyphicon-phone"></span>
Mobile</label>
<input type="tel" class="form-control" name="mobile"
placeholder="Mobile Number">
</div>
<div class="form-group">
<label for="email"><span
	class="glyphicon glyphicon-envelope"></span>
Email</label>
<input type="email" class="form-control" name="email"
placeholder="Email">
</div>
<div class="form-group">
<label for="city_id"><span
	class="glyphicon glyphicon-envelope"></span>
City</label>
<select class="form-control select2-single location city"
name="city_id">
<option value="">Select City</option>
@if(count($cities) > 0)
	@foreach($cities as $city)
		<option value="{{$city->city}}">{{$city->city}}</option>
	@endforeach
@endif
</select>
</div>
<div class="form-group">
<label for="course"><span
	class="glyphicon glyphicon-list"></span> Service
Interested</label>
<input type="text" class="form-control home-search"
name="kw_text" placeholder="Course Interested"
autocomplete="off">
<div class="ajax-suggest ajax-suggest-lead-home"
style="display: none;">
<ul></ul>
</div>
</div>
<input type="reset" class="btn btn-primary hide reset_lead_form"
value="reset" />
<input type="submit" id="login-button"
class="btn btn-info btn-block" name="lead_form"
value="Request Information" />
</form>
</div>
</div>
<!--div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Form</h4>
</div>
<div class="modal-body">
<form action="" method="POST">
<p><label>Name</label><input type="text" class="form-control" required></p>
<p><label>Mobile</label><input type="text" class="form-control" required></p>
<p><label>Email</label><input type="text" class="form-control" required></p>
<p><label>Course Interested</label><input type="text" class="form-control" required></p>
<p><input type="submit" class="btn btn-info"></p>
</form>
</div>
</div-->
</div>
</div>
</div>



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
	<div class="galleryPopup">
		<div class="popwraper whiteBg">
			<button type="button" class="close closebtn" data-dismiss="modal">×</button>
			<div id="gallery" class="content">
				<div class="topinfo">
					<strong>{{(isset($client->business_name) && !empty($client->business_name)) ? $client->business_name . "," : ""}}</strong>
					<?php if ($addr->ispositiveresponse) { ?>
					<?php if ($addr->issubstr): ?>
					{{ $addr->substr }}
					<a href="javascript:void(0)" style="color:red" data-toggle="tooltip" data-placement="bottom" title=""
						data-original-title="{{ $addr->fullstr }}">more</a>
					<?php else: ?>
					{{ $addr->fullstr }}
					<?php endif; ?>
					<?php } ?>
					<span><small style="font-size:inherit" id="p_count"></small> of
						<?php echo (!empty($client->pictures)) ? count(unserialize($client->pictures)) : ""; ?></span>
				</div>
				<div id="controls" class="controls"></div>
				<div class="slideshow-container">
					<div id="loading" class="loader"></div>
					<div id="slideshow" class="slideshow"></div>
				</div>
				<div id="caption" class="caption-container">
					<strong>{{(isset($client->business_name) && !empty($client->business_name)) ? $client->business_name . "," : ""}}</strong>
					<?php if ($addr->ispositiveresponse) { ?>
					<?php if ($addr->issubstr): ?>
					{{ $addr->substr }}
					<a href="javascript:void(0)" style="color:red" data-toggle="tooltip" data-placement="bottom" title=""
						data-original-title="{{ $addr->fullstr }}">more</a>
					<?php else: ?>
					{{ $addr->fullstr }}
					<?php endif; ?>
					<?php } ?>
				</div>
			</div>

			<?php if (!empty($client->pictures)):
		$pictures = unserialize($client->pictures);
		$pictures = array_slice($pictures, 0);				
				?>
			<div id="thumbs" class="navigation">
				<ul class="thumbs noscript">
					<?php foreach ($pictures as $picture): ?>
					<li>
						<a class="thumb" href="<?php echo asset('' . $picture['large']['src']); ?>" title=""><img loading="lazy"
								src="<?php echo asset('' . $picture['large']['src']); ?>" style="height:75px;width:100px;"
								alt="<?php if ($picture['large']['name']) {
				echo $picture['large']['name'];
			} ?>" /></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			
		</div>
	</div>
	


	<script>
		$('.home-search').val(localStorage.getItem('keyword'));
	</script>




	<style>
	.vertical-alignment-helper {
	display: table;
	height: 100%;
	width: 100%;
	pointer-events: none;
	/* This makes sure that we can still click outside of the modal to close it */
	}

	.vertical-align-center {
	/* To center vertically */
	display: table-cell;
	vertical-align: middle;
	pointer-events: none;
	}

	.modal-content {
	/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
	width: inherit;
	height: inherit;
	/* To center horizontally */
	margin: 0 auto;
	pointer-events: all;
	}

	#smsEmailModal .modal-header,
	#smsEmailModal h4,
	#smsEmailModal .close {
	background-color: #fe610c;
	color: white !important;
	text-align: center;
	font-size: 22px;
	}

	#smsEmailModal .modal-footer,
	#login-button {
	background-color: #fe610c;
	border: 1px solid #fe610c;
	}

	#smsEmailModal .modal-header .close {
	margin-top: -9px;
	margin-right: -32px;
	color: #fff;
	opacity: 0.8;
	}

	#smsEmailModal .select2-container--bootstrap {
	width: inherit !important;
	}

	/* Always set the map height explicitly to define the size of the div
	* element that contains the map. */
	#map {
	width: 100%;
	height: 100%;
	}

	#floating-panel {
	position: absolute;
	top: 10px;
	left: 25%;
	z-index: 5;
	background-color: #fff;
	padding: 5px;
	border: 1px solid #999;
	text-align: center;
	font-family: 'Roboto', 'sans-serif';
	line-height: 30px;
	padding-left: 10px;
	}

	.ajax-suggest-lead-home {
	top: 381px;
	left: 52px;
	width: 78.3%;
	border-radius: 4px;
	}
	</style>
	<style>

	.review_form   .help-block strong {
	margin-top: 32px;
	margin-left: 167px;
	}

	.review_form .rating-box .help-block strong {
	margin-top: -5px;
	margin-left: 167px;
	}

	.review_form .area-box strong {
	margin-top: -9px;
	margin-left: 167px;
	}
	#intro {
	color: #474849;
	}

	#intro h1 {
	font-size: 24px;
	}

	#intro h3,
	#intro h1 {
	/*border-bottom:1px solid #ddd;*/
	padding-bottom: 8px;
	margin-top: 40px;
	}

	#intro h3:after,
	#intro h1:after {
	content: '';
	display: block;
	/*border-bottom: 1px solid #ddd;*/
	top: 6px;
	position: relative;
	box-shadow: 0 1px 0 #ddd;
	}

	#cvs+span {
	visibility: hidden !important;
	}

	#intro h1,
	#intro h2 {
	font-weight: 400;
	font-size: 18px;
	color: #314252;
	line-height: 14px;
	padding: 5px 0;
	margin-top: 3px;
	margin-bottom: 0px;
	font-family: 'Open Sans', Arial, sans-serif !important;
	}

	#intro .inner-intro {
	padding-bottom: 6px;
	margin-bottom: 13px;
	/* border-bottom: 1px solid #ddd; */
	font-family: 'Open Sans', Arial, sans-serif !important;
	line-height: 1.5em;

	}

	#intro h2 {
	margin-bottom: 10px;
	}
	</style>
<style>
						/* Container */
						.top-details {
							display: grid;
							grid-template-columns: 1.2fr 1fr;
							gap: 20px;
							background: #ffffff;
							padding: 20px;
							border-radius: 12px;
							box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
							margin-bottom: 25px;
						}

						/* Left Box */
						.top-details aside {
							background: #f9f9f9;
							padding: 20px;
							border-radius: 10px;
						}

						/* Business Name */
						.details-txt {
							font-size: 22px;
							font-weight: 600;
							margin-bottom: 8px;
						}

						.details-txt a {
							color: #1a1a1a;
							text-decoration: none;
						}

						.details-txt a:hover {
							color: #0d6efd;
						}

						 

						/* Right Box (Map) */
						.top-details>div {
							background: #f9f9f9;
							padding: 10px;
							border-radius: 10px;
						}

						/* Map iframe */
						.top-details iframe {
							width: 100%;
							height: 100%;
							min-height: 200px;
							border-radius: 10px;
							border: 0;
						}

						/* Responsive */
						@media (max-width: 768px) {
							.top-details {
								grid-template-columns: 1fr;
							}

							.top-details iframe {
								min-height: 100px;
							}
						}
					</style>



<style>
						.heading h3 {
							font-size: 20px;
							color: #0b4f6c;
							margin-bottom: 10px;
							border-bottom: 2px solid #0b4f6c;
							padding-bottom: 5px;
							text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
						}

						.modal-header h3 {
							font-size: 20px;
							color: #0b4f6c;
							margin-bottom: 10px;
							border-bottom: 2px solid #0b4f6c;
							padding-bottom: 5px;
							text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
						}

						.section h2 {
							font-size: 20px;
							color: #0b4f6c;
							margin-bottom: 10px;
							border-bottom: 2px solid #0b4f6c;
							padding-bottom: 5px;
							text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.15);
						}
.sections {
	    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}
						
					</style>


	<style>
			.related-seach {
				padding: 0 0 10px;
				position: relative;
				width: 100%;
				margin-top: 30px;
			}

			.related-seach ul {
				list-style: outside none none;
				margin: 0 -7px;
				padding: 0;
			}

			.related-seach ul li {
				display: inline-grid;
				line-height: 17px;
			}

			.assign-city {
				padding: 0 0 10px;
				position: relative;
				width: 100%;
				margin-top: 30px;
			}

			.assign-city ul {
				list-style: outside none none;
				margin: 0 -7px;
				padding: 0;
			}

			.assign-city ul li {
				display: inline-grid;
				line-height: 17px;
			}



			.section {
    padding: 15px;
}


.services {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.service {
    background: #eef3ff;
    padding: 8px 12px;
    border-radius: 20px;
    font-size: 13px;
    animation: slideUp .6s ease;
}
		</style>

		
<style>
	.section {
    padding: 15px;
}

.heading h3 {
    font-size: 18px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.heading i {
    color: #0d6efd;
}

/* Gallery Grid */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

/* Gallery Item */
.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    background: #f5f7fb;
    animation: fadeUp 0.5s ease;
}

.gallery-item img {
    width: 100%;
    height: 110px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

/* Hover Animation */
.gallery-item:hover img {
    transform: scale(1.08);
}

/* Placeholder */
.gallery-item.placeholder img {
    object-fit: contain;
    padding: 12px;
    opacity: 0.8;
}

/* Mobile Responsive */
@media (max-width: 480px) {
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Animation */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

<style>

	/* Certificate Item */
.cert-item {
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
}

.cert-item img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.cert-item:hover img {
    transform: scale(1.05);
}

/* LIGHTBOX */
.lightbox-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.85);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    animation: fadeIn 0.3s ease;
}

.lightbox-overlay img {
    max-width: 90%;
    max-height: 90%;
    border-radius: 12px;
}

/* Close Button */
.lightbox-close {
    position: absolute;
    top: 20px;
    right: 25px;
    font-size: 30px;
    color: #fff;
    cursor: pointer;
}

@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}

</style>




<div class="lightbox-overlay" id="lightbox">
    <span class="lightbox-close">&times;</span>
    <img loading="lazy" src="" alt="Preview">
</div>

<script>
document.querySelectorAll('.lightbox-trigger').forEach(item => {
    item.addEventListener('click', function () {
        const imageSrc = this.getAttribute('data-image');
        const lightbox = document.getElementById('lightbox');
        lightbox.querySelector('img').src = imageSrc;
        lightbox
		
		
		
		.style.display = 'flex';
    });
});

document.querySelector('.lightbox-close').addEventListener('click', () => {
    document.getElementById('lightbox').style.display = 'none';
});

document.getElementById('lightbox').addEventListener('click', e => {
    if (e.target.id === 'lightbox') {
        e.currentTarget.style.display = 'none';
    }
});
</script>



 <script src="{{ asset('client/js/jquery.galleriffic.js') }}" defer></script>

 <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('div.navigation').css({
                'width': '25%',
                'float': 'right'
            });
            $('div.content').css('display', 'block');

            var onMouseOutOpacity = 0.67;
            $('#thumbs ul.thumbs li').opacityrollover({
                mouseOutOpacity: onMouseOutOpacity,
                mouseOverOpacity: 1.0,
                fadeSpeed: 'fast',
                exemptionSelector: '.selected'
            });
            // Initialize Advanced Galleriffic Gallery
            if ($('#thumbs').length) {
                var gallery = $('#thumbs').galleriffic({
                    delay: 2500,
                    numThumbs: 15,
                    preloadAhead: 10,
                    enableTopPager: true,
                    enableBottomPager: true,
                    maxPagesToShow: 7,
                    imageContainerSel: '#slideshow',
                    controlsContainerSel: '#controls',
                    captionContainerSel: '#caption',
                    loadingContainerSel: '#loading',
                    renderSSControls: true,
                    renderNavControls: true,
                    playLinkText: 'Play Slideshow',
                    pauseLinkText: 'Pause Slideshow',
                    prevLinkText: '&lsaquo; Previous Photo',
                    nextLinkText: 'Next Photo &rsaquo;',
                    nextPageLinkText: 'Next &rsaquo;',
                    prevPageLinkText: '&lsaquo; Prev',
                    enableHistory: false,
                    autoStart: false,
                    syncTransitions: true,
                    defaultTransitionDuration: 900,
                    onSlideChange: function (prevIndex, nextIndex) {
                        // 'this' refers to the gallery, which is an extension of $('#thumbs')
                        this.find('ul.thumbs').children()
                            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                            .eq(nextIndex).fadeTo('fast', 1.0);
                    },
                    onPageTransitionOut: function (callback) {
                        this.fadeTo('fast', 0.0, callback);
                    },
                    onPageTransitionIn: function () {
                        this.fadeTo('fast', 1.0);
                    }
                });
            }
        });


		

    var defaults = {
        mouseOutOpacity: 0.67,
        mouseOverOpacity: 1.0,
        fadeSpeed: 'fast',
        exemptionSelector: '.selected'
    };

    $.fn.opacityrollover = function (settings) {

        // Create config object properly
        var config = $.extend({}, defaults, settings);

        function fadeTo(element, opacity) {
            var $target = $(element);

            if (config.exemptionSelector) {
                $target = $target.not(config.exemptionSelector);
            }

            $target.stop(true, true).fadeTo(config.fadeSpeed, opacity);
        }

        return this.each(function () {

            $(this)
                .css('opacity', config.mouseOutOpacity)
                .hover(
                    function () {
                        fadeTo(this, config.mouseOverOpacity);
                    },
                    function () {
                        fadeTo(this, config.mouseOutOpacity);
                    }
                );
        });
    };

</script>
@endsection