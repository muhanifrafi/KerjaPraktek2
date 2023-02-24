<?php
function search($array, $key, $value)
{
	//var_dump($array);
	//var_dump($key);
	//var_dump($value);   
	$results = array();

	if (is_array($array)) {
		if (isset($array[$key]) && $array[$key] == $value) {
			$results[] = $array;
		}
		foreach ($array as $subarray) {
			$results = array_merge($results, search($subarray, $key, $value));
		}
	}

	return $results;
}

function romanNumerals($num){
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1);

    foreach ($roman_numerals as $roman => $number){
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}

function cropImage($nw, $nh, $source, $stype, $dest) {
 
 
 //echo "<br>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx$nw, $nh, $source, $stype, $dest";
    $size = getimagesize($source);
    $w = $size[0];
    $h = $size[1];
 
    switch($stype) {
        case 'gif':
        $simg = imagecreatefromgif($source);
        break;
        case 'jpg':
        $simg = imagecreatefromjpeg($source);
        break;
        case 'png':
        $simg = imagecreatefrompng($source);
        break;
    }
 
    $dimg = imagecreatetruecolor($nw, $nh);
 
    $wm = $w/$nw;
    $hm = $h/$nh;
 
    $h_height = $nh/2;
    $w_height = $nw/2;
 
    if($w> $h) {
 
        $adjusted_width = $w / $hm;
        $half_width = $adjusted_width / 2;
        $int_width = $half_width - $w_height;
 
        imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
 
    } elseif(($w <$h) || ($w == $h)) {
 
        $adjusted_height = $h / $wm;
        $half_height = $adjusted_height / 2;
        $int_height = $half_height - $h_height;        
	imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
 
    } else {

        imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
    }
 
    imagejpeg($dimg,$dest,100);
	chmod($dest, 0777);
}

	function terbilangxx($bilangan){
		$bilangan = abs($bilangan);

		$angka = array("Nol","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
		$temp = "";

		
		echo "<br>bilangan  = $bilangan";
		if($bilangan < 12){
		$temp = " ".$angka[$bilangan];
		}else if($bilangan < 20){
		$temp = terbilang($bilangan - 10)." belas";
		}else if($bilangan < 100){
		$temp = terbilang($bilangan/10)." puluh".terbilang($bilangan%10);
		}else if ($bilangan < 200) {
		$temp = " seratus".terbilang($bilangan - 100);
		}else if ($bilangan < 1000) {
		$temp = terbilang($bilangan/100). " ratus". terbilang($bilangan % 100);
		}else if ($bilangan < 2000) {
		$temp = " seribu". terbilang($bilangan - 1000);
		}else if ($bilangan < 1000000) {
		$temp = terbilang($bilangan/1000)." ribu". terbilang($bilangan % 1000);
		}else if ($bilangan < 1000000000) {
		$temp = terbilang($bilangan/1000000)." juta". terbilang($bilangan % 1000000);
		}
		
		echo " | $temp";

		return $temp;
	}

	function terbilang($bilangan) {

	  $angka = array('0','0','0','0','0','0','0','0','0','0',
					 '0','0','0','0','0','0');
	  $kata = array('','satu','dua','tiga','empat','lima',
					'enam','tujuh','delapan','sembilan');
	  $tingkat = array('','ribu','juta','milyar','triliun');

	  $panjang_bilangan = strlen($bilangan);

	  /* pengujian panjang bilangan */
	  if ($panjang_bilangan > 15) {
		$kalimat = "Diluar Batas";
		return $kalimat;
	  }

	  /* mengambil angka-angka yang ada dalam bilangan,
		 dimasukkan ke dalam array */
	  for ($i = 1; $i <= $panjang_bilangan; $i++) {
		$angka[$i] = substr($bilangan,-($i),1);
	  }

	  $i = 1;
	  $j = 0;
	  $kalimat = "";

	  /* mulai proses iterasi terhadap array angka */
	  while ($i <= $panjang_bilangan) {

		$subkalimat = "";
		$kata1 = "";
		$kata2 = "";
		$kata3 = "";

		/* untuk ratusan */
		if ($angka[$i+2] != "0") {
		  if ($angka[$i+2] == "1") {
			$kata1 = "seratus";
		  } else {
			$kata1 = $kata[$angka[$i+2]] . " ratus";
		  }
		}

		/* untuk puluhan atau belasan */
		if ($angka[$i+1] != "0") {
		  if ($angka[$i+1] == "1") {
			if ($angka[$i] == "0") {
			  $kata2 = "sepuluh";
			} elseif ($angka[$i] == "1") {
			  $kata2 = "sebelas";
			} else {
			  $kata2 = $kata[$angka[$i]] . " belas";
			}
		  } else {
			$kata2 = $kata[$angka[$i+1]] . " puluh";
		  }
		}

		/* untuk satuan */
		if ($angka[$i] != "0") {
		  if ($angka[$i+1] != "1") {
			$kata3 = $kata[$angka[$i]];
		  }
		}

		/* pengujian angka apakah tidak nol semua,
		   lalu ditambahkan tingkat */
		if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
			($angka[$i+2] != "0")) {
		  $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
		}

		/* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
		   ke variabel kalimat */
		$kalimat = $subkalimat . $kalimat;
		$i = $i + 3;
		$j = $j + 1;

	  }

	  /* mengganti satu ribu jadi seribu jika diperlukan */
	  if (($angka[5] == "0") AND ($angka[6] == "0")) {
		$kalimat = str_replace("satu ribu","seribu",$kalimat);
	  }

	  return trim($kalimat);

	}
	
	function mataUang($curr){
		$curr = strtoupper(trim($curr));
		
		$ketMataUang = array('IDR' => 'RUPIAH',
							 'USD' => 'US DOLLAR');
			
		$hasil  = $ketMataUang[$curr];
		return $hasil;
	}

?>