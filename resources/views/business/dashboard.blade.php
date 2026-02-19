@extends('business.layouts.app')
@section('title')
Quick Dials Dashboard
@endsection 
@section('keyword')
Find Best It Training Centre near You, Find Best It Training Institute near You, Find Top 10 IT Training Institute near You, Find Best Entrance Exam Preparation Centre Near you, Top 10 Entrance Exam Centre Near you, Find Best Distance Education Centre Near You, Find Top 10 Distance Education Centre Near You, Find Best School And Colleges Near You, Find Top 10 school And College Near You, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near you, Find Top 10 overseas education consultants Near you

@endsection
@section('description')
Find Only Certified Training Institutes, Coaching Centers near you on Estivaledge and Get Free counseling, Free Demo Classes, and Get Placement Assistence.
@endsection
@section('content')	
 
  <main id="main" class="main">
<style>
.lead-dashboard{
    display:flex;
}
.align-items-center{
    margin-left:10px;
}

.lead.enquiry-item{
background-color: #ffffff;
    padding: 15px;
    border-radius: 5px;
}

 
</style>
   

     <div class="dashboard">
          
        <div class="cards">
            <div class="card">
                <h3>Archived Enquiry</h3>
                <p><a href="{{url('business/enquiry')}}"><?php echo count($leads); ?> Lead</a></p>
            </div>
            <div class="card">
                <h3>Remaining Coins</h3>
                <p class="coins">
                 <i class="bi bi-currency-rupee"></i><a href="{{ url('business/package') }}" ><?php  if($clientDetails->coins_amt) { echo $clientDetails->coins_amt; } ?> </a>
                </p>
            </div>
        </div>
      
          @if (!empty($leads)) 
            @foreach($leads as $lead)
  <?php  
 
    // $businessName = $clientDetails->business_name ?? 'our company';
    // $keyword = $val->kw_text ?? 'your enquiry';
    // $addressText = $clientDetails->address ?? '';
    // $mapText = !empty($clientDetails->business_map)
    //     ? "\nDirections: " . $clientDetails->business_map
    //     : '';
    
    // $profile_url = url('business-details/' . ($clientDetails->business_slug ?? ''));
    //     $address_data = "Greetings from {$businessName},\n"
    //             . "We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
    //             . "For more information"
    //             . (!empty($addressText) ? ", you can visit us at {$addressText}" : "")
    //             . "{$mapText}";

    //         $for_service = "Greetings from {$businessName},\n"
    //             . "We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
    //             . "For more information about our services"
    //             . (!empty($addressText) ? ", you can visit us at {$addressText}" : "")
    //             . ", Or {$profile_url}";

    //         $for_review = "Greetings from {$businessName}, Rated {$avgRating} Rating out of {$ratingCount} Votes.\n"
    //             . "We’re following up on your enquiry made on Quickdials for {$keyword}.\n"
    //             . "For more information"
    //             . (!empty($addressText) ? ", visit us at {$addressText}" : "")
    //             . ". Or {$profile_url}";

    //         $share_lead = 
    //             'Name: ' . trim($lead->name ?? '') . ', ' .
    //             'Mobile: ' . trim($lead->mobile ?? '') . ', ' .
    //             'Email: ' . trim($lead->email ?? '') . ', ' .
    //             'Service: ' . trim($lead->kw_text ?? '') . ', ' .
    //             'Location: ' . trim(($lead->city_name ?? '') . 
    //                 (!empty($lead->zone) ? ', ' . $lead->zone : ''));

    //                 $frmcheckText = '';

    //         if (!empty($lead->frmcheck)) {
    //             $frmcheckArray = is_array($lead->frmcheck)
    //                 ? $lead->frmcheck
    //                 : json_decode($lead->frmcheck, true);
    //             if (is_array($frmcheckArray)) {
    //                 $frmcheckText = implode(', ', $frmcheckArray);
    //             }
    //         }

    //         $parts = array_filter([
    //             $lead->kw_text ? "Interested in {$lead->kw_text}" : '',
    //             $frmcheckText ? "Mode of {$frmcheckText}" : '',
    //             $lead->zone ? "Location {$lead->zone}" : '',
    //             $lead->plan ? "Plan {$lead->plan}" : '',
    //             $lead->age ? "Age {$lead->age}" : '',
    //             $lead->experience ? "Experience {$lead->experience}" : '',
    //         ]);

    //         $remark = implode(" • ", $parts);

    //         if (!empty($lead->remark)) {
    //             $remark .= " " . trim($lead->remark);
    //         }

  ?>

  <style>
