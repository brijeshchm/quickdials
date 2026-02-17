<?php $__env->startSection('title'); ?>
Quick Dials | A Local Search Engine for Businesses
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('keyword'); ?>
Find Best It Training Centre near You, Find Best It Training Institute near You, Find Top 10 IT Training Institute near You, Find Best Entrance Exam Preparation Centre Near you, Top 10 Entrance Exam Centre Near you, Find Best Distance Education Centre Near You, Find Top 10 Distance Education Centre Near You, Find Best School And Colleges Near You, Find Top 10 school And College Near You, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near you, Find Top 10 overseas education consultants Near you
<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
Find Only Certified Training Institutes, Coaching Centers near you on quickdials and Get Free counseling, Free Demo Classes, and Get Placement Assistence.
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="banner">
   <div class="searchform">
      <h1>Explore Your Choice</h1>
      <p>Let's uncover the best service providers near you.</p>
      <div class="filterForm">
          
          
         <form action="/searchlist" method="GET" class="search-form" autocomplete="off">
      <div class="search-wrapper">
          <select name="city" class="select2_location searchcity location locationbtn city">
							<option value="">Search city & pincode</option>
						</select>
          
       
            
            
               <div style="position:relative;" class="search-bar">
            
                <select name="search_kw" class="serviceneed home-search searchInput" id="searchInput">
							<option value="">Search Service</option>
						</select>  

                   <input type="submit" class="col-md-2 submitbtn" value="GO">
                
               </div>
               </div>
            </div>
         </form>
          
         
      
         <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
   </div>
 
<div class="clearfix"></div> 
<style>
   .items-list {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
   gap: 10px;
   margin-bottom: 20px;
   }
   .items {
   background-color: white;
   border-radius: 10px;
   box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
   display: flex;
   flex-direction: column;
   align-items: center;
   padding: 15px;
   text-align: center;
   transition: transform 0.3s;
   }
   .items:hover {
   transform: translateY(-5px);
   }
   .items img {
   width: 60px;
   height: 60px;
   margin-bottom: 10px;
   }
   .title-serv a {
   font-size: 11px;
   color: #333;
   text-decoration: none;
   font-weight: 500;
   }
   .title-serv a:hover {
   color: #007bff;
   }
    
