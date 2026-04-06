<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title><meta name="keywords" content="@yield('keyword')"><meta name="description" content="@yield('description')"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="csrf-token" content="{{ csrf_token() }}">  
@if (Request::is('/')) <link rel="canonical" href="{{url('/')}}/" />@else <link rel="canonical" href="<?php echo trim(url()->current());?>" />@endif <link rel="shortcut icon" href="{{asset('client/images/favicon.png')}}" type="image/png" /><meta http-equiv="content-language" content="en-IN"><meta name="classification" content="directory portal" /><meta name="distribution" content="local" /><meta content="All" name="WebCrawlers" /><meta content="All, FOLLOW" name="MSNBots" /><meta content="All" name="Googlebot-Image" /><meta content="All, FOLLOW" name="BINGBots" />
<meta content="All, FOLLOW" name="YAHOOBots" /><meta content="All, FOLLOW" name="GoogleBots" /><meta name="copyright" content="Quick Dials"><meta name="author" content="Quick Dials" /><meta http-equiv="CACHE-CONTROL" content="PUBLIC" /><meta name="publisher" content="Quick Dials" />
@if (Request::is('/'))
<link name="identifier-URL" href="{{url('/')}}/" />
@else
<link name="identifier-URL" href="<?php echo trim(url()->current());?>" />
@endif <meta name="msvalidate.01" content="456AED0115D50D42C4F3A79DAB89D41D" />
<link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url('sitemap.xml') }}">
<meta name="google-site-verification" content="O8A-LG3YpW7vOcPtVP9OuNrEcLfLf1kW2tTVpFpHNxM" />
@if (Request::is('/'))
<link name="url" href="{{url('/')}}/" />
@else
<link name="url" href="<?php echo trim(url()->current());?>" />
@endif <meta name="DC.title" content="@yield('keyword')" /><meta name="distribution" content="global" /><meta name="geo.region" content="IN-UP" /><meta name="geo.placename" content="Bangalore" /><meta name="geo.position" content="28.5802;77.3181" /><meta name="ICBM" content="28.5802, 77.3181" /> 
@if(View::hasSection('meta_robots'))
    @yield('meta_robots')
@else
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
@endif
<meta name="Revisit-after" content="7 Days" /><meta property="og:locale" content="en_IN" /><meta property="og:type" content="website" /><meta property="og:title" content="@yield('title')" /><meta property="og:description" content="@yield('description')" /><meta property="og:url" content="{{ URL::current() }}" /><meta property="og:site_name" content="Quick Dials" /><meta name="application-name" content="Quick Dials" /><meta property="fb:app_id" content="https://www.facebook.com/profile.php?id=61579250014118" /><meta property="og:image" content="{{asset('client/images/favicon.png')}}" /><meta property="og:image:secure_url" content="{{asset('client/images/favicon.png')}}" /><meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="628" /><meta property="og:image:alt" content="Quick Dials" />
<meta name="twitter:card" content="summary_large_image" /><meta name="twitter:title" content="@yield('title')" /><meta name="twitter:keyword" content="@yield('keyword')" /><meta name="twitter:description" content="@yield('description')" /><meta name="twitter:image" content="{{asset('client/images/small-logo.jpg')}}" /><meta name="twitter:url" content="{{ URL::current() }}" /><meta itemprop="address" content="UNIT 101 OXFORD TOWERS, 139/88 HAL OLD AIRPORT RD, H.A.L II Stage, Bangalore North, Bangalore- 560008, Karnataka, India">
<meta name="rating" content="general"><meta name="googlebot" content="index, follow"><meta name="bingbot" content="index, follow"><meta name="reply-to" content="info@quickdials.com"><meta name="expires" content="never">
<link rel="alternate" href="https://www.quickdials.com/" hreflang="en-in" /><link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-combined.css') }}"><script type="text/javascript" src="<?php echo asset('client/js/jquery-1.11.2.min.js'); ?>" ></script>
<script src="<?php echo asset('vendor/select2/js/select2.full.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo asset('client/js/bootstrap.min.js'); ?>" >
</script><link rel="stylesheet" href="<?php echo asset('client/css/style.css'); ?>" ><link rel="stylesheet" href="<?php echo asset('client/css/media.css'); ?>" >
<link rel="dns-prefetch" href="https://www.google-analytics.com">
    <!------Google Analytic Script End----->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "QuickDials",
  "alternateName": "QuickDials", 
  "description": "India's leading local business search & service directory | QuickDials.",
  "url": "https://www.quickdials.com/",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Unit 101, Oxford Towers, 139, HAL Old Airport Rd, Kodihalli, Bengaluru, Karnataka 560008",
    "addressRegion": "Karnataka",
    "postalCode": "560002",
    "streetAddress": "Near by Diamon district bangalore"
  },  
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+91-75-5943-5943",
    "contactType": "Customer service"
  }],
  "logo": "https://www.quickdials.com/client/images/small-logo.jpg",
  "sameAs": ["https://www.facebook.com/profile.php?id=61579250014118",
  "https://x.com/Quickdials",
  "https://www.linkedin.com/company/quickdialsoffical",
  "https://www.pinterest.com/quickdials12/",
  "https://www.instagram.com/quickdials1/"  
  ]
}
</script>

<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "w5s5irgdbz");
</script>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KF6W10RN9L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-KF6W10RN9L');
</script>
    <!-- Google Tag Manager -->          
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KZF3WGSW');</script>
<!-- End Google Tag Manager -->
 
</head>
<body>
    <!-- Google Tag Manager (noscript) -->  
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KZF3WGSW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="spinnerBkgd"></div><div id="spinnerCntr"></div>
 
