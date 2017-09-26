<?php
/* Template Name: Projects */
$brands = isset($_GET['brand']); # Check to see if brands are set

$location_obj = get_page_by_title( $_GET['property_location'], OBJECT, 'location');

$location_ID = @$location_obj->ID;

//////////////////////////
//                      //
// Meta query filters!  //
//                      //
//////////////////////////

if($_GET['property_type'] != null){
  $property_type_filter = array(
    'key' => 'project_type',
    'value' => @$_GET['property_type'],
    'compare' => 'LIKE' # Minor BUG: Equal doesn't work. So we use like since this is checkbox :/
  );
}else{
  $property_type_filter = [];
}

if($_GET['property_location'] != null){
  $location_filter = array(
    'key' => 'location',
    'value' => $location_ID, # should be the ID of locaton
    'compare' => '='
  );
}else{
  $location_filter = [];
}

if($_GET['brand'] != null){
  $brand_filter = array(
    'key' => 'brand',
    'value' => @$_GET['brand'],
    'compare' => 'LIKE'
  );
}else{
  $brand_filter = [];
}

if($_GET['price_range'] != null){
  $price_range = explode('-', $_GET['price_range']);
  $lower = $price_range[0];
  $higher = $price_range[1];

  $price_range_filter_min = array(
    'key' => 'min_price',
    'value' => array($lower, $higher),
    'compare' => 'BETWEEN',
    'type' => 'NUMERIC'
  );

  $price_range_filter_max = array(
    'key' => 'max_price',
    'value' => array($lower, $higher),
    'compare' => 'BETWEEN',
    'type' => 'NUMERIC'
  );

  if($higher == 'ABOVE'){
    $price_range_filter_max = array(
      'key' => 'max_price',
      'value' => 30000001, # HACK: Harharhar
      'compare' => '>=',
      'type' => 'NUMERIC'
    );
  }

  $price_range_filter = array(
    'relation' => 'OR',
    $price_range_filter_min,
    $price_range_filter_max,
  );

}else{
  $price_range_filter = [];
}

////////////////////////////
//                        //
// End meta query filters //
//                        //
////////////////////////////

get_header();
while(have_posts()): the_post();

include_once('function-pagination.php');
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


############# THIS IS THE BLOCK FOR GETTING THE PROJECT IDS ONLY
# Project ids array
$project_ids_array = [];

$args = array('post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title');
$args['meta_query'] = array( 'relation' => 'AND' );
if($brand_filter !== []){
  $args['meta_query'][] = $brand_filter;
}
if($location_filter !== []){
  $args['meta_query'][] = $location_filter;
}
if($property_type_filter !== []){
  $args['meta_query'][] = $property_type_filter;
}
$the_query = new WP_Query($args);
// var_dump($the_query); die();
if ( $the_query->have_posts() ) {  while ( $the_query->have_posts() ): $the_query->the_post();

  //
  // BLOCK FOR fetching specific IDS per price
  //
  $min_price = get_field('min_price');
  $max_price = get_field('max_price');

  if($lower != null && $higher != null){
    # FOr the lower value
    $min_between = (($lower >= $min_price) && ($lower <= $max_price));
    # Handler for string 'above'. Yeah poor coding shit, i know. But this is the best *for now*
    if($higher == 'ABOVE'){
      $max_between = ((999999999999 >= $min_price) && (30000001 <=  $max_price));
    }else{
      $max_between = (($higher >= $min_price) && ($higher <=  $max_price));
    }
    $show_projects = ($min_between || $max_between);
  }else{
    $show_projects = true;
  }

  if($show_projects){
    # Filter the locatoin  (-________________-)
    // if($location_w == get_field('location')->post_title){
    $ids_of_projects[] = get_the_ID();
    // }
  }

endwhile; wp_reset_postdata(); } else { }
############# / THIS IS THE BLOCK FOR GETTING THE PROJECT IDS ONLY

?>

<section class="projects">
  <article class="properties">
    <?php if($brands): ?>
      <aside>
        <ul>
          <li class="<?php echo ($_GET['brand'] == 'ayalaland premier') ? 'current' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=ayalaland+premier" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alp.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'alveo') ? 'current' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=alveo" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/alveo.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'avida') ? 'current' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=avida" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avida.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'amaia') ? 'current' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=amaia" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/amaia.jpg"></a></li>
          <li class="<?php echo ($_GET['brand'] == 'bellavita') ? 'current' : '' ;?>"><a href="<?php echo get_permalink(47) . "?brand=bellavita" ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bellavita.jpg"></a></li>
        </ul>
      </aside>
    <?php endif; ?>
    <div>
      <ul>

        <?php

        # Fuck wp devs!!!
        # https://stackoverflow.com/questions/23247671/wordpress-query-showing-post-in-empty-post-in-array
        if(empty($ids_of_projects)) {
          $ids_of_projects = ['issue#28099'];
        }

        $real_args = array('post_type' => 'project', 'posts_per_page' => 12,
        'paged' => $paged, 'order' => 'ASC',
        'orderby' => 'title', 'post__in' => $ids_of_projects);
        $real_query = new WP_Query($real_args);
        if ( $real_query->have_posts() ) {  while ( $real_query->have_posts() ): $real_query->the_post(); ?>

          <li>
            <a href="#projdesc<?php echo get_the_ID(); ?>" class="desc">
              <figure>
                <img src="<?php echo checkPhoto(get_the_post_thumbnail_url()); # Find in header.php. Checks for blank photo, gives placeholder photo if true ?>">
              </figure>
              <figcaption>
                <h4><?php the_title();?></h4>
                <span class="price">
                  <h6 style='    color: black;
    font: 13px/20px "robotoregular";'>Price range</h6>
                  <h5 style='    color: black;
    font: 13px/20px "robotoregular";font-weight:bold'><?php
                  if(!get_field('is_sold_out')){
                    echo formatPrice(get_field('min_price')) . ' - ' . formatPrice(get_field('max_price'));
                  }else{
                    echo 'SOLD OUT';
                  }
                  ?></h5>
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
                    <p>
                      <?php
                      if(!get_field('is_sold_out')){
                        echo formatPrice(get_field('min_price')) . ' - ' . formatPrice(get_field('max_price'));
                      }else{
                        echo 'SOLD OUT';
                      }
                      ?>
                    </p>
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
                  <!-- <li ><a href="<?php # the_field('external_link'); ?>">Virtual Tour</a></li> -->
                  <!-- TODO: !!! -->
                </ul>

              </article>
              <aside>
                <?php
                $project_title = get_the_title();
                $project_brand = str_replace(" ", "_", get_field("brand"));
                $virtual_tour = get_field('virtual_tour_link');
                ?>
                <ul>
                  <li><a href="<?php echo get_permalink(925) ?>?t=<?php echo $project_title; ?>&b=<?php echo $project_brand; ?>">Inquire Now</a></li>
                  <li><a href="<?php echo get_permalink(996) ?>?t=<?php echo $project_title; ?>&b=<?php echo $project_brand; ?>">Refer Now</a></li>
                  <?php if($virtual_tour != ""): ?>
                    <li><a href="<?php echo $virtual_tour; ?>" target="_blank">Virtual Tour</a></li>
                  <?php endif; ?>
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
          custom_pagination($real_query->max_num_pages,"",$paged);
        }
        ?>
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
