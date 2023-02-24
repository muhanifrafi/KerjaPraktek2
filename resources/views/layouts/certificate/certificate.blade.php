<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@include('includes.head')
@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
@include('includes.breadcrumb')
<br>
<div class="container" data-aos="fade-up">
<div class="about-content aos-init aos-animate" data-aos="fade-left" data-aos-delay="100">
          <h2>Certificates</h2>
</div>
<br>
<div class="row">
    @foreach($certificates as $certificate)
      <br>
        <div class="col-md-4 d-flex align-items-stretch mb-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <a href="certificate_detail-{{$certificate->i_id_crmcert}}-{{strtolower(Str::replace(' ', '-', $certificate->n_crm_cert))}}">
              <div class="icon"><img src="frontend/assets/images_certificate/thumb/thumb_{{$certificate -> e_crm_certimage}}" alt=""></div>
              <h4>{{$certificate -> n_crm_cert}}</h4>
             <!-- <p><p>Design Organization Approval Certificate</p></p> -->
            </a>
          </div>
        </div> 
<br>
@endforeach	
</div>		  
</div>
@include('pages.contact') 
@include('includes.footer')