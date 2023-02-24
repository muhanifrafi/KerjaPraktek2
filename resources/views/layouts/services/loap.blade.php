<!DOCTYPE html>
<html lang="zxx" dir='ltr'>
@include('includes.head')
@include('includes.topbar')
<!-- ======= Header ======= -->
@include('includes.navbar')
@include('includes.banner')
@include('includes.breadcrumb')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>
<section>
	<div class="container">
		<div class="row pad-row">
			<div class="col-md-12  col-sm-12">
				<!-- PUT CONTENT HERE-->
				<script type='text/javascript'>
					$(document).ready(function() {
						var acValue = $('input[name="ac"]').val();
						$.ajax({
								url: '/loap',
								type: 'GET',
								data: {ac: acValue},
								success: function(response) {
								$('#targetview').html(response);
								}
							});
							$('#search-btn').on('click', function() {
								var formData = $('form[name=searchform]').serialize();
								$.ajax({
								url: '/loap',
								type: 'GET',
								data: formData,
								success: function(response) {
									$('div#targetview').html(response);
								}
								});
							});
							});
				</script>
				<h2>Loap Index</h2>
				@if(Auth::check())
				<h3>{{ Auth::user()->tmcrmcust->n_cust ?? 'NULL'}}</h3>
				@endif
				<br>
				<form class="form-horizontal well" name="searchform">
					<input type="hidden" name="ac" 
					@if(Auth::check())
					value="{{Auth::user()->c_customer}}"
					@else
					value=""
					@endif
					>
					<div class="d-flex justify-content-center p-4 ">
							@if(Auth::check())
						   			<select name="actype" class="form-control">
 										<option value="">Aircraft</option>
										@foreach($actypes as $actype)
										<option value="{{$actype -> n_title}}">{{$actype -> n_title}}</option>
										@endforeach
   									</select>
									&nbsp;
							   		<select name="eff" class="form-control">
 										<option value="">Effectivity</option>
										 @foreach($effs as $eff)
										<option value="{{$eff -> e_ac_eff}}">{{$eff -> e_ac_eff}}</option>
										@endforeach
   									</select>
									&nbsp;
							   		<select name="mancat" class="form-control">
 										<option value="">Manual Category</option>
										@foreach($mancats as $mancat)
										<option value="{{$mancat -> e_man_typ}}">{{$mancat -> e_man_typ}}</option>
										@endforeach
   									</select>
									&nbsp;
									<select class="form-control" name="cat">
										<option value="">Search by</option>
										<option value="a.n_abb">ABB</option>
										<option value="a.e_man_typ">Manual Type</option>
										<option value="a.e_desc">Manual Title</option>
									</select>
									&nbsp;
								<div class="input-group searchBox" style="">
								<input class="form-control clearable" type="text" placeholder="Key" name="s">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary btn-lg buttonSearch" id="search-btn" type="button">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
							
							@else
							<div class="col-9">
								<div class="tab-content" id="v-pills-tabContent">
									<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
										<table id="table_id" class="table table-striped table-bordered table-hover table-heading no-border-bottom">
											<thead>
												<th scope="col" style="text-align: center;" width="5%">No</th>
												<th scope="col" style="text-align: center;" width="10%">ABB</th>
												<th scope="col" style="text-align: center;" width="85%">Manual Title</th>
											</thead>
											<tbody id="the-list">
                                                @foreach($loaps as $l)
													<tr>
														<td align="center">{{$loop -> iteration}}</td>
														<td align="center">{{$l -> n_loap_abbr}}<</a>
														<td>{{$l -> e_loap_abbr}}</a></td>
														
													</tr>
                                                @endforeach
											</tbody>
                                            </tfoot>
										</table>
									</div>
								</div>
								@endif
							</div>
							</form>
						<div id="targetview"></div>

		</div>
		</div>
	</div>
</section>  
@include('pages.contact')
@include('includes.footer')