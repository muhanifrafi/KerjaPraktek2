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
            @foreach($adams as $adam) 
                <h2>{{ $adam->n_title }}</h2>
            <br>
            @if(Auth::check())
            <script type='text/javascript'>
                        $(document).ready(function() {
                $("#targetview").load("adamindex?idcust={{Auth::user()->c_customer}}");
              });
            </script>
            <form class="form-horizontal well text-center" name="searchform">
            <input type="hidden" name="idcust" id="idcust" value="{{Auth::user()->c_customer}}">
            <div class="d-flex justify-content-center p-4 ">
			      <div class="input-group searchBox"   style="width:50%">
              <input class="form-control clearable" type="text" placeholder="Key" name="s"/>
              <div class="input-group-append">
                <button class="btn btn-outline-secondary btn-lg buttonSearch" onclick="goSearchAdam('/adamindex')" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>        
            </div>
            </form>
            <nav class="mynav d-flex justify-content-start">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="active"><a href="#" onclick="goSearchTypeAC('/adamindex',{{Auth::user()->c_customer}},'')" aria-controls="home" aria-selected="true" style="opacity: 1;">All</a></li>
              <li><a href="#" onclick="goSearchTypeAC('/adamindex',{{Auth::user()->c_customer}},'FW')" aria-controls="profile" aria-selected="false" style="opacity: 0.25;">Fixed Wing</a></li>
              <li><a href="#" onclick="goSearchTypeAC('/adamindex',{{Auth::user()->c_customer}},'RW')" aria-selected="false" style="opacity: 0.25;">Rotary Wing</a></li>
              </ul>
            </nav>	
            <div id="targetview">
            </div>
            @else
                {!! $adam->n_detail !!}
            @endif
            @endforeach
                </div>
			  </div>
            </div>
         </section>

  
  </section>
  </main>


@include('pages.contact')
@include('includes.footer')