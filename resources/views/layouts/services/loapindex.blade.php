@if(Auth::check())
<script language="javascript">
//$("div#popupView").load("module/aircraft_manual/form_order_list_popup.php");
$(document).ready(function() {
	// process the form
	$('#rfqform').submit(function(event) {
	//alert ("test");
		const tes = []; 		
		var jmlcek = $('input[name=jmlcek]').val();
		var no = 0;
		
		for(x=0;x< jmlcek;x++){
			var no = no+1;
			var f_am_hardcpy = "f_am_hardcpy"+no;
			var tes2 = $('input[type="radio"][name="f_am_hardcpy'+no+'"]:checked').val();
			tes[x] = tes2;
		}

		$('.label_side').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'action' 	: 'add',
			'jmlcek' 	: $('input[name=jmlcek]').val(),
			'n_am_abb' 	: $('input[name="n_am_abb[]"]').map(function(){return $(this).val();}).get(),
			'e_am_abbdesc' 	: $('input[name="e_am_abbdesc[]"]').map(function(){return $(this).val();}).get(),
			'c_am_cust' 	: $('input[name="c_am_cust[]"]').map(function(){return $(this).val();}).get(),
			'c_qty_order' 	: $('input[name="c_qty_order[]"]').map(function(){return $(this).val();}).get(),
			'i_id_am' 		: $('input[name="i_id_am[]"]').map(function(){return $(this).val();}).get(),
			'q_am_dur' 		: $('select[name="q_am_dur[]"]').map(function(){return $(this).val();}).get(),
			'f_am_hardcpy' 	: tes
			//'f_am_hardcpy' 	: $('select[type="radio"]:checked').map(function(){return $(this).val();}).get()
			};
		//alert ($('input[name=qty]').val());
		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'exec-am-rfq.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			// using the done promise callback
			.done(function(data) {
				
				// log data to the console so we can see
				console.log(data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
				//alert ("error");
					
					// handle errors for password ---------------
					if (data.errors.qty) {
						$('#fqty').addClass('has-error'); // add the error class to show red input
						$('#fqty').append('<div class="help-block">' + data.errors.qty + '</div>'); // add the actual error message under our input
					}

			


				} else {
					//alert(data.message);
				    //alert("sukses");
					$("div#popupView").load("module/aircraft_manual/form_order_list_popup.php");
					$("#jmlorder").load("module/stock/countrfq.php");
					//$('#shoppingCart').data('count','20'); //setter
					 //$('#shoppingCart').attr('data-count', data.count); // sets
					// ALL GOOD! just show the success message!
					//$('#rfqform').append('<div class="alert alert-success">' + data.message + '</div>');
					//$("#rfqform").delay(2000).fadeOut();
					

					// usually after form submission, you'll want to redirect
					// window.location = '/thank-you'; // redirect a user to another page

				}
			})

			// using the fail promise callback
			.fail(function(data) {
				location.href = "form_order_list";
				// show any errors
				// best to remove for production
				console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

});
</script>
<br>
<div class="d-flex">
@if($actype == '')
<h4><span class="badge badge-success">Aircraft: All</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@else
<h4><span class="badge badge-success">Aircraft: {{$actype}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@endif
@if($eff == '')
<h4><span class="badge badge-danger">Effectivity: All</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@else
<h4><span class="badge badge-danger">Effectivity: {{$eff}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@endif
@if($mancat == '')
<h4><span class="badge badge-warning">Category : All</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@else
<h4><span class="badge badge-warning">Category : {{$mancat}}</span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
@endif
<h4><span class="badge badge-info">Search by : </span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
<h4><span class="badge badge-primary">Key : </span> <span class="fa fa-arrow-right"></span> </h4>&nbsp;
</div>
<input type='hidden' id='userid' name='userid' value='{{Auth::user()->c_customer}}'>
<br>
<div class="row py-4">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link "  href="technical+publication" role="tab">Technical Publication</a>
            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                aria-controls="v-pills-profile" aria-selected="false">Loap Index</a>
            <a class="nav-link" href="information">Information</a>
        </div>
    </div>
    <div class="col-9">
<table  class="table table-striped table-bordered table-hover table-heading no-border-bottom" cellspacing=0 id="delTable">
	<thead>
	<th scope="col" width="5%"><input type="checkbox" id="selectall" onClick="selectAll(this)" /></th>
	<th scope="col" width="5%">ID.</th>
	<th scope="col" width="10%">Aircraft Type</th>
	<th scope="col" width="25%">Manual Type</th>
	<th scope="col" width="10%">ABB</th>
	<th scope="col" width="25%">Manual Title</th>
	<th scope="col" width="10%">Edition</th>
	<th scope="col" width="10%">Latest Rev. Status</th>
	<!--th scope="col" width="12%">Add to chart</th-->
	</thead>
	<tbody id="the-list">
			@foreach($loaps2 as $key => $loap2)
			<tr id="{{$loap2 -> id}}" class='{{ $loop->iteration % 2 == 0 ? 'alternate' : 'alternate2' }}'>	
		        <td align="center"><input type="checkbox" id="pilih_{{$loaps2->firstItem() + $key}}" class="checkboxClass" name="pilih[]" onchange="cekceklis2({{$loap2 -> id}},{{$loaps2->firstItem() + $key}})"></td>
		        <td align="center">{{$loaps2->firstItem() + $key}}</td>
				<td align="center">{{$loap2 -> n_title}}</a></td>
				<td>{{$loap2 -> e_man_typ}}</a></td>
				<td align="center">{{$loap2 -> n_abb}}</a></td>
				<td>{{$loap2 -> e_desc}}</a></td>
				<td>{{$loap2 -> n_ac_revstat}}</td>
				<td >{{$loap2 -> n_ac_lastrevstat}}</td>
			</tr>	
			@endforeach
	</tbody>
	</table>
	@php $a = $loaps2->lastPage();
    $b = $loaps2->total();
    $c="/loap_index";
    @endphp
    @include('includes.pagination')
	<input class="btn btn-primary btn-sm" type="button" class="btn btn-primary" value="Add To Order List" id="myBtn" disabled>
    </div>
</div>

      <!-- Modal -->
     <div class="modal bd-example-modal-lg" id="modstock" tabindex="-1" role="dialog" aria-labelledby="modChart" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
             <h5 class="modal-title" id="ntitleaircraft">Detail Request for Quotation – Technical Publications</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
              <div class="row">
                <div class="col-12" id="detailform">
					<form class="form-rfq" id="rfqform" method="POST" >
						<table  class="table table-striped table-bordered table-hover table-heading no-border-bottom" cellspacing=0 id="orderListTab">
							<thead>
								<th scope="col" width="10%">Aircraft Type</th>
								<th scope="col" width="10%">Manual Type</th>
								<th scope="col" width="5%">ABB</th>
								<th scope="col" width="20%">Manual Title</th>
								<th scope="col" width="10%">Edition</th>
								<th scope="col" width="10%">Latest Rev. Status</th>
								<th scope="col" width="10%">Duration</th>
								<th scope="col" width="10%">Hardcopy</th>
								<th scope="col" width="10%">Qty (Set)</th>
								<th scope="col" width="5%">Remove</th>
							</thead>
							<tbody id='orderTabBody'>
							</tbody>
						</table>
						<div class="d-flex justify-content-center p-4 ">
							<button class="btn btn-warning" type="button" data-dismiss="modal" aria-label="Close">Cancel</button> &nbsp;
							<button type="submit" class="btn btn-primary btn-block ">NEXT</button>
						</div>
					</form>
                </div>
                <!-- START:ChartJS 08 MARET 2021-->

                <!-- START:ChartJS 08 MARET 2021-->
              </div>
            </div>
          </div>
        </div>
      </div>
	  
<script>  
var modal = document.getElementById('modstock');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {		  
		  var tbody = document.getElementById('orderTabBody');
		  tbody.innerHTML = '';
			
		  var checkbox = document.getElementsByName('pilih[]');												
		  var num = 0;
		  var chklength = checkbox.length;  
		  var numberOfChecked = $('input:checkbox:checked').length;
		  //alert(numberOfChecked);
		  
		  var userid = document.getElementById('userid').value;
		
		  for(k=0;k< chklength;k++)
		  {
		    if(checkbox[k].checked == true){
			  var num = num+1;	
			  var row = tbody.insertRow(-1);	
			  var idRow = checkbox[k].parentElement.parentElement.getAttribute('id');
			  var ACType = checkbox[k].parentElement.nextElementSibling.nextElementSibling.innerHTML;
			  var MType  = checkbox[k].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
			  var ABB    = checkbox[k].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
			  var MTitle = checkbox[k].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
			  var Edition = checkbox[k].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
			  var Laststat = checkbox[k].parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML;
			  
			  var cell1 = row.insertCell(-1).innerHTML = ACType+"<input type='hidden' name='i_id_am[]' id='i_id_am' value='"+idRow+"'/>";
			  var cell2 = row.insertCell(-1).innerHTML = MType+"<input type='hidden' name='c_am_cust[]' id='c_am_cust' value='"+userid+"'/>";
			  var cell3 = row.insertCell(-1).innerHTML = ABB+"<input type='hidden' name='n_am_abb[]' id='n_am_abb' value='"+ABB+"'/>";		
			  var cell4 = row.insertCell(-1).innerHTML = MTitle+"<input type='hidden' name='e_am_abbdesc[]' id='e_am_abbdesc' value='"+MTitle+"'/>";		
			  var cell5 = row.insertCell(-1).innerHTML = Edition+"<input type='hidden' name='jmlcek' id='jmlcek' value='"+numberOfChecked+"'/>";		
			  var cell6 = row.insertCell(-1).innerHTML = Laststat;		
			  var cell7 = row.insertCell(-1).innerHTML = "<select name='q_am_dur[]'><option value='12'>1 Year</option><option value='24'>2 Years</option><option value='1'>1 Month</option><option value='2'>2 Months</option><option value='3'>3 Months</option></select>";		
			  var cell8 = row.insertCell(-1).innerHTML = "<input type='radio' class='rdobtn[]' name='f_am_hardcpy"+num+"' id='f_am_hardcpy_y' value='1' checked/>&nbsp;<label for='f_am_hardcpy_y'>Y</label> &nbsp; <input type='radio' class='rdobtn[]' name='f_am_hardcpy"+num+"' id='f_am_hardcpy_n' value='0' />&nbsp;<label for='f_am_hardcpy_n'>N</label>";		
			  var cell9 = row.insertCell(-1).innerHTML = "<input type='number' class='combo2 form-control width_90 text-right' name='c_qty_order[]' id='c_qty_order' min='0' value='0' onkeypress='return onlyNumberKey(event)' />";		
			  var cell10 = row.insertCell(-1).innerHTML = "<a class='remove2 btn btn-danger' title='Remove this order' onClick='deleteRow(this)'><span class='fa  fa-trash-o'></span> </a>";		
			}
		  } 
		  
		  modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		}

 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var idam = $(this).attr("idam");  
           //var nac = "A/C Type : "+$(this).attr("nac");  
 		   //alert(idac);
          $.ajax({  
                url:"module/aircraft_manual/form_rfq.php",  
                method:"post",  
                data:{id:idam},  
                success:function(data){  
                     //$('#ntitleaircraft').html(nac);  
                     $('#modstock').modal("show");  
                     $('#detailform').html(data);  
                }  
           });  
      });  
 }); 
 
 function deleteRow(source){
	var i = source.parentElement.parentElement.rowIndex;
	document.getElementById('orderListTab').deleteRow(i);
 }
 
 function selectAll(source) {
		checkboxes = document.getElementsByName('pilih[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
 }

 function cekceklis2(id,x){
		if (document.getElementById("pilih_"+x).checked == true){
			var statchecked = '1';
		} else if (document.getElementById("pilih_"+x).checked == false){
			var statchecked = '0';
		}
		
		var checkbox = document.getElementsByName('pilih[]');												
		var num = 0;
		var chklength = checkbox.length;             

		for(k=0;k< chklength;k++)
		{
			if(checkbox[k].checked == true){
				num = num + 1;
			}
		} 
		
		if(num > 0){
			document.getElementById("myBtn").disabled = false;
		} else {
			document.getElementById("myBtn").disabled = true;
		}
		
		
 }
 
 function onlyNumberKey(evt) {       
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
 </script>
 @endif