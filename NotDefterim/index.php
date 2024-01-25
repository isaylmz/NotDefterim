<!DOCTYPE html>
<html lang="tr">
<head>
	<title>notdefterim.com</title>
	<meta charset="UTF-8">
	<meta name="author" content="İsa Yılmaz">
	<meta name="keywords" content="notdefterim.com, isa, yılmaz, isaylmz, notdefteri, no, defteri">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Jqery kütüphanesi-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Css dosyam-->
	<link rel="stylesheet" href="css/indexx.css">

</head>
<body>
	<nav id="navbar">
		<a href="index.html" class="logo">Not Defterim</a>
		<div class="button">
			<a href="giris.php" class="a">Giriş</a>
		</div>
	</nav>

	<section class="banner" id="banner_opacity">
		<code>
			<h1>Not Defterim,</h1>
			<h2>güvenle ve rahatlıkla notlarınızı alın.</h2>
		</code>
	</section>

	<section class="tek">
		<div class="cont icerik1">
			<img src="img/check.png" class="resim">
			<p>Geliştirmiş olduğumuz site sayesin kolaylıkla notlar alabilirsiniz.</p>
		</div>
		<div class="cont icerik2">
			<img src="img/internet.png" class="resim">
			<p>Geliştirmiş olduğumuz site sayesinden almış olduğunuz notlara, 
			internet erişimi olan her yerden ulaşabilirsiniz.</p>
		</div>
	</section>

	<!--<section class="çift">
	</section>-->

	<footer>
		<div class="icerik3">Bu site İsa Yılmaz tarafından yapılmıştır.</div>
		<div class="icerik3">©Not Defterim.</div>
		<div id="scrol"><a href="#ust" id="resim2" style="color: white;"><img src="img/prev.png" width="20px";></a></div>
	</footer>

<script>
//banner yazısının gelmesi
$(document).ready(function(){
    $(".banner").animate({opacity: '1'}, "slow");
});

//Srol uygulanması
$(document).ready(function(){
  $("#scrol").click(function(){
    $("html, body").animate({scrollTop: "0"}, 500);
  });
});


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  //Bannerdaki yazının opacity ayarlama
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("banner_opacity").style.opacity = "0";
	document.getElementById("banner_opacity").style.transition = "all 0.2s";
  }
  else {
	document.getElementById("banner_opacity").style.opacity = "1";
	document.getElementById("banner_opacity").style.transition = "all 0.2s";
  }
  
  //İçerikleri animasyonla gelişi
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    $(document).ready(function(){
		$(".icerik1").animate({
			left: '250px',
			opacity: '1'
		}, "slow");
	});
	$(document).ready(function(){
		$(".icerik2").animate({
			right: '250px',
			opacity: '1'
		}, "slow");
	});
  }
  else {/*
	$(document).ready(function(){
		$(".icerik1").animate({
			left: '50px'
		}, "slow");
	});
	
	$(document).ready(function(){
		$(".icerik2").animate({
			right: '50px'
		}, "slow");
	});*/
  }
  
  //Scrol görünürlüğü
  if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
    document.getElementById("scrol").style.opacity = "1";
	document.getElementById("scrol").style.transition = "all 0.2s";
	
	document.getElementById("resim2").style.opacity = "1";
	document.getElementById("resim2").style.transition = "all 0.2s";
  }
  else {
	document.getElementById("scrol").style.opacity = "0";
	document.getElementById("scrol").style.transition = "all 0.2s";
	
	document.getElementById("resim2").style.opacity = "0";
	document.getElementById("resim2").style.transition = "all 0.2s";
  }
  
  //Menü boxShadow ayarlama
  if (document.body.scrollTop > 620 || document.documentElement.scrollTop > 620) {
    document.getElementById("navbar").style.boxShadow = "0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24)";
  }
  else {
    document.getElementById("navbar").style.boxShadow = "0 1px 3px rgba(0,0,0,0), 0 1px 2px rgba(0,0,0,0)";
  }
}
</script>

<script>
//menü hover uygulaması
$(document).ready(function(){
  $(".a").hover(function(){
    $(this).css("background-color", "#333");
	$(this).css("color", "#E7E7E7");
    }, function(){
    $(this).css("background-color", "#E7E7E7");
	$(this).css("color", "#333");
  });
});
</script>

</body>
</html>