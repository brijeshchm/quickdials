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
echo trim($msg); }  ?>
@endsection
@section('description')
<?php if(!empty($keyword->meta_description)){
$descrip = preg_replace('/{{city}}/i',ucfirst($city),$keyword->meta_description);
echo trim($descrip); }  ?> 
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
                    
                    <img loading="lazy" src="{{asset($cicons['child_banner']['src'])}}" alt="{{ $cicons['child_banner']['name'] }}">
                    
                    <?php  }else{ ?>
                    
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    <?php  } }else{ 
                        
                        if(!empty($keyword->category_banner)){
                    $cicons= unserialize($keyword->category_banner); 
                    if($cicons){
                    ?>
                    
                    <img loading="lazy" src="{{asset($cicons['category_banner']['src'])}}" alt="{{$cicons['category_banner']['name']}}">
                    
                    
                    <?php  } }else{  ?>
                    <img loading="lazy" src="<?php echo asset('./popular/weddingplanns.png'); ?>" alt="weddingplanns" style="width: 100%;
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    object-fit: cover;">
                    
                    <?php } } ?>  
                
                </div>
        </div>
    </div>
	<div class="container">
        <div class="form-section">
            <div class="removeLeftSpace">
                <div class="hdTitle">
 
        <?php
        $rating = '4.5';
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
                <div class="text-primary" itemprop="name"><h1>  Wedding Planning</h1></div>
                <div itemprop="aggregateRating"
                itemscope itemtype="https://schema.org/AggregateRating">
                <img loading="lazy" itemprop="image" src="{{ asset('client/images/'.$stars) }}"  alt="5 Star Rating: Very Good"/>
                <span itemprop="ratingValue">4.5</span>
                out of <span itemprop="bestRating"></span>
                based on <span itemprop="ratingCount">6</span> ratings
                </div>    
                </div>
             
        	<div class="keyword-cotegory-text">	 			
		
		 
			<a href="{{url('child/wedding-planning/')}}" title="wedding-planning">Wedding Planning</a> 			 
			 		 
			 </div>
			 </div>

			
            </div>
			<div class="removeRightSpace">
 				<div class="btn btn-primary common_popup_form top-btn">Expert Advice</div>
			</div>
		</div>
	 
    </div>
  <div class="categories-wrapper" style="border: none">
    <div class="categories-grid-header">
      <h1 class="categories-heading yellow ">
        Wedding Planning
      </h1>
    </div>

    <div class="categories-grid" style="padding-top: 15px;">
      <div class="category-card Banquet Halls">
        <a href="banquet-hall" class="keystore"><img loading="lazy" src="./popular/Banquet_Hall.jpg" alt="Banquet Halls" class="category-image" /></a>
        <div class="category-label"><a href="banquet-hall" class="keystore">Banquet Halls</a></div>
      </div>

      <div class="category-card Ghoda Baggi & Rath">
       <a href="ghoda-baggi" class="keystore"> <img loading="lazy" src="./popular/Ghoda_Baggi.jpg" alt="Ghoda Baggi & Rath" class="category-image" /></a>
        <div class="category-label"> <a href="ghoda-baggi" class="keystore"> Ghoda Baggi & Rath</a></div>
      </div>

      <div class="category-card Fire Works & Crackers">
        <a href="fire-works-and-crackers" class="keystore">  <img loading="lazy" src="./popular/Fire_Works_&_Crackers.jpg" alt="Fire Works & Crackers" class="category-image" /></a>
        <div class="category-label"> <a href="fire-works-and-crackers" class="keystore"> Fire Works & Crackers </a></div>
      </div>

      <div class="category-card Photo and Videography">
         <a href="photo-and-videography" class="keystore"> <img loading="lazy" src="./popular/Photo_and_Videography.jpg" class="category-image"></a>
        <div class="category-label"> <a href="photo-and-videography" class="keystore"> Photo and Videography </a></div>
      </div>

      <div class="category-card Court Marriage">
       <a href="court-marriage" class="keystore">   <img loading="lazy" src="./popular/Court_Marriage.jpg"   class="category-image"></a>
        <div class="category-label"> <a href="court-marriage" class="keystore"> Court Marriage </a></div>
      </div>

      <div class="category-card corporate">
        <a href="flower-decoration" class="keystore">  <img loading="lazy" src="./popular/Flower_Decoration.jpg"  class="category-image"></a>
        <div class="category-label"> <a href="flower-decoration" class="keystore"> Flower Decoration</a></div>
      </div>
    </div>
  </div>
  <div class="categories-wrapper" style="border: none ; ">
    <div class="categories-grid-header">
      <h1 class="categories-heading yellow">
        Wedding Prerequisits
      </h1>
    </div>

    <div class="categories-grid-circle" style="padding-top: 15px;">
      <div class="category-card-cicle">
        <a href="banquet-hall" class="keystore">  <img loading="lazy" src="./popular/Banquet-Halls.jpg" alt="Banquet Halls" class="category-image-circle" /></a>
        <div class="category-label-circle"> <a href="banquet-hall" class="keystore"> Banquet Halls</a></div>
      </div>

      <div class="category-card-cicle">
        <a href="banquet-hall" class="keystore">  <img loading="lazy" src="./popular/DJ_Sound_System.jpg" alt="DJ Sound Systems" class="category-image-circle" /></a>
        <div class="category-label-circle"> <a href="banquet-hall" class="keystore"> DJ Sound Systems</a></div>
      </div>

      <div class="category-card-cicle">
         <a href="wedding-card" class="keystore"> <img loading="lazy" src="./popular/wedding_cards.jpg" alt="Wedding Card" class="category-image-circle" /></a>
        <div class="category-label-circle"> <a href="wedding-card" class="keystore"> Wedding Card</a></div>
      </div>

      <div class="category-card-cicle">
      <a href="party-organisers" class="keystore" target="_blank">    <img loading="lazy" src="./popular/Wedding_Organisers.jpg"  class="category-image-circle"></a>
        <div class="category-label-circle"> <a href="party-organisers" class="keystore"> Party Organiser</a></div>
      </div>

      <div class="category-card-cicle">
       <a href="stage-decorators" class="keystore">   <img loading="lazy" src="./popular/stage-decoratorss.jpg" class="category-image-circle"></a>
        <div class="category-label-circle"> <a href="stage-decorators" class="keystore"> Stage Decoration</a></div>
      </div>
    </div>
  </div>
  <div class="categories-wrapper" style="border: none">
    <div class="categories-grid-header">
      <h1 class="categories-heading yellow">
        Wedding Planning for Bride
      </h1>
    </div>

    <div class="categories-grid" style="padding-top: 15px;">
      <div class="category-card Makeup Artists">
        <a href="makeup-artists" class="keystore">  <img loading="lazy" src="./popular/Makeup_artist.jpg" alt="Makeup Artists" class="category-image" /></a>
        <div class="category-label"> <a href="makeup-artists" class="keystore"> Makeup Artists</a></div>
      </div>

      <div class="category-card Mehendi Artists">
        <a href="mehendi-artists" class="keystore">  <img loading="lazy" src="./popular/Mehandi_artist.jpg" alt="Mehendi Artists" class="category-image" /></a>
        <div class="category-label"> <a href="mehendi-artists" class="keystore"> Mehendi Artists</a></div>
      </div>

      <div class="category-card Bridal Wear">
        <a href="bridal-wear" class="keystore">  <img loading="lazy" src="./popular/Bridal-Wear.jpg" alt="Bridal Wear" class="category-image" /></a>
        <div class="category-label"> <a href="bridal-wear" class="keystore"> Bridal Wear </a></div>
      </div>

      <div class="category-card Jewellery">
        <a href="jewellery-designing" class="keystore">  <img loading="lazy" src="./popular/Jewellery.jpg"  class="category-image"></a>
        <div class="category-label"> <a href="jewellery-designing" class="keystore"> Jewellery </a></div>
      </div>

      <div class="category-card Salons">
      <a href="salons" class="keystore"><img loading="lazy" src="./popular/salon.jpg" class="category-image"></a>
        <div class="category-label"> <a href="salons" class="keystore"> Salons</a></div>
      </div>

      <div class="category-card corporate">
         <a href="cosmetics" class="keystore"> <img loading="lazy" src="./popular/Cosmetic.jpg"  class="category-image"></a>
        <div class="category-label"> <a href="cosmetics" class="keystore"> Cosmetics </a></div>
      </div>
    </div>
  </div>
  <div class="main-content-second-wedding">
    <div class="text-second-content-wedding">
      <h1>Choose the Best Car to Rent</h1>
      <h3>to capture your special moment</h3>
      <button>Explore Now</button>
    </div>
    <div class="image-second-wedding">
      <img loading="lazy" src="./popular/main-content-second.png" alt="Car Rental" />
    </div>
  </div>
  <div class="categories-wrapper" style="border: none">
    <div class="categories-grid-header">
      <h1 class="categories-heading yellow">
        Wedding Planning for Groom
      </h1>
    </div>

    <div class="categories-grid " style="padding-top: 15px;">
      <div class="category-card Wedding Suit">
         <a href="wedding-suit-for-groom" class="keystore"> <img loading="lazy" src="./popular/wedding_suit_for_groom.jpg" alt="Wedding Suit" class="category-image" /></a>
        <div class="category-label"> <a href="wedding-suit-for-groom" class="keystore"> Wedding Suit </a></div>
      </div>

      <div class="category-card Makeup Artist">
         <a href="makeup-artist-for-groom" class="keystore"> <img loading="lazy" src="./popular/Makeup_artist_for_groom.jpg" alt="Makeup Artist" class="category-image" /></a>
        <div class="category-label"> <a href="makeup-artist-for-groom" class="keystore"> Makeup Artist</a></div>
      </div>

      <div class="category-card Ghoda Baggi and Rath">
         <a href="ghoda-baggi" class="keystore"> <img loading="lazy" src="./popular/Ghoda_Baggi.jpg" alt="Ghoda Baggi and Rath" class="category-image" /></a>
        <div class="category-label"> <a href="ghoda-baggi" class="keystore"> Ghoda Baggi and Rath</a></div>
      </div>

      <div class="category-card Hair Salons">
         <a href="hair-salons" class="keystore"> <img loading="lazy" src="./popular/Hair_salons_for_ groom.jpg" class="category-image"></a>
        <div class="category-label"> <a href="hair-salons" class="keystore"> Hair Salons</a></div>
      </div>

      <div class="category-card Wedding Band Baja">
        <a href="wedding-band" class="keystore">  <img loading="lazy" src="./popular/Wedding_Band.jpg" class="category-image"></a>
        <div class="category-label"> <a href="wedding-band" class="keystore"> Wedding Band Baja</a></div>
      </div>

      <div class="category-card Transport">
      <a href="car-decoration" class="keystore">    <img loading="lazy" src="./popular/Car_Decoration.jpg" class="category-image"></a>
        <div class="category-label"> <a href="car-decoration" class="keystore"> Car Decoration	</a></div>
      </div>
    </div>
  </div>
  <div class="categories-wrapper" style="border: none">
    <div class="categories-grid-header">
      <h1 class="categories-heading yellow">
        Pre-Wedding Planning 
      </h1>
    </div>
  </div>

  <div class="pre-wedding">

    <div class="image-pre-wedding">
      <img loading="lazy" src="./popular/main-content-second.png" alt="" />
    </div>
    <div class="content-pre-wedding">
      <div class="categories-wrapper-pre-wedding" style="border: none">
        <div class="categories-grid-pre-wedding">
          <div class="category-card-pre-wedding">
            <a href="wedding-choreographer" class="keystore">  <img loading="lazy" src="./popular/wedding-choreographer.jpg" alt="Wedding choreographer" class="category-image-pre-wedding" /></a>
            <div class="category-label-pre-wedding"> <a href="wedding-choreographer" class="keystore"> Wedding choreographer</a></div>
          </div>

          <div class="category-card-pre-wedding">
             <a href="wedding-astrologer" class="keystore"> <img loading="lazy" src="./popular/wedding-astrologer.jpg" alt="Wedding Astrologer" class="category-image-pre-wedding" /></a>
            <div class="category-label-pre-wedding"> <a href="wedding-astrologer" class="keystore"> Wedding Astrologer</a></div>
          </div>

          <div class="category-card-pre-wedding">
           <a href="wedding-dancer-and-singer" class="keystore">   <img loading="lazy" src="./popular/wedding-dancer-and-singer.jpg" alt="Wedding Dancer And Singer"
              class="category-image-pre-wedding" /></a>
            <div class="category-label-pre-wedding"> <a href="wedding-dancer-and-singer" class="keystore"> Wedding Dancer And Singer </a></div>
          </div>

          <div class="category-card-pre-wedding">
          <a href="pandits" class="keystore">    <img loading="lazy" src="./popular/pandit.jpg"  class="category-image-pre-wedding"></a>
            <div class="category-label-pre-wedding"><Var> <a href="pandits" class="keystore"> Pandits</a></Var></div>
          </div>

          <div class="category-card-pre-wedding">
           <a href="honeymoon-packages" class="keystore">   <img loading="lazy" src="./popular/honeymoon-packages.jpg" class="category-image-pre-wedding"></a>
            <div class="category-label-pre-wedding"> <a href="honeymoon-packages" class="keystore"> Honeymoon Packages </a></div>
          </div>

          <div class="category-card-pre-wedding">
           <a href="stage-show-organizers" class="keystore">   <img loading="lazy" src="./popular/Stage_Show_Organisers.jpg"  class="category-image-pre-wedding"></a>
            <div class="category-label-pre-wedding"> <a href="stage-show-organizers" class="keystore"> Stage Show Organisers</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
 // ✅ Global Animation on scroll (one-time run)
