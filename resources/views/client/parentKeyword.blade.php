@extends('client.layouts.app')
@section('title')
@section('title')
@if(!empty($keyword->meta_title))	
<?php   
$key = preg_replace('/in {{city}}/i','',$keyword->meta_title);
echo trim($key);   ?>
@else
	@if(!empty($keyword->keyword)){!!$keyword->keyword!!}@endif  

@endif
@endsection 
@section('keyword')
<?php if(!empty($keyword->meta_keywords)){
$msg = preg_replace('/in {{city}}/i',' ',$keyword->meta_keywords);
echo trim($msg); } ?>
@endsection
@section('description')
<?php if(!empty($keyword->meta_description)){
$descrip = preg_replace('/{{city}}/i',' ',$keyword->meta_description);
echo trim($descrip); } ?> 
@endsection
@section('content')	 
    <div class="container">
        <div class="row">
          
          
            <div class="col-xs-12 col-sm-12 col-md-12 third-add-section">
                
                <?php  
            
               
                    if(!empty($keyword->child_banner)){
                    $cicons= unserialize($keyword->child_banner); 
                    if (!empty($cicons)) {
                    ?>
                    
                    <img loading="lazy" src="{{asset(''.$cicons['child_banner']['src'])}}" alt="{{ $cicons['child_banner']['name'] }}">
                    
                    <?php  }else{ ?>
                    
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    <?php  } }else{ 
                        
                        if(!empty($keyword->category_banner)){
                    $cicons= unserialize($keyword->category_banner); 
                    if($cicons){
                    ?>
                    
                    <img loading="lazy" src="{{asset(''.$cicons['category_banner']['src'])}}" alt="{{ $cicons['category_banner']['name'] }}">
                    
                    
                    <?php  } }else{  ?>
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    
                    <?php } } ?>               
                
                </div>
        </div>
    </div>   
