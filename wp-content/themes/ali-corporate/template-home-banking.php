<?php
/* Template Name: Home - Banking */

get_header();

# Get fields
$banner = get_field("banner");
$partners = get_field("bank_partners");
$promos = get_field("promos");
$featured = get_field("featured_estates");
?>

<section class="featured-offers">
  <article>
    <div>
      <h2><?php echo $banner["header_text"]; ?></h2>
      <?php echo $banner["description"]; ?>
    </div>
    <img src="<?php echo $banner["background"]; ?>" width="" height="" alt="Offer Image">
    <div class="overlay"></div>
  </article>
  <aside>
    <img src="<?php echo $banner["logo"]; ?>" width="" height="" alt="bpi-logo">
  </aside>
</section>

<section class="bank-partners">
 <div class="carousel" data-flickity='{ "setGallerySize": true, "contain": true, "pageDots": false }'>
    <?php foreach ($partners as $bank) { ?>
    <div class="carousel-cell"><img src="<?php echo $bank["logo"]; ?>"></div>
    <?php } ?>
  </div>
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
      <?php } ?>
    </div>
  </article>
  <aside class="promos">
    <h3>Promos &amp; Events</h3>
      <div class="rslides" id="slider2">
        <?php foreach ($promos as $promo) { ?>
          <div class="carousel-cell">
            <a href="<?php echo $promo["image"]; ?>" class="gallery-item">
              <img src="<?php echo $promo["image"]; ?>" width="" height="" alt="Promo Poster">
            </a>
          </div>
        <?php } ?>
      </div>
  </aside>
  <div class="other-links banklist">
    <ul>
      <li><a href="inquire-now.html"><span><img src="images/inquire.png"></span><label>INQUIRE NOW</label></a></li>
      <li><a href="#purchase"><span><img src="images/purchase.png"></span><label>PROPERTY PURCHASE GUIDE</label></a></li>
      <li><a href="#homestarter"><span><img src="images/bond.png"></span><img src="images/homestarterbond.png" class="bonds"></a></li>
      <li><a href="#rewards"><span><img src="images/arc.png"></span><label>AYALA REWARDS CIRCLE</label></a></li>
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

<?php } 
get_footer();
?>
