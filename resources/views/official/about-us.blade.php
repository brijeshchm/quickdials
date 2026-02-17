@extends('client.layouts.app')
@section('title')
  About Quick Dials Quick Dials- Local search, IT Training, Playschool, overseas education
@endsection 
@section('keyword')
Quick Dials- Local search, IT Training, Playschool, overseas education
@endsection
@section('description')
Quick Dials- Local search, IT Training, Playschool, overseas education
@endsection
@section('content')	

  <link href="{{asset('official/css/style.css')}}" rel="stylesheet">



<style>
 
 
/* Hero */
.hero {
    background: linear-gradient(to right, #EB2C3B, #ef6f79);
    color: #fff;
    padding: 80px 0;
    text-align: center;
    margin-top: 77px;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 10px;
        color: #fff;
}
.hero p {
  
    
        color: #fff;
}

/* About Section */
.about-section {
    padding: 60px 0;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 0fr;
    gap: 40px;
    align-items: center;
}

.about-text h2 {
    margin-top: 20px;
    color: #d50000;
}

.about-image img {
    width: 100%;
    border-radius: 8px;
}

/* Stats */
.stats {
    background: #f5f5f5;
    padding: 60px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    text-align: center;
}

.stat-box h3 {
    font-size: 32px;
    color: #000;
}

/* Values */
.values {
    padding: 60px 0;
}

.section-title {
    text-align: center;
    margin-bottom: 40px;
    color: #000;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.value-card {
    background: #fff;
    padding: 20px;
    border: 1px solid #eee;
    border-radius: 8px;
    text-align: center;
    transition: 0.3s;
}

.value-card:hover {
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Responsive */
@media (max-width: 992px) {
    .about-grid {
        grid-template-columns: 1fr;
    }

    .stats-grid,
    .values-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 600px) {
    .stats-grid,
    .values-grid {
        grid-template-columns: 1fr;
    }
}
/* Services Section */
.services {
    background: #f9f9f9;
    padding: 70px 0;
}

.section-subtitle {
    text-align: center;
    max-width: 700px;
    margin: 0 auto 40px;
    color: #666;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.service-card {
    background: #fff;
    padding: 30px 20px;
    border-radius: 10px;
    text-align: center;
    border: 1px solid #eee;
    transition: 0.3s;
}

.service-card .icon {
    font-size: 35px;
    margin-bottom: 15px;
}

.service-card h3 {
    margin-bottom: 10px;
    color: #d50000;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* Responsive */
@media (max-width: 992px) {
    .services-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 600px) {
    .services-grid {
        grid-template-columns: 1fr;
    }
}


/* About */
#about{
background: #f4f7fb;
}
#about h2 {
    margin-bottom: 20px;
    font-size: 32px;
    text-align: center;
}
.about-content{display:flex;gap:40px;align-items:center;flex-wrap:wrap}
.about-content img{width:100%;max-width:450px;border-radius:20px;box-shadow:0 10px 30px rgba(0,0,0,.2)}
.about-text{flex:1}

.hiddens{opacity:0;transform:translateY(40px);transition:all .8s ease}
.show{opacity:1;transform:translateY(0)}
#about{padding:80px 10%;position:relative}


/* About Section */
.about-section {
    padding: 80px 20px;
 
}

 

.section-title {
    text-align: center;
    margin-bottom: 60px;
}

.section-title h2 {
    font-size: 36px;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 10px;
}

.section-title p {
    color: #64748b;
    font-size: 16px;
}

/* Grid Layout */
.about-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

/* Cards */
.about-card {
    background: #ffffff;
    padding: 35px 30px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

/* Hover Effect */
.about-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

/* Card Heading */
.about-card h3 {
    font-size: 22px;
    margin-bottom: 15px;
    color: #2563eb;
    font-weight: 600;
}

/* Card Text */
.about-card p {
    color: #475569;
    line-height: 1.7;
    font-size: 15px;
}

/* Animation */
.about-card {
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 0.8s ease forwards;
}

.about-card:nth-child(1) { animation-delay: 0.2s; }
.about-card:nth-child(2) { animation-delay: 0.4s; }
.about-card:nth-child(3) { animation-delay: 0.6s; }

@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .section-title h2 {
        font-size: 28px;
    }
}
.single-services ol li p{
      margin: 0px;
}
.single-services ol li p strong{
     font-weight: 900;
}
</style>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcode to QuickDials.com</h1>
            <p>Your trusted local business search partner</p>
        </div>
    </section>

<section id="about" class="hiddens">
 
<div class="about-content">
<img loading="lazy" src="{{ asset('client/images/about-us.png') }}" alt="about">
<div class="about-text">
<p>Quick Dials is a fast-growing service search and lead platform in India. It helps people find the
right service providers in one place. The platform works on a simple match-making idea. Users
search for a service, and Quick Dials connects them with the right providers. The website
QuickDials.com makes it easy to search, compare, and contact service providers without
confusion.</p>
<p>Quick Dials works like a search engine for everyday services and professional needs. People
use it to find trusted and verified service providers across many fields. The information on the
platform is clear, updated, and easy to understand.</p>
</div>
</div>
</section>

<section class="about-section">
    <div class="">    

        <div class="about-grid">

            <div class="about-card">
                <h3>Vision</h3>
              	  <article>
              	<?php
							$comment = "Quick Dials was started with the objective of making the search for a service easy and reliable.
The idea behind it is to bring users and service providers together on a single platform. The
idea here is the establishment of a basis of trust, quality, and ease. Quick Dials would like
users to save time and make even the most difficult choices with ease..";
							if(strlen($comment)>150){
								$replacement = "<span style='display:none;'>";
								$comment = substr_replace($comment,$replacement,150,0);
								$replacement = "</span>";
								$comment = substr_replace($comment,$replacement,strlen($comment),0);
								echo $comment;
								?>
								<a href="javascript:void(0);" class="read-more">Read More..</a>
								<a href="javascript:void(0);" class="read-less hide">Read Less </a>
								<?php
							}else{
								echo $comment;
							}
						?></article>
                
            </div>

            <div class="about-card">
                <h3>USP’s</h3>
                	<article>
						<?php
							$comment = "Quick Dials uses technology to match users with the right services based on their real needs. It
does not show random results. The platform focuses on genuine listings, correct details, and
real user interest. This helps users get better results and helps service providers get serious
leads..";
							if(strlen($comment)>150){
								$replacement = "<span style='display:none;'>";
								$comment = substr_replace($comment,$replacement,150,0);
								$replacement = "</span>";
								$comment = substr_replace($comment,$replacement,strlen($comment),0);
								echo $comment;
								?>
								<a href="javascript:void(0);" class="read-more">Read More..</a>
								<a href="javascript:void(0);" class="read-less hide">Read Less </a>
								<?php
							}else{
								echo $comment;
							}
						?>
					</article>
            </div>

            <div class="about-card">
                <h3>Quick Dials For Service Providers</h3>
                 <article>
						<?php
							$comment = "Quick Dials gives service providers a strong platform to reach people who are already looking
for their services. It helps businesses get quality leads instead of useless calls. Providers get
better visibility, targeted reach, and chances to grow their business through real customer
demand.";
							if(strlen($comment)>150){
								$replacement = "<span style='display:none;'>";
								$comment = substr_replace($comment,$replacement,150,0);
								$replacement = "</span>";
								$comment = substr_replace($comment,$replacement,strlen($comment),0);
								echo $comment;
								?>
								<a href="javascript:void(0);" class="read-more">Read More..</a>
								<a href="javascript:void(0);" class="read-less hide">Read Less </a>
								<?php
							}else{
								echo $comment;
							}
						?>
					</article>  
            </div>
            <div class="about-card">
                <h3>Quick Dials For business</h3>
                 <article>
					 <article>
						<?php
							$comment = "Quick Dials is designed to be a single-window destination for the user with easy access to
services. Users will be able to search and compare various service providers and get connected
without wasting time and effort. Quick Dials helps people make quick and clear decisions by
showing them the right options in one place.";
							if(strlen($comment)>150){
								$replacement = "<span style='display:none;'>";
								$comment = substr_replace($comment,$replacement,150,0);
								$replacement = "</span>";
								$comment = substr_replace($comment,$replacement,strlen($comment),0);
								echo $comment;
								?>
								<a href="javascript:void(0);" class="read-more">Read More..</a>
								<a href="javascript:void(0);" class="read-less hide">Read Less </a>
								<?php
							}else{
								echo $comment;
							}
						?>
					</article>   
            </div>

        </div>
    </div>
</section>

 
    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-box">
                    <h3>{{ $clients }}+</h3>
                    <p>Registered Businesses</p>
                </div>
                <div class="stat-box">
                    <h3>160,000+</h3>
                    <p>Monthly Users</p>
                </div>
                <div class="stat-box">
                    <h3>{{$keyword}}+</h3>
                    <p>Service Keyword</p>
                </div>
                <div class="stat-box">
                    <h3>{{$citieslists}}+</h3>
                    <p>Cities Covered</p>
                </div>
                <div class="stat-box">
                    <h3>99%</h3>
                    <p>Customer Satisfaction</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <h2 class="section-title">Our Core Values</h2>
            <div class="values-grid">
                <div class="value-card">
                    <h3>Transparency</h3>
                    <p>We provide honest and verified business information.</p>
                </div>
                <div class="value-card">
                    <h3>Trust</h3>
                    <p>Building long-term trust with customers and partners.</p>
                </div>
                <div class="value-card">
                    <h3>Innovation</h3>
                    <p>Constantly improving technology for better user experience.</p>
                </div>
                <div class="value-card">
                    <h3>Customer First</h3>
                    <p>Every feature is designed keeping users in mind.</p>
                </div>
            </div>
        </div>
    </section>
<!-- Services Section -->
<section class="services">
    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <p class="section-subtitle">
            We provide complete digital solutions to help businesses grow and customers connect easily.
        </p>

        <div class="services-grid">

            <div class="service-card">
                <div class="icon">🔎</div>
                <h3>Business Listing</h3>
                <p>List your business with complete details, photos, contact information and grow your visibility.</p>
            </div>

            <div class="service-card">
                <div class="icon">⭐</div>
                <h3>Ratings & Reviews</h3>
                <p>Customers can rate and review businesses to help others make better decisions.</p>
            </div>

            <div class="service-card">
                <div class="icon">📢</div>
                <h3>Advertising Solutions</h3>
                <p>Promote your business with featured listings and priority placement options.</p>
            </div>

            <div class="service-card">
                <div class="icon">📱</div>
                <h3>Mobile Search</h3>
                <p>Easy mobile-friendly search platform for instant local business discovery.</p>
            </div>

            <div class="service-card">
                <div class="icon">📊</div>
                <h3>Business Insights</h3>
                <p>Get valuable data insights and analytics to understand customer behavior.</p>
            </div>

            <div class="service-card">
                <div class="icon">🤝</div>
                <h3>Lead Generation</h3>
                <p>Receive direct customer inquiries and convert them into potential clients.</p>
            </div>

        </div>
    </div>
</section>
<script>
const observer = new IntersectionObserver(entries => {
entries.forEach(entry => {
if(entry.isIntersecting){
entry.target.classList.add('show');
}
});
});

document.querySelectorAll('.hiddens').forEach(el => observer.observe(el));
</script>

 
  
 
	 
	  
	  
    </div>
  </div>
   
   
    <!-- Start Service area -->
  
  
  <div id="features" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Quick Dials Application Features</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="services-contents">
         
		   <div class="">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0)">
				<img loading="lazy" alt="Leads Generation for Business" src="{{asset('/public/client/images/business/group.png')}}">
										</a>
                  <h4>Quick Dials: Leads Generation for Business</h4>
                  <ol><li><p><strong>Service-Based Quality Leads:</strong>:</p><ul><li>Quick Dials lets businesses acquire real leads for IT services,
