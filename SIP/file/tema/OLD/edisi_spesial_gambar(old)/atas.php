<!DOCTYPE HTML>
<html>
<head>
<title>
<?php
$namasekolah=mysql_query("SELECT * FROM sh_pengaturan WHERE id_pengaturan='8'");
$ns=mysql_fetch_array($namasekolah);
echo "$ns[isi_pengaturan]";
?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta http-equiv="Copyleft" content="Trimitra Sistem Informasi">
<meta name="author" content="Trimitra Sistem Informasi">
<meta name="language" content="Indonesia">
<meta name="robots" content="index, follow">
<meta name="description" content="Trimitra Sekolah">
<meta name="keywords" content="Trimitra Sistem Informasi">
 
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<link rel="stylesheet" type="text/css" href="file/tema/edisi_spesial_gambar/css/style.css">
	<script src="file/tema/edisi_spesial_gambar/js/highslide.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/gen_validatorv4.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/paging.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/jquery.tabs.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/jquery.min.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/jquery.easing.1.3.js"></script>
	<script src="file/tema/edisi_spesial_gambar/js/slides.min.jquery.js"></script>
	<!-- POP UP RELOAD WEBSITE -->
		<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('a.close').click(function(eve){
					
					eve.preventDefault();
					$(this).parents('div.popup-reload-website').fadeOut('slow');
				});
			});
		</script>
	<script>
		$(function(){
			$('#headline').slides({
				preload: true,
				preloadImage: 'file/tema/edisi_spesial_gambar/img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-275
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
	
	
    <script type="text/javascript"> 
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
	</script>
	
		<script type="text/javascript">
		hs.graphicsDir = 'file/tema/edisi_spesial_gambar/js/graphics/';
		hs.outlineType = 'rounded-white';
		</script>
	
	<link type="text/css" href="adminpanel/js/themes/base/ui.all.css" rel="stylesheet" />   
    <script type="text/javascript" src="adminpanel/js/ui/ui.core.js"></script>
    <script type="text/javascript" src="adminpanel/js/ui/ui.datepicker.js"></script>


    <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
      $(document).ready(function(){
        $("#tanggal1").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
    </script>


</head>