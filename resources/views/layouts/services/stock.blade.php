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
			<!-- PUT CONTENT HERE-->	
      <h2>Stock</h2>
<br>
<script>
					$(document).ready(function() {
						$.ajax({
								url: '/stockindex',
								type: 'GET',
								success: function(response) {
								$('#targetview').html(response);
								}
							});
							$('#search-btn').on('click', function() {
								var formData = $('form[name=searchform]').serialize();
								$.ajax({
								url: '/stockindex',
								type: 'GET',
								data: formData,
								success: function(response) {
									$('div#targetview').html(response);
								}
								});
							});
							});
</script>
<form class="form-horizontal well text-center" name="searchform">
<input type="hidden" name="ac" value="">
<div class="d-flex justify-content-center p-4 ">
        <select class="form-control" name="cat">
            <option value='n_ac_number'>AC Number</option>
            <option value='n_part_number'>Part Number</option>
            <option value='n_part_numberalt'>Alternative Part Number </option>
            <option value='e_desc'>Description</option>
        </select>&nbsp;
			<div class="input-group searchBox" style="width:50%">
              <input class="form-control clearable" type="text" placeholder="Key" name="s">
              <div class="input-group-append">
              </div>
      </div>
      <button class="btn btn-outline-secondary btn-lg buttonSearch" type ="Button" id="search-btn">
                  <i class="fa fa-search"></i>
      </button>       
</div>
      </form>
<br>			  
<div id="targetview"></div>
</section>
@include('pages.contact')
@include('includes.footer')