<header id="header"><div class="container">
    <div class="head-list"><div class="logo">
        <div title="Quick Dials"><a href="{{url('/')}}">
            <img src="<?php echo asset('client/images/small-logo.png'); ?>" alt="Quick Dials" class="img-logo" /></a></div></div><div class="scrollheadsearch <?php echo (Route::getCurrentRoute()->uri() != '/') ? ' fixedform' : ''; ?>"><div class="filterForm">
                <form action="/searchlist" method="GET" class="search-form" autocomplete="off"><div class="search-wrapper"><select name="city" class="select2_location searchcity location locationbtn city" ><option value="">Search city & pincode</option></select>
                                <div class="search-bar">
                                    <select name="search_kw" class="serviceneed home-search searchInput"
                                        id="searchInput" ><option value="">Search Service</option>                               
     
                                    </select>
                                    
                                    
                                    <input type="submit" class="col-md-2 submitbtn" value="GO"></div></div>
                        </form></div></div>
                <?php 		 
			if (!Auth::guard('clients')->check()) { ?>
                <div class="head-right-lout">
                    <div class="head-left"><a href="{{ url('business-owners') }}" class="freelisting">
                            <h6>Business</h6> <i class="fa fa-handshake-o" aria-hidden="true"></i> <span
                                class="free_listing">Free Listing</span>
                        </a>
                    </div>
                    <div class="head-right">
                        <a href="javascript:void(0);" id="login">Sign In</a> | <a href="{{ url('business-owners') }}"
                            class="sign-text">Sign Up</a></div></div>
                <?php } else { ?>
                <div class="head-right-lout">
                    <?php    $clientID = auth()->guard('clients')->user()->id;
    $client = App\Models\Client\Client::find($clientID);
    if (!empty($client->logo)) {
        $logo = unserialize($client->logo);

        $image = $logo['large']['src'];
				?>
                    <img loading="lazy" src="<?php        echo asset('' . $image); ?>" alt="Profile" class="rounded-circle"
                        style="max-height: 36px;border-radius: 50% !important;">

                    <?php    } ?>
                    <style>
                        .dropdown-divider {
                            height: 0;
                            margin: var(--bs-dropdown-divider-margin-y) 0;
                            overflow: hidden;
                            border-top: 1px solid var(--bs-dropdown-divider-bg);
                            opacity: 1;
                        }
                        .dropdown-menu {
                            position: absolute;
                            top: 100%;
                            left: 0;
                            z-index: 1000;
                            display: none;
                            float: left;
                            width: 225px;
                            padding: 5px 0;
                            margin: 2px 0 0;
                            font-size: 14px;
                            text-align: left;
                            list-style: none;
                            background-color: #fff;
                            -webkit-background-clip: padding-box;
                            background-clip: padding-box;
                            border: 1px solid #ccc;
                            border: 1px solid rgba(0, 0, 0, .15);
                            border-radius: 4px;
                            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                        }
                    </style>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{url('business/dashboard')}}"
                                aria-expanded="true">
                                <?php    echo ucfirst(auth()->guard('clients')->user()->business_name); ?>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/personal-details')}}">
                                        <i class="bi bi-person"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/account-settings')}}">
                                        <i class="bi bi-gear"></i>
                                        <span>Account Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/favorite-enquiry')}}">
                                        <i class="bi bi-star"></i>
                                        <span>Favorite Enquiry</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/manage-enquiry')}}">
                                        <i class="bi bi-envelope"></i>
                                        <span>Manage Enquiry</span>
                                    </a>
                                </li>
                                
                               
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/keywords')}}">
                                        <i class="bi bi-book-half"></i>
                                        <span>Service Keywords</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/package')}}">
                                        <i class="bi bi-currency-rupee"></i>
                                        <span>Package</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{url('business/billing-history')}}">
                                        <i class="bi bi-currency-rupee"></i>
                                        <span>My Transaction</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('client/logout')}}">
                                        <i class="bi bi-currency-rupee"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <a href="{{url('business/dashboard')}}"><strong></strong></a>
                </div>
                <?php  } ?>
            </div>
        </div>
    </header>
    @yield('content')
   
    <div class="modal fade" id="showKeywordsList" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Title</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cityKWForm" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form class="search-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="search_kw" class="home-search form-control" autocomplete="off"
                                readonly>
                        </div>
                        <div class="form-group">
                            <select name="city" class="city form-control">
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="text-align:center">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-footer">
            <div>
                <h4>Popular Categories</h4>
                <ul>
                    <li><a href="{{url('coaching-tuitions')}}" >Coaching &amp; Tuitions</a></li> |
                    <li><a href="{{url('business-services')}}" >Business Services</a></li> |
                    <li><a href="{{url('home-construction')}}" >Home Construction &amp; Renovation</a></li> |
                    <li><a href="{{url('child/loan-service')}}" >Personal Finance Services</a></li> |
                    <li><a href="{{url('categories/tours-travel-services')}}" >Tours &amp; Travels</a></li> |
                    <li><a href="{{url('property-dealer')}}" class="keystore" >Property Dealer</a></li> |
                    <li><a href="{{url('child/rent-or-buy')}}" >Rent & Buy</a></li> |
                    <li><a href="{{url('pg-hostels')}}" >PG & Hostel</a></li> |
                    <li><a href="{{url('categories/computer-courses')}}" >Computer Courses & Training</a></li> |
                    <li><a href="{{url('study-abroad')}}" >Study Abroad</a></li> |
                    <li><a href="{{ url('home-services')}}"  class="keystore">Home Services</a></li> |
                    <li><a href="{{url('wedding-organizers')}}" >Parties, Special Occasions &amp; Wedding</a></li> |
                    <li><a href="{{url('categories/electric-services')}}" >Electric Services</a></li> |
                    <li><a href="{{url('categories/entrance-exams-coaching')}}" >Government Exam</a></li> |
                    <li><a href="{{url('web-designers')}}" >Web Designers</a></li> |
                    <li><a href="{{url('medical')}}" >Medical</a></li> |
                    <li><a href="{{ url('carpenters')}}"  class="keystore">Carpenters</a></li> |
                    <li><a href="{{ url('health-wellness')}}"  class="keystore">Health & Wellness</a></li> |
                    <li><a href="{{url('child/yoga-classes')}}" >Yoga</a></li> |
                    <li><a href="{{url('tax-consultants')}}" >CA & TAX Consultants</a></li>
                </ul>
            </div>
            <div>
                <h4>Business Services</h4>
                <ul>
                    <li><a href="{{ url('patient-care-services')}}" class="keystore" >Patient Care Service</a></li> | 
                    <li><a href="{{ url('home-appliances-repair-services')}}" class="keystore" >Home Appliances Repair &amp; Services</a></li> |
                    <li><a href="{{ url('packers-movers')}}"  class="keystore">Packers and Movers</a></li> |
                    <li><a href="{{ url('ac-repair-service')}}" class="keystore" >AC Services</a></li> |
                    <li><a href="{{ url('cleaning-services')}}"  class="keystore">Cleaning Services</a></li> |
                    <li><a href="{{ url('security-guards-services')}}"  class="keystore">Security Guards</a></li> |
                    <li><a href="{{ url('architects')}}" class="keystore" >Architects</a></li> |
                    <li><a href="{{ url('building-consultants-contractors')}}"  class="keystore">Builders &amp; Contractors</a></li> |
                    <li><a href="{{ url('interior-designers-decorators')}}"  class="keystore">Interior Designers &amp; Decorators</a></li> |
                    <li><a title="Housekeeping Services" href="{{ url('housekeeping-services')}}"  class="keystore">Housekeeping Services</a></li> |
                    <li><a title="Painting Contractors" href="{{ url('painting-contractors')}}"  class="keystore">Painting Contractors</a></li> |
                    <li><a title="Modular Kitchen Dealers" href="{{ url('modular-kitchen-dealers')}}"  class="keystore">Modular Kitchen Dealers</a></li> |
                    <li><a title="Waterproofing Contractors" href="{{ url('waterproofing-contractors')}}"  class="keystore">Waterproofing Contractors</a></li>
                </ul></div><div>
                <h4>Education Training</h4>
                <ul>

                    <li><a title="School Tuitions" href="{{ url('coaching-tuitions')}}"  class="keystore">Schools & Colleges</a></li> |
                    <li><a title="Entrance Exam Coaching" href="{{url('categories/entrance-exams-coaching')}}" >Entrance Exam Coaching</a></li> |
                    <li><a title="Competitive Exam Coaching" href="{{ url('competitive-exam-coaching')}}" class="keystore" >Competitive Exam Coaching</a></li> |
                    <li><a title="Distance Education" href="{{ url('distance-education')}}" class="keystore" >Distance Education</a></li> |
                    <li><a title="Language Training" href="{{ url('language-training')}}" class="keystore" >Language Training</a></li> |
                    <li><a title="Overseas Education" href="{{ url('overseas-education-consultants')}}" class="keystore" >Overseas Education</a></li> |
                    <li><a title="College &amp; University Tuitions" href="{{ url('college-tuition')}}" class="keystore" >College &amp; University Tuitions</a></li> |
                    <li><a title="Bank &amp; Insurance Exam Coaching" href="{{ url('bank-coaching')}}" class="keystore" >Bank &amp; Insurance Exam Coaching</a></li> |
                    <li><a title="Placement Consultancies" href="{{ url('placement-consultants')}}" class="keystore" >Placement Consultants</a></li>
                </ul></div>
            <div>
                <h4>Personal Service</h4>
                <ul>
                    <li><a href="{{url('child/loan-service')}}" >Loans</a></li> |
                    <li><a title="Visa Consultants" href="{{ url('visa-consultants')}}" class="keystore" >Visa Consultants</a></li> |
                    <li><a title="Beauty Parlour Services" href="{{ url('beauty-parlours')}}" class="keystore" >Beauty Parlour Services</a></li> |
                    <li><a title="Event Organisers" href="{{ url('event-organisers')}}" class="keystore" >Event Organisers</a></li> |
                    <li><a title="Catering Services" href="{{ url('catering-services')}}" class="keystore" >Catering Services</a></li> |
                    <li><a title="Photographers &amp; Videographers" href="{{ url('photographers-videographers')}}" class="keystore" >Photographers &amp; Videographers</a></li> |
                    <li><a title="Astrologers" href="{{ url('astrologers')}}" class="keystore" >Astrologers</a></li> |
                    <li><a title="Vehicle Rentals" href="{{ url('vehicle-rental')}}" class="keystore" >Vehicle Rentals</a></li> |
                    <li><a title="Massage Centres" href="{{ url('massage-centres')}}" class="keystore" >Massage Centres</a></li> |
                    <li><a title="Advocates &amp; Lawyers" href="{{ url('advocates-lawyers')}}" class="keystore" >Advocates &amp; Lawyers</a></li></ul>
            </div><div>
                <!-- <h4>Cities of (India)</h4>
                <ul>
                    <li><a title="Chennai" href="{{url('chennai')}}" >Chennai</a></li>
                    <li><a title="Mumbai" href="{{url('mumbai')}}" >Mumbai</a></li>
                    <li><a title="Hyderabad" href="{{url('hyderabad')}}" >Hyderabad</a></li>
                    <li><a title="Bangalore" href="{{url('bangalore')}}" >Bangalore</a></li>
                    <li><a title="Delhi" href="{{url('delhi')}}" >Delhi</a></li>
                    <li><a title="Kolkata" href="{{url('kolkata')}}" >Kolkata</a></li>
                    <li><a title="Pune" href="{{url('pune')}}" >Pune</a></li>
                    <li><a title="Ahmedabad" href="{{url('ahmedabad')}}" >Ahmedabad</a></li>
                    <li><a title="Faridabad" href="{{url('faridabad')}}" >Faridabad</a></li>
                    <li><a title="Ghaziabad" href="{{url('ghaziabad')}}" >Ghaziabad</a></li>
                    <li><a title="Noida" href="{{url('noida')}}" >Noida</a></li>
                    <li><a title="Gurgaon" href="{{url('gurgaon')}}" >Gurgaon</a></li>
                    <li><a title="Greater Noida" href="{{url('greater-noida')}}" >Greater Noida</a></li>
                    <li><a title="Chandigarh" href="{{url('chandigarh')}}" >Chandigarh</a></li>
                    <li><a title="Coimbatore" href="{{url('coimbatore')}}" >Coimbatore</a></li>
                    <li><a title="Jaipur" href="{{url('jaipur')}}" >Jaipur</a></li>
                    <li><a title="Nagpur" href="{{url('nagpur')}}" >Nagpur</a></li>
                    <li><a title="Surat" href="{{url('surat')}}" >Surat</a></li>
                    <li><a title="Vadodara" href="{{url('vadodara')}}" >Vadodara</a></li>
                    <li><a title="Vijayawada" href="{{url('vijayawada')}}" >Vijayawada</a></li>
                    <li><a title="Visakhapatnam" href="{{url('visakhapatnam')}}" >Visakhapatnam</a></li>
                    <li><a title="Indore" href="{{url('indore')}}" >Indore</a></li>
                    <li><a title="Lucknow" href="{{url('lucknow')}}" >Lucknow</a></li>
                </ul> -->
            </div></div></div><div class="footer-new">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <h2>A Few Stats About <span> QuickDials Pvt Ltd </span></h2>
                    <ul class="seoabout_listing">
                        <li>
                            <div class="image"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                            <h3>Since </h3>
                            <h5>2023</h5>
                        </li>
                        <li class="returncustomer">
                            <div class="image"><i class="fa fa-level-up" aria-hidden="true"></i></div>
                            <h3>350+</h3>
                            <h5>Register Business</h5>
                        </li>

                        <li class="returncustomer">
                            <div class="image"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                            <h3>200+</h3>
                            <h5>Satisfied Clients </h5>
                        </li>

                        <li class="returncustomer">
                            <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                            <h3>6000+</h3>
                            <h5>Business Keyword </h5>
                        </li>

                        <li class="returncustomer">
                            <div class="image"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
                            <h3>200+ Years</h3>
                            <h5>Team Experience
                            </h5>
                        </li>
                       <li>
                            <div class="image"><i class="fa fa-globe" aria-hidden="true"></i></div>
                            <h3>Countries</h3>
                            <h5>3+</h5>
                        </li>                    </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="footr-new-right">
                        <div class="enquiry-img"><img loading="lazy" src="{{url('images/enquiry-img.png')}}" alt="Project" width="100"
                                height="100"></div>
                        <h2>Do you have <br><span>any Requirement in your mind?</span></h2>
                        <div class="footer-get"> <a href="{{url('business-owners')}}">Get Started </a>
                            <span>or</span> <a href="{{url('business-owners')}}">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

    <div class="category-section">

    <!-- Tabs -->
    <div class="tabs">
        @php
            $categories = DB::table('parent_category')->select('id','parent_category')->where('status','1')->get();
            $i = 0;
        @endphp

        @foreach($categories as $cat)
            @php $i++; @endphp
            <button type="button" 
                class="tab {{ $i == 1 ? 'active' : '' }}" 
                data-tab="tab{{ $cat->id }}">
                {{ $cat->parent_category }}
            </button>
        @endforeach
    </div>
