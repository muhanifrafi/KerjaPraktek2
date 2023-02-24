<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@include('includes.head')
@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
@include('includes.breadcrumb')
<section>
	<div class="container">
		<div class="row pad-row">
			<div class="col-md-12  col-sm-12">
				<h2 class="mb-3 text-capitalize">{{$i_id_mro -> n_mro_title}}</h2>
                {!! $i_id_mro -> e_mro !!}
            </div>
		</div>
	</div>
</section>  
  </section>
  </main>
@include('pages.contact')
@include('includes.footer')	