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
            @foreach($ietms as $ietm) 
                <h2>{{ $ietm->n_title }}</h2>
            <br><br/>
                {!! $ietm->n_detail !!}
            @endforeach
                </div>
			  </div>
            </div>
         </section>

  
  </section>
  </main>	
@include('pages.contact')
@include('includes.footer')