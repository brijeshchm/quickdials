@extends('client.layouts.app')
@section('title')@if(!empty($blogdetails->meta_title)){{$blogdetails->meta_title}}@endif
@endsection
@section('keyword')@if (!empty($blogdetails->meta_keywords)){{$blogdetails->meta_keywords}} @endif @endsection 
@section('description')@if(!empty($blogdetails->meta_description)){{$blogdetails->meta_description}} @endif @endsection
@section('content')
<link href="{{asset('official/css/style.css')}}" rel="stylesheet">
 <style>
 .post-thumbnail img{
	     height: 350px;
    width: 900px;
 }


 

 th, td {
    padding: 12px 15px;
    border: 1px solid #e2e2e2;
    text-align: left;
}

 thead {
    background: #1f2937;
    color: #fff;
}

 thead th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 13px;
}

 tbody tr:nth-child(even) {
    background: #f9fafb;
}

 tbody tr:hover {
    background: #eef2ff;
}

 td {
    font-size: 14px;
    color: #333;
}
 

 
.top_content ul li {
    position: relative;
    padding: 2px;
    /* margin-bottom: 8px;  */
    border-radius: 6px;
    font-size: 15px;  
    transition: all 0.2s ease;
}
.bottom_content ul li,
 {
    position: relative;
    padding: 2px;
    /* margin-bottom: 8px;  */
    border-radius: 6px;
    font-size: 15px;  
    transition: all 0.2s ease;
}
 
.top_content ol li {
    position: relative;
    padding: 2px;
    margin-bottom: 8px; 
    border-radius: 6px;
    font-size: 15px;  
    transition: all 0.2s ease;
}
.bottom_content ol li,
 {
    position: relative;
    padding: 2px;
    margin-bottom: 8px; 
    border-radius: 6px;
    font-size: 15px;  
    transition: all 0.2s ease;
}

.bottom_content ul li::before {
    content: "➤";
    position: absolute;      
     left: 46px;  
    font-weight: bold;
}
 
.top_content ul li::before {
    content: "➤";
    position: absolute;
    left: -18px;    
    font-weight: bold;
}


.bottom_content ol {
    list-style: none;
    padding-left: 0;
}

.bottom_content ol li {
    position: relative;
    padding: 2px 35px;
    margin-bottom: 8px;  
    border-radius: 6px;
   
}

/* Box bullet */
.bottom_content ol li::before {
    content: "";
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    width: 10px;
    height: 10px;
    background: #2563eb;
    border-radius: 3px; /* small radius = box */
}

 

.top_content ul li:hover {
    background: #eef2ff;
    border-color: #6366f1;
}
 
 
.top_content ul li:hover {
    background: #eef2ff;
    border-color: #6366f1;
}
/* .bottom_content li::before {
    content: "➤";
    color: #2563eb;
} */

 
 </style>
  
  <!-- END Header -->
  <div class="blog-page area-padding" style="margin-top: 100px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <!-- search option start -->
          
              <!-- search option end -->
            </div>
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>Recent post</h4>
                <div class="recent-post">
                  <!-- start single post -->
                 @if(!empty($bloglist))
					 @foreach($bloglist as $blog)
						<?php 
						$image="";
						if(!empty($blog->image)){
						$image = unserialize($blog->image);
						$image = $image['large']['src'];
					 
						}
						?>
				 <div class="recent-single-post">
                    <div class="post-img">
                      <a href="{{url('blog/'.$blog->slug)}}">
						<img loading="lazy" src="<?php echo (isset($image)?url($image):"");  ?>" width="70px" height="52px"  alt="{{ $blog->name ?? '' }}">
						</a>
						</div>
                    <div class="pst-content">
                     <p> <a href="{{url('blog/'.$blog->slug)}}">{{$blog->title}}</a></p>
                    </div>
                  </div>
				  @endforeach
				  @endif
				  
                
                  
                </div>
              </div>
              <!-- recent end -->
            </div>
         
             
             
          </div>
        </div>
		
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-9 col-sm-9 col-xs-12">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
           
              <article class="blog-post-wrapper">
                <div class="post-thumbnail">
					<?php 
          $image="";
						if(!empty($blogdetails->image)){
						$image = unserialize($blogdetails->image);
						//$image = $image['thumbnail']['src'];
						$image = $image['large']['src'];
						}
						?>
                  <img loading="lazy" src="<?php echo (isset($image)?url($image):"");  ?>"  alt="{{ $blogdetails->name ?? '' }}" width: 900px; height: 350px;/>
                </div>

                <div class="post-information">
                  
                  <div class="entry-meta">
                    
                  
                    	@if(!empty($blogdetails->ratingvalue))	
        <?php
        $rating = $blogdetails->ratingvalue;
 
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
                <div class="text-primary" itemprop="name"><h1><?php  if(!empty($blogdetails->title)){  echo $blogdetails->title; } ?> </h1></div>
                <div itemprop="aggregateRating"
                itemscope itemtype="https://schema.org/AggregateRating">
                <img loading="lazy" itemprop="image" src="{{ asset('client/images/'.$stars) }}"  alt="5 Star Rating: Very Good"/>
                <span itemprop="ratingValue"><?php if(!empty($blogdetails->ratingvalue)) { echo number_format((float)$blogdetails->ratingvalue, 1, '.', '');  }else{ echo "1.0"; } ?></span>
                out of <span itemprop="bestRating"></span>
                based on <span itemprop="ratingCount">{{$blogdetails->ratingcount }}</span> ratings
                </div>    
                </div>
                 <div class="share-author">                
                    <span>Last updated on   @if(!empty($blogdetails?->created_at))
                        {{ $blogdetails->created_at->format('d M Y') }}
                    @endif</span>
              

                   <div class="comment-box">
                        <div class="social-link-blog">
                           <p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                           <a href="https://www.facebook.com/sharer.php?u=<?php  echo url()->full(); ?>" target="_blank" class="" style="padding: 0px 7px;margin-top: -11px;">
                               
                               <img src="{{ asset('client/Facebook_icon.svg') }}">
                               
 
                               
                               </a>

                           <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php  echo url()->full(); ?>" data-via="{{ $blogdetails->meta_title ?? '' }}" data-related="realdannys" data-hashtags="{{ $blogdetails->meta_title ?? '' }}">
                               
                              <img src="{{ asset('client/twitter.svg') }}">
                               
                               
                               </a>


                        

                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php  echo url()->full(); ?>&title={{ $blogdetails->meta_title ?? '' }}" target="_blank" style="padding: 0px 7px;margin-top: -11px;"> 
                            
                            <img src="{{ asset('client/linkedin.svg')}}" >
                            
                            
                            </a>
                       
                        </div>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                         
                     </div>
                     </div>
                  @endif