<?php 

 
if(!empty($city)){ ?>
   <div class="clearfix"></div>   
    <div class="container">
        <div class="form-section">
            <div class="removeLeftSpace">
                <h1 class="hdTitle">				 
					<a href="{{url('')}}/<?php if(!empty($city)) { echo $city; } ?>" title="<?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?>">
					    <?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?></a> 

				@if(!empty($city))
				<?php
				$rating = 5;
				$stars = 'star_4.75_new.png';
				$ext = '.png'; 
				switch($rating){  
				case 0:
				$stars = 'star_1'.$ext;
				break;
				case 2:
				$stars = 'star_2'.$ext;
				break;
				case 3:
				$stars = 'star_3'.$ext;
				break;
				case 3.5:
				$stars = 'star_3.5_new'.$ext;
				break;
				case 4:
				$stars = 'star_4'.$ext;
				break;
				case 4.5:
				$stars = 'star_4.5_new'.$ext;
				break;
				case 4.75:
				$stars = 'star_4.75_new'.$ext;
				break;
				case 5:
				$stars = 'star_5_new'.$ext;
				break;
				}
				?>
				 
			<div itemscope itemtype="https://schema.org/Product" style="font-size: 12px;font-weight: 500;">
				<div class="text-primary" itemprop="name"></div>
				<div itemprop="aggregateRating"
				itemscope itemtype="https://schema.org/AggregateRating">
				<img loading="lazy" itemprop="image" src="{{ asset('client/images/'.$stars) }}"  alt="5 Star Rating: Very Good"/>
				<span itemprop="ratingValue"><?php   echo number_format((float) 5, 1, '.', '');   ?></span>
				out of <span itemprop="bestRating"></span>
				based on <span itemprop="ratingCount">656</span> ratings
				</div>    
			</div>
				
				 
        @endif
			 </h1>
            </div>
                <div class="removeRightSpace">
 				<div class="btn btn-primary common_popup_form top-btn">Send Enquiry</div>
			</div>
 
        </div>
	 
    </div>
 
    <script>
        $(document).ready(function() {
            $('.proceedBtn').click(function() {
                $('.proceedBtn').hide();
                $('.stopprocess').show();
                $('.formDiv').slideDown();
            });

            $('.stopprocess').click(function() {
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
				<h2>Top 
					<?php  if (!empty($keyword->keyword)) {
					$top_key = preg_replace('/{{city}}/i', strtoupper($city), $keyword->keyword);
					echo trim($top_key);
				} ?>					 
				</h2>
				<p title="<?php if (!empty($keyword->keyword)) {
					echo $keyword->keyword;
				} ?> in {{Request::segment(1)}}"><?php  if (!empty($keyword->top_description)) {
					$keydescription = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->top_description);
					echo trim($keydescription);
				} ?></p>
			</div>
			@endif			

			@if($clientskeyword->isNotEmpty())
				<?php $n=0;?>
				@foreach($clientskeyword as $client)
			
				<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
				    <div class="client-list-first">
					<div class="col-sm-4 col-md-4 serchlist-img "><a href="{{ url('business-details')."/".$client->business_slug }}" title="{{$client->business_name or ""}}">
						<?php if(null != $client->logo){
							$profilePic = unserialize($client->logo);
							?><img loading="lazy" src="<?php echo asset(''.$profilePic['large']['src']); ?>" alt="{{$client->business_name}}" title="{{$client->business_name}}" height="141" /><?php
						}else{
							?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.jpg'); ?>" alt="Business Logo" title="Business Logo" height="141" style="width:100%" /><?php
						}
						?>
						@if($client->client_type != 'FreeListing')
						<p><a href="#"><i class="fa fa-fw fa fa-thumbs-up serchlist-location-icon" aria-hidden="true"></i></a></p>
						@endif
						</a>
					</div>
					<div class="col-sm-6 col-md-6 aboutcomp">
				 
				 @if($client->certified_status)		 
					<div class="client-trusted">				
					@if($client->certified_status)					 
							<img loading="lazy" src="{{ asset('img/q_verified.gif')}}">
							@endif
					@if($client->trusted_status)
							<img loading="lazy" src="{{ asset('img/q_trust.gif')}}">
							@endif
						@if($client->gst_status) 
							<img loading="lazy" src="{{ asset('img/q_gst.gif')}}">
							@endif							 									 
					</div>
					@endif
						<a href="{{ url('business-details')."/".$client->business_slug }}" title="{{$client->business_name or ""}}">
							<span class="serchlist-txt-1">
								<i class="fa fa-fw fa-university serchlist-icon" aria-hidden="true"></i>						 							
								<?php echo ucfirst(strtolower(substr($client->business_name,0,28)));?>  
							</span>
							<?php
								$badge = $client->sold_on_position;
							?>
						 
							 
						</a>
				 
						<div class="certified" <?php if($client->certified_status==1){ ?> style="background-image: url(../client/images/certified-icon.png);" <?php } ?>>
						 
						<?php
							$arr=[];
							if(!empty($client->address)){
								$arr['address'] = $client->address;
							}
							if(!empty($client->landmark)){
								$arr['landmark'] = $client->landmark;
							}
							if(!empty($client->city)){
								$arr['city'] = $client->city;
							}
							if(!empty($client->state)){
								$arr['state'] = $client->state;
							}
							if(!empty($client->country)){
								$arr['country'] = $client->country;
							}
							$addr = getAddress($arr,30);
							if($addr->ispositiveresponse){
							?>
								<div class="serchlist-txt">
									<i class="fa fa-fw fa fa-street-view icon" aria-hidden="true"></i>
									<?php if($addr->issubstr): ?>
										<a href="{{ url('business-details')."/".$client->business_slug }}">{{ ucfirst(strtolower($addr->substr)) }}</a>
										<a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $addr->fullstr }}">more</a>
									<?php else: ?>
										<a href="{{ url('business-details')."/".$client->business_slug }}">{{ ucfirst(strtolower($addr->substr)) }}</a>
									<?php endif; ?>
								</div>
							<?php
							}
						?>
						 
						 
						<div class="serchlist-txt"><i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
							<a href="{{ url('business-details')."/".$client->business_slug }}" title="{{$client->business_name or ""}}"><span class="serchlist-txt">
							<?php
							if(!empty($client->time)){
								$times = json_decode($client->time);
								$today =  strtolower(date('l'));
								echo "Opening Hrs (".$times->$today->from." - ".$times->$today->to.")";
							}else{
								echo "No working hours available";
							}
							?>
							</span></a>
						</div>
							<div class="serchlist-txt" >
							<i class="fa fa-fw fa fa-cog serchlist-icon" aria-hidden="true"></i>
							<span class="serchlist-txt">
								<div class="col-md-12 service-text" >
								<ul>
								<?php
								
							$assignedKwds = DB::table('assigned_kwds')
							  ->join('keyword','keyword.id','=','assigned_kwds.kw_id')
							  ->join('child_category','child_category.id','=','assigned_kwds.child_cat_id')
							  ->select('keyword.keyword','child_category.child_category as child_category_name')
							  ->where('assigned_kwds.client_id','=',$client->id)
							  ->limit(2)
							  ->get();
								$firstHalf = [];
								$secondHalf = [];
								$i = 1;
								$inPopupArr = [];
								foreach($assignedKwds as $assignedKwd){										 
								?>
								
								<li>
								<a href="<?php echo generate_slug($assignedKwd->keyword) ?>" title="{{$assignedKwd->keyword}}" class="keystore"><?php echo $assignedKwd->keyword; ?></a>
								</li>
											 <?php  }  ?>
							</ul>
									</div>
							
									 
							 </span>
						</div>
						</div>
					 
						<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="{{$client->business_name or ""}}" class="sms-view open-popup"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" title="{{$client->business_name or ""}}" class="whatsapp-view open-popup"><span><i class="fa fa-whatsapp"></i> WhatsApp</span></a> &nbsp;&nbsp;&nbsp;<a href="{{ url('business-details')."/".$client->business_slug }}" title="{{$client->business_name or ""}}" class="sms-view"><span>Vew Details</span></a></div>
					
					 
					</div>
					</div>
                    <div class="client-list-second" >
					<div class="col-sm-2 col-md-2 btnBox">
						<a href="{{ url('business-details')."/".$client->business_slug }}"><span class="serchlist-txt-1">User Rating</span></a>
						<div class="serchlist-txt">
							<?php
								if($client->comment_count>0){
									$avgRating = ($client->rating/(5*$client->comment_count))*5;
									$avgRating = number_format($avgRating, 1, '.', '');
									$whole = floor($avgRating);
									$fraction = $avgRating - $whole;
									$remain = 5-$whole;
									for($i=0;$i<$whole;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar fullstar'></a>";
									}
									if($fraction>0&&$fraction<1){
								 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar halfstar'></a>";
										--$remain;
									}
									for($i=0;$i<$remain;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar'></a>";
									}
								}else{
									$avgRating = 0.0;
									for($i=0;$i<5;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar'></a>";
									}									
								}
							?>
					 
							<a href="{{ url('business-details')."/".$client->business_slug }}"><span class="serchlist-rating">({{$avgRating or "0"}} Rating out of {{$client->comment_count or "0"}} Votes)</span></a>
						</div>
					<button class="serchlist-btn" title="Best Offer {{$client->business_name or ""}}">Enquiry Now</button>
					</div>

					<div class="col-sm-12 col-md-12" style="padding-left:0;">
						<div class="clickBlick"><a href="{{ url('business-details').'/'.$client->business_slug.'/#rewandrate' }}" title="{{$client->business_name or ""}}"><i class="fa fa-fw fa fa-sun-o" aria-hidden="true"></i></a><a href="{{ url('business-details').'/'.$client->business_slug.'/#rewandrate' }}" title="{{$client->business_name or ""}}"><span>Click here to view your friend rating</span></a></div>
					</div>
					
					</div>
				</div>
				@endforeach
		
				 
			
			 <ul id="pagin" ></ul>
