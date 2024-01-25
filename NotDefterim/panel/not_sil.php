<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Menü dosyalarım -->
	<link rel="stylesheet" href="../css/panel.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!-- Menü dosyalarım -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php
	session_start();
	$kullanici = $_SESSION["kullanici"];
?>

<?php

$kayit = "../kayitlar/".$kullanici."/";

	if(!empty($_POST["not_adi"])){
		
		$not_adi = $_POST["not_adi"];
		$kayit = $kayit.$not_adi.".txt";
		
		if(file_exists($kayit)){
			unlink($kayit);
			
			include("../conn.php");
			$sql = "DELETE FROM notlar WHERE not_adi = '$not_adi'";
			if(mysqli_query($conn, $sql)){
				$uyari = "Başarıyla eklendi.";
				mysqli_close($conn);
			}
		}
		else {
			$uyari = "Not bulunmaktadır!";
			echo ("Not bulunmaktadır!");
		}
		
	}

?>

<div class="body">
<?php
	include("menu.php");
	
	include("../conn.php");
	$sql = "SELECT * FROM notlar WHERE kullanici = '$kullanici';";
	$liste = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if (mysqli_num_rows($liste)>0) {
		?>
		<div class="table table2">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		<table id="myTable">
			<thead>
				<tr class="header">
					<th style="width:45%;">Not Adı</th>
					<th style="width:45%;">Tarih</th>
					<th style="width:10%;"></th>
				</tr>
			</thead>
			<tbody>
				<form action="" method="post">
					
		<?php
		while($satir = mysqli_fetch_assoc($liste)){
		?>
					<tr>
						<td><?php echo $satir["not_adi"]; ?></td>
						<td><?php echo $satir["tarih"]; ?></td>
						<td><button name="not_adi" value="<?php echo $satir["not_adi"]; ?>">Sil</button></td>
					</tr>
		<?php } ?>
		
				</form>
			</tbody>
		</table>
		</div>
		<?php
	}
	else {
		?>

		<div style="margin: 100px auto;">
		<?php echo ("Hiç kayıt bulunmamaktadır. Kayıt sayısı:0"); ?>
		</div>

	<?php } ?>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
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
