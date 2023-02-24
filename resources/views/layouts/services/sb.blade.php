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
            <script type='text/javascript'>
					$(document).ready(function() {
						$.ajax({
								url: '/sb',
								type: 'GET',
								success: function(response) {
								$('#targetview').html(response);
								}
							});
							$('#search-btn').on('click', function() {
								var formData = $('form[name=searchform]').serialize();
								$.ajax({
								url: '/sb',
								type: 'GET',
								data: formData,
								success: function(response) {
									$('div#targetview').html(response);
								}
								});
							});
							});
				</script>
                <h2> Service Bulletin</h2>
                <form class="well" name="searchform">
                    <input type="hidden" name="ac" value="">

                    <div class="form-row py-4">
                        <div class="col">
                        <select class="form-control" name="ac">
                            <option value="">Aircraft</option>
                            @foreach($planes as $plane)
                            <option value="{{$plane -> n_title}}">{{$plane -> n_title}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="e_categ">
                                <option value="">Category</option>
                                <option value="Mandatory">Mandatory</option>
                                <option value="Recommended">Recommended</option>
                                <option value="Optional">Optional</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-control" name="cat">
                                <option value="">Search by</option>
                                <option value="n_no">SB No.</option>
                                <option value="a.n_title">Title</option>
                                <option value="e_effectivity">Effectivity</option>
                              </select>
                        </div>
                        <div class="col">
                            <div class="input-group searchBox">
                                <input class="form-control clearable" type="text" placeholder="Key" name="s" />
                                <div class="input-group-append">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-outline-secondary btn-lg buttonSearch" type ="Button" id="search-btn">
                                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <div id="targetview"></div>
                </div>
            </div>
        </div>
        
    </form>
                </div>
			  </div>
            </div>
         </section>
@include('includes.footer')