const observer = new IntersectionObserver(
  (entries, obs) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");

        // ✅ ek vaar show hone ke baad observer hata do
        obs.unobserve(entry.target);
      }
    });
  },
  {
    threshold: 0.15, // 15% visible hone te hi trigger
  }
);

// observe all .hidden elements globally
document.querySelectorAll(".hidden").forEach((el) => observer.observe(el));

  </script>
  
  <style>


 

 

.text-second-content-wedding h1 {
    font-size: 40px;
    margin-bottom: 15px;
    font-weight: 500;
}

.text-second-content-wedding h3 {
    font-size: 1.5rem;
    margin-bottom: 25px;
    font-weight: 400;
}

.text-second-content-wedding button {
    padding: 12px 25px;
    font-size: 1rem;
    background-color: #fff;
    color: #ff671f;
    border: none;
    border-radius: 48px;
    cursor: pointer;
    transition: 0.3s;
    width: 160px;
    height: 50px;
    text-align: center;
    margin-left: 0;
}

.image-second-wedding {
    flex: 1 1 500px;
    max-width: 686px;
    height: 455px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
    overflow: hidden;
}

 

.image-second-wedding::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    background: linear-gradient(270deg, rgba(255, 103, 31, 0) 0%, #FF671F 100%);
    z-index: 2;
    pointer-events: none;
}

