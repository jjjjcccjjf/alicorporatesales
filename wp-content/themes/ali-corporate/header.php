<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/
session_start();
/**
* Returns the price rounded up with English shortcut
* such as K, M, B
* @param  int     $n    unformatted price
* @return string        [description]
*/
function formatPrice($n)
{
	if ($n < 1000000) {
		// Anything less than a million
		$f = round(number_format($n / 1000, 3), 2);
		$f .= 'K';
	} else if ($n < 1000000000) {
		// Anything less than a billion
		$f = round(number_format($n / 1000000, 3), 2);
		$f .= 'M';
	} else {
		// At least a billion
		$f = round(number_format($n / 1000000000, 3), 2);
		$f .= 'B';
	}
	return 'P' . $f;
}

/**
* dynamic homepage based on type
* @param  [type] $type [description]
* @return [type]       [description]
*/
function getHomePage($type)
{

	switch ($type) {
		case 'Corporate partners':
		$url = get_permalink(891);
		break;
		case 'Ayala Group':
		$url = get_permalink(886);
		break;
		case 'BANK/INSTITUTIONAL OFFERS':
		$url = get_permalink(936);
		break;

		default:
		$url = site_url();
		break;
	}

	return $url;
}

$GLOBALS['price_range']['500K - 1M'] = "500000-1000000";
$GLOBALS['price_range']['1M - 2M'] = "1000000-2000000";
$GLOBALS['price_range']['2M - 3M'] = "2000000-3000000";
$GLOBALS['price_range']['3M - 4M'] = "3000000-4000000";
$GLOBALS['price_range']['4M - 5M'] = "4000000-5000000";
$GLOBALS['price_range']['5M - 6M'] = "5000000-6000000";
$GLOBALS['price_range']['6M - 7M'] = "6000000-7000000";
$GLOBALS['price_range']['7M - 8M'] = "7000000-8000000";
$GLOBALS['price_range']['8M - 9M'] = "8000000-9000000";
$GLOBALS['price_range']['9M - 10M'] = "9000000-10000000";
$GLOBALS['price_range']['10M - 12M'] = "10000000-12000000";
$GLOBALS['price_range']['12M - 14M'] = "12000000-14000000";
$GLOBALS['price_range']['14M - 16M'] = "14000000-16000000";
$GLOBALS['price_range']['16M - 18M'] = "16000000-18000000";
$GLOBALS['price_range']['18M - 20M'] = "18000000-20000000";
$GLOBALS['price_range']['20M - 25M'] = "20000000-25000000";
$GLOBALS['price_range']['25M - 30M'] = "25000000-30000000";
$GLOBALS['price_range']['30M - ABOVE'] = "30000000-ABOVE";

# BUG: Dunno what sets these two indeces but we're gonna remove them
unset($GLOBALS['price_range'][0]);
unset($GLOBALS['price_range'][1]);


/**
* Display the recurring side navigation
* @param  string    $type    [description]
* @return [type]             [description]
*/
function displaySideNav($type)
{
	switch ($type) {

		case 'BANK/INSTITUTIONAL OFFERS':
		case 'generic':
		echo
		'<ul>
		<li><a href="' . get_permalink(1824) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/inquire.png"></span><label>INQUIRE NOW</label></a></li>
		<li><a href="' . get_permalink(1812) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/download.png"></span><label>DOWNLOAD FORMS / GUIDE</label></a></li>
		<li><a href="' . get_permalink(1159) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/bond.png"></span><img src="' .  get_template_directory_uri() . '/assets/images/homestarterbond.png" class="bonds"></a></li>
		<li><a href="' . get_permalink(1358) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/arc.png"></span><label>AYALA REWARDS CIRCLE</label></a></li>
		<li><a href="' . get_permalink(1563) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/contact.png"></span><label>CONTACT US</label></a></li>
		</ul>
		';
		break;

		case 'Corporate partners':
		case 'Ayala Group':
		case 'home':
		echo
		'<ul>
		<li><a href="' . get_permalink(925) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/inquire.png"></span><label>INQUIRE NOW</label></a></li>
		<li><a href="' . get_permalink(1812) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/download.png"></span><label>DOWNLOAD FORMS / GUIDE</label></a></li>
		<li><a href="' . get_permalink(1816) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/country-club.png"></span><label>COUNTRY CLUB SHARE</label></a></li>
		<li><a href="' . get_permalink(1358) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/arc.png"></span><label>AYALA REWARDS CIRCLE</label></a></li>
		<li><a href="' . get_permalink(1167) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/bank.png"></span><label>BANK PARTNERS</label></a></li>
		<li><a href="' . get_permalink(1563) . '"><span><img src="' .  get_template_directory_uri() . '/assets/images/contact.png"></span><label>CONTACT US</label></a></li>
		</ul>
		';
		break;

		default:
		# code...
		break;
	}
}