</style>
<div class="container">
       <div class="services" >
    
         <div id="recentSearchContainer">
         </div>
    
         </div>
   <div class="services" >
      <div class="items-list">
         <div class="img-items">             
         <div class="items">
            <a href="<?php echo e(url('categories/professional-courses')); ?>" > <img loading="lazy" src="<?php echo e(asset('img/IT-Training.png')); ?>" alt="computer courses"  ></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('categories/professional-courses')); ?>" >IT Courses </a></span>
         </div>

         <div class="img-items">  
         <div class="items">
            <a href="<?php echo e(url('wedding-pannel')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/wedding.png')); ?>" alt="wedding" ></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('wedding-pannel')); ?>" >Wedding Planning </a></span>
         </div>
         <div class="img-items">  
         <div class="items">
            <a href="<?php echo e(url('child/electric-services')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/electric-services.png')); ?>" alt="Electric Services" ></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/electric-services')); ?>" >Electric Services </a></span>
         </div>


         <div class="img-items">    
       
         <div class="items">
            <a href="<?php echo e(url('categories/entrance-exams-coaching')); ?>"  >
            <img loading="lazy" src="<?php echo e(asset('img/government-exam.png')); ?>" alt="government exam"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('categories/entrance-exams-coaching')); ?>"  >Government Exam</a> </span>
         </div>
         <div class="img-items">     
         <div class="items">
            <a href="<?php echo e(url('categories/study-abroad')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/study-abroad.png')); ?>" alt="study abroad"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('categories/study-abroad')); ?>" >Study Abroad </a></span>
         </div>
         <div class="img-items">      
         <div class="items">
            <a href="<?php echo e(url('child/spa-and-beauty')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Spa & Beauty.png')); ?>" alt="Spa & Beauty"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/spa-and-beauty')); ?>" >Spa & Beauty</a> </span>
         </div>
         <div class="img-items">             <div class="items">
            <a href="<?php echo e(url('child/repair-services')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Repairs-Services.png')); ?>" alt="Repairs-Services"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/repair-services')); ?>" > Repair Services</a> </span>
         </div>
         <div class="img-items">             
         <div class="items">
            <a href="<?php echo e(url('child/packers-and-movers')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Packers-movers.png')); ?>" alt="Packers-movers"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/packers-and-movers')); ?>" >Packers & Movers</a></span>
         </div>
         <div class="img-items">           
         <div class="items">
            <a href="<?php echo e(url('child/interior-designer')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/interior-design.png')); ?>" alt="interior-design"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/interior-designer')); ?>" > Interior Design</a> </span>
         </div>
         <div class="img-items">           
         <div class="items">
            <a href="event-organisers" class="keystore">
            <img loading="lazy" src="<?php echo e(asset('img/Event-organizers.png')); ?>" alt="Event-organizers"></a>
             </div>
            <span class="title-serv"> <a href="event-organisers" class="keystore">Event- Organizers</a> </span>
         </div>
         <div class="img-items">             
         <div class="items"><a href="<?php echo e(url('child/professional')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Professional.png')); ?>" alt="Professional"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/professional')); ?>" >Professional </a></span>
         </div>
         <div class="img-items">           
         <div class="items"><a href="<?php echo e(url('child/contractors')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/contractors.png')); ?>" alt="contractors"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/contractors')); ?>" >Contractors</a></span>
         </div>
         <div class="img-items">            
         <div class="items"><a href="hotels" class="keystore" >
            <img loading="lazy" src="<?php echo e(asset('img/Hotels.png')); ?>" alt="Hotels"></a>
             </div>
            <span class="title-serv"><a href="hotels" class="keystore">Hotels</a></span>
         </div>
         <div class="img-items">        
         <div class="items"><a href="restaurants" class="keystore">
            <img loading="lazy" src="<?php echo e(asset('img/Restaurants.png')); ?>" alt="Restaurants"></a>
             </div>
            <span class="title-serv">
                <a href="restaurants" class="keystore">Restaurants</a></span>
         </div>
         <div class="img-items">          
         <div class="items"><a href="<?php echo e(url('/categories/schools-and-colleges')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Education.png')); ?>" alt="Education"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/categories/schools-and-colleges')); ?>" >Education</a></span>
         </div>
         <div class="img-items">         
         <div class="items"><a href="<?php echo e(url('/child/rent-or-buy')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Rent-buy.png')); ?>" alt="Rent-buy"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/rent-or-buy')); ?>" >Rent & Buy</a></span>
         </div>
         <div class="img-items">       
         <div class="items"><a href="<?php echo e(url('child/sports-academy')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/sports.png')); ?>" alt="sports"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/sports-academy')); ?>" >Sport Academy</a></span>
         </div>
         <div class="img-items">   
         <div class="items"><a href="<?php echo e(('/pg-hostels')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/PG hOTELS.png')); ?>" alt="PG hOTELS"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/pg-hostels')); ?>" >PG/Hostels</a></span>
         </div>
         <div class="img-items">
            <div class="items"><a href="<?php echo e(url('/dentists')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Dentists.png')); ?>" alt="Dentists"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/dentists')); ?>" >Dentists</a></span>
         </div>
         <div class="img-items">          
            <div class="items"><a href="<?php echo e(url('/child/medical')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Medical.png')); ?>" alt="Medical"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/medical')); ?>" >Medical</a></span>
         </div>
         <div class="img-items">        
            <div class="items"><a href="<?php echo e(url('/real-estate-agent')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/real-state.png')); ?>" alt="real-state"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/real-estate-agent')); ?>" >Real Estate</a></span>
         </div>
         <div class="img-items">           
            <div class="items"><a href="<?php echo e(url('/categories/finance-services')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Loan.png')); ?>" alt="Loan"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/categories/finance-services')); ?>" >Loan</a></span>
         </div>
         <div class="img-items">         
            <div class="items"><a href="<?php echo e(url('/carpenters')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Carpenters.png')); ?>" alt="Carpenters"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/carpenters')); ?>" >Carpenters</a></span>
         </div>
         <div class="img-items">         
            <div class="items"><a href="<?php echo e(url('/health-wellness')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/health-wellness.png')); ?>" alt="health-wellness"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/health-wellness')); ?>" >Health & Wellness</a></span>
         </div>
         <div class="img-items">    
            
            <div class="items"><a href="<?php echo e(url('/child/dancing')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Dancing.png')); ?>" alt="Dancing"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/dancing')); ?>" >Dance Academy</a></span>
         </div>
         <div class="img-items">   
            <div class="items"><a href="<?php echo e(url('/child/yoga-classes')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Yoga.png')); ?>" alt="Yoga"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/yoga-classes')); ?>" >Yoga</a></span>
         </div>
         <div class="img-items">       
            <div class="items"><a href="<?php echo e(url('/income-tax-consultants')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/tax-consultants.png')); ?>" alt="tax consultants"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/income-tax-consultants')); ?>" >Tax Consultants</a></span>
         </div>
         <div class="img-items">   
            <div class="items"><a href="<?php echo e(url('/child/security-system')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/CCTV-security.png')); ?>" alt="security"> </a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/security-system')); ?>" >CCTV Security</a></span>
         </div>
         <div class="img-items">         
                <div class="items"><a href="<?php echo e(url('/child/web-technologies')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('images/Web-Designers.png')); ?>" alt="Web-Designers"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('/child/web-technologies')); ?>" >Web Designers</a></span>
         </div>
         <div class="img-items">          
            <div class="items"><a href="<?php echo e(url('child/jobs-placements')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('img/Jobs.png')); ?>" alt="Jobs"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/jobs-placements')); ?>" >Jobs & Placements</a></span>
         </div>
         <div class="img-items">     
            <div class="items"><a href="tours-and-travels" class="keystore">
            <img loading="lazy" src="<?php echo e(asset('images/tour-travels.png')); ?>" alt="tour-travels"></a>
             </div>
            <span class="title-serv"><a href="tours-and-travels" class="keystore">Tours & Travels</a></span>
         </div>
       
         <div class="img-items">    
            
            <div class="items"><a href="<?php echo e(url('child/school-and-college-tuition')); ?>" >
            <img loading="lazy" src="<?php echo e(asset('images/school.png')); ?>" alt="school"></a>
             </div>
            <span class="title-serv"><a href="<?php echo e(url('child/school-and-college-tuition')); ?>" >Schools</a></span>
         </div>
      </div>
   </div>

  
 
