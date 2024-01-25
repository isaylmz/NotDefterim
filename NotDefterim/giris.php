<!DOCTYPE html>

<html>
<head>

<title>Not Defterim</title>

<link rel="stylesheet" type="text/css" href="css/stylee.css">

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
		<tr>
			<td>
			<input type="user" name="kullanici" placeholder="kullanıcı adı" required>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
			<input id="sifre" type="password" name="sifre"  placeholder="şifre" required>
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
			<button type="submit">Giriş</button>
			</td>
		</tr>
	</table>
	</form>
	<table style="margin-left: 10px;">
		<tr>
			<td>
			Hesabın mı yok? <a href="kayit.php"><span style="color:blue;">Kaydol</span></a>
			</td>
		</tr>
	</table>
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

//Postla gelip gelmediğini kontrol etme
if ($_POST){

	@$kullanici = $_POST['kullanici'];
	@$sifre = $_POST['sifre'];

	//Değişkenlerin boş olmadığını kotrol etme
	if(!empty($kullanici) && !empty($sifre)){

		//Veri tabana bağlanma
		include("conn.php");

		//Kullanıcı bilgisini çekme
		$sql = "SELECT * FROM kullanici WHERE kullanici_adi = '$kullanici'; ";
		$liste = mysqli_query($conn, $sql);

		//Kullanıcı bilgisi var mı kontrol etme
		if(mysqli_num_rows($liste)>0){

			//Bilgileri dizi haline getirme
			$satir = mysqli_fetch_assoc($liste);
			$ksifre = $satir["sifre"];

			//Girilen bilgiler ile karşılaştırma
			if($sifre == $ksifre){
				mysqli_close($conn);

				//i_panel.php'ye kullanici verisini aktarmak için
				session_start();
				$_SESSION["kullanici"] = $kullanici;
				header("Location:panel/panel.php");
			}
			else{
				echo "<h2 style='text-align:center;'>Hatalı giriş! <br>Tekrar deneyin...</h2>";
			}
		}
		else{
			echo "<h2 style='text-align:center;'>Kullanıcı bilgisi bulunmamaktadır!</h2>";
		}

	}
	else{
		echo "<h2 style='text-align:center;'>Lütfen Bütün Bilgileri Giriniz!</h2>";
	}

}

?>

</body>
</html>
