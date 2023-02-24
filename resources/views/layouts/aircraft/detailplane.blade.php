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
@if($wings->count() > 0)
<link href="frontend/assets/css/swiper.css" rel="stylesheet">
<link href="frontend/assets/css/aircraft-carousel.css" rel="stylesheet">
@foreach($planes as $plane)
<div class="container my-5">
    <h1 class="mb-3">{{$plane -> n_ptdi_ac}}</h1>
    {!! $plane -> e_ptdi_acen !!}
</div>
@endforeach
<div class="wrapper">
    <div class="mySwiper d-flex justify-content-center">
      <div class="main-wrapper swiper-wrapper">
       @foreach($wings as $w)
       @php $titlepertama = implode(" ", array_slice(explode(" ", $w->n_ptdi_ac), 0, "1"));@endphp
       @if($wings->count() > 1 && $titlepertama == "H215" or  $titlepertama == "H225")
       @php $titlepertama = $titlepertama; @endphp
       @elseif ($wings->count() > 1)
       @php 
        $titlepertama = substr($w->n_ptdi_ac, strpos($w->n_ptdi_ac, " ") + 1); @endphp
       @else
       @php $titlepertama = $w->n_ptdi_ac; @endphp
       @endif
       <div class="main swiper-slide" id="{{$w -> i_ptdi_ac}}">
            <div class="header-tittle-box">
              <div class="main-wrapper container d-flex justify-content-center">
                <h1 class="main-title-rotary">{{$titlepertama}}</h1>
              </div>
            </div>
            <div class="right-side__img aircraft-image">
              <div class="container d-flex justify-content-center">
                <img class="bottle-img" src="frontend\assets\img\airplane_png\NC212i.png"/>
              </div>
            </div>
            <div class="main-content">
              @php $titleforheader = str_replace("", ";", $w -> n_ptdi_ac); @endphp
              <div class="main-content__title">{{$titleforheader}}</div>
              <div class="main-content__subtitle">{!! $w -> e_ptdi_acreviewen !!}</div>
              <div class="more-menu">
                <a class="btn btn-warning btn-sm rounded-pill" href="/detail-{{$w->i_ptdi_ac}}-{{strtolower(Str::replace(' ', '-', $w->n_ptdi_ac))}}" class="link-thumbnail ">Detail</a>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-4 element-animate">
            <a href="" class="link-thumbnail ">
              <div class="text-block">
                <h3></h3>
              </div>
              <img src=" alt="Image" class="img-fluid">
            </a>
          </div> -->
          @endforeach
        </div>
        @if($wings->count() > 1 )
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
        @endif
        </div>
  </div>
<script src="frontend/assets/js/swiper.js"></script>
<script src="frontend/assets/js/aircraft-carousel.js"></script>
@else
@foreach($planes as $plane)
<div class="container py-5">
    <h1 class="font-weight-bold mb-5">{{$plane -> n_ptdi_ac}}</h1>
    <h3 class="font-weight-bold mb-3">DESCRIPTION</h3>
    <div class="mb-5">
            {!! $plane -> e_ptdi_acen !!}
    </div>
    <h3 class="font-weight-bold mb-3">FEATURES</h3>
    <div class="mb-5">
            {!! $plane -> e_ptdi_acfeat !!}
    </div>
    <h3 class="font-weight-bold mb-3">CONFIGURATION</h3>
    <div class="mb-5">
                {!! $plane-> e_ptdi_acconfig !!}
    </div>
    <h3 class="font-weight-bold mb-3">PERFORMANCE</h3>
    <div class="mb-5">
                {!! $plane -> e_ptdi_acprfrm !!}
    </div>
    <h3 class="font-weight-bold mb-3">POWER PLANT</h3>
    <div class="mb-5">
                {!! $plane -> e_ptdi_acvvip !!}
    </div>
</div>
@endforeach
@endif
@include('pages.contact') 
@include('includes.footer')


