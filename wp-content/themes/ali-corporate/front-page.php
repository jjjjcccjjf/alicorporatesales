<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ayala Land Residential Business Group</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">

	<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

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
				<li><a href="<?php echo get_permalink(884); ?>">Ayala Group Employee</a></li>
				<li><a href="<?php echo get_permalink(885); ?>">Outside Partners</a></li>
				<li><a href="bank-institutional-offers.html">Bank/Institutional Offers</a></li>
			</ul>
		</section>
		<div class="overlay"></div>
	</article>
	<?php wp_footer(); ?>
	
</body>
</html>
