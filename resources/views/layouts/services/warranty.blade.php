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
                    @foreach($warranties as $warranty)
                    <h2>{{$warranty -> n_title}}</h2>
                    <h3></h3>
                    {!! $warranty -> n_detail !!}
                    @endforeach
                </div>
			  </div>
            </div>
         </section>
@include('pages.contact')
@include('includes.footer')