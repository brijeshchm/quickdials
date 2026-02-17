@extends('business.layouts.app')
@section('title')
Quick Dials | Students
@endsection 
@section('keyword')
Find Best It Training Centre near You, Find Best It Training Institute near You, Find Top 10 IT Training Institute near You, Find Best Entrance Exam Preparation Centre Near you, Top 10 Entrance Exam Centre Near you, Find Best Distance Education Centre Near You, Find Top 10 Distance Education Centre Near You, Find Best School And Colleges Near You, Find Top 10 school And College Near You, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near you, Find Top 10 overseas education consultants Near you

@endsection
@section('description')
Find Only Certified Training Institutes, Coaching Centers near you on Estivaledge and Get Free counseling, Free Demo Classes, and Get Placement Assistence.
@endsection
@section('content')
 
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>New Enquiries</h1>
    </div> 
     <div class="container">
        <div class="header-enquiry">
            <div class="enquiry-tabs">
        <div class="tab">
            <span>New Lead</span>
            <span class="count"><?php if(!empty($leads_list)){ echo count($leads_list); } ?></span>
        </div>
        
    </div> 
            
            <div class="status">
                <span><a href="{{ url('business/myLead')}}">Total Lead</a> | </span>
                <span><a href="{{ url('business/package')}}">Platinum</a></span>
                <span>0h</span>
            </div>
        </div>

        <div class="enquiries-section">
 
        <style>
            .assignedLeadsClick{
                   cursor: pointer;
            }
        </style>

        <div class="tab-content active" id="all">

    @forelse($leads_list ?? [] as $lead)

    <div class="enquiry-item assignedLeadsClick"
         data-assigned_leads="{{ $lead['assignId'] ?? '' }}"
         data-client_id="{{ $lead['client_id'] ?? '' }}"
         style="{{ empty($lead['readLead']) ? 'background:#f2f2f2;' : '' }}">

        {{-- Avatar --}}
        <div class="avatar">
            {{ strtoupper(substr($lead['name'] ?? 'N', 0, 1)) }}
        </div>

        <div class="enquiry-details">

            <h4>
                <i class="bi bi-person"></i>

                <span class="tag favorite_lead">NEW</span>

                <i class="fa-regular bi-star favorite-icon 
                   {{ !empty($lead['favorite']) ? 'favorited' : '' }}"
                   data-favoritleads="{{ $lead['assignId'] ?? '' }}">
                </i>

                {{-- Coins --}}
                @if(!empty($lead['coins']))
                    <i class="bi bi-coin"></i>
                    @if($lead['coins']['color'] === 'green')
                        <span style="color:green">
                            {{ $lead['coins']['coin'] }}
                        </span>
                    @else
                        <span style="color:red">
                            -{{ $lead['coins']['coin'] }}
                        </span>
                    @endif
                @endif
            </h4>

            <p><i class="bi bi-book"></i> {{ $lead['kw_text'] ?? '' }}</p>

            <p>Online Class</p>

            @if(!empty($lead['cityName']))
                <p>
                    <i class="bi bi-pin-map-fill"></i>
                    {{ $lead['cityName'] }}
                </p>
            @endif

            <div class="details-section">
                <div class="title">
                    Enquired for <strong>{{ $lead['kw_text'] ?? '' }}</strong>
                    Send price and other details.
                </div>

                @if(!empty($lead['email']))
                    <div class="source">
                        <i class="bi bi-envelope"></i>
                        {{ $lead['email'] }}
                    </div>
                @endif

                @if(!empty($lead['remark']))
                    <p>{{ $lead['remark'] }}</p>
                @endif
            </div>

            <div class="show-details" onclick="toggleDetails(this)">
                Show details
            </div>

        </div>

        {{-- Contact Section --}}
        @if(!empty($lead['mobile']))
        <div class="cont-no">
            <i class="bi bi-telephone-fill"></i>
            <a href="tel:91{{ $lead['mobile'] }}">
                {{ $lead['mobile'] }}
            </a>

            <a href="https://wa.me/91{{ $lead['mobile'] }}"
               target="_blank"
               aria-label="Whatsapp">
                <i class="bi bi-whatsapp" style="color:#14D73F"></i>
                {{ $lead['mobile'] }}
            </a>
        </div>
        @endif

        <div class="enquiry-time">
            <i class="bi bi-clock"></i>
            {{ $lead['createdDate'] ?? '' }}
        </div>

    </div>

    @empty
        <p class="text-center">No enquiries found.</p>
    @endforelse

