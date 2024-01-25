<!DOCTYPE html>

<html>
<head>

<title>Not Defterim</title>

<link href="css/stylee.css" type="text/css" rel="stylesheet"/>

<style>

a{
	text-decoration:none;
}

</style>

</head>
<body>

<div class="body">
	<form action="" method="post">
	<table>
		<caption style="color:gray;">Notlar almak için kaydol.</caption>
		<tr>
			<td>
			<input type="email" name="eposta"  placeholder="E-posta" required>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
			<input type="text" name="adisoyadi"  placeholder="Adı Soyadı" required>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
			<input type="user" name="kullanici" placeholder="Kullanıcı adı" required>
			</td>
			<td></td>
		</tr>
		<tr>
			<td>
			<input id="sifre" type="password" name="sifre" placeholder="Şifre" required>
			</td>
			<td>
			<img src="img/eye.png" id="imglog" onclick="togglePassword()" width="20" height="20">
			</td>
		</tr>
	</table>
	<br>
	<table>
		<tr>
			<td>
			<button type="submit">Kaydol</button>
			</td>
		</tr>
	</table>
	</form>
</div>

<script>
function togglePassword() {
  var element = document.getElementById("sifre");
  element.type = element.type == "password" ? "text" : "password";
  
  if(element.type == "password") {
	  var gorunum = document.getElementById("imglog");
	  gorunum.src = "img/eye.png";
  }
  else {
	  var gorunum = document.getElementById("imglog");
	  gorunum.src = "img/not_eye.png";
  }
}
</script>

<?php

$kayit = "kayitlar/";

if($_POST){
//Verilerin çekilmesi
@$eposta = $_POST["eposta"];
@$adi_soyadi = $_POST["adisoyadi"];
@$kullanici = $_POST["kullanici"];
@$sifre = $_POST["sifre"];

	//Değişkenlerin boş olmadığını kontrol etme
	if(!empty($eposta) && !empty($adi_soyadi) && !empty($kullanici) && !empty($sifre)){
		//Veri tabanına bağlanma
		include("conn.php");
		//Bu kullanıcı adına ait kayıt verilerini çekme
		$sql = "SELECT * FROM kullanici WHERE kullanici_adi = '$kullanici'; ";
		$liste = mysqli_query($conn, $sql);
		
		//Kullanıcı adının kullanılmadığını kotrol etme
		if(mysqli_num_rows($liste)==0){
			$sql = "INSERT INTO kullanici (adi_soyadi, kullanici_adi, sifre, eposta)
			VALUES ('$adi_soyadi', '$kullanici', '$sifre', '$eposta')";
			
			//Kayıt gerçekleştimi kontrol etme
			if(mysqli_query($conn, $sql)){
				mysqli_close($conn);

				$kayit = "$kayit"."$kullanici";
				//İşletmeye ait dizin oluşturma
				mkdir("$kayit");

			echo "<h2 style='text-align:center;'>Kayıt başarıyla geçekleştirildi.!</h2>";
			}
			else{
				mysqli_close($conn);
				echo "<h2 style='text-align:center;'>Kayıt gerçekleştirilemedi!</h2>";
			}
			
		}
		else{
			echo "<h2 style='text-align:center;'>Bu kullanıcı adı kullanılmaktadır!</h2>";
		}
		
	}
	else{
		echo "<h2 style='text-align:center;'>Lütfen Bütün Bilgileri Giriniz!</h2>";
	}
	
}



?>

</body>
</html>
