    
<center><marquee class=" " style="width:30%;behavior=" scroll"="" direction="left" scrollamount="5" onmouseover="this.setAttribute('scrollamount', 1, 0)" onmouseout="this.setAttribute('scrollamount', 5, 0)">
  On stock items subject to prior sale
  </marquee>
  </center>
<br>

 
  <table class="table table-striped table-bordered table-hover table-heading no-border-bottom" cellspacing="0" id="delTable">
	<thead>
	
	<tr><th scope="col" width="5%">Id.</th>
	<th scope="col" width="10%">AC Number</th>
	<th scope="col" width="15%">Part Number</th>
	<th scope="col" width="15%">Alternative Part Number</th>
	<th scope="col" width="35%">Description</th>
	<th scope="col" width="10%">UOM</th>
	<th scope="col" width="10%">Add to Chart</th>
	<!--th scope="col" width="25%">Remark</th-->

	</tr></thead>
	
	<tbody id="the-list">
		@php $i=0; @endphp
		@foreach($stocks as $key => $stock)
		@if ($i%2 == 0)
		@php $ev = "alternate"; @endphp
		@else
		@php $ev = "alternate2"; @endphp
		@endif
		@php $i++; @endphp
		<tr id="{{$stock -> id}}" class="{{$ev}}">
		        <td align="center">{{$stocks->firstItem() + $key}}</td>
				<td align="center">{{$stock -> n_ac_number}}</td>
				<td><a href="#" class="login" data-toggle="modal" data-target="#exampleModalCenter">{{$stock -> n_part_number}}</a></td>
				<td>{{$stock -> n_part_numberalt}}</td>
				<td>{{$stock -> e_desc}}</td>
				<td align="center">{{$stock -> n_uom}}</td>
				<td align="center">
				<span title="REQUEST FOR QUOTATION - Sign in first !" class="fa fa-shopping-cart fa-lg icon-grey"></span>				</td>
			</tr>
		@endforeach	
	</tbody>
	</table>
    @php $a = $stocks->lastPage();
    $b = $stocks->total();
    $c="/stockindex";
    @endphp
    @include('includes.pagination')
      <!-- Modal -->
     <div class="modal bd-example-modal-lg" id="modstock" tabindex="-1" role="dialog" aria-labelledby="modChart" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
             <h5 class="modal-title" id="ntitleaircraft">REQUEST FOR QUOTATION</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12" id="detailform">
                </div>
                <!-- START:ChartJS 08 MARET 2021-->

                <!-- START:ChartJS 08 MARET 2021-->
              </div>
            </div>
          </div>
        </div>
      </div>
<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var idstock = $(this).attr("idstock");  
           //var nac = "A/C Type : "+$(this).attr("nac");  
 		   //alert(idac);
          $.ajax({  
                url:"module/stock/form_rfq.php",  
                method:"post",  
                data:{id:idstock},  
                success:function(data){  
                     //$('#ntitleaircraft').html(nac);  
                     $('#modstock').modal("show");  
                     $('#detailform').html(data);  
                }  
           });  
      });  
 });  
 </script>