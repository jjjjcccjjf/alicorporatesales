<?php
/* Template Name: Home */

get_header();

# Get fields
$left_banner = get_field("left_banner");
$right_banner = get_field("right_banner");
$promos = get_field("promos");
$featured = get_field("featured_estates");
?>
<section class="featured">
 <article class="featleft">                
  <aside>
    <h2><?php echo $left_banner["header_text"]; ?></h2>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/acentives.png" width="" height="" alt="Acentives Logo">
  </aside>
  <div>
    <div class="overlay"></div>
    <img src="<?php echo $left_banner["background"]; ?>" width="783" height="520" alt="Employee Discount">
  </div>
</article>

<aside class="employee">
 <h3><?php echo $left_banner["header_text"]; ?></h3>
 <p><?php echo $left_banner["description"]; ?></p>
  <ul>
   <li><a href="inquire-now.html">Inquire Now</a></li>
   <li><a href="#">Terms &amp; Conditions</a></li>
 </ul>
 <button class="close1"></button>
</aside>

<article class="featright">
  <aside>
    <h2><?php echo $right_banner["header_text"]; ?></h2>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reap-logo.png" width="" height="" alt="Refer and Earn Program">
  </aside>
  <div>
   <div class="overlay"></div>
   <img src="<?php echo $right_banner["background"]; ?>" width="783" height="520" alt="Refer and Earn Program logo">
 </div>
</article>

<aside class="reap">
 <h3><?php echo $right_banner["header_text"]; ?></h3>
 <p><?php echo $right_banner["description"]; ?></p>
 <ul>
   <li><a href="refer-and-earn.html">Refer Now</a></li>
   <li><a href="refer-and-earn.html">View Details</a></li>
 </ul>
 <button class="close2"></button>
</aside>
</section>

<section class="projects-promos">
 <article class="estates">
  <h3>Featured Estates</h3>
  <div class="rslides" id="slider1">
  <?php foreach ($featured as $estate) { ?>
   <div class="carousel-cell">
    <a href="#projdesc_<?php echo $estate->ID; ?>" class="desc">
      <aside>
        <img src="<?php echo get_field("logo", $estate->ID); ?>" width="" height="" alt="Clover Leaf logo">
      </aside>
      <figure>
        <img src="<?php echo get_field("featured_photo", $estate->ID); ?>" width="" height="" alt="Clover Leaf">
      </figure>
    </a>
   </div>
  <?php
  } ?>
   

</div>
</article>
<aside class="promos">
 <h3>Promos &amp; Events</h3>
 <div class="rslides" id="slider2">
 <?php 
 foreach ($promos as $promo) { ?>
  <div class="carousel-cell">
    <a href="<?php echo $promo["image"]; ?>" class="gallery-item">
      <img src="<?php echo $promo["image"]; ?>" width="" height="" alt="Promo Poster">
    </a>
  </div>
 <?php
 }
 ?>
</div>
</aside>
<div class="other-links">
 <ul>
   <li><a href="inquire-now.html"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/inquire.png"></span><label>INQUIRE NOW</label></a></li>
   <li><a href="#download"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png"></span><label>DOWNLOAD FORMS</label></a></li>
   <li><a href="#purchase"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/purchase.png"></span><label>PROPERTY PURCHASE GUIDE</label></a></li>
   <li><a href="#rewards"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arc.png"></span><label>AYALA REWARDS CIRCLE</label></a></li>
   <li><a href="#bankpartners"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bank.png"></span><label>BANK PARTNERS</label></a></li>
 </ul>
</div>
</section>
<?php foreach ($featured as $estate) { ?>
<!-- Project Details -->
  <div id="projdesc_<?php echo $estate->ID; ?>" class="white-popup mfp-hide projdesc">
    <h3><?php echo get_the_title($estate->ID); ?></h3>
    <div>
      <figure>
        <img src="<?php echo get_the_post_thumbnail_url($estate->ID); ?>">
      </figure>
      <article>
        <ul>
          <li>
            <h6>Price:</h6>
            <p><?php echo formatPrice(get_field('min_price', $estate->ID)); ?>
             - <?php echo formatPrice(get_field('max_price', $estate->ID)); ?>
            </p>
          </li>
          <li>
            <h6>Location:</h6>
            <p><?php echo get_field('location', $estate->ID)->post_title; ?></p>
          </li>
          <li>
            <h6>Type:</h6>
            <p><?php echo implode(", ", get_field('project_type', $estate->ID)); ?></p>
          </li>
          <li>
            <h6>Size:</h6>
            <p><?php echo get_field('size', $estate->ID); ?></p>
          </li>
          <li><a href="<?php echo get_post_permalink($estate->ID); ?>">View Project</a></li>
        </ul>

      </article>
      <aside>
        <ul>
          <li><a href="inquire-now.html">Inquire Now</a></li>
          <li><a href="#">Refer Now</a></li>
          <li><a href="#">Download Forms</a></li>
        </ul>
      </aside>
    </div>
  </div>
  <!-- Project Details -->

  <?php } ?>
<?php 
get_footer(); 
$check_ayala = get_field("show_ayala_popup");
if($check_ayala)
  { ?>

<script>
  (function($) {
    $(window).load(function () {
      // retrieved this line of code from http://dimsemenov.com/plugins/magnific-popup/documentation.html#api
      $.magnificPopup.open({
        items: {
          src: 'images/home-reality-day.jpg'
        },
        type: 'image'

        // You may add options here, they're exactly the same as for $.fn.magnificPopup call
        // Note that some settings that rely on click event (like disableOn or midClick) will not work here
      }, 0);
    });
  })(jQuery);
</script>   

<?php
}
?>