<style>
.current .btn-info{
color: green;
}

#pagin li {
display: inline-block;
padding: 6px;
margin: 5px;
background-color: #C94A30; 
}

#pagin li a{
color: #fff;
}
</style>
 <script>
 
//Pagination
	pageSize = 10;
	var pageCount =  $(".line-content").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin").append('<li><a href="#top">'+(i+1)+'</a></li> ');
     }
        $("#pagin li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content").hide();
	    $(".line-content").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin li a").click(function() {
	    $("#pagin li a").removeClass("current btn btn-info");
	    $(this).addClass("current btn btn-info");
	    showPage(parseInt($(this).text())) 
	});
	</script>	 

@else

<?php 
if(!empty($keyword->heading)){  
	
	$i=0; 	$i++;	?> 

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

<div class="card"><div class="card-header" id="abthdgOne"><h2 class="mb-0"><button type="button" class="btn-link" data-target="#heading_<?php echo $keyword->id; ?>" data-parent="#courseAcrdMain">
<span>{!!$keyword->heading!!}</span> </button> </h2></div>
<div id="heading_<?php echo $keyword->id; ?>" class="collapse <?php if($i==1){ echo "show";} ?>" aria-labelledby="abthdgOne" ><div class="card-body"><ul>						 
 
 @if($keyword->courseabout)
<li style="font-size: 13px;">
<?php $courseabout = preg_replace('/{{city}}/i',ucfirst($city),$keyword->courseabout);
echo trim($courseabout); ?>	

</li>
 @endif
<ul>
    @if($keyword->paragraph1)
    <li><p style="font-size: 13px;"> 
	<?php $paragraph1 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph1);
