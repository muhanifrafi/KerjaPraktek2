<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
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
                <h1 class="display-1 fw-bold">Under Construction</h1>
                <!-- <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p> -->
				<img src="{{ url('frontend\assets\img\page.png')}}" alt="image page not found">		
				
                <p class="lead">
                    This page is currently unavailable. <br> You can come back later. Thank you for coming
                  </p>
                <a href="/" class="btn btn-primary">Go Home</a><br>	
            </div>
        </div>
	</div>			  
</div>			    
  </section>
  </main>
@include('pages.contact')
@include('includes.footer')