wedding planning, electrical and repair work, healthcare, real estate, finance, wellness, travel,
hotels, restaurants, and professional services. </li><li>The website links service providers with people
who are looking for help or services right now.</li></ul></li>

<li><p><strong>Targeted Reach for Many Services:</strong>:</p><ul><li>Companies can find the ideal clients based on their city,
area, type of service, and demands. </li><li>Businesses that meet the user&#39;s needs get leads for things
like an electrician, wedding planner, doctor, travel agent, or loan advisor.</li></ul></li><li><p><strong>Understanding Customer Needs First:</strong>:</p><ul><li>Quick Dials makes sure they know what the customer
wants-budget, location, urgency, and service expectations-before passing on leads. </li><li>This helps firms get more valuable and relevant questions.</li></ul></li><li><p><strong>Direct Interaction Between Businesses and Customers:</strong>:</p><ul><li>The platform lets customers and
service providers talk to each other directly, which makes it easier to respond swiftly to
requests for repairs, healthcare appointments, property inquiries, or event organizing.</li></ul></li><li><p><strong>Large Multi-Service User Base:</strong>:</p><ul><li>People utilize Quick Dials to find a wide range of services,
such as IT support, weddings, medical care, real estate, financial options, wellness services,
travel bookings, and repair needs.</li></ul></li><li><p><strong>Reviews and Ratings:</strong>:</p><ul><li>Customer reviews and ratings help people find reliable service
providers and assist businesses in gaining the trust of new consumers.</li></ul></li><li><p><strong>Certified Business Listing:</strong>:</p><ul><li>Businesses that are Quick Dials Certified are more trustworthy and
visible, especially in fields where there are a lot of competitors, such as healthcare, real estate,
finance, and home services.</li></ul></li><li><p><strong>Reports &amp; Lead Tracking:</strong>:</p><ul><li>Companies may keep track of leads, responses, and performance to
see which services are in higher demand and where they need to make changes.</li></ul></li><li><p><strong>Local and Area-Based Leads:</strong>:</p><ul><li>Service providers get leads from places close by. This is
especially helpful for electricians, repair services, clinics, hotels, and other local specialists.</li></ul></li>  </ul></li>  </ol>
                   
                </div>
              </div>
              
            </div>
          </div>