echo trim($paragraph1); ?>		
	
	 </p></li>
    
    @endif
@if($keyword->paragraph2)
 <li><p style="font-size: 13px;"> 
<?php $paragraph2 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph2);
echo trim($paragraph2); ?>		
 
  </p> </li>
 @endif

@if($keyword->paragraph3)
 <li><p style="font-size: 13px;"> 
 <?php $paragraph3 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph3);
echo trim($paragraph3); ?>	
 
  </p> </li>
 @endif
 
 @if($keyword->paragraph4)
 <li><p style="font-size: 13px;"> 
<?php $paragraph4 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph4);
echo trim($paragraph4); ?>		
  </p> </li>
 @endif
 
 @if($keyword->paragraph5)
 <li><p style="font-size: 13px;"> 
<?php $paragraph5 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph5);
echo trim($paragraph5); ?>		
  </p> </li>
 @endif
 
 
 @if($keyword->paragraph6)
 <li><p style="font-size: 13px;"> 
	
 <?php $paragraph6 = preg_replace('/{{city}}/i',ucfirst($city),$keyword->paragraph6);
echo trim($paragraph6); ?>	
   </p> </li> 
@endif
  </ul>	
 	 </ul> 
</div> </div> 
</div>	  </div></div>
			</div>
			</div>