<div class="popular-searches">
      <div class="popular-title text-center">
         <h5>Popular Searches</h5>
         <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
      </div>
      <div class="popular-list">
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/categories/computer-courses')); ?>" title="IT Training" tabindex="0">
                  <img loading="lazy" class="" src="popular/IT-Training.jpg" alt="IT-Training" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/categories/computer-courses')); ?>"   tabindex="0"> <span>IT Training</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>" title="Entrance exam" tabindex="0">
                  <img loading="lazy" class="" src="popular/Entrance-Exam.jpg" alt="Entrance-Exam" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>"   tabindex="0"> <span>Entrance exam </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/child/packers-and-movers')); ?>"   tabindex="0" title="Packers & Movers" tabindex="0">
                  <img loading="lazy" class="" src="popular/Packers-Movers.jpg"  alt="packers-movers" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/child/packers-and-movers')); ?>"   tabindex="0"> <span>Packers & Movers</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/child/interior-designer')); ?>" title="Interior Design" tabindex="0">
                  <img loading="lazy" class="" src="popular/Interior-design.jpg"  alt="Interior-design" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/child/interior-designer')); ?>"   tabindex="0"> <span>Interior Design</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="real-estate-agent" title="Estate Agents" class="keystore" tabindex="0">
                  <img loading="lazy" class="" src="popular/real-estate-agent.jpg"  alt="real-estate-agent" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="real-estate-agent" tabindex="0" class="keystore"> <span>Real Estate Agents</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="carpenters" class="keystore" title="Carpenters" tabindex="0">
                  <img loading="lazy" class="" src="popular/carpenter.jpg"  alt="carpenter" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="carpenters" class="keystore"  tabindex="0"> <span>Carpenters</span> </a></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="popular-searches">
      <div class="popular-title text-center">
         <h5>Repairs & Services</h5>
         <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
      </div>
      <div class="popular-list">
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="ac-service" class="keystore" title="AC Service" tabindex="0">
                  <img loading="lazy" class="" src="popular/AC-Service.jpg"  alt="AC-Service" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/ac-service')); ?>"   tabindex="0"> <span>AC Service</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="car-service" title="Car Services" class="keystore" tabindex="0">
                  <img loading="lazy" class="" src="popular/car-services.jpg"  alt="car-services" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="car-service"  class="keystore" tabindex="0"> <span>Car Services</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="laundry-service" class="keystore" title="Laundry Services" tabindex="0">
                  <img loading="lazy" class="" src="popular/washing-machines.jpg"  alt="washing" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="laundry-service" class="keystore" tabindex="0"> <span>Laundry Services</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="electricity-service" class="keystore" title="Electricity Services" tabindex="0">
                  <img loading="lazy" class="" src="popular/Electricity-Services.jpg"  alt="Electricity" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="electricity-service" class="keystore" tabindex="0"> <span>Electrician Services</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="hotels" title="Hotel Services" tabindex="0" class="keystore">
                  <img loading="lazy" class="" src="popular/Hotel-Services.jpg"  alt="Hotel" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="hotels" tabindex="0" class="keystore"> <span>Hotels </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/categories/health-and-wellness')); ?>" title="Fitness Services" tabindex="0">
                  <img loading="lazy" class="" src="popular/Fitness-Services.jpg"  alt="Fitness" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/categories/health-and-wellness')); ?>"   tabindex="0"> <span>Health & Fitness</span> </a></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   
   <div class="popular-searches">
      <div class="popular-title text-center">
         <h5>Wedding Planning</h5>
         <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
      </div>
      <div class="popular-list">
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('catering-services')); ?>" title="Catering Services" tabindex="0">
                  <img loading="lazy" class="" src="popular/Catering-Services.jpg"  alt="Catering" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('catering-services')); ?>"   tabindex="0"> <span>Catering Services</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="banquet-hall" class="keystore" title="Banquet Halls" tabindex="0">
                  <img loading="lazy" class="" src="popular/Banquet-Halls.jpg"  alt="Banquet" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="banquet-hall" class="keystore" tabindex="0"> <span>Banquet Halls </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="stage-decorators" class="keystore" title="Stage Decorators" tabindex="0">
                  <img loading="lazy" class="" src="popular/Stage-Decorators.jpg"  alt="Stage" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="stage-decorators"  class="keystore" tabindex="0"> <span>Stage Decorators</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="makeup-artists" class="keystore" title="Makeup Artists" tabindex="0">
                  <img loading="lazy" class="" src="popular/makeup-artists.jpg"  alt="makeup"></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="makeup-artists" class="keystore" tabindex="0"> <span>Makeup Artists</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="mehendi-artists" class="keystore" title="Mehendi Artists" tabindex="0">
                  <img loading="lazy" class="" src="popular/Mehendi-Artists.jpg"  alt="Mehendi" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="mehendi-artists" class="keystore" tabindex="0"> <span>Mehendi Artists</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="bridal-wear" class="keystore" title="Bridal Wear" tabindex="0">
                  <img loading="lazy" class="" src="popular/Bridal-Wear.jpg"  alt="Bridal" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="bridal-wear" class="keystore"  tabindex="0"> <span>Bridal Wear</span> </a></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="popular-searches">
      <div class="popular-title text-center">
         <h5>Entrance Exams </h5>
         <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
      </div>
      <div class="popular-list">
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>" title="Air Force & Navy / SSR / MR" tabindex="0">
                  <img loading="lazy" class="" src="popular/air-force-navy.jpg"  alt="Air Force & Navy / SSR / MR" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>"   tabindex="0"> <span>Air Force & Navy / SSR / MR </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>" title="UPSC & IAS" tabindex="0">
                  <img loading="lazy" class="" src="popular/UPSC-IAS.jpg"  alt="UPSC" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="<?php echo e(url('/categories/entrance-exams-coaching')); ?>"   tabindex="0"> <span>UPSC & IAS</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="ssc-cgl" class="keystore" title="SSC CGL JEE" tabindex="0">
                  <img loading="lazy" class="" src="popular/SSC-CGL-JEE.jpg"  alt="SSC-CGL" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="ssc-cgl" class="keystore" tabindex="0"> <span>SSC CGL JEE </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="rrb-ntpc-coaching" class="keystore" title="NTPC & RRB Railway" tabindex="0">
                  <img loading="lazy" class="" src="popular/NTPC-RRB-Railway.jpg"  alt="NTPC-RRB" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="rrb-ntpc-coaching" class="keystore" tabindex="0"> <span>NTPC & RRB Railway </span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="cat-coaching" class="keystore" title="CAT" tabindex="0">
                  <img loading="lazy" class="" src="popular/CAT-exam.jpg"  alt="CAT-exam" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="cat-coaching" class="keystore"  tabindex="0"> <span>CAT/NEET</span> </a></h3>
               </div>
            </div>
         </div>
         <div class="col-md-2">
            <div class="popular-div">
               <figure><a href="ctet-coaching" class="keystore" title="CTET Super TET" tabindex="0">
                  <img loading="lazy" class="" src="popular/CTET-Super-TET.jpg"  alt="CTET-Super" ></a>
               </figure>
               <div class="grid-info ">
                  <h3><a href="ctet-coaching" class="keystore" tabindex="0"> <span>CTET Super TET</span> </a></h3>
               </div>
            </div>
         </div>
      </div>
   </div>
    

	<!-- Popular Categories -->
		<section class="popular-categories">
			<div class="container">
			<div class="popular-title text-center">
				<h5 class="popular-title text-center">Popular Categories</h5>
				 <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
				
				<div class="categories-grid">
               
					<div class="category-card">
                  <a href="coaching-tuitions" class="keystore">
						<span class="category-count">5,200+</span>
						<div class="category-icon">🎓</div>
						<h3>Coaching & Tuitions</h3>
						<p>JEE, NEET, CAT, SSC, Banking, and competitive exam preparation</p>
                  </a>
					</div>
 


					<div class="category-card">
                   <a href="<?php echo e(url('child/professional')); ?>" >
						<span class="category-count">3,800+</span>
						<div class="category-icon">💼</div>
						<h3>Business Services</h3>
						<p>CA, Tax consultants, legal services, and business solutions</p>
                  </a>
					</div>
					
					<div class="category-card">
                  <a href="<?php echo e(url('child/contractors')); ?>" >
						<span class="category-count">4,500+</span>
						<div class="category-icon">🏠</div>
						<h3>Home Construction</h3>
						<p>Architects, contractors, interior designers, and renovation services</p>
                  </a>
					</div>
					
					<div class="category-card">
                   <a href="<?php echo e(url('categories/professional-courses')); ?>" > 
						<span class="category-count">2,100+</span>
						<div class="category-icon">💻</div>
						<h3>Computer Courses</h3>
						<p>Programming, web development, digital marketing, and IT training</p>
                  </a>
					</div>
								 
					
					<div class="category-card">
                    <a href="<?php echo e(url('child/medical')); ?>"> 
						<span class="category-count">3,200+</span>
						<div class="category-icon">🏥</div>
						<h3>Medical Services</h3>
						<p>Hospitals, clinics, diagnostic centers, and healthcare providers</p>
                  </a>
					</div>
					
					<div class="category-card">
                    <a href="<?php echo e(url('wedding-pannel')); ?>" > 
						<span class="category-count">2,800+</span>
						<div class="category-icon">🎉</div>
						<h3>Wedding Services</h3>
						<p>Event planners, caterers, photographers, and decoration services</p>
                  </a>
					</div>
									 
				</div>
			</div>
			</div>
         <style>
               /* Popular Categories */
        .popular-categories {
            padding: 8px 0;
            background: white;
        }
        
        .section-title {
            text-align: center;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 20px;
            color: #1e3a8a;
        }
        
        .section-subtitle {
            text-align: center;
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: #6b7280;
            margin-bottom: 50px;
        }
        
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 25px;
        }
        
        .category-card {
            background: white;
            border: 2px solid #f3f4f6;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .category-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.6s;
            opacity: 0;
        }
        
        .category-card:hover::before {
            opacity: 1;
            animation: shimmer 1.5s ease-in-out;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            border-color: #3b82f6;
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }
        
        .category-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
            position: relative;
            z-index: 2;
        }
        
        .category-card h3 {
            font-size: clamp(1.1rem, 2.5vw, 1.3rem);
            font-weight: 600;
            color: #1e3a8a;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }
        
        .category-card p {
            color: #6b7280;
            font-size: clamp(0.8rem, 2vw, 0.95rem);
            position: relative;
            z-index: 2;
        }
        
        .category-count {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #3b82f6;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
         </style>
		</section>
 <!-- Featured Businesses -->
    <section class="featured-businesses">
        <div class="container">
        <div class="popular-title text-center">
            <h5 class="popular-title text-center">Featured Businesses</h5>
            <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div> 
            <div class="businesses-carousel">

<?php if($featuredClient): ?>
<?php $__currentLoopData = $featuredClient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="business-card">
                    <div class="business-header">
                        <div class="business-logo">
<?php echo strtoupper(substr($featured->business_name, 0, 2)); ?>

                        </div>
                        <div class="business-info">
                            <h4><a href="<?php echo e(url('business-details/'.$featured->business_slug)); ?>" > <?php echo ucfirst($featured->business_name); ?></a></h4>
                            <div class="business-rating">
                                
                                <?php if(!empty($featured)): ?>
								<?php
						$rating =number_format($featured->avg_rating, 1)
;
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
								<div style="font-size: 12px;font-weight: 500;" class="home-rating">
								 
									<div>
										<img loading="lazy" itemprop="image" src="<?php echo e(asset('client/images/' . $stars)); ?>"
											alt="5 Star Rating: Very Good" /> 
										 
										 
									</div>
								</div>
					<?php endif; ?> 
                                
                                
                                <span class="rating-score">(<?php echo round($featured->avg_rating,2); ?>)</span>
                            </div>
                            <!-- <div class="business-category">IT Services</div> -->
                        </div>
                    </div>
                    <p class="business-description">
                     <?php echo e($featured->keywords); ?>

                        
                    </p>
                    <div class="business-details">
                        <div class="detail-item">
                            <span class="detail-icon">📍</span>
                            <span><?php echo e($featured->address); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <span class="detail-icon">🕒</span>
                            <span>9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-icon">✅</span>
                            <span>Verified Business</span>
                        </div>
                    </div>
                    <div class="business-actions">
                        <a href="<?php echo e(url('business-details/'.$featured->business_slug)); ?>" class="btn-view-details" target="_blank">View Details</a>
                         
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

                
                
                 
         </div>
        </div>
        </div>
<style>
    /* Featured Businesses */
        .featured-businesses {
            padding: 8px 0;
            
        }
        
        .businesses-carousel {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }
        
        .business-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .business-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #06b6d4, #10b981);
            transition: left 0.5s ease;
        }
        
        .business-card:hover::before {
            left: 0;
        }
        
        .business-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }
        
        .business-header {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .business-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.3rem;
            margin-right: 15px;
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }
        
        .business-info h4 {
            font-size: clamp(1.1rem, 2.5vw, 1.4rem);
            font-weight: 600;
            margin-bottom: 8px;
            color: #1e3a8a;
        }
        
        .business-rating {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 5px;
        }
        
        .stars {
            color: #fbbf24;
            font-size: 1rem;
            display: flex;
        }
        
        .rating-score {
            color: #6b7280;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .business-category {
            color: #3b82f6;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .business-description {
            color: #6b7280;
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 0.95rem;
        }
        
        .business-details {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #6b7280;
        }
        
        .detail-icon {
            font-size: 1rem;
            min-width: 16px;
        }
        
        .business-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .btn-view-details, .btn-contact {
            padding: 12px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .btn-view-details {
            background: #3b82f6;
            color: white;
        }
        
        .btn-contact {
            background: #f3f4f6;
            color: #1e3a8a;
        }
        
        .btn-view-details:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }
        
        .btn-contact:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }
