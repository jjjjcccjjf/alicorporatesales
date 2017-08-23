<?php
/* Template Name: Search results */

get_header();
while(have_posts()): the_post();
?>

<section class="projects">

  <article class="forms">
    <?php if(get_field('details_photo') != ''): ?>
      <section class="banner">
        <img src="<?php the_field('details_photo') ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="forms-main">
      <h3><?php the_title() ?><br>
        <sub>&nbsp;&nbsp;&nbsp;from <?php echo get_field('brand');  ?></sub>
      </h3>
      <ul>
        <li>Location: <?php echo get_field('location')->post_title;  ?></li>
        <li>Size: <?php echo get_field('size');  ?></li>
        <li>Price: <?php echo formatPrice(get_field('min_price')); ?>
          - <?php echo formatPrice(get_field('max_price')); ?></li>
          <li>Project type: <?php echo implode(", ", get_field('project_type')); ?></li>

        </ul>
        <ul>

          <li><a href="<?php echo get_permalink(925) ?>">Inquire Now</a></li>
          <li><a href="<?php echo get_permalink(996) ?>">Refer Now</a></li>
          <li><a href="<?php echo get_permalink(1161) ?>">Download Forms</a></li>
        </ul>
      </article>

      <div class="other-links">
        <?php displaySideNav('generic'); # Find this in header.php ?>
      </div>
    </section>

    <?php
  endwhile;
  get_footer();