<div class="col-md-4 col-sm-4 col-xs-12">
           
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0)">
										<img loading="lazy" alt="Real interactive class room" src="{{asset('/public/client/images/business/customized-training.png')}}">
										</a>
                  <h4>Finding the Right Services for People</h4>
                  <ol><li><p><strong>Technical and IT Support:</strong></p><ul><li>Quick Dials helps consumers identify IT service providers for website work, computer support, software help, and other technical needs based on what they need.</li> </ul>
                </li><li><p><strong>Wedding Planning and Event Services:</strong></p><ul><li>People can hire wedding planners, decorators,
photographers, event organizers, and other wedding-related services to make sure their big
day goes off without a hitch.</li></ul></li><li><p><strong>Home, Electrical, and Repair Services:</strong></p><ul><li>Quick Dials connects users with electricians, repair
workers, carpenters, packers and movers, and other home service providers for daily
household needs.</li></ul></li><li><p><strong>Healthcare and Medical Services:</strong></p><ul><li>Users may find doctors, clinics, hospitals, dentists, and
wellness centers, and get advice on picking the best medical services.</li></ul></li><li><p><strong>Real Estate and Property Services:</strong>:</p><ul><li>Quick Dials lets consumers identify property dealers,
rental homes, flats, offices, and aids with buying, selling, or renting property.</li></ul></li><li><p><strong>Finance, Loans, and Tax Services:</strong></p><ul><li>People can conveniently handle their money by talking to
loan officers, financial counselors, tax consultants, and insurance agents.</li></ul></li><li><p><strong>Wellness, Fitness, and Lifestyle Services:</strong></p><ul><li>Quick Dials helps people find yoga courses, dance
schools, gyms, spas, beauty services, and health professionals.</li></ul></li><li><p><strong>Travel, Hotels, and Hospitality Services:</strong></p><ul><li>Users can locate travel agencies, tour companies,
hotels, restaurants, and other travel-related services for work or leisure travel.</li></ul></li><li><p><strong>Professional and Business Services:</strong></p><ul><li>Quick Dials helps people find business-related services
like consultants, contractors, security service providers, and other experts.</li></ul></li></ol>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="javascript:void(0)">
					<img loading="lazy" alt="Clearing of doubts using" src="{{asset('/public/client/images/business/head_phone.png')}}">
										</a>
                  <h4>What People Use Quick Dials For!</h4>
                  <ol><li><p></p><ul><li>People use Quick Dials to get help finding the proper service without having to call a lot of
