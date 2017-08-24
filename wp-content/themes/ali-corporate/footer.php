<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.2
*/

?>

<footer>
	<article>
		<span>Our Residential Brands</span>
		<ul>
			<li><a href="<?php echo get_permalink(47) . "?brand=ayalaland+premier" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alp.jpg"></a></li>
			<li><a href="<?php echo get_permalink(47) . "?brand=alveo" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alveo.jpg"></a></li>
			<li><a href="<?php echo get_permalink(47) . "?brand=avida" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avida.jpg"></a></li>
			<li><a href="<?php echo get_permalink(47) . "?brand=amaia" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/amaia.jpg"></a></li>
			<li><a href="<?php echo get_permalink(47) . "?brand=bellavita" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bellavita.jpg"></a></li>
		</ul>
	</article>
	<aside>
		<ul>
			<li><a href="<?php the_permalink(899)?>">About Us</a></li>
			<li><a href="<?php the_permalink(907)?>">Terms &amp; Conditions</a></li>
			<li><a href="<?php the_permalink(917)?>">Privacy Policy</a></li>
		</ul>
	</aside>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/responsiveslides.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/flickity.pkgd.min.js"></script>

<script>
$('.gallery-item').magnificPopup({
	type: 'image',
	gallery:{
		enabled:true
	}
});
$('.desc').magnificPopup({
	type:'inline',
	midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});
</script>

<script>
$( ".featleft" ).click(function() {
	$( ".employee" ).slideToggle( "slow" );
});
$( ".featright" ).click(function() {
	$( ".reap" ).slideToggle( "slow" );
});
$( ".close1" ).click(function() {
  $( ".employee" ).slideToggle( "slow" );
});
$( ".close2" ).click(function() {
  $( ".reap" ).slideToggle( "slow" );
});
$( ".searchmobile" ).click(function() {
  $( ".search-main" ).slideToggle( "slow" );
});
</script>
<script>
$(function () {

	// Slideshow 1
	$("#slider1").responsiveSlides({
		auto: true,
		pager: true,
		nav: false,
		speed: 500,
		maxwidth: 1024,
		namespace: "centered-btns"
	});

	// Slideshow 2
	$("#slider2").responsiveSlides({
		auto: false,
		pager: true,
		nav: false,
		speed: 500,
		maxwidth: 800,
		namespace: "centered-btns"
	});



});
</script>

<?php wp_footer(); ?>
</body>

</html>