</div>

<!--  
            <div class="tab-content active" id="all">
                @if(!empty($leads))
                @foreach($leads as $lead)
 
                <div class="enquiry-item assignedLeadsClick"  data-assigned_leads= "{{ $lead['assignId'] }}" data-client_id= "{{ $lead['client_id'] }}" style="<?php  if(!$lead['readLead']){ echo "background:#ddd"; } ?>">
                    <div class="avatar"><?php  echo ucfirst(substr($lead['name'],0,1)); ?></div>
                    
                    <div class="enquiry-details">
                        <h4><i class="bi bi-person"></i>   <span class="tag favorite_lead">NEW</span> <i class="fa-regular bi-star favorite-icon <?php  if($lead['favorite_lead']){ echo "favorited"; } ?>" data-favoritleads= "{{ $lead['assignId'] }}"></i>


                        
                     <i class="bi bi-coin"></i> 
                        <?php    $coins= "";
                        if(!empty($lead['scrapLead'])) { 
                        $coins =    "<span style='color:green'>" . $lead['coins'] . "</span>"; 
                        }else if($lead['coins']){ 
                        $coins =  "<span style='color:red;'> -" . $lead['coins'] . " </span>"; 
                        }  
                        echo $coins;
                        ?>
                    
                    </h4>
                        <p><i class="bi bi-book"></i> {{ $lead['kw_text']??''}}</p>
                        <p>Online Class</p>
                        <p>@if($lead['cityName']) <i class="bi bi-pin-map-fill"></i>{{$lead['cityName']}}@endif @if($lead['zone'])<i class="bi bi-pin-map-fill"></i> {{$lead['zone']}} @endif</p>
                       
                        <div class="details-section">
                    <div class="title">Enquired for <strong>{{$lead['kw_text']}}</strong> Send price and other details.</div>
                    <div class="source">@if($lead['email']) <i class="bi bi-envelope"></i>{{$lead['email']}}@endif</div>
                     <p> {{ $lead['remark'] }}</p>
                </div>
                <div class="show-details" onclick="toggleDetails(this)">Show details</div>
                    </div>
                     
                  <div class="cont-no">
                    <i class="bi bi-telephone-fill"></i><a href="tel:91{{$lead['mobile']}}"> {{$lead['mobile']}}</a>   <a href="https://wa.me/91{{$lead['mobile']}}" target="_blank" aria-label="Whatsup"><i class="bi bi-whatsapp" style="color:#14D73F"></i>{{$lead['mobile']}}</a>
                  </div>
                 
                    <div class="enquiry-time"><i class="bi bi-clock"></i> <?php  echo $lead['createdDate']; ?></div>
                </div>
                @endforeach
                @endif              
                
            </div> -->

           
        </div>
    </div>

     <script>
        // Tab switching functionality
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

                tab.classList.add('active');
                const tabContent = document.getElementById(tab.getAttribute('data-tab'));
                tabContent.classList.add('active');
            });
        });

        // Favorite icon toggle functionality
        document.querySelectorAll('.favorite-icon').forEach(icon => {
            icon.addEventListener('click', () => {
 
                // icon.classList.toggle('fa-solid');
                // icon.classList.toggle('fa-regular');
                icon.classList.toggle('favorited');
            });
        });

     
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
    

<style>
.x_content{
    padding: 0 5px 6px;
    float: left;
    clear: both;
    margin-top: 5px;
}
.form-label-left .row {
    margin-left: 5px;
}
.form-label-left .col-form-label {
    font-weight: 700;
}
.form-label-left .col-md-4{
    
    
} 
 
</style>
  </main><!-- End #main -->
  
 

<script>
 //$('.leaddf,.leaddt').datepicker({dateFormat:"yy-mm-dd"});
</script>
@endsection
