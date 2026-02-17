@extends('client.layouts.app')
@section('title')

<?php  if(!empty($keyword->meta_title)){
$key = preg_replace('/{{city}}/i',ucfirst($city),$keyword->meta_title);
echo trim($key); }
?>
@endsection 
@section('keyword')
<?php if(!empty($keyword->meta_keywords)){
$msg = preg_replace('/{{city}}/i',ucfirst($city),$keyword->meta_keywords);
echo trim($msg); } ?>
@endsection
@section('description'),  
 
<?php if(!empty($keyword->meta_description)){
$descrip = preg_replace('/{{city}}/i',ucfirst($city),$keyword->meta_description);
echo trim($descrip); } ?> 
@endsection
@section('content')	
	<style>
		.inner-client-div .grid-info h3{
			height:auto;
		}
		.inner-client-div .grid-info .get-quotes{
			margin-top:-25px;
		}
		.font-11{
			font-size:11px;
		}
		.course-program ul li {
        	border: 0.5px solid#ccc;
            padding: 12px 14px;
            text-align: center;
            margin: 5px 0px 24px 70px;
            display: inline-flex;
            grid-gap: 46px 106px;
            box-shadow: 0 0 10px 0 #e3e3e3;
		    
		}
		.course-program ul li:hover{ background: linear-gradient(180deg, #ecf4f3, #f1f5f5)
		  }
	</style>
	
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
                        
                        if(!empty($keyword->child_banner)){
                    $cicons= unserialize($keyword->child_banner); 
                    if($cicons){
                    ?>
                    
                    <img loading="lazy" src="{{asset(''.$cicons['child_banner']['src'])}}" alt="{{ $cicons['child_banner']['name']}}">
                    
                    
                    <?php  } }else{  ?>
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    
                    <?php } } ?>
                </div>
        </div>
    </div>
  

    
<div class="container">
        <div class=" form-section">
            <div class="removeLeftSpace">
                <div class="hdTitle">				 
				  
                        @if(!empty($keyword)) 	 
                        <?php
                        $rating = $keyword->ratingvalue;
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
				<div class="text-primary" itemprop="name"><h1><?php if(!empty($keyword->child_category)) { echo $keyword->child_category; } ?></h1></div>
				<div itemprop="aggregateRating"
				itemscope itemtype="https://schema.org/AggregateRating">
				<img loading="lazy" itemprop="image" src="{{ asset('client/images/'.$stars) }}"  alt="{{$stars}}"/>
				<span itemprop="ratingValue"><?php if(!empty($keyword->ratingvalue)) { echo number_format((float)$keyword->ratingvalue, 1, '.', '');  }else{ echo "1.0"; } ?></span>
				out of <span itemprop="bestRating"></span>
				based on <span itemprop="ratingCount">{{$keyword->ratingcount or ""}}</span> ratings
				</div>    
				</div>
				<div class="keyword-cotegory-text">	 			
		
			 <a href="{{url('child/')}}/<?php if(!empty($keyword->child_category)) { echo generate_slug($keyword->child_category); } ?>" >Categories / <?php if(!empty($keyword->child_category)) { echo $keyword->child_category; } ?></a> 

			 </div>
					 
@endif

	
					</div>


            </div>
              <div class="removeRightSpace">
 				<div class="btn btn-primary common_popup_form top-btn">Send Enquiry</div>
			</div>
 
        </div>
     
	 
    </div>
    <div class="container">       
    <div class="col-sm-9 col-md-9 reviews-box-main mainContainer">

	 @if(isset($keyword) && null!=$keyword->top_description)
		<div class="col-xs-12 top_description" style="margin-top:20px;color:#033967">	
			<h2>Top
		<?php   if (!empty($keyword->child_category)) {
		$top_key = preg_replace('/{{city}}/i', strtoupper($city), $keyword->child_category);
		echo trim($top_key);
		} ?>					 
		</h2>	    
		<p title="<?php if(!empty($keyword->keyword)) { echo $keyword->keyword; } ?> in {{Request::segment(1)}}"><?php  if(!empty($keyword->top_description)){
		$keydescription = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->top_description);
		echo trim($keydescription); } ?></p> 
		</div>
		@endif
    <div class="category-box">
	   <div class="business-services">
	   	<ul class="content-list intent">
	    
	    
		@if(!empty($childCategory))
			@foreach($childCategory as $child)
            @if(!empty($child->keyword))
            <li class="">
            <?php  if(!empty($child->icon)){

            $data = json_decode($child->icon, true);
           
            if (!empty($data)) {
            ?>

            <img loading="lazy" src="{{asset(''.$data['src'])}}" alt="{{ $data['name'] }}" >

            <?php  }   } ?>
            <a href="{{generate_slug($child->keyword)}}" title="<?php if(!empty($child->keyword)) { echo $child->keyword; } ?>" class="keystore"><?php if(!empty($child->keyword)) { echo $child->keyword; } ?></a> 


            </li>@endif
	   
	   @endforeach
	   @endif
	   
	   </ul>
	   </div>
	   </div>
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
    max-width: 730px;
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

