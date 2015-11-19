<?php
	function renklendir($metin, $aranan, $renk) 
	{
	$arananlar=explode(' ',$aranan);
	foreach($arananlar as $ara)
	{
	$yeni='<b style="background-color:'.$renk.';color:#000; padding:3px; border-radius:5px;">'.$ara.'</b>';
	$metin=str_replace($ara,$yeni,$metin);
	}
	return $metin;
	}

	function cevir($kelime){
		$str = $kelime;
		$str = str_replace("Ç", "C", $str);
		$str = str_replace("ç", "c", $str);
		$str = str_replace("İ", "I", $str);
		$str = str_replace("ı", "i", $str);
		$str = str_replace("ö", "o", $str);
		$str = str_replace("Ö", "O", $str);
		$str = str_replace("Ü", "U", $str);
		$str = str_replace("ü", "u", $str);
		$str = str_replace("Ş", "S", $str);
		$str = str_replace("ş", "s", $str);
		$str = str_replace("Ğ", "G", $str);
		$str = str_replace("ğ", "g", $str);
		return $str;
	}
 ?>