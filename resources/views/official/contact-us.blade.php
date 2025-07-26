 
@extends('client.layouts.app')
@section('title')
     Contact us
@endsection
@section('content') 
<div class="about-bg page-hearder-area">
    <div class="official-overly"></div> 
  </div>   
    
  <link href="{{asset('public/official/css/style.css')}}" rel="stylesheet">
  <div id="contact" class="about-area area-padding">
      <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>              
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                
                
                		    
	    <ul>
	        
	        <li>
	            📱 Phone: +91 70113 10265

	        </li>
	         
	        
	    </ul>
               
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
               
                
                <ul>
	        
	        
	        
	         <li>
	            📧 Email: info@quickdials.com

	        </li>
	        
	         <li>
	            🌐 Website: www.quickdials.com

	        </li>
	        
	    </ul>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Location:Pillar No.33, 1,2,3,4 1st floor Breja market, NH-19, opposite flyover, Faridabad, New Delhi<br>
                  <span>Pin Code:- 110044, India</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
			<div style="wdith:100%" class="map-container">


			<iframe style="width:100%;height:500px"
			frameborder="0" scrolling="no" style="border:0"
			src="https://www.google.com/maps/embed/v1/search?key=AIzaSyAPFOcLOlCcBCtp764h9HflPfA56VlCFo0&q= Pillar No.33,Breja market,Badarpur, New Delhi" allowfullscreen>
			</iframe>

			</div>
              
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
				{{csrf_field()}}
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
				<div class="form-group">
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your Mobile" data-rule="mobile" data-msg="Please enter mobile" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  
	 </div>
 @endsection
