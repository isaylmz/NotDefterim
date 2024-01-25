<?php

session_start();
$kullanici = $_SESSION["kullanici"];

$kayit = "../kayitlar/".$kullanici."/";

	if(!empty($_POST["metin"]) && !empty($_POST["not_adi"])){
		
		$not_adi = $_POST["not_adi"];
		$kayit = $kayit.$not_adi.".txt";
		
		if(file_exists($kayit)){
			unlink($kayit);
			
			touch($kayit);
			
			$metin = $_POST["metin"];
			$dosya_yaz = fopen($kayit, "a");
			fwrite($dosya_yaz, $metin);
			fclose($dosya_yaz);
			
			header("Location:../panel/panel.php");
		}
		else {
			$uyari = "Not bulunmaktadır!";
			echo ("Not bulunmaktadır!");
		}
		
	}

?>