.categories-grid-circle {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 25px;
    max-width: 1300px;
    margin: 0 auto;
}

.category-image-circle {
    width: 199px;
    height: 199px;
    object-fit: cover;
    border-radius: 50%;
}

.category-label-circle {
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    color: black;
    font-weight: 600;
    font-size: 1.1rem;
    text-align: center;
}
    .category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
}
  .categories-wrapper {
    border: 1px solid gray;
    padding: 40px 60px;
    border-radius: 30px;
    margin: 30px auto 0 auto;
    /* top, horizontal center, bottom */
    max-width: 1300px;
}
.categories-grid-header {
    width: 100%;
    gap: 8px;
    opacity: 1;
}
.categories-heading {
    font-size: 32px;
    font-weight: 500;
    color: rgba(0, 0, 0, 1);
    margin-bottom: 10px;
    text-align: left;
    display: inline-block;
    position: relative;
}

.categories-heading.yellow::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 80px;
    height: 4px;
    background: rgba(253, 238, 4, 1);
    border-radius: 2px;
}

.show {
    opacity: 1;
    transform: translateY(0) scale(1);
    filter: blur(0);
}

.hidden {
    /* transform: translateY(120px) scale(0.90);
    transition: all 2.2s cubic-bezier(0.22, 1, 0.36, 1); */

    display: block;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 25px;
    max-width: 1300px;
    margin: 0 auto;
}
.main-content-second-wedding {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    min-height: 455px;
    position: relative;
    background-color: #ff671f;
    overflow: hidden;
    flex-wrap: wrap;
    /* enable wrapping for small screens */
}