<div class="tab-contents" id="tabContents"></div>
 @php
        $keywords=   DB::table('keyword')->select('slug','keyword','parent_category_id') 
        ->where('seo_type', '1')
        ->get()
        @endphp
<script>
var categories = @json($categories);
var keywords = @json($keywords);

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    let container = document.getElementById("tabContents");

    let html = "";
    let i = 0;

let baseUrl = "{{ url('') }}";
let city = localStorage.getItem('city') || 'bangalore';
    categories.forEach(cat => {
        i++;

        // Filter keywords by category
        let catKeywords = keywords.filter(k => k.parent_category_id == cat.id);

        html += `
            <div class="tab-content ${i === 1 ? 'active' : ''}" id="tab${cat.id}">
                <p>
        `;

        catKeywords.forEach(keyword => {
            html += `
                <a href="${baseUrl}/${keyword.slug}">
                    ${keyword.keyword}
                </a> |
            `;
        });

        html += `
                </p>
            </div>
        `;
    });

    container.innerHTML = html;

});
</script>
    <!-- Tab Contents -->
    
     

    </div>

 <style>
.category-section {   
    padding: 20px;
    font-family: Arial;
}

.tabs {
    display: flex;    
    gap: 10px;
    margin-bottom: 15px;
	scroll-behavior: smooth;
    overflow-x: auto;
    white-space: nowrap;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.tab {
    padding: 8px 14px;
    border: 1px solid #ddd;
    background: #eee;
    border-radius: 6px;
    cursor: pointer;
}

.tab.active {
    background: #fff;
    font-weight: bold;
}

/* Hide all content */
.tab-content {
    display: none;
}

/* Show active content */
.tab-content.active {
    display: block;
}

/* Links */
.tab-content a {
    text-decoration: none;
    color: #555;
    line-height: 17px;
    padding: 5px;
        display: inline-grid;
}

.tab-content a:hover {
    color: #000;
}
 </style>
<script>
 
document.addEventListener("DOMContentLoaded", function () {

    const tabs = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {

            // Remove active from all tabs
            tabs.forEach(t => t.classList.remove("active"));

            // Hide all content
            contents.forEach(c => c.classList.remove("active"));

            // Activate current tab
            this.classList.add("active");

            // Show related content
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).classList.add("active");

        });
    });

});
 