<?php  } ?>


	@endif
        </div>        
         <div class="col-sm-3 col-md-3 side-data reviews-box-1 rightsidedata"> 
						 
	 @include('client.layouts.common_sidebar_form')
	
	<div class="side-data-txt">
			<p>Featured Service Advertising</p>
		</div>
		<div class="side-row-1">
			<img loading="lazy" src="<?php echo asset('landing/img/ads1.png'); ?>" alt="advertise" title="advertise">
		</div>

        </div>
         
    </div>
    
 
 
	@if(!empty($reviewsClientsList))
	<div class="container">
	 <div class="col-sm-12 col-md-12"> 		
			@foreach($reviewsClientsList as $client)
			 <div class="col-sm-3 col-md-3 ">
			 <div class="reviews-client-box">
					<div class="side-row-1">
						<div class="side-data-txt-1"><a href="{{ url('training')."/".$client->business_slug }}" title="{{$client->business_name}}"><span>{{ $client->business_name}}</span></a></div>
						<div class="side-txt">
							<?php
								$badge = $client->sold_on_position;
							?>
							<img loading="lazy" src="<?php echo asset('client/images/'.$badge.'.png'); ?>" alt="{{$client->business_name}}" title="{{$client->business_name}}">
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="serchlist-txt">
						<?php
							if($client->comment_count>0){
								$avgRating = ($client->rating/(5*$client->comment_count))*5;
								$avgRating = number_format($avgRating, 1, '.', '');
								$whole = floor($avgRating);
								$fraction = $avgRating - $whole;
								$remain = 5-$whole;
								for($i=0;$i<$whole;++$i){
							
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar fullstar'></a>";
								}
								if($fraction>0&&$fraction<1){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar halfstar'></a>";
									--$remain;
								}
								for($i=0;$i<$remain;++$i){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar'></a>";
								}
							}else{
								$avgRating = 0.0;
								for($i=0;$i<5;++$i){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar'></a>";
								}									
							}
						?>
						 
					
						<a href="{{ url('business-details/' . $client->business_slug) }}"> <span class="serchlist-rating"> ({{ $avgRating ?? 0 }} Rating out of {{ $client->comment_count ?? 0 }} Votes) </span>
						</a>
					</div>
						 
							<p><?php echo ucfirst(substr($client->comment_content,0,200));?></p>
					 
					  </div>
					  </div>
				@endforeach
			
  
	 </div>
	 
	 
		@if(!empty($keyword->bottom_description))
		<div class="container"> 		 
		<div class="category-description">  
		<h4><?php  if(!empty($keyword->keyword)){ echo $keyword->keyword; } ?></h4>
		<p title="<?php if(!empty($keyword->keyword)) { echo $keyword->keyword; } ?> in India"><?php  if(!empty($keyword->bottom_description)){
		$keydescription = preg_replace('/{{city}}/i','India',$keyword->bottom_description);
		echo trim($keydescription); } ?></p>	 
		</div>
		
		 
		</div>
		@endif
	</div>    
	 @endif
	 
	 @if(!empty($keyword->faqq1))
		<div class="container">
		<div class="category-description">  
		<h4>FAQ:- <?php  if(!empty($keyword->keyword)){ 
		
		$key = preg_replace('/{{city}}/i',strtoupper($city),$keyword->keyword); echo trim($key); } ?> </h4> 
			<div itemscope itemtype="https://schema.org/FAQPage">
			<?php if(!empty($keyword->faqq1)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq1)){
			$faqq1 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq1);
			echo trim($faqq1); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa1)){
			$faqa1 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa1);
			echo trim($faqa1); } ?>
			 

			</div>
			</div>
			</div>
			<?php } ?>


			<?php if(!empty($keyword->faqq2)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq2)){
			$faqq2 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq2);
			echo trim($faqq2); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa2)){
			$faqa2 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa2);
			echo trim($faqa2); } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq3)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq3)){
			$faqq3 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq3);
			echo trim($faqq3); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa3)){
			$faqa3 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa3);
			echo trim($faqa3); } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq4)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq4)){
			$faqq4 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq4);
			echo trim($faqq4); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa4)){
			$faqa4 = preg_replace('/{{city}}/i',ucwords(str_replace("-", " ", Request::segment(1))),$keyword->faqa4);
			echo trim($faqa4); } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>
			<?php if(!empty($keyword->faqq5)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq5)){
			$faqq5 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq5);
			echo trim($faqq5); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa5)){
			$faqa5 = preg_replace('/{{city}}/i',ucwords(str_replace("-", " ", Request::segment(1))),$keyword->faqa5);
			echo trim($faqa5); } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>


			</div>
		
		</div>
		
		 
		</div>
		@endif
      @if(!empty($keyword))
      <div class="container">
	  <div class="category-box">
	   <div class="course-program">
	     <h4>Find <?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?> other Location</h4>
	   	<ul class="">
		@if(!empty($cities))
			@foreach($cities as $citys)
	   <li class="col-sm-3 col-md-3"><a href="{{url(strtolower($citys->city))}}/<?php if(!empty($city)) { echo $city; } ?>"  title="<?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?> in {{$citys->city}}">@if(!empty($city)){!!ucwords(str_replace("-"," ",$city))!!}@endif in {{$citys->city}}</a></li>
	   @endforeach
	   @endif
	    
	   </ul>
	   </div>
	 </div>
	 </div>
      @endif
	  
	  
	   <div class="clearfix"></div>
	 <br>
	 
	 
		  
      <div class="container">
	    
	  <div class="category-box">
	   <div class="course-program">
	    
	   <h5>Find Services Related to  </h5>
	   	<ul class="">
		@if(!empty($keywordlist))
			@foreach($keywordlist as $keywords)
	   <li class="col-sm-3 col-md-3"><a href="{{url('/')}}/<?php echo generate_slug($keywords->child_slug) ?>" title="<?php if(!empty($keywords->child_category)) { echo $keywords->child_category; } ?> ">{{$keywords->child_category}}</a></li>
	   
	   @endforeach
	   @endif
	   </ul>
	   </div>
	 </div>
	 
	  
	 </div>
     
	  
	   <div class="container">
        <div class="clearfix"></div>
        <h2 class="title">Our  <span>Business Services</a></span> </h2>
       <br>
	   <div class="category-box">
	   <div class="business-services">
	       	@if(!empty($parentCategories))
				<?php $i=0; ?>
			@foreach($parentCategories as $parent)	
	        <div class="sk-collapse">
                <div sulevent="toggleSkGroup" class="sk-group show" hasevent="true">
                    <div class="sk-label">
                        <h3 class="title">{{$parent->parent_category}}</h3>
                        <svg class="icon down-chevron" width="12" height="7.41">
                            <use xlink:href="#skIconDownChevron"></use>
                        </svg>
                    </div>
                    <div class="sk-data">
                        <ul class="content-list intent">
                            <?php   $childCategories = App\Models\ChildCategory::where('parent_category_id',$parent->id)->get();
                            if(!empty($childCategories)){
                                foreach($childCategories as $child){
                            ?>
                        <li><a href="{{url($child->child_slug)}}" tabindex="0" target="_blank">{{$child->child_category}}</a></li> 
                                      <?php } } ?>  
                        </ul>
                    </div>
                </div>
        </div>
        
        
          	@endforeach
			@endif
         
	       
	    
            
	 
	   </div>
	   </div>
        <div class="clearfix"></div>
    </div>
	  
      <?php }else{ ?>
	  
	     
			<div class="container">
			 
			<div class="row">
			<div class="col-sm-12 col-md-12 banner-details">
			<h4 class="Oops-txt">Oops! No Result Found </h5>
			<h2 class="error-txt"></h2>
			</div>
			</div>
			 
			</div>
 <div class="clearfix"></div>
    <div class="container">
	 
	  <div class="add-section">
	   <div class="col-xs-12">
			 
		<?php if(!empty($clientLists)): ?>
			<?php foreach($clientLists as $client):
				$image = '';
				if($client->logo!=''):
					$image = unserialize($client->logo);
					$image = $image['large']['src'];
				
			?>
			
				<div class="col-md-3">
				<div class="inner-client-div">
			 
				<figure><img loading="lazy" class="" src="<?php echo url($image); ?>"  alt="{{ $client->business_name}}" style="width:100%;"></figure>
				<div class="grid-info">
					<h3><a href="{{url('training').'/'.generate_slug($client->business_slug)}}" title="{{$client->business_name}}" tabindex="0"><div title="{{$client->business_name}}"><strong>{{$client->business_name}}</strong></div></a></h3>
				
					<strong>{{ucfirst($client->city)}}</strong>
					<a href="{{url('training').'/'.generate_slug($client->business_slug)}}" class="get-quotes" tabindex="0">View</a>
				</div>
				</div></div>
				
				
			<?php 
			endif;
			endforeach; 
			
			endif
			?>
                </div>
                </div>
                </div>
	  
	  <?php  } ?>
