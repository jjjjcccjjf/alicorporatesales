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
    <?php
    $args = array('post_type' => 'bank', 'posts_per_page' => -1);
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post(); ?>
      <div class="carousel-cell">
        <a href="<?php echo get_permalink() ?>">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
      </a>
      </div>
    <?php endwhile; wp_reset_postdata(); } else { /** no posts found **/ } ?>
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
    <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
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
          <li><a href="<?php echo get_permalink(925) ?>">Inquire Now</a></li>
          <li><a href="<?php echo get_permalink(996) ?>">Refer Now</a></li>
          <li><a href="<?php echo get_permalink(1161) ?>">Download Forms</a></li>
        </ul>
      </aside>
    </div>
  </div>
  <!-- Project Details -->

<?php }
get_footer();
?>