<style>
  .author-details {
  
    width: 100%;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding: 2px 0;
}
.author-details>.author-avatar {
    width: 50px;
    display: inline-block;
    height: 50px;
    border: 1px solid #dee2e6 !important;
}

.rounded-circle {
    border-radius: 50% !important;
}

.author-details>.name-and-date {
    margin-left: 1rem;
    vertical-align: middle !important;
    display: inline-block !important;
    width: 86%;
}

.name-and-date .author-name {
    display: flex;
    color: #000;
    font-weight: 700;
    font-size: 16px;
}

.author-name>a {
    display: flex;
    font-weight: 600;
    color: #000;
    line-height: 1.2;
}

.pi-blog-heading span {
    font-size: 13px;
}

.author-bio {
    color: #000;
    font-size: 12px;
    display: block;
}
</style>
                  <div class="author-details">
                     <?php 
                    $imageAuthor="client/images/user.png";
                    if(!empty($blogdetails->author_image)){
                     
                    $image_author = json_decode($blogdetails->author_image);
           
                    $imageAuthor = $image_author->src;

                    }
                    ?>
                    <img loading="lazy" src="<?php echo (isset($imageAuthor)?url($imageAuthor):"");  ?>"  alt="{{ $blogdetails->author_name ?? '' }}" class="avatar avatar-96 photo author-avatar border rounded-circle blur-up lazyloaded" height="96" width="96"/>
                 
                    <div class="name-and-date">
                           <span class="author-name">{{ ucfirst($blogdetails->author_name) }} <a href="{{ $blogdetails->linkedin_url }}" title="author-name" rel="author" target="_blank"> <img src="{{ asset('client/linkedin.svg')}}" ></a>  </span>
                           <span class="author-bio d-xl-block d-lg-block">{{  $blogdetails->comment }}</span>
                        </div>
                     </div>


               


                  </div>
                  <div class="entry-content">
                  @if(!empty($blogdetails->description))
                    <p>{!! $blogdetails->description !!}</p>
                @endif
                          
				 
                  </div>


                   <div class="entry-content top_content">
                    
                    
                       @if(!empty($blogdetails->top_content))
                    {!! $blogdetails->top_content !!}
                @endif
				 
                  </div>




                   <div class="entry-content">

                    <?php 
                    $image_banner="";
                    if(!empty($blogdetails->image_banner)){
                    $image_banner = unserialize($blogdetails->image_banner);
             
                    $image_banner = $image_banner['large']['src'];
                    }
                    ?>
                    <img loading="lazy" src="<?php echo (isset($image_banner)?url($image_banner):"");  ?>"  alt="{{ $blogdetails->name ?? '' }}" style="width: 900px; height: 250px;"/>
                    </div>



                   <div class="entry-content bottom_content">
                  
                    @if(!empty($blogdetails->bottom_content))
                        {!! $blogdetails->bottom_content !!}
                    @endif
				 
                  </div>


	@if(!empty($blogdetails->faqq1))
		<div class="">
			<div class="category-description">
				<h4>FAQ:-
					<?php  if (!empty($blogdetails->name)) {
				 
					echo trim($blogdetails->name);
				} ?>
					 
				</h4>
				<div itemscope itemtype="https://schema.org/FAQPage">
					<?php if (!empty($blogdetails->faqq1)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq1)) {
						 
						echo trim($blogdetails->faqq1);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa1)) {
					 
						echo trim($blogdetails->faqa1);
					} ?>


							</div>
						</div>
					</div>
					<?php } ?>


					<?php if (!empty($blogdetails->faqq2)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq2)) {
					 
						echo trim($blogdetails->faqq2);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa2)) {
					 
						echo trim($blogdetails->faqa2);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($blogdetails->faqq3)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq3)) {
						echo $blogdetails->faqq3;
					 
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa3)) {
						 
						echo trim($blogdetails->faqa3);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($blogdetails->faqq4)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq4)) {
						 
						echo trim($blogdetails->faqq4);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa4)) {
						 
						echo trim($blogdetails->faqa4);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($blogdetails->faqq5)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq5)) {
						 
						echo trim($blogdetails->faqq5);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa5)) {
					 
						echo trim($blogdetails->faqa5);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($blogdetails->faqq6)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($blogdetails->faqq6)) {
						 
						echo trim($blogdetails->faqq6);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($blogdetails->faqa6)) {
					 
						echo trim($blogdetails->faqa6);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>




				</div>

			</div>


		</div>
	@endif




                </div>
              </article>
              <div class="clear"></div>
			  
			  
			   
              <style>
   .label{
  display: none;
  }
  .share-author{
    display: flex;
    padding: 11px;
  }
  .author-meta {
    
}
</style>
			 
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->
 
@endsection
