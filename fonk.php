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
 ?>