</script>

   </div>


    <footer class="footer">
        <style>
            .footer {

                color: #000;
                padding: 60px 0 20px;
                border-top: 1px solid #f6f6f6;
            }

            .footer-content {
                margin-bottom: 40px;
                display: inline-flex;
                gap: 90px;
            }

            .footer-section h3 {
                font-size: 16px;
                font-weight: 700;
                margin-bottom: 20px;
                color: #000;
                padding: 0px 24px;
            }

            .footer-links {
                list-style: none;
            }

            .footer-links li {
                margin-bottom: 7px;
            }

            .footer-links a {

                text-decoration: none;
                transition: color 0.3s;
                color: #000;
                padding: 0 8px;

            }

            .footer-links a::before {
                content: "▶ ";
                font-size: 0.7rem;
                margin-right: 5px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .footer-bottom {
                border-top: 1px solid #334155;
                padding-top: 20px;
                text-align: center;
                color: #94a3b8;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 20px;
            }
        </style>
        <section class="">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-section">
                        <h3>Quick Links</h3>
                        <ul class="footer-links">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{url('/about-us')}}">About Us</a></li>
                            <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            <li><a href="{{url('/pricing')}}">Pricing</a></li>
                            <li><a href="{{url('/careers')}}">Careers</a></li>
                            <!-- <li><a href="{{url('blog')}}">Success Stories</a></li> -->
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('business-owners')}}" rel="nofollow" title="Advertise on quickdials">Advertise on quickdials</a></li>
                            <li><a href="{{url('/privacy-policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                            <li><a href="{{url('terms-conditions')}}" title="Terms & Conditions">Terms & Conditions</a></li>
                            <li><a href="{{url('/copyright-policy')}}" title="Copyright Policy">Copyright Policy</a>
                            <li><a href="{{url('/courses/playwright-automation-training-in-noida')}}" title="Playwright Automation Training in Noida">Playwright Automation Training in Noida</a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer-section">
                        <h3>Popular Categories</h3>
                        <ul class="footer-links">
                            <li><a href="{{ url('categories/professional-courses') }}">Coaching & Tuitions</a></li>
                            <li><a href="{{ url('child/wedding-planning') }}">Wedding Planning</a></li>
                            <li><a href="{{ url('category/health-wellness') }}">Healthcare</a></li>
                            <li><a href="{{ url('category/real-estate-agent') }}">Real Estate</a></li>
                            <li><a href="{{ url('categories/electric-services') }}">Electric Services</a></li>
                            <li><a href="{{ url('categories/security-system') }}">Security System</a></li>
                            <li><a href="{{ url('categories/medical') }}">Medical</a></li>
                            <li><a href="{{ url('child/packers-and-movers') }}">Packers Movers</a></li>
                            <li><a href="{{ url('restaurants')}}" class="keystore">Restaurants</a></li>
                            <li><a href="{{ url('hotels')}}" class="keystore">Hotels</a></li>
                            <li><a href="{{ url('interior-designer')}}" class="keystore">interior Design</a></li>
                        </ul>
                    </div>

                    <div class="footer-section">
                        <h3>Business Services</h3>
                        <ul class="footer-links">
                            <li><a href="{{ url('patient-care-service')}}" class="keystore">Patient Care Service</a></li>
                            <li><a href="{{ url('home-appliance-repair-training')}}" class="keystore">Home Appliances Repair</a></li>
                            <li><a href="{{ url('wedding-organisers')}}" class="keystore">Wedding Organisers</a></li>
                            <li><a href="{{ url('ac-repair-service')}}" class="keystore">AC Services</a></li>
                            <li><a href="{{ url('security-guards-services')}}" class="keystore">Security Guards</a></li>
                            <li><a href="{{ url('cleaning-services')}}" class="keystore">Cleaning Services</a></li>
                            <li><a href="{{ url('categories/repairs-services') }}">Repairs Services</a></li>
                            <li><a href="{{ url('categories/spa') }}">SPA Beauty</a></li>
                            <li><a href="{{ url('child/loan-service') }}">Loan</a></li>
                            <li><a href="{{ url('income-tax-consultants')}}" class="keystore">Tax Consultants</a></li>
                            <li><a href="{{ url('interviews') }}">Interviews Question</a></li>
                            <li><a href="{{ url('sitemap.xml') }}">Sitemap</a></li>
 
                        </ul>
                    </div>

                    <div class="footer-section">
                        <h3>Support & Contact</h3>
                        <div class="contact-info">
                           <p><strong>QuickDials<span class="tm">TM</span> Pvt Ltd</strong></p><p><strong>CIN:</strong> U63112KA2026PTC215594</p><p><strong>Email:</strong><a href="mailto:support@quickdials.com" class="email">support@quickdials.com</a></p>
                            <p><strong>Phone:</strong> <a href="tel:917559435943">+91-75-5943-5943</a></p>
                            <p>🕒 Mon-Sat: 9:00 AM - 7:00 PM</p>
                        </div>
                        <div class="social-links">
                            <div class="follow-sticker">
                                <h4 style="color:#000;margin-bottom:10px;padding-bottom:5px;border-bottom:1px solid #aaa;">
                                    Follow Us</h4><ul class="list-inline"><li><a class="facebook" href="https://www.facebook.com/profile.php?id=61579250014118" title="Like us on Facebook" target="_blank"><img src="{{ asset('client/Facebook_icon.svg') }}" alt="Facebook_icon"></a></li>
                                    <li><a class="twitter" href="https://x.com/Quickdials" title="Follow us on Twitter" target="_blank"><img src="{{ asset('client/twitter.svg') }}" alt="twitter"></a></li>
                                    <li><a class="linkedIn" href="https://www.linkedin.com/company/quickdialsoffical" title="Follow us on Linkedin" target="_blank"><img src="{{ asset('client/linkedin.svg')}}" alt="linkedin"></a></li>
                                    <!-- <li><a class="youTube"  href="" title="Follow us on youTube" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->
                                    <li><a class="pinterest" href="https://www.pinterest.com/quickdials12/" title="Follow us on Pinterest" target="_blank"><img src="{{ asset('client/pinterest.svg')}}" alt="pinterest"></i></a></li>
                                    <li><a class="instagram" href="https://www.instagram.com/quickdials1/" title="Follow us on Instagram" target="_blank"><img src="{{ asset('client/instagram.svg')}}" alt="instagram" ></i></a></li>                                    
                                </ul>
                            </div></div>
                    </div>
                </div>

            </div>
        </section>
    </footer>
  


    <footer>
        <section class="links-resp"><div class="container"><div class="copyright-box col-lg-5"><div class="row">
                        <p>Copyrights © 2025. All Rights Reserved.</p></div>
                </div><div class="disclaimer-box col-lg-7"><div class="row"><p>The certification names and logos are the trademarks of their respective owners. <a href="{{url('/privacy-policy')}}">View Disclaimer</a></p>
                    </div></div></div></section>
    </footer>
    <div class="modal fade" id="msgModal" role="dialog">
        <div class="modal-dialog modal-md"><div class="modal-content"><div class="modal-body"></div><div class="modal-footer" style="text-align:center"><button type="button" class="btn btn-default" data-dismiss="modal">OK</button></div>
            </div></div></div><div class="modal fade" id="msgModalpop" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content"><div class="modal-body"></div><div class="modal-footer" style="text-align:center">
                    <button type="button" class="btn btn-default closepop" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="loginpopup">
        <div class="popwraper">
            <a href="javascript:void(0);" class="closebtn">&times;</a>
            <div class="col-xs-12 col-sm-5 col-md-5 formleft">
                <h2>Login</h2>
                <p>Get access to your Profile, Reviews and Recommendations</p>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 formright">
                <style>
                    .login-wrapper {
                        background: #fff;
                        width: 380px;
                        padding: 30px;
                        border-radius: 12px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    }

                    /* Input Layout */
                    .input-layout {
                        position: relative;
                        margin-bottom: 25px;
                    }

                    .input-layout input {
                        width: 100%;
                        padding: 14px 12px;
                        border: 1px solid #ccc;
                        border-radius: 6px;
                        font-size: 15px;
                        outline: none;
                    }

                    .input-layout label {
                        position: absolute;
                        top: 50%;
                        left: 12px;
                        color: #888;
                        font-size: 14px;
                        transform: translateY(-50%);
                        pointer-events: none;
                        transition: 0.3s;
                        background: #fff;
                        padding: 0 6px;
                    }

                    /* Floating label */
                    .input-layout input:focus+.highlight+label,
                    .input-layout input:valid+.highlight+label {
                        top: -8px;
                        font-size: 12px;
                        color: #007bff;
                    }

                    /* Highlight effect */
                    .highlight {
                        position: absolute;
                        left: 0;
                        bottom: 0;
                        height: 2px;
                        width: 0;
                        /* background: #007bff; */
                        transition: 0.3s;
                    }

                    .input-layout input:focus~.highlight {
                        width: 100%;
                    }

                    /* Error alert */
                    .alert-error {
                        color: #d93025;
                        font-size: 12px;
                        margin-top: 5px;
                        display: none;
                    }

                    /* OR Divider */
                    .or-divider {
                        text-align: center;
                        margin: 20px 0;
                        position: relative;
                    }

                    .or-divider span {
                        background: #fff;
                        padding: 0 10px;
                        color: #777;
                        font-size: 13px;
                    }

                    .or-divider::before {
                        content: "";
                        height: 1px;
                        background: #ddd;
                        width: 100%;
                        position: absolute;
                        left: 0;
                        top: 50%;
                        z-index: -1;
                    }

                    /* Google Login */
                    .google-login a {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        padding: 12px;
                        border: 1px solid #ddd;
                        border-radius: 6px;
                        text-decoration: none;
                        color: #444;
                        font-weight: 500;
                        transition: 0.3s;
                        margin-bottom: 15px;
                    }

                    .google-login a img {
                        width: 18px;
                    }

                    .google-login a:hover {
                        background: #f1f1f1;
                    }

                    /* Submit Button */
                    ._39M2dMsubmit {
                        width: 100%;
                        background: #007bff;
                        border: none;
                        color: #fff;
                        padding: 14px;
                        border-radius: 6px;
                        font-size: 16px;
                        cursor: pointer;
                        transition: 0.3s;
                    }

                    ._39M2dMsubmit:hover {
                        background: #0056b3;
                    }

                    .hide {
                        display: none;
                    }
                </style>

                <form action="" method="POST" autocomplete="on" id="login-form" class="text-center">
                    <!-- Email Input -->
                    <div class="input-layout">
                        <input type="email" class="cleanup validate-empty" name="email" id="email" required>
                        <span class="highlight"></span>
                        <label>Enter Registered Email</label>
                        <div class="alert alert-error alert-email">
                            Oops! Email is required.
                        </div>
                    </div>

                    <!-- OR Divider -->
                    <div class="or-divider">
                        <span>OR</span>
                    </div>

                    <!-- Google Login -->
                    <div class="google-login">
                        <a href="{{ url('/google-login') }}">
                            <img loading="lazy" src="{{ asset('client/g-logo.png')}}" alt="gogole login">
                            Login with Google
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div class="_1avdGP">
                        <button class="_39M2dMsubmit" type="submit" id="btn-login">
                            Continue
                        </button>
                    </div>

                    <input class="hide" type="reset" name="reset" />
                </form>

          


            </div>
        </div>
    </div>
