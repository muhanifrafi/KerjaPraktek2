<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@include('includes.head')
@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
@include('includes.breadcrumb')
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="Author" content="IT Center PTDI">
  <meta name="Owner" content="PT Dirgantara Indonesia">
  <meta name="keywords" content="customer relation management, customer, support, dirgantara, relation, indonesia, CS, PT. DI">
  <meta name="description" content="Customer Support Dirgantara Indonesia">
  <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
  <title>CUSTOMER RELATION MANAGEMENT DIRGANTARA INDONESIA</title>

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet"> -->






  <script>
    $(function() {
      $("#jmlorder").load("module/stock/countrfq.php");
    });
  </script>


<body data-aos-easing="ease" data-aos-duration="1000" data-aos-delay="0">
    

<script>
    /*global $ */
    $(document).ready(function() {
        "use strict";
        $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI
        $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
        //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu (thanks Luka Kladaric)
        $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">Navigation</a>");
        //Adds menu-mobile class (for mobile toggle menu) before the normal menu
        //Mobile menu is hidden if width is more then 959px, but normal menu is displayed
        //Normal menu is hidden if width is below 959px, and jquery adds mobile menu
        //Done this way so it can be used with wordpress without any trouble
        // $('.sub-more').addClass('d-flex').addClass('justify-content-center');
        $(".menu > ul > li").hover(function(e) {
            if ($(window).width() > 943) {
                $(this).children("ul").stop(true, false).fadeToggle(150);
                $(this).children("ul .sub-more").stop(true, false).fadeToggle(150).toggleClass("d-flex justify-content-center");
                // e.preventDefault();
            }
        });
        //If width is more than 943px dropdowns are displayed on hover
        $(".menu > ul > li").click(function() {
            if ($(window).width() <= 943) {
                $(this).children("ul").fadeToggle(150);
            }
        });
        if ($(window).width() <= 943) {
            $(".menu").removeClass('d-flex').removeClass('align-items-center');
        } else {
            $(".menu").addClass('d-flex').addClass('align-items-center');
        }
        //If width is less or equal to 943px dropdowns are displayed on click (thanks Aman Jain from stackoverflow)
        $(".menu-mobile").click(function(e) {
            $(".menu > ul").toggleClass('show-on-mobile');
            e.preventDefault();
        });
        //when clicked on mobile-menu, normal menu is shown as a list, classic rwd menu story (thanks mwl from stackoverflow)
    });
</script>
  <!-- End header -->
  
  <main id="main">
    <section id="body">
    <!-- HEADING-->  
    <section>
             <div class="containerx">
             <div class="row pad-row">
             <div class="col-md-12  col-sm-12">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="aos-init aos-animate" data-aos="fade-up">

        <div class="row aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="toggleClass">All</li>
              <li data-filter=".filter-all-aircraft" id="aircraftToggle" class="filter-active"><i id="arrow-aircraft-toggle" class="fa fa-arrow-right active" aria-hidden="true"></i>Aircraft</li>
              @foreach($categnac as $ctn)
              <li data-filter=".filter-{{$ctn->c_gallery_categ}}{{$ctn->i_gallery_categ}}" class="toggleClass">{{$ctn->n_gallery_categ}}</li>
              @endforeach
            </ul>
            <ul id="portfolio-aircraft-flters" style="">
              @foreach($categac as $cta)
              @php $category = trim($cta->c_gallery_categ); @endphp
              <li data-filter=".filter-{{$category}}{{$cta->i_gallery_categ}}" class="">{{$cta->n_gallery_categ}}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 963.065px;">
            @foreach($galleries as $gallery)
            @php $galecat = trim($gallery->c_gallery_categ);@endphp
        <div class="col-lg-3 col-md-4  col-sm-6 portfolio-item filter-all-aircraft filter-{{$galecat}}{{$gallery->i_gallery_categ}}" data-wow-delay="0.1s" style="position: absolute; left: 0px; top: 0px;">
            <div class="portfolio-wrap gallery-img-size">
              <img src="frontend\assets\img\images_gallery\thumb\thumb_{{$gallery -> n_file}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <p>{{$gallery -> e_gallery_desc}}</p>
                <div>
                  <a href="frontend\assets\img\images_gallery\{{$gallery->n_file}}" title="" data-gall="portfolioGallery" class="link-preview venobox vbox-item"><i class="ion ion-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->
       

     
 <script>
 
    $("#portfolio-aircraft-flters").hide();
    $("#aircraftToggle").click(function () {
      $("#portfolio-aircraft-flters").show(1000);
      $("#arrow-aircraft-toggle").addClass('active', 1000);
    });
    $(".toggleClass").click(function () {
      $("#portfolio-aircraft-flters").hide(1000);
      $("#arrow-aircraft-toggle").removeClass('active', 1000);
    });
    // $(function () {
    //   $('#world-map').vectorMap({
    //     map: 'world_mill'
    //   });
    // });
  </script>      
  </div></div></div></section>
  </section></main> 
</body>
@include('pages.contact')
@include('includes.footer')