different numbers or run around.</li>


<li>Some people need help with IT things like fixing their websites, getting software support, or
getting technical services for their business.
Some people are arranging weddings or other events and need reliable planners, designers,
photographers, or caterers.</li>
<li>A lot of people utilize Quick Dials for regular home needs like electricians, repairs, packers &amp;
movers, and maintenance services.
Some people are looking for doctors, clinics, hospitals, or wellness services for themselves or
their families.</li>



</ul></li>


<li><ul><li>People who wish to buy, sell, or rent property, or who need help with loans, insurance, or
taxes, also utilize Quick Dials.
People also often look for fitness, beauty, and wellness services, including gyms, yoga courses,
salons, and spas.</li><li>Another large reason people use Quick Dials is to arrange trips. They can find hotels,
restaurants, tour services, and travel agencies all in one spot.
Quick Dials is also used by professionals and organizations to find contractors, consultants,
security services, and other support services.</li>
<li>Quick Dials helps individuals get the correct service at the right time without making mistakes
or making too many calls.</li>
</ul></li> </ol>
                </div>
              </div>
              
            </div>
          </div>
          
          

		  </div>
		   
		
           
          
		
      </div>
	  
	  
	  
    </div>
  </div>
  </div>
  
  
  
   <div class="wellcome-area">
    <div class="well-bg">
      <div class="test-overly"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="wellcome-text subscribe-form">
              <div class="well-text text-center">
                <h2>Thanks To Quick Dials </h2>
                <p>
                  Quick Dials  is the best place to track and crack your leads to generate and grow your business.
                </p>
				<div id="sendsubscribe">Your subscribe has been sent. Thank you!</div>
              <div id="errorsubscribe"></div>
			 
			   
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="{{asset('official/contactform/contactform.js')}}"></script>
 @endsection
