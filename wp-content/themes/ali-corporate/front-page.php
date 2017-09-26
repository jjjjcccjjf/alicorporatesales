<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ayala Land Residential Business Group</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/ayalafavicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">

	<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php #wp_head(); ?>

</head>

<body>
	<header>
		<a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayalaland-logo.jpg" width="240" height="80" alt="Ayala Land logo"></a>
	</header>
	<article class="welcome">
		<section>
			<h2>Welcome to</h2>
			<h1>Residential Business Group</h1>
			<p>Please Select Your Employer</p>
			<ul>
				<li><a href="<?php echo get_permalink(884); ?>">Ayala Group</a></li>
				<li><a href="<?php echo get_permalink(885); ?>">Corporate Partners</a></li>
				<li><a href="javascript:void(0)" id="_bank">Bank/Institutional Offers</a></li>
			</ul>
		</section>
		<div class="overlay"></div>
	</article>

	<video poster="<?php echo get_field('video_poster'); ?>" id="bgvid" controls loop playsinline autoplay>
		<source src="<?php echo get_field('video'); ?>" type="video/mp4">
		</video>


		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
		<script>
		$(document).ready(function() {
			$("#_bank").on('click', function(e){
				$.ajax({
					url:"<?php echo get_template_directory_uri(); ?>/ajax/set_session.php",
					type: "POST",
					data: {
						'employer_type': 'bank',
					},
					success:function(data){
						if(data == 1){
							window.location.href = '<?php echo get_permalink(936); ?>';
						}
					}, // success end
					error: function(e){
						console.log(e);
					}
				}); // ajax end
			});
		});
		</script>




		<?php #wp_footer(); ?>
		<script>
		var myVideo = document.getElementById('bgvid').addEventListener('ended',endVidHandler,false);
		// function endVidHandler(e)
		// {
		// 	alert("hey");
		// 	// $("#bgvid").get(0).play();
		// }

		// $(document).ready(function() {
		// 	$('video').on('ended', function () {
		// 		this.load();
		// 		this.play();
		// 	});
		// });
		</script>

	</body>
	</html>
