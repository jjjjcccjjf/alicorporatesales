<?php
/* Template Name: Download Forms / Guide Template */
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
                <li>Download Forms</li>
                <li><?php echo get_field("first_tab_title"); ?></li>
                <li><?php echo get_field("second_tab_title"); ?></li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                  <ul class="downloadform">
                    <!--<li><label>Name/Description </label>
                        <span>Type/Size</span><span>&nbsp;</span></li>-->
                    <?php if( have_rows('download_list') ): while ( have_rows('download_list') ) : the_row(); ?>
                      <?php if(($_SESSION['employer_type'] == "Corporate partners" && get_sub_field('corporate_partners_only') == 1) || ($_SESSION['employer_type'] != "Corporate partners" && get_sub_field('corporate_partners_only') != 1)): ?>
                    <li>
                      <label>
                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                      <?php echo get_sub_field('file_name'); ?>
                        <span>File Type: <?php echo get_sub_field('file_type'); ?> | File Size: <?php echo get_sub_field('file_size'); ?></span>
                      </label>

                      <span class="dl"><a href="<?php echo get_sub_field('file_link'); ?>" target="_blank"> <i class="fa fa-download" aria-hidden="true"></i> Download </a></span>
                    </li>
                  <?php endif; ?>
                    <?php endwhile; else : endif; ?>
                  </ul>
                </div>
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
