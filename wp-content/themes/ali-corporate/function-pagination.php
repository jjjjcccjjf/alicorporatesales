<?php
############################# function-pagination.php ##########################
/**

* @link: http://callmenick.com/post/custom-wordpress-loop-with-pagination

* Create this as a separate file function-pagination.php

*/

function custom_pagination($numpages = '', $pagerange = '', $paged='', $custom_page_link='', $is_single='') {

  # VAN - 082517 - Make page url dynamic
  $permalink = "";
  if($custom_page_link == "")
  {
    $permalink = get_permalink(47) . "%_%";
  }
  else
  {
    $permalink = $custom_page_link . "%_%";
  }

  $format = "page/%#%";
  // if($is_single != "" && $is_single == "1")
  // {
  //   $format .= "?";
  // }




  if (empty($pagerange)) {

    $pagerange = 2;

  }



  /**

  * This first part of our function is a fallback

  * for custom pagination inside a regular loop that

  * uses the global $paged and global $wp_query variables.

  *

  * It's good because we can now override default pagination

  * in our theme, and use this function in default quries

  * and custom queries.

  */

  global $paged;

  if (empty($paged)) {

    $paged = 1;

  }

  if ($numpages == '') {

    global $wp_query;

    $numpages = $wp_query->max_num_pages;

    if(!$numpages) {

      $numpages = 1;

    }

  }



  /**

  * We construct the pagination arguments to enter into our paginate_links

  * function.

  */

  $pagination_args = array(

    // 'base'            => get_pagenum_link(4) . '%_%',
    'base'            => $permalink,

    'format'          => $format,

    'total'           => $numpages,

    'current'         => $paged,

    'show_all'        => False,

    'end_size'        => 1,

    'mid_size'        => $pagerange,

    'prev_next'       => True,

    'prev_text'       => __('&laquo; PREV'),

    'next_text'       => __('NEXT &raquo;'),

    'type'            => 'plain',

    'add_args'        => false,

    'add_fragment'    => ''

  );



  $paginate_links = paginate_links($pagination_args);



  if ($paginate_links) {

    echo "<li>";

    echo $paginate_links;

    echo "</li>";

  }



}

?>
