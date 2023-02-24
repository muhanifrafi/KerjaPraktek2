<?php
function getAlltrcrmcode($filter,$order,$limit) {
	//echo"gdfgdfg";  
    $strQuery="select * from support.trcrmcode ";
    if($filter) $strQuery .= $filter;
    $strQuery .= " order by $order";
	if($limit) $strQuery .=" limit ".$limit;
    $isi=array();
	//echo $strQuery;
    $clstrcrmcode= new trcrmcode();
    $hasil=pg_query($strQuery);
    while ($data = pg_fetch_array($hasil)) {
      $clstrcrmcode->seti_id_code($data[0]);
      $clstrcrmcode->setc_code_ref($data[1]);
      $clstrcrmcode->setc_code($data[2]);
      $clstrcrmcode->setn_code($data[3]);
      $clstrcrmcode->sete_code($data[4]);
      $isi[]=serialize($clstrcrmcode);
    }
    return $isi;
}
$Refcode = $_POST['Refcode'];
echo "<option disabled selected>--- Please Select Sub Category ---</option>\n";
if ($Refcode!='') {
$nilai = "5.".$Refcode;
$filter="where c_code_ref = '$nilai'";
$order=" c_code asc";
//echo"Di filter nya : ".$filter." Dan Diorder : ".$order;
$listtrcrmcode1 = getAlltrcrmcode($filter,$order);
$objtrcrmcode1=new trcrmcode();
			 foreach ($listtrcrmcode1 as $dat) {
				$objtrcrmcode1 = unserialize($dat);	
				echo '<option value="'.trim($objtrcrmcode1->getn_code()).'">'.$objtrcrmcode1->getn_code().'</option>';
		      }
} else echo "<option>--- Please Select Sub Category ---</option>\n";
?>