/**
* returns placeholder image when no image is available
* @param  string    $image_url    link of image to check
* @return string                  link of placeholder image
*/
function checkPhoto($image_url)
{
	if ($image_url == '') {
		return get_template_directory_uri() . '/assets/images/temp.jpg';
	}else{
		return $image_url;
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ayala Land Residential Business Group</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/ayalafavicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/themes.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/flickity.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/easy-responsive-tabs.css " />
	<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<![endif]-->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
	<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	<script src="https://use.fontawesome.com/703572066a.js"></script>

	<?php wp_head(); ?>

	<!-- Start Google Recaptcha -->
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
	<script type="text/javascript">
      var onloadCallback = function() {
				var el = document.getElementById('recaptcha');
				var el1 = document.getElementById('recaptcha_new_seller');
				var el2 = document.getElementById('recaptcha_existing_seller');
				if(typeof(el) != 'undefined' && el != null)
				{
					grecaptcha.render('recaptcha', {
						'sitekey' : '6Lefui4UAAAAAIuDBYno9PcthEKobYFJ5xVtK0kf'
					});
				}

				if(typeof(el1) != 'undefined' && el1 != null)
				{
					grecaptcha.render('recaptcha_new_seller', {
						'sitekey' : '6Lefui4UAAAAAIuDBYno9PcthEKobYFJ5xVtK0kf',
						'callback' : enableNewSeller,
						'expired-callback' : disableNewSeller
					});
				}

				if(typeof(el2) != 'undefined' && el2 != null)
				{
					grecaptcha.render('recaptcha_existing_seller', {
						'sitekey' : '6Lefui4UAAAAAIuDBYno9PcthEKobYFJ5xVtK0kf',
						'callback' : enableExistingSeller,
						'expired-callback' : disableExistingSeller
					});
				}

      };
    </script>


	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105701106-1', 'auto');
  ga('send', 'pageview');

	</script>
</head>

<body>
	<header class="inside">
		<a href="<?php echo getHomePage($_SESSION['employer_type']); # Find this just above ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayalaland-logo.jpg" width="240" height="80" alt="Ayala Land logo"></a>
		<aside>
			<h1><?php echo @$_SESSION['employer_type'] ?></h1>
		</aside>
		<button class="searchmobile"></button>
	</header>
	<div class="search-main">
		<section class="property-finder">
			<form action="<?php echo get_permalink(47) ?>" method="get">
				<label>FIND WHAT YOU ARE LOOKING FOR</label>
				<ul>
					<li>
						<select name="property_type">
							<option value="">Project Type</option>
							<option value="">Any</option>
							<?php
							$field_key = "field_59914624f4ae2";
							$field = get_field_object($field_key);
							sort($field['choices']);
							if($field){
								foreach( $field['choices'] as $choice ) {  ?>
									<option <?php echo (@$_GET['property_type'] == $choice) ? 'selected' : '' ;?> ><?php echo $choice; ?></option>
								<?php  }
							}
							?>
						</select>
					</li>
					<li>
						<select name="price_range">
							<option value="">Price Range</option>
							<option value="">Any</option>
							<?php foreach($GLOBALS['price_range'] as $key => $val): ?>
								<option <?php echo (@$_GET['price_range'] == $val) ? 'selected' : '' ;?> value="<?php echo $val ?>"><?php echo $key ?></option>
							<?php endforeach; ?>
						</select>
					</li>
					<li>
						<select name="property_location">
							<option value="">Location</option>
							<option value="">Any</option>
							<?php
							$args = array('post_type' => 'location', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title');
							$the_query = new WP_Query($args);
							if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
								<option <?php echo (@$_GET['property_location'] == get_the_title()) ? 'selected' : '' ;?> ><?php the_title(); ?></option>
							<?php endwhile; wp_reset_postdata(); } else { /** no posts found **/ } ?>
						</select>
					</li>
					<li>
						<input type="submit" value=" ">
					</li>
				</ul>
			</form>
		</section>
		<aside>
			<label>Search</label>
			<ul>
				<form action="<?php echo get_permalink(1154) ?>" method="get">
					<li><input type="text" name="q" value="" placeholder="Search Keywords"></li>
					<li><input type="submit" value=""></li>
				</form>
			</ul>
		</aside>
	</div>