<div class="inquiry-popup"></div>
    <div class="bestDealpopup">
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>
		  <h4>Need Expert Advice ?</h4>
        <div class="jbt"> Fill this form and get best deals from "<span class="orng">@if(!empty($keyword->keyword)){!!$keyword->keyword!!}@endif</span>"</div>
        <div class="bdc">
            <form class="form-inline" action="" method="post" onsubmit="return homeController.saveEnquiry(this)">
                <aside>
				{{ csrf_field()}}
                    <p><label for="yn">Your Name <span>*</span></label>
						<input type="hidden" name="lead_form_" value="1" />
						<input type="hidden" name="kw_text" value="@if(!empty($keyword->keyword)){!!$keyword->keyword!!}@endif" />
						<input type="hidden" name="city_id" value="noida" />
                        <input class="jinp" type="text" placeholder="Enter Full Name" name="name" value="">
						<input type="hidden" name="from_page" value="{{ request()->path() }}">
                    </p>
                    <p>
                        <label for="ymn">Your Mobile <span>*</span></label>
                        <input class="jinp" type="tel" placeholder="Enter Mobile" name="mobile" value="">
                    </p>
                    <p>
                        <label for="yei">Your Email ID <span></span></label>
                        <input class="jinp" type="text" placeholder="Enter Email" name="email" value="">
                    </p>
                    <p>
                        <label class="moblab">&nbsp;</label>
						<input class="jbtn" type="submit" value="Submit" />
						<input type="reset" class="reset_lead_form hide" value="reset" />                         
                    </p>
                </aside>
            </form>
        </div>

        <section class="bdn">
            <aside class="jpb">
                <p>
                    <span class="bul"></span> Your requirement is sent to the selected relevant businesses
                </p>
                <p>
                    <span class="bul"></span> Businesses compete with each other to get you the Best Deal </p>
                <p>
                    <span class="bul"></span> You choose whichever suits you best
                </p>
                <p>
                    <span class="bul"></span> Contact Info sent to you by SMS/Email
                </p>
            </aside>
        </section>
    </div>
@endsection