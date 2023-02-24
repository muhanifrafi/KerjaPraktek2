<?php 
require_once 'Zend/View.php';

class paging {

	public function pager($totalData, $maxDisplay)
	{
		$div = $totalData/$maxDisplay;
		$mod = $totalData%$maxDisplay;
		
		$x = explode(".",$div);
		
		if($mod == 0)
			$totalPages = $x[0];
		else
			$totalPages = $x[0] + 1;

		return $totalPages;
	}
	
	public function showPage($totalData, $numToDisplay, $currentPage, $modul)
	{
		$totalPages = $this->pager($totalData, $numToDisplay);
		$totalPerPages = 5;
		$totalGroup = $totalPages / $totalPerPages ;
		$modTotalGroup = $totalPages % $totalPerPages ;
		$x = explode(".",$totalGroup);

		if($modTotalGroup == 0)
			$totalGroup = $x[0];
		else
			$totalGroup = $x[0] + 1;		
		
		if($currentPage)
		{
			$currentGroupPage_arr =  explode(".",$currentPage / $totalPerPages);
			if($currentGroupPage_arr[1] != 0)
				$currentGroupPage = $currentGroupPage_arr[0] +1;
			else
				$currentGroupPage = $currentGroupPage_arr[0];
		}
		
		if(!$currentGroupPage)
			$currentGroupPage = 1;
			
		$indexStartPage = (($currentGroupPage - 1) * $totalPerPages ) + 1 ;
		$indexEndPage = $indexStartPage+$totalPerPages-1;
		$dataAwal = (($currentPage - 1) * $numToDisplay ) + 1 ;
		$dataAkhir = $currentPage * $numToDisplay ;
		
		$keluaran = "";
		$keluaran = $keluaran."      
		<div class=\"row\">
			<div class=\"col-sm-6\">
				<div class=\"dataTables_info\" id=\"dataTables-example_info\" role=\"alert\" 
				aria-live=\"polite\" aria-relevant=\"all\">Data $dataAwal - $dataAkhir dari total $totalData data</div>
			</div>";
		$keluaran = $keluaran."      
			<div class=\"col-sm-6\">
				<div class=\"dataTables_paginate paging_simple_numbers\" id=\"dataTables-example_paginate\">
					<ul class=\"pagination\">";
					if($currentPage == 1)
					{
						$a = 1;
						$keluaran =  $keluaran . "
							<li class=\"paginate_button previous disabled\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_previous\">
								<a href=\"#\">Previous</a>
							</li>";
					}
					else{
					$aprev = $currentPage -1;
						$keluaran =  $keluaran . "
							<li class=\"paginate_button previous\" aria-controls=\"dataTables-example\" tabindex=\"0\" id=\"dataTables-example_previous\">
								<a href=\"#\"  onClick=\"javascript:gantinewPage('$modul','$aprev');\">Previous</a>
							</li>";
					
					}
					
		if($totalPages <= $indexEndPage)
		{
							for($a=$indexStartPage; $a <= $totalPerPages; $a ++)
							{
								if($a == $currentPage){
								$keluaran =  $keluaran . "
								<li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\">
										<a href=\"#\">$a</a>
								</li>";
								}else{
								$keluaran =  $keluaran . "
								<li class=\"paginate_button\" aria-controls=\"dataTables-example\" tabindex=\"0\">
										<a href=\"#\" onClick=\"javascript:gantinewPage('$modul','$a');\">$a</a>
								</li>";
								}	
							}
		}
		else
		{
			for($a=$indexStartPage; $a<=$indexEndPage; $a++)
			{
								if($a == $currentPage){
								$keluaran =  $keluaran . "
								<li class=\"paginate_button active\" aria-controls=\"dataTables-example\" tabindex=\"0\">
										<a href=\"#\">$a</a>
								</li>";
								}else{
								$keluaran =  $keluaran . "
								<li class=\"paginate_button\" aria-controls=\"dataTables-example\" tabindex=\"0\">
										<a href=\"#\" onClick=\"javascript:gantinewPage('$modul','$a');\">$a</a>
								</li>";
								}

			}
		}		
							$anext = $currentPage +1;
							$keluaran =  $keluaran . "
								<li class=\"paginate_button disabled\" aria-controls=\"dataTables-example\" tabindex=\"0\" 
								id=\"dataTables-example_ellipsis\"><a href=\"#\">...</a></li>
								<li class=\"paginate_button\" aria-controls=\"dataTables-example\" tabindex=\"0\">
									<a href=\"#\"  onClick=\"javascript:gantinewPage('$modul','$a');\">$totalPages</a>
								</li>
								<li class=\"paginate_button next\" aria-controls=\"dataTables-example\" tabindex=\"0\" 
								id=\"dataTables-example_next\" onClick=\"javascript:gantinewPage('$modul','$anext');\"><a href=\"#\">Next</a></li>";
					
					$keluaran = $keluaran."
					</ul>
				</div>
			</div>
		</div>";
	
		return $keluaran;
	}
}
?>
<script>
function gantinewPage(modul,currentPage)
{
	var opt = {currentPage : currentPage};
	jQuery.get(modul,opt,function(data) {
		jQuery("#page-inner").html(data);
	});
}
</script>