<div class="card"><div class="card-header" id="abthdgOne"><h2 class="mb-0"><button type="button" class="btn btn-link" data-target="#heading_<?php echo $keyword->id; ?>" data-parent="#courseAcrdMain">
<span>{!!$keyword->heading!!}</span> </button> </h2></div>
<div id="heading_<?php echo $keyword->id; ?>" class="collapse <?php if($i==1){ echo "show";} ?>" aria-labelledby="abthdgOne" ><div class="card-body"><ul>						 
 
 @if($keyword->courseabout)
<li style="font-size: 13px;"> {!!str_replace('?','',$keyword->courseabout); !!}</li>
 @endif
<ul>
    @if($keyword->paragraph1)
    <li><p style="font-size: 13px;">  <?php if($keyword->paragraph1){ echo str_replace('?','',$keyword->paragraph1); } ?></p></li>
    
    @endif
@if($keyword->paragraph2)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$keyword->paragraph2); !!}</p> </li>
 @endif

@if($keyword->paragraph3)
 <li><p style="font-size: 13px;"> {!! str_replace('?','',$keyword->paragraph3); !!} </p> </li>
 @endif
 
 @if($keyword->paragraph4)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$keyword->paragraph4); !!} </p> </li>
 @endif
 
 @if($keyword->paragraph5)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$keyword->paragraph5); !!}</p> </li>
 @endif
 
 
 @if($keyword->paragraph6)
 <li><p style="font-size: 13px;">  {!! str_replace('?','',$keyword->paragraph6); !!} </p> </li> 
@endif
  </ul>	
 	 </ul> 
</div> </div> 
</div>	  </div></div>
			</div>
			</div>
<?php  } ?>
		 
				 
			
			
	   
	  
	   
	   
	   
	   

	@if(!empty($keyword->faqq1))
		<div class="container">
			<div class="category-description">
				<h4>FAQ:-
					<?php  if (!empty($keyword->child_category)) {
					echo $keyword->child_category;
				} ?>
					in <?php echo ucfirst(Request::segment(1)); ?></h4>
				<div itemscope itemtype="https://schema.org/FAQPage">
					<?php if (!empty($keyword->faqq1)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq1)) {
						$faqq1 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq1);
						echo trim($faqq1);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa1)) {
						$faqa1 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa1);
						echo trim($faqa1);
					} ?>
							</div>
						</div>
					</div>
					<?php } ?>


					<?php if (!empty($keyword->faqq2)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq2)) {
						$faqq2 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq2);
						echo trim($faqq2);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa2)) {
						$faqa2 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa2);
						echo trim($faqa2);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq3)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq3)) {
						$faqq3 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq3);
						echo trim($faqq3);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa3)) {
						$faqa3 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa3);
						echo trim($faqa3);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq4)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq4)) {
						$faqq4 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq4);
						echo trim($faqq4);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa4)) {
						$faqa4 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa4);
						echo trim($faqa4);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq5)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq5)) {
						$faqq5 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq5);
						echo trim($faqq5);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa5)) {
						$faqa5 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa5);
						echo trim($faqa5);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>


				</div>

			</div>


		</div>
	@endif
	   
	   @if(!empty($keyword->bottom_description))
		<div class="container"> 		 
		<div class="category-description">  	
	 	 
		<?php  if(!empty($keyword->bottom_description)){
		$keydescription = preg_replace('/{{city}}/i',ucwords(str_replace("-", " ", Request::segment(1))),$keyword->bottom_description);
		echo trim($keydescription); } ?>	 
		</div>
		
		 
		</div>
		@endif
	 
        <div class="clearfix"></div>
    </div>
    
       
@endsection