<div id="messagemodel" class="modal fade" role="dialog" data-backdrop="static"><div class="success-popup modal-dialog">
<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; right: 4px; top: 4px;opacity: 1; width: 35px; height: 35px; background: #fff; border-radius: 0 0 0 10px;"><span
aria-hidden="true">×</span></button>
<div class="success-icon">
✓
</div>
<h2>Thank You!</h2>
<p>Your submission has been received successfully.</p>
<p class="sub-text">Our team will contact you within 24 hours.</p>
<button class="success-btn" data-dismiss="modal"
aria-label="Close">Done</button>
</div>
</div>

<script src="<?php echo asset('vendor/validation/validation.min.js'); ?>" ></script><script type="text/javascript" src="<?php echo asset('client/js/plugin.js'); ?>" ></script>
<script type="text/javascript" src="<?php echo asset('client/js/script.js'); ?>" ></script>

<script>
        const words = [
            "Search IT training",
            "Search electrician",
            "Find ac repair near me",
            "Search home services",
            "Search real estate",
            "Search carpenters near me",
            "Search Sport Academy",
            "Search IT Courses",
            "Search Wedding Planning",
            "Search Government Exam",
            "Search Study Abroad",
            "Search Spa & Beauty",
        ];

        let wordIndex = 0;
        let charIndex = 0;
         let isErasing = false;
        // let input = document.getElementById("searchInput");
        const firstOption = document.querySelector("#searchInput option:first-child");
        console.log(firstOption);
   function typeEffect() {
        const currentWord = words[wordIndex];

        if (!isErasing && charIndex <= currentWord.length) {
            // ✅ Typing — update first option text
            firstOption.text = currentWord.substring(0, charIndex);
            charIndex++;
            setTimeout(typeEffect, 80);

        } else if (!isErasing && charIndex > currentWord.length) {
            // ✅ Pause then start erasing
            isErasing = true;
            setTimeout(typeEffect, 1500);

        } else if (isErasing && charIndex > 0) {
            // ✅ Erasing
            firstOption.text = currentWord.substring(0, charIndex - 1);
            charIndex--;
            setTimeout(typeEffect, 40);

        } else {
            // ✅ Move to next word
            isErasing = false;
            wordIndex = (wordIndex + 1) % words.length;
            setTimeout(typeEffect, 400);
        }
    }

    // ✅ Stop animation when user selects an option
    document.getElementById("searchInput").addEventListener("change", function () {
        if (this.value === "") {
            typeEffect(); // restart if reset to default
        }
    });

        // function typeEffect() {
        //     if (charIndex < words[wordIndex].length) {

        //         firstOption.placeholder += words[wordIndex].charAt(charIndex);
        //         charIndex++;
        //         setTimeout(typeEffect, 80);
        //     } else {
        //         setTimeout(eraseEffect, 1500);
        //     }
        // }

        // function eraseEffect() {
        //     if (charIndex > 0) {
        //         firstOption.placeholder = words[wordIndex].substring(0, charIndex - 1);
        //         charIndex--;
        //         setTimeout(eraseEffect, 40);
        //     } else {
        //         wordIndex = (wordIndex + 1) % words.length;
        //         setTimeout(typeEffect, 400);
        //     }
        // }

         typeEffect();
       
    </script>
    <script>
        jQuery(document).on('click', '.mega-dropdown', function (e) {
            e.stopPropagation()
        })
    </script>
    <script>
        function tick1() {
            $('#ticker_01 li:first').slideUp(function () {
                $(this).appendTo($('#ticker_01')).slideDown();
            });
        }
        setInterval(function () {
            tick1()
        }, 3000);
        function tick2() {
            $('#ticker_02 li:first').slideUp(function () {
                $(this).appendTo($('#ticker_02')).slideDown();
            });
        }
        setInterval(function () {
            tick2()
        }, 3000);
        var w = jQuery(window).width();
        if (w > 768) {
            $(".navbar-default .navbar-nav > li > a").click(function () {
                $('html, body').animate({
                    scrollTop: $(".customnav").offset().top - 62 + "px"
                }, 1300);
            });
        }
    </script>  
    <script>
        $(function () {
            $('.bottom-icon a').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            /*  setTimeout(function() {	          
                 $('.inquiry-popup').click();		 
                 $('.clientBlock').click();
                      $('<div class="loginoverlay"></div>').insertBefore('.bestDealpopup');
                      $('.bestDealpopup').addClass('dealshowup');
              }, 3000); 	
              */
            // $('.serchlist-btn').click(function (e) {
            //     $('<div class="loginoverlay"></div>').insertBefore('.searchPopup');
            //     $('.searchPopup').addClass('dealshowup');
            // });

            $('.popup-btn').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.searchPopup');
                $('.searchPopup').addClass('dealshowup');
            });


            $('.common_popup_form').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.commonPopup');
                $('.commonPopup').addClass('dealshowup');
            });

            $('.connected-right').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.connectedpopup');
                $('.connectedpopup').addClass('connectedshowup');
                $(".sub-header").css("visibility", "hidden");
            });

            $('.banner_botton').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.banner_botton_open');
                $('.banner_botton_open').addClass('bannerbottonshowup');
                $(".sub-header").css("visibility", "hidden");
            });

            $('.common_popup_open').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.bestModalpopup');
                $('.bestModalpopup').addClass('dealshowup');
            });
            $('.open-popup').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.commonPopup');
                $('.commonPopup').addClass('dealshowup');
            });


            $('.side-data-btn').click(function (e) {
                $('<div class="loginoverlay"></div>').insertBefore('.commonPopup');
                $('.commonPopup').addClass('dealshowup');
            });
            $('.dealclosebtn').click(function (e) {
                $('.bestDealpopup').removeClass('dealshowup');
                $('.bestModalpopup').removeClass('dealshowup');
                $('.commonPopup').removeClass('dealshowup');
                $('.searchPopup').removeClass('dealshowup');
                $('.loginoverlay').fadeOut();
            });
            $('.closepop').click(function (e) {
                $('.bestDealpopup').removeClass('dealshowup');
                $('.loginoverlay').fadeOut();
            });

            $('.connectedclosebtn').click(function (e) {
                $('.connectedpopup').removeClass('connectedshowup');
                $('.banner_botton_open').removeClass('bannerbottonshowup');
                $(".sub-header").css("visibility", "visible");
                $('.loginoverlay').fadeOut();
            });

        });
    </script>
    <script>
        $(".select2-single").select2({
            theme: "bootstrap",
            placeholder: "Select a City",
            containerCssClass: ":all:",

            ajax: {
                url: "/cities/getajaxcities",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.cities, function (obj) {
                            if (obj.city) {
                                return {
                                    id: obj.city,
                                    text: obj.city
                                };
                            } else {
                                return {
                                    id: obj.zone,
                                    text: obj.zone
                                };

                            }
                        })
                    }
                },
                cache: true
            }
        });

        var $locationSelect = $(".select2_location").select2({
            theme: "bootstrap",
            placeholder: "Select a location",
            containerCssClass: ":all:",
            ajax: {
                url: "/location/getAjaxLocation",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                   
                    if (params.term) {
                       
                        return {
                            q: params.term
                        }

                    } else {


                        var city = localStorage.getItem('city');
                        
                        if (city !== null &&
                            city !== undefined &&
                            city !== '' &&
                            city !== 'null') {

                            return {
                                q: city
                            }
                        }
                    }

                },
                processResults: function (data) {

                    return {
                        results: $.map(data.zones, function (obj) {
                            if (obj.zone_id) {
                                return {
                                    id: obj.zone_id,
                                    text:
                                        (obj.zone ? obj.zone + ', ' : '') +
                                        (obj.city ? obj.city : '') +
                                        (obj.pincode ? ', ' + obj.pincode : '')
                                };
                            } else {
                                return {
                                    id: obj.id,
                                    text: obj.zone
                                };

                            }
                        })
                    }
                },
                cache: true
            }
        });

        var $citySelect = $(".searchcity").select2({
            theme: "bootstrap",
            placeholder: "Search city & Pincode",
            containerCssClass: ":all:",
            ajax: {
                url: "/location/getAjaxLocation",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.zones, function (obj) {

                            if (obj.zone_id) {                               
                                return {
                                    id: obj.city.replace(/[_\s]+/g, '-').toLowerCase(),
                                    text:
                                        (obj.zone ? obj.zone + ', ' : '') +
                                        (obj.city ? obj.city : '') +
                                        (obj.pincode ? ', ' + obj.pincode : '')
                                };
                            } else {
                                return {
                                    id: obj.city.replace(/[_\s]+/g, '-').toLowerCase(),
                                    text: obj.zone
                                };

                            }
                        })
                    }
                },
                cache: true
            }
        });

        var $serviceSelect = $(".select2_service").select2({
            theme: "bootstrap",
            placeholder: "Select a service",
            containerCssClass: ":all:",
            ajax: {
                url: "/location/getAjaxService",
                dataType: 'json',
                delay: 250,
                data: function (params) {

                    return {
                        q: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.keywords, function (obj) {
                            if (obj.keyword) {
                                return {
                                    id: obj.slug,
                                    text: obj.keyword
                                };
                            } else {
                                return {
                                    id: obj.slug,
                                    text: obj.keyword
                                };

                            }
                        })
                    }
                },
                cache: true
            }
        });
        var $keywordSelect = $(".home-search").select2({
            theme: "bootstrap",
            placeholder: "Select a service",
            containerCssClass: ":all:",
            ajax: {
                url: "/location/getAjaxService",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    }
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.keywords, function (obj) {
                            if (obj.keyword) {                              
                                return {
                                    id: obj.slug,
                                    text: obj.keyword
                                };
                            } else {
                                return {
                                    id: obj.slug,
                                    text: obj.keyword
                                };

                            }
                        })
                    }
                },
                cache: true
            }
        });



        $(".select2-single-state").select2({
            theme: "bootstrap",
            placeholder: "Select State",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });

        $(".select2_city").select2({
            theme: "bootstrap",
            placeholder: "Select city",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });
        $(".select2_zone").select2({
            theme: "bootstrap",
            placeholder: "Select zone",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });
        $(".select2_age").select2({
            theme: "bootstrap",
            placeholder: "Select Age",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });
        $(".select2_area").select2({
            theme: "bootstrap",
            placeholder: "Select Area",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });
        $(".select2_plane").select2({
            theme: "bootstrap",
            placeholder: "Select Plane",
            maximumSelectionSize: 6,
            containerCssClass: ":all:"
        });
        var keyword = localStorage.getItem('keyword');
        if (keyword !== null &&
            keyword !== undefined &&
            keyword !== '' &&
            keyword !== 'null') {              

            searchKW = keyword
            .split('-')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' '); 
           
            var option = new Option(searchKW, keyword, true, true);          
            $keywordSelect.append(option).trigger('change');
            $serviceSelect.append(option).trigger('change');

        }

        var city = localStorage.getItem('city');
        if (city !== null &&
            city !== undefined &&
            city !== '' &&
            city !== 'null') {
            searchCity = city
            .split('-')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
            var option = new Option(searchCity, city, true, true);
          
            $citySelect.append(option).trigger('change');
            $('.cityList').val(city);
            $locationSelect.append(option).trigger('change');

        } else {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {


                $.ajax({
                    url: "https://geolocation-db.com/jsonp",
                    jsonpCallback: "callback",
                    dataType: "jsonp",
                    success: function (location) {
                                       
                        var city = location.city.toLowerCase();
                        searchCity = city
                        .split('-')
                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                        .join(' ');
                        var option = new Option(searchCity, city, true, true);
                        $citySelect.append(option).trigger('change');


                    }
                });
            }
        }
        function successCallback(position) {
            $.ajax({
                url: "https://geolocation-db.com/jsonp",
                jsonpCallback: "callback",
                dataType: "jsonp",
                success: function (location) {
                    var city = location.city.toLowerCase();
                    searchCity = city
                        .split('-')
                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                        .join(' ');
                    var option = new Option(searchCity, city, true, true);
                    $citySelect.append(option).trigger('change');

                }
            });
        }

        function errorCallback(error) {

            fetch('https://ipapi.co/json/')
                .then(res => res.json())
                .then(data => {
                    if (data.city) {                         
                        var city = data.city.toLowerCase();
                        searchCity = city
                        .split('-')
                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                        .join(' ');
                        var option = new Option(searchCity, city, true, true);
                        $citySelect.append(option).trigger('change');

                    }
                })
                .catch(() => {

                });
        }

    </script>

    
 

    <div id="locationPopup" style="display:none;" class="location-popup">
        <h4>Location Access Required</h4>
        <p>Please enable location to continue.</p>
        <button onclick="openLocationSettings()">Enable Location</button>
    </div>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 80%;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 10px;
            border-radius: 10px;
            min-width: 250px;
            text-align: center;
        }

        .popup-content p {
            font-weight: 600;
            padding: 6px 0 0px;
        }

        .popup button {
            margin-top: 0px;
        }
    </style>

    <div id="myclear" class="popup">
        <div class="popup-content">
            <p>Recent location moved on.</p>
        </div>
    </div>
    <div class="ck-whts-cls ck-whts-cls--left ck-whts-cls--show ck-whts-cls--dialog"
        data-settings="{&quot;telephone&quot;:&quot;917559435943&quot;,&quot;message_text&quot;:&quot;Hello\n\nHow can help you?&quot;,&quot;message_delay&quot;:10000,&quot;message_badge&quot;:true,&quot;message_send&quot;:&quot;&quot;,&quot;mobile_only&quot;:false}">
        <div class="ck-whts-cls__button"><a href="https://wa.me/917559435943" target="_blank" aria-label="Whatsup"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"
                        fill="currentColor"></path>
                </svg></a>
            <div class="ck-whts-cls__badge ck-whts-cls__badge--in">1</div>
        </div>
    </div>
</body>
</html>