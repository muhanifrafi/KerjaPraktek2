<!DOCTYPE html>
<html lang="zxx" dir="ltr">

@include('includes.head')

<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Cutive+Mono|Sue+Ellen+Francisco" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Sue+Ellen+Francisco" rel="stylesheet">

@include('includes.topbar')

<!-- ======= Header ======= -->
@include('includes.banner')
      <!-- BEGIN: Main Menu-->
@include('includes.navbar')
    <!-- END: Main Menu-->
@include('includes.breadcrumb')  
<!-- END HEADER -->

  <div class="container">
	<div class="row pad-row">
	  <div class="col-md-12  col-sm-12">
	  <div class="d-flex align-items-center justify-content-center vh-100x">
      @foreach($certificates as $i)
            <div class="text-center">
                <h1 class="display-1 fw-bold">{{$i -> n_crm_cert}}</h1>
                <!-- <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p> -->
				<img src="frontend\assets\images_certificate\{{$i -> e_crm_certimage}}" alt="image page not found">		
				
                <p class="lead">
                sertif detail <br> 
                  </p>
                <a href="/" class="btn btn-primary">Go Home</a><br>
      @endforeach	
            </div>
        </div>
	</div>			  
</div>




    <!-- BEGIN: Main Menu-->
    @include('includes.footer')
    <!-- END: Main Menu-->