.text-second-content-wedding {
    flex: 1 1 500px;
    /* responsive flex */
    padding: 40px 20px;
    color: white;
    z-index: 2;
    text-align: left;
    min-width: 300px;
}

.text-second-content-wedding h1 {
    font-size: 40px;
    margin-bottom: 15px;
    font-weight: 500;
}

.text-second-content-wedding h3 {
    font-size: 1.5rem;
    margin-bottom: 25px;
    font-weight: 400;
}

.text-second-content-wedding button {
    padding: 12px 25px;
    font-size: 1rem;
    background-color: #fff;
    color: #ff671f;
    border: none;
    border-radius: 48px;
    cursor: pointer;
    transition: 0.3s;
    width: 160px;
    height: 50px;
    text-align: center;
    margin-left: 0;
}

.image-second-wedding {
    flex: 1 1 500px;
    max-width: 686px;
    height: 455px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
    overflow: hidden;
}
 
.image-second-wedding img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    position: relative;
    z-index: 1;
}

/* Gradient overlay on the left of image */
.image-second-wedding::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    background: linear-gradient(270deg, rgba(255, 103, 31, 0) 0%, #FF671F 100%);
    z-index: 2;
    pointer-events: none;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .main-content-second-wedding {
        min-height: auto;
        padding: 20px 0;
    }

    .text-second-content-wedding {
        text-align: left;
        margin: 0;
        padding: 10px;
    }

    .text-second-content-wedding h1 {
        font-size: 36px;
    }

    .text-second-content-wedding h3 {
        font-size: 1.2rem;
    }

    .text-second-content-wedding button {
        width: 140px;
        height: 45px;
        font-size: 0.9rem;
    }

    .image-second-wedding {
        width: 100%;
        height: auto;
        max-height: 400px;
        margin-top: 20px;
    }

    .image-second-wedding img {
        height: auto;
    }

    .image-second-wedding::after {
        width: 30px;
    }
}

@media screen and (max-width: 600px) {
    .text-second-content-wedding h1 {
        font-size: 24px;
    }

    .text-second-content-wedding h3 {
        font-size: 1rem;
    }

    .text-second-content-wedding button {
        width: fit-content;
        height: auto;
        font-size: 0.85rem;
    }

    .image-second-wedding {
        height: 250px;
    }

    .image-second-wedding img {
        height: 100%;
    }
}

.pre-wedding {
    display: flex;
    align-items: center;
    justify-content: center;
}
.category-card {
    position: relative;
    height: 142px;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease-in-out;
}
.category-card img {
    transition: transform 0.3s ease-in-out;
}
.category-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.category-label {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    color: white;
    font-weight: 500;
    font-size: 16px;
    text-align: center;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
}
.category-label a{
 color: white;
}
.category-card-pre-wedding {
    position: relative;
    height: 142px;
    width: 174px;
    border-radius: 15px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.categories-grid-pre-wedding {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
    max-width: 1300px;
    margin: 0 auto;
    /* centers it */
}

/* Tablet view (768px tak) */
@media (max-width: 992px) {
    .categories-grid-pre-wedding {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile view (768px neeche) */
@media (max-width: 576px) {
    .categories-grid-pre-wedding {
        gap: 10px;
    }

    .category-card-pre-wedding {
        position: relative;
        height: 132px;
        width: 165px;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .pre-wedding {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }
}


.categories-wrapper-pre-wedding {
    border: 1px solid gray;
    padding: 40px 60px;
    border-radius: 30px;
    margin: 30px auto 0 auto;
    /* top, horizontal center, bottom */
    max-width: 1200px;
}

.content-pre-wedding {
    background-color: #ffc978;
    height: 500px;
}

.image-pre-wedding {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.image-pre-wedding img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    margin-bottom: 40px;
}

/* Gradient overlay on the right side */
.image-pre-wedding::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    /* width of gradient */
    height: 100%;
    background: linear-gradient(90deg,
            rgba(255, 201, 120, 0) 0%,
            #ffc978 100%);
    pointer-events: none;
}

.category-image-pre-wedding {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-label-pre-wedding {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    color: white;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
}

.wrapper-avi-883 {
    display: flex;
    align-items: stretch;
    /* ✅ text = image height */
    gap: 40px;
    max-width: 1250px;
    margin: 40px auto;
}

.img-box-avi-883 {
    flex: 1;
    min-width: 300px;
}

.img-box-avi-883 img {
    width: 488px;
    height: 488px;
    object-fit: cover;
    /* ✅ maintain image fit */
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.text-box-avi-883 {
    flex: 1.2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* ✅ vertically center text */
}

.text-box-avi-883 h1:first-of-type {
    color: rgba(5, 122, 236, 1);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 10px;
    background: rgba(5, 122, 236, 1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.text-box-avi-883 p:first-of-type {
    color: #7f8c8d;
    font-size: 1.1rem;
    margin-bottom: 3px;
}

.text-box-avi-883 h1:last-of-type {
    color: rgba(5, 122, 236, 1);
    font-size: 1.6rem;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.4;
}

.text-box-avi-883 p:last-of-type {
    color: #555;
    font-size: 14px;
    line-height: 1.4;
    text-align: justify;
}

/* Responsive */
@media (max-width: 768px) {
    .wrapper-avi-883 {
        flex-direction: column;
        padding: 20px;
    }

    .img-box-avi-883 img {
        width: 320px;
        height: 300px;
        object-fit: cover;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .text-box-avi-883 {
        padding: 20px 10px;
    }

    .text-box-avi-883 h1:first-of-type {
        font-size: 2rem;
    }

    .text-box-avi-883 h1:last-of-type {
        font-size: 1.3rem;
    }
}

@media (max-width: 480px) {
    .text-box-avi-883 h1:first-of-type {
        font-size: 1.8rem;
    }

    .text-box-avi-883 h1:last-of-type {
        font-size: 1.2rem;
    }

    .text-box-avi-883 p {
        font-size: 0.9rem;
    }
}
  </style>
	  
  
	   
<div class="inquiry-popup"></div>
   
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a> 
    <div class="bestDealpopup "> 
		<?php 	

$value = Cookie::get('showPopup');	 
	//	if(Auth::guard('clients')->check() || ($value =="yes"))
			?>
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a> 

	   <h4>Need Expert Advice ?</h4>
        <div class="jbt"> Fill this form to Grab the best Deals on "<span class="orng"> {{Request::segment(1)}}</span>"</div>
        <div class="bdc">
           
            <form class="form-inline" action="" method="post" onsubmit="return homeController.saveEnquiry(this)">
                <aside>
		
                  
						
				 
						<div class="fieldblock-form">
							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="fresher">
							<span>Fresher</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="online">
							<span>Online</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="offline">
							<span>Offline</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="crashcourse">
							<span>Crash Course</span>
							</label>
						</div>
				 

						<div class="fieldblock-form">
							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="shared">
							<span>Shared</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="single">
							<span>Single</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="male">
							<span>Male</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="female">
							<span>Female</span>
							</label>
						</div>
				 

						<div class="fieldblock-form">
							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="ac_split">
							<span>AC Split</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="ac_window">
							<span>AC Window</span>
							</label>

							<label class="radio-item">
							<input type="checkbox" name="frmcheck[]" value="freez_single_door">
							<span>Freeze Single Door</span>
							</label>						 
						</div>
				 
						<div class="fieldblock-form">							 
						<input type="hidden" name="frmcheck[]" value="dummy">					 							 
						</div>
					 
					<p>
					<label for="yn">Your Name <span>*</span></label>


						<input type="hidden" name="lead_form" value="1" />
						<input type="hidden" name="kw_text" value="" />
						<input type="hidden" name="city_id" class="city" value="{{Request::segment(1)}}" />
                        <input class="jinp" type="text" placeholder="Enter Full Name" name="name">
						<input type="hidden" name="from_page" value="{{ request()->path() }}">
                    </p>
                    <p>
                        <label for="ymn">Your Mobile<span>*</span></label>
                        <input class="jinp" type="text" placeholder="Enter Mobile" name="mobile"  >
                    </p>
                    <p>
                        <label for="yei">Your Email ID <span></span></label>
                        <input class="jinp" type="text" placeholder="Enter Email" name="email"  >
                    </p>
                    <p>
                        <label class="moblab">&nbsp;</label>
						<!--<input class="jbtn" type="submit" value="Submit" />-->
						<input class="jbtn" type="submit" name="submit" value="Continue" />
						<input type="reset" class="reset_lead_form hide" value="reset" />
                        <!--button type="button" class="jbtn">Submit</button-->
                    </p>
                </aside>
            </form>
        </div>

        <section class="bdn">
            <aside class="jpb">
                <p>
                    <span class="bul"></span>Your number will be shared only to these experts
                </p>
                <p>
                    <span class="bul"></span> Get Free Expert Online Counseling</p>
                <p>
                    <span class="bul"></span> Get Free Demo Classes
                </p>
                <p>
                    <span class="bul"></span> Get Fees & Discounts
                </p>
            </aside>
        </section>
    </div>
    
    <div class="bestModalpopup "> 
 
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a> 

	         
        <div class="callback-wrapper">
        <div class="left-panel">
            <h2>Begin your journey with QuickDials</h2>
            <p><strong>Connect with trusted experts effortlessly</strong></p>            
            <div class="benefits">
                <h4>Trust & Benefits:</h4>
                <ul>
                    <li>✔ Shared only with selected experts</li>
                    <li>✔ Get Free Expert Online Counseling</li>
                    <li>✔ Industry-Certified Instructors</li>
                    <li>✔ Book Your Free Education Demo Class</li>
                    <li>✔ Get Fees & Discounts</li>
                </ul>
            </div>
        </div>
        <div class="right-panel">
            <h2>Need Expert Advice ?</h2>
            <p>Fill this form to Grab the best Deals on "<span class="orng">{{Request::segment(1)}}</span>"</p>
			<form class="popup-form" action="" method="post" onsubmit="return homeController.savePopEnquiry(this)">

			<input type="hidden" name="lead_form" value="1" />
			<input type="hidden" name="kw_text" value="" />
			<input type="hidden" name="city_id" class="city_id" value="{{Request::segment(1)}}" />			 
			<input type="hidden" name="from_page" value="{{ request()->path() }}">

            <div class="form-group">
                <input type="text" name="name" placeholder="Full Name*" />
            </div>
        
 			<div class="div-code">
				<div class="drop-number ">
					<div class="dropdown">
						<div class="drop-input-wrapper salary-trend-section form-group">
							<img loading="lazy" class="flag-icon selectedFlag" src="https://flagcdn.com/w40/un.png"
								alt="Flag">
							<input type="text" class="dropwn-input" placeholder="Search country">
							<span class="clear-icon removeFlag">&#10005;</span>
							<span class="dropdown-icon">&#9662;</span>
						</div>
						<input type="hidden" class="countryCode" name="code">
						<div class="dropdown-list"></div>
					</div>
					<div class="quick_arrow form-group">
						 <input type="tel" class="quick-remove" name="mobile" maxlength="15" value="{{old('mobile')}}" placeholder="Phone No*"
								onkeypress="return isNumberKey(event);"> 
					</div>

				</div>
			</div>
 
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Email id*" />
            </div>           
           
            <div class="form-group">
                <select name="zone" class="select2_zone" >
				<option value="">Select Zone*</option>
			
				@if(!empty($zones))
				@foreach($zones as $zone)
					<option value="{{ $zone->id}} }}">{{ $zone->zone }}</option>

				@endforeach
				@endif
				<option value=" "></option>
			</select>
            </div>           
           
            <div class="terms">
                <input type="checkbox" /> I agree to the Quickdials terms and conditions <a href="{{ url('terms-conditions') }}">Terms & Conditions</a>
            </div>
            <button class="form-btn btn">Continue &raquo;&raquo;</button>
		</form>
        </div>
    </div>
   
	 

         
    </div>
    
    


    <script>
        function sendData() {
            const name = document.getElementById('name').value;
         //   const email = document.getElementById('email').value;
            const mobile = document.getElementById('mobile').value;
            const kw_text = document.getElementById('kw_text').value;
            const city_id = document.getElementById('city_id').value;
            const from_page = document.getElementById('from_page').value;
 
            if ((name && mobile) && (mobile.length ===11)) {
                fetch('lead/auto-form-save', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ name: name, mobile: mobile,kw_text:kw_text,city_id:city_id,from_page:from_page })
                })
                .then(response => response.json())
                .then(data => {
                   // document.getElementById('message').textContent = `Saved: ${data.name} (${data.email})`;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('message').textContent = 'Error saving data';
                    document.getElementById('message').style.color = 'red';
                });
            }
        }
 
      //  document.getElementById('name').addEventListener('input', sendData);
       // document.getElementById('email').addEventListener('input', sendData);
        document.getElementById('mobile').addEventListener('input', sendData);
     //   document.getElementById('kw_text').addEventListener('input', sendData);
        // document.getElementById('zone_id').addEventListener('input', getZoneData);

    </script>
@endsection