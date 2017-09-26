<?php
/* Template Name: Two Tab Page */
get_header();
while(have_posts()): the_post();
?>

<section class="projects">

  <article class="forms">
    <?php if(get_field('image_banner') != ''): ?>
      <section class="banner">
        <img src="<?php the_field('image_banner') ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="page-content">
      <h3><?php the_title(); ?></h3>
      <div id="terms">
            <ul class="resp-tabs-list hor_1">
                <li><?php echo get_field("first_tab_title"); ?></li>
                <li><?php echo get_field("second_tab_title"); ?></li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                    <?php echo get_field('first_tab_content'); ?>
                </div>
                <div>
                    <?php echo get_field('second_tab_content'); ?>
                </div>
                
            </div>
        </div>
    </article>

    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </section>

<?php
endwhile;
get_footer();