.share-wrapper {
    position: relative;
    display: inline-block;
}

/* Hide checkbox */
.share-toggle {
    display: none;
}

/* Share Icon Button */
.share-icon {
    width: 40px;
    height: 40px;
    background: #2563eb;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
    transition: 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

.share-icon:hover {
    background: #1e40af;
    transform: scale(1.05);
}

/* Share Menu (Hidden by default) */
.share-menu {
    position: absolute;
    top: 50px; /* 🔥 Downward open */
    right: 0;
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    padding: 8px 0;
    min-width: 150px;
    opacity: 0;
    transform: translateY(-10px);
    pointer-events: none;
    transition: all 0.3s ease;
    z-index: 100;
}

/* Show when triggered */
.share-toggle:checked + .share-icon + .share-menu {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

/* Menu Links */
.share-menu a {
    display: block;
    padding: 10px 15px;
    font-size: 14px;
    color: #333;
    text-decoration: none;
    transition: 0.2s ease;
}

.share-menu a:hover {
    background: #f3f4f6;
    color: #2563eb;
}


</style>
            
        <div class="lead-details ">
             
 

            <div class="lead enquiry-item">

 

                <div class="img-cls">
                  <i class="fa fa-uaser"></i> <?php  echo ucfirst(substr($lead->name,0,1)); ?>
                </div>
                <div class="info enquiry-details">
                    <h4><i class="bi bi-person"></i> {{ucfirst($lead->name)}} 
                
                 <i class="bi bi-coin"></i> 
                <?php    $coins= "";
                if(!empty($lead->scrapLead)) { 
                $coins =    "<span style='color:green'>" . $lead->coins . "</span>"; 
                }else if($lead->coins){ 
                $coins =  "<span style='color:red;'> -" . $lead->coins . " </span>"; 
                }  
                echo $coins;
                ?>
              
              <div class="share-wrapper">

    <input type="checkbox" id="shareToggle{{ $lead->assignId }}" class="share-toggle">

    <label for="shareToggle{{ $lead->assignId }}" class="share-icon">
        &#x1F517;  {{-- 🔗 icon --}}
    </label>

    <div class="share-menu">

        <a href="https://wa.me/?text={{ urlencode($lead->share_address) }}" target="_blank">
            📍 Address
        </a>

        <a href="https://wa.me/?text={{ urlencode($lead->share_review) }}" target="_blank">
            ⭐ Review
        </a>

        <a href="https://wa.me/?text={{ urlencode($lead->share_lead) }}" target="_blank">
            👤Share Lead
        </a>

    </div>

</div>

                </h4>

               
 
                    <p><span class="icon" >
                      <i class="bi bi-clock"></i>
                    <?php echo get_time(strtotime($lead->created)); ?> ago</span></p>
                    <p><i class="bi bi-book"></i>  {{$lead->kw_text}}</p>
                     <div class="details-section">
                    <div class="title">Enquired for <strong>{{$lead->kw_text}}</strong> Send price and other details.</div>
                    <div class="source">@if($lead->email) <i class="bi bi-envelope"></i>{{$lead->email}}@endif</div>
                     <p>@if($lead->remarks) {{$lead->remarks}} @endif</p>
                </div>
                <div class="show-details" onclick="toggleDetails(this)">Show details</div>
                </div>
                
                <div class="map">
                    <h4>@if($lead->city_name)<i class="bi bi-pin-map-fill"></i> {{$lead->city_name}}@endif</h4>
                    <p>@if($lead->zone)<i class="bi bi-pin-map-fill"></i> {{$lead->zone}} @endif</p>
                   
                </div>
                <div class="contact">
                    <i class="bi bi-telephone-fill"></i><a href="tel:91{{$lead->mobile}}"> {{$lead->mobile}}</a>   <a href="https://wa.me/91{{$lead->mobile}}" target="_blank" aria-label="Whatsup"><i class="bi bi-whatsapp" style="color:#14D73F"></i>{{$lead->mobile}}</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif       
    </div>
<script>
      function toggleDetails(element) {
            const detailsSection = element.previousElementSibling;
            detailsSection.classList.toggle('visible');
            element.textContent = detailsSection.classList.contains('visible') ? 'Hide details' : 'Show details';
        }

        function hideCard(element) {
            const card = element.closest('.enquiry-item');
            card.classList.add('hidden');
        }
</script>
    
   </main> 
     @endsection
 