</style>


    </section>

 <!-- Services Section -->
    <section class="services-section">
        <div class="container">
        <div class="popular-title text-center">
            <h5 class="popular-title text-center">Business Services</h5>
             <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
            <div class="services-grid">
                <div class="service-item">
                  <a href="patient-care-service" class="keystore">
                    <div class="service-icon">🏥</div>
                    <h4>Patient Care</h4>
                    </a>
                </div>
                <div class="service-item">
                    <a href="patient-care-service" class="keystore">
                    <div class="service-icon">🔧</div>
                    <h4>Home Appliances</h4>
                    </a>
                </div>
                <div class="service-item">
                     <a href="patient-care-service" class="keystore">
                    <div class="service-icon">📦</div>
                    <h4>Packers Movers</h4>
                    </a>
                </div>
                <div class="service-item">
                     <a href="patient-care-service" class="keystore">
                    <div class="service-icon">❄️</div>
                    <h4>AC Services</h4>
                    </a>
                </div>
                <div class="service-item">
                     <a href="patient-care-service" class="keystore">
                    <div class="service-icon">🧹</div>
                    <h4>Cleaning</h4>
                    </a>
                </div>
                <div class="service-item">
                     <a href="patient-care-service" class="keystore">
                    <div class="service-icon">🛡️</div>
                    <h4>Security Guards</h4>
                    </a>
                </div>
                <div class="service-item">
                     <a href="patient-care-service" class="keystore"></a>
                    <div class="service-icon">🏗️</div>
                    <h4>Architects</h4>
                </div>
                <div class="service-item">
                    <div class="service-icon">🔨</div>
                    <h4>Contractors</h4>
                </div>
                <div class="service-item">
                    <div class="service-icon">🎨</div>
                    <h4>Interior Design</h4>
                </div>
                <div class="service-item">
                    <div class="service-icon">🍳</div>
                    <h4>Modular Kitchen</h4>
                </div>
                <div class="service-item">
                    <div class="service-icon">🎯</div>
                    <h4>Digital Marketing</h4>
                </div>
                <div class="service-item">
                    <div class="service-icon">💡</div>
                    <h4>Electric Services</h4>
                </div>
            </div>
        </div>
        </div>

        <style>
  /* Services Section */
        .services-section {
            padding: 8px 0;
            background: white;
        }
        
       
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 20px;                   
        }
        
        .service-item {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .service-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
        }
        
        .service-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .service-item h4 {
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        /* Call to Action */
        .cta-section {
               background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            position: relative;
            margin: 31px 0px;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="20" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="20" cy="80" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="80" r="2.5" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
        }
        
        .cta-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-section h2 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .cta-section p {
            font-size: clamp(1rem, 2vw, 1.2rem);
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn-cta {
            background: white;
            color: #059669;
            padding: 18px 40px;
            border: none;
            border-radius: 30px;
            font-size: clamp(1rem, 2vw, 1.1rem);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        
        .btn-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        
         </style>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>List Your Business on Quick Dials</h2>
                <p>Reach thousands of potential customers in your area. Increase your business visibility and grow your customer base with our platform. It's completely free to get started!</p>
                <a href="<?php echo e(url('business-owners')); ?>" class="btn-cta" target="_blank">Get Started Today</a>
            </div>
        </div>
    </section>



   <div class="">
      <div class="clearfix"></div>
      <h2 class="title">Our <span>Study Abroad</a></span> </h2>
      <br>
      <div class="category-box">
         <div class="course-program">
            <div class="row">
               <div class="">
                  <div class="course-list">
                     <?php   $x = 9; ?>
                    
                     <?php if(!empty($studyAbroad)): ?>
                     <?php $__currentLoopData = $studyAbroad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $study): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php if($study->child_slug !='overseas-journalism-education-consultants' && $study->child_slug !='overseas-engineering-education-consultant'): ?>
                      <div class="crs-items">
                     <div class="course-items">
                        <a href="<?php echo e(url('/child/'.$study->child_slug)); ?>" title="<?php if(!empty($study->child_category)){  echo $study->child_category; } ?>" >
                        <?php  if(!empty($study->pc_icon)){
                           $abicons= unserialize($study->pc_icon); ?> 
                        <img loading="lazy" src="<?php echo e(asset(''.$abicons['pc_icon']['src'])); ?>" width="100" alt="<?php echo e($abicons['pc_icon']['name']); ?>">	 <?php 
                           }else{ ?>                                        
                        <img loading="lazy" src="<?php echo e(asset('images/it-training.png')); ?>" alt="it-training">
                        <?php  } ?>
                        </a>
                        </div>
                        <span class="course-title"><a href="<?php echo e(url('/child/'.$study->child_slug)); ?>" title="<?php if(!empty($study->child_category)){  echo $study->child_category; } ?>" ><?php if(!empty($study->child_category)){  echo substr($study->child_category,0,16); } ?></a></span>
                     </div>
                     <?php endif; ?>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
   </div>

   	
 
   
   <div class="blog" >
      <div class="tab-content">
         <div class="review-list" >
            <div class="blogBlock">
               <div class="blog-title text-center">
                  <h5>Blog</h5>
                  <div class="title_icon"><img loading="lazy" src="/client/images/logo.png" alt="logo"></div>
               </div>
               <div class="col-md-12">
                  <?php if(!empty($blogdetails)): ?>
                  <?php $__currentLoopData = $blogdetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                     if($blog->image!=''){
                     $image = unserialize($blog->image);
                     $image = $image['large']['src'];
                     }	 
                     ?>
                  <div class="col-md-4">
                     <div class="reviews-left" >
                        <h4> <a href="<?php echo e(url('blog/'.$blog->slug)); ?>"><img loading="lazy" src="<?php echo (isset($image)?asset($image):"");  ?>" width="100%" height="150px" title="<?php echo e($blog->name); ?>" alt="<?php echo e($blog->name); ?>"></a></h4>
                        <h3> <a href="<?php echo e(url('blog/'.$blog->slug)); ?>"><?php echo e($blog->title); ?></a></h3>
                        <p style="text-align: justify;font-weight: 500;padding: 0px 15px;"><?php echo ucfirst(substr($blog->description,0,220));?>.<a href="<?php echo e(url('blog/'.$blog->slug)); ?>">View More...</a></p>
                     </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                  <nav><a href="<?php echo e(url('/blog')); ?>" class="viewall-txt">View All</a></nav>
               </div>
            </div>
         </div>
      </div>
   </div>
   
 
   
   
   <div class="banner_botton_open">
      <a href="javascript:void(0);" class="connectedclosebtn">&nbsp;</a>
      <div class="jbt"> Fill this form to Grab the best Deals on <span class="orng">QuickDials</span></div>
      <div class="popup">
         <form class="lead_form" onsubmit="return homeController.saveEnquiry(this)" method="POST">
            <aside>
               <label>Your name<span>*</span></label>
               <div class="popup-form">
                  <?php echo e(csrf_field()); ?>  
                  <input class="form-control home-popup-form" type="text" placeholder="Enter Full Name" name="name" value="">
                  <input type="hidden" name="from_page" value="home">
               </div>
               <label>Your Mobile<span>*</span></label>
               <div class="popup-form">
                  <input class="form-control home-popup-form" type="tel" placeholder="Enter Mobile" name="mobile" value="">
               </div>
               <label>Your Email ID<span>*</span></label>
               <div class="popup-form">
                  <input class="form-control home-popup-form" type="text" placeholder="Enter Email" name="email" value="">
               </div>
               <label>City<span>*</span></label>
               <div class="popup-form" id="select-city-proceed">
                  <select class="dropdown-arrow dropdown-arrow-inverse home-popup-form select2-single city" name="city_id">
                     <option value="">Select City</option>
                  </select>
               </div>
               <label>Interested in<span>*</span></label>
               <div class="popup-form">
                  <input type="text" placeholder="Type text" class="form-control city-form home-search" name="kw_text" autocomplete="off">
               </div>
               <div class="ajax-suggest ajax-suggest-lead-ajax" style="display: none;">
                  <ul></ul>
               </div>
               <p>
                  <label class="moblab">&nbsp;</label>
                  <input class="jbtn" type="submit" value="Submit" />
                  <input type="reset" class="reset_lead_form hide" value="reset" />
               </p>
            </aside>
         </form>
      </div>
      <section>
         <div class="jpb">
            <p> Your number will be shared only to these experts</p>
            <p>
               <span class="bul"></span> Get Free Expert Online Counseling 
            </p>
            <p>
               <span class="bul"></span> Get Free Demo Classes
            </p>
            <p>
               <span class="bul"></span> Get Fees & Discounts
            </p>
         </div>
      </section>
   </div>
</div>


<div class="connectedpopup">
   <a href="javascript:void(0);" class="connectedclosebtn">&nbsp;</a>
   <div class="jbt"> Fill this form and get best deals from "<span class="orng">QuickInd</span>"</div>
   <div class="popup">
      <form class="lead_form" onsubmit="return homeController.saveEnquiry(this)" >
         <aside>
            <label>Your name<span>*</span></label>
            <div class="popup-form">
               <input class="form-control city-form" type="text" placeholder="Enter Full Name" name="name" value="">
               <input type="hidden" name="lead_form" value="1">
            </div>
            <label>Your Mobile<span>*</span></label>
            <div class="popup-form">
               <input class="form-control city-form" type="tel" placeholder="Enter Mobile" name="mobile" value="">
            </div>
            <label>Your Email ID<span>*</span></label>
            <div class="popup-form">
               <input class="form-control city-form" type="text" placeholder="Enter Email" name="email" value="">
            </div>
            <label>City<span>*</span></label>
            <div class="popup-form" id="select-city-proceed">
               <select class="dropdown-arrow dropdown-arrow-inverse city-form select2-single city" name="city_id">
                  <option value="">Select City</option>
               </select>
            </div>
            <label>Interested in<span>*</span></label>
            <div class="popup-form">
               <input type="text" placeholder="Type text" class="form-control city-form home-search" name="kw_text" autocomplete="off">
            </div>
            <div class="ajax-suggest ajax-suggest-lead-ajax" style="display: none;">
               <ul></ul>
            </div>
            <p>
               <label class="moblab">&nbsp;</label>
               <input class="jbtn" type="submit" value="Submit" />
               <input type="reset" class="reset_lead_form hide" value="reset" />
            </p>
         </aside>
      </form>
   </div>
   <section >
      <div class="jpb">
         <p>
            <span class="bul"></span> Your requirement is sent to the selected relevant businesses
         </p>
         <p>
            <span class="bul"></span> Businesses compete with each other to get you the Best Deal 
         </p>
         <p>
            <span class="bul"></span> You choose whichever suits you best
         </p>
         <p>
            <span class="bul"></span> Contact Info sent to you by SMS/Email
         </p>
      </div>
   </section>
</div>
<style>
   .scrollheadsearch {
      /* display: none; */
   }
</style>
 


<?php $__env->stopSection(); ?>


<?php echo $__env->make('client.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/client/index.blade.php ENDPATH**/ ?>