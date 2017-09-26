<?php
get_header();
while(have_posts()): the_post();

include_once('function-pagination.php');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

?>
<section class="projects">
  <article class="properties">
    <aside class="aside-estates">
      <span>
      <img src="<?php echo get_field("page_logo"); ?>">
      </span>
      <?php the_content(); ?>

    </aside>
    <div>
      <ul>

        <?php
        $args = array('post_type' => 'project', 'posts_per_page' => 12, 'paged' => $paged, 'orderby' => 'title', 'order' => 'ASC');
        $args['meta_query'] = array( 'relation' => 'AND', array('key' => 'estate', 'value' => '"' . get_the_ID() . '"', 'compare' => 'LIKE'));
        $the_query = new WP_Query($args);
        if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post();
          $virtual_tour = get_field('virtual_tour_link');

          ?>

          <li>
            <a href="#projdesc<?php echo get_the_ID(); ?>" class="desc">
              <figure>
                <img src="<?php echo checkPhoto(get_the_post_thumbnail_url()); # Find in header.php. Checks for blank photo, gives placeholder photo if true ?>">
              </figure>
              <figcaption>
                <h4><?php the_title();?></h4>
                <span class="price">
                  <h6>Price range</h6>
                  <h5><?php
                  if(!get_field('is_sold_out')){
                    echo formatPrice(get_field('min_price')) . ' - ' . formatPrice(get_field('max_price'));
                  }else{
                    echo 'SOLD OUT';
                  } ?>
                  </h5>
                  </span>
                  <span class="type-location">
                    <p><?php echo implode(", ", get_field('project_type')); ?></p>
                    <p><?php echo get_field('location')->post_title; ?></p>
                  </span>
                </figcaption>
              </a>
            </li>

            <!-- Project Details -->
            <div id="projdesc<?php echo get_the_ID(); ?>" class="white-popup mfp-hide projdesc">
              <h3><?php the_title();?></h3>
              <div>
                <figure>
                  <img src="<?php echo checkPhoto(get_field('details_photo')); # Find in header.php. Checks for blank photo, gives placeholder photo if true?>">
                </figure>
                <article>
                  <ul>
                    <li>
                      <h6>Price:</h6>
                      <p><?php
                      if(!get_field('is_sold_out')){
                        echo formatPrice(get_field('min_price')) . ' - ' . formatPrice(get_field('max_price'));
                      }else{
                        echo 'SOLD OUT';
                      }
                       ?></p>
                      </li>
                      <li>
                        <h6>Location:</h6>
                        <p><?php echo get_field('location')->post_title; ?></p>
                      </li>
                      <li>
                        <h6>Type:</h6>
                        <p><?php echo implode(", ", get_field('project_type')); ?></p>
                      </li>
                      <li>
                        <h6>Size:</h6>
                        <p><?php the_field('size'); ?></p>
                      </li>
                      <?php if($virtual_tour != ""): ?>
                        <li><a href="<?php echo $virtual_tour; ?>" target="_blank">Virtual Tour</a></li>
                      <?php endif; ?>
                    </ul>

                  </article>
                  <aside>
                    <?php
                    $project_title = get_the_title();
                    $project_brand = str_replace(" ", "_", get_field("brand"));
                    ?>
                    <ul>
                      <li><a href="<?php echo get_permalink(925) ?>?t=<?php echo $project_title; ?>&b=<?php echo $project_brand; ?>">Inquire Now</a></li>
                      <li><a href="<?php echo get_permalink(996) ?>?t=<?php echo $project_title; ?>&b=<?php echo $project_brand; ?>">Refer Now</a></li>
                    </ul>
                  </aside>
                </div>
              </div>
              <!-- Project Details -->
            <?php endwhile; wp_reset_postdata(); } else { ?>

              <li>
                <div style="height:400px; width: 300px; color:#000;">
                  No active projects at this time.
                </div>
              </li>

            <?php } ?>
          </ul>
        </div>
        <section>
          <ul>
            <?php
            if (function_exists(custom_pagination)) {
              custom_pagination($the_query->max_num_pages,"",$paged, get_permalink(), "1");
            }
            ?>
            <?php // pagination($the_query->max_num_pages); ?>
          </ul>
        </section>
      </article>

      <div class="other-links">
        <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
      </div>
    </section>

    <?php
  endwhile;
  get_footer();
