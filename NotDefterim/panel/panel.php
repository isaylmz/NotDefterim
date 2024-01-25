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
	<!-- Menü dosyalarım -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<?php
	session_start();
	$kullanici = $_SESSION["kullanici"];
?>

<div class="body">
<?php include("menu.php"); ?>
	
	<div id="bar" style="margin: 100px auto; text-align: center;">
		<p><?php echo("NOT DEFTERİM"); ?></p>
		<p><?php echo("Hoş Geldiniz $kullanici"); ?></p>
	</div>
</div>

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
