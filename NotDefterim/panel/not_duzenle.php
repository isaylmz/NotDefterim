<!DOCTYPE html>

<html>
<head>

	<title>Not Defterim</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Menü dosyalarım -->
	<link rel="stylesheet" href="../css/panel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!-- Jquery kütüphanesi -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php
	session_start();
	$kullanici = $_SESSION["kullanici"];
	
	$uyari = "";
	
	$not_adi = $_POST["not_adi"];
				
	$kayit = "../kayitlar/".$kullanici."/";
	$kayit = $kayit.$not_adi.".txt";
	
	
?>

<div class="body">
	<?php include("menu.php"); ?>
	<div class="table">
	<form action="../uygulama/duzenle.php" method="post">
	<table>
		<tr>
			<td>
			<label id="tarih">tarih</label>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
			<select name="not_adi" required>
				<option><?php echo $not_adi; ?></option>
			</select>
			</td>
			<td>
			<label><?php echo("$uyari"); ?></label>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<textarea id="metin" rows="14" cols="45" name="metin" required><?php
				
				$dosya_cek = fopen($kayit, "r");
				while(!feof($dosya_cek)) {
					$satir = fgets($dosya_cek);
					echo $satir; 
				}
				
			?></textarea>
			</td>
		</tr>
		<tr>
			<td>
			<label id="karakter">Karakter sayısı:</label>
			</td>
			<td>
			<button type="submit">Kaydet</button>
			</td>
		</tr>
	</table>
	</form>
	</div>
</div>

<script>
	//Tarihi yazdırma
	const date = new Date();
	var ay = date.getMonth()+1;
	document.getElementById("tarih").innerHTML = date.getDate()+"/"+ay+"/"+date.getFullYear();

	//Karakter sayısı yazdırma
	window.setInterval(karakter, 100);
		function karakter() {
			var metin = document.getElementById("metin");
			document.getElementById("karakter").innerHTML = "Karakter sayısı: "+metin.value.length;
		};
</script>

<script>
/* menu aç kapa javaScript */
$(document).ready(function(){
  $(".a").click(function(){
    $("#slade").slideToggle(500);
	
	/*var resim = document.getElementById("ak");
	
	if(resim.src === "../img/yukari.png") {
		resim.src = "../img/asagi.png";
	}
	else {
		resim.src = "../img/yukari.png";
	}*/
	
  });
});
</script>

<script>
//.body hover uygulaması
$(document).ready(function(){
  $(".body").hover(function(){
    $(this).css("box-shadow", "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19");
    }, function(){
    $(this).css("box-shadow", "0 4px 8px 0 rgba(0, 0, 0, 0), 0 6px 20px 0 rgba(0, 0, 0, 0");
  });
});
</script>

<script>
//menü hover uygulaması
$(document).ready(function(){
  $(".a").hover(function(){
    $(this).css("background-color", "#000");
    }, function(){
    $(this).css("background-color", "#555");
  });
});
</script>

</body>
</html>