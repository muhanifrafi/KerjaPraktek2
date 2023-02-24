<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@php 
    $nama = "404|NOT FOUND";
    $background = "header1.jpg";
    $titles = array("404|NOT FOUND");
@endphp
@include('includes.head')
@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
@include('includes.breadcrumb')
<section >
            <div class="container">
              <div class="row pad-row">
                <div class="col-md-12  col-sm-12">

				
			<!-- PUT CONTENT HERE-->	
	  <div class="d-flex align-items-center justify-content-center vh-100x">
            <div class="text-center">
                 <!-- <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p> -->
				<img src="frontend/assets/img/404.png" alt="image page not found">
				<h2 class="fw-bold">PAGE NOT FOUND</h2>						
                <p class="lead">
				We could not find the page you were looking for. Meanwhile, you may return to <a href="/">home</a>
                  </p>
            </div>
        </div>
	</div>			  
</div>			    
  </section>
  </main>
@include('pages.contact')
@include('includes.footer')