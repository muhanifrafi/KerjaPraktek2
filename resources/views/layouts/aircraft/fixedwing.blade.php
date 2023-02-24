<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@include('includes.head')

@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
  <!-- End header -->
 
  <!-- End customer -->
  
  <main id="main">
    <section id="body">
    <!-- HEADING-->  
@include('includes.breadcrumb')
    <!-- ======= Breadcrumbs ======= -->	
<link href="frontend/assets/css/swiper.css" rel="stylesheet">
<link href="frontend/assets/css/aircraft-carousel.css" rel="stylesheet">

<div class="wrapper">
  <div class="mySwiper d-flex justify-content-center">
    <div class="main-wrapper swiper-wrapper">
	@foreach($fixed as $fw)
	<div class="main swiper-slide" id="{{$fw -> i_ptdi_ac}}">
            <div class="header-tittle-box">
              <div class="main-wrapper container d-flex justify-content-center">
              @php $titlepertama = implode(" ", array_slice(explode(" ", $fw->n_ptdi_ac), 0, "1"));@endphp 
                <h1 class="main-title text-uppercase">{{$titlepertama}}</h1>
              </div>
            </div>
            <div class="right-side__img aircraft-image">
              <div class="container d-flex justify-content-center">
                  <img class="bottle-img" src="frontend/assets/img/airplane_png/n219.png"/>
              </div>
            </div>
            <div class="main-content">
              <div class="main-content__title text-uppercase">{{$fw -> n_ptdi_ac}}</div>
              <div class="main-content__subtitle">{!! $fw -> e_ptdi_acreviewen !!}</div>
              <div class="more-menu">
                <a class="btn btn-warning btn-sm rounded-pill" href="/detail-{{$fw->i_ptdi_ac}}-{{strtolower(Str::replace(array(' ','/'), '-', $fw->n_ptdi_ac))}}">Detail</a>
              </div>
            </div>
  </div>
    
	@endforeach
  </div>
	
    <!-- <div class="col-md-6 element-animate">
            <a href="" class="link-thumbnail ">
              <div class="text-block">
                <h3>N219</h3>
              </div>
              <img src="" alt="Image" class="img-fluid">
            </a>
          </div>
    </div> -->
    <div class="button-wrapper d-flex justify-content-center">
      <div class="swiper-button swiper-prev-button">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </div>
      <div class="swiper-button swiper-next-button">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
        </svg>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</div>

<!-- Aircraft Carousel Model -->
<script src="frontend/assets/js/swiper.js"></script>
<script src="frontend/assets/js/aircraft-carousel.js"></script>
</section>
</main>
@include('pages.contact') 
@include('includes.footer')