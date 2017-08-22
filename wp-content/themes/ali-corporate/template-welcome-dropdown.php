<?php
/* Template Name: Welcome - Dropdown */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ayala Land Residential Business Group</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">



    <!--[if lt IE 9]>
        <script src="js/html5.js"></script>
        <![endif]-->
        <!-- css3-mediaqueries.js for IE less than 9 -->
        <!--[if lt IE 9]>
        <script src="js/css3-mediaqueries.js"></script>
        <![endif]--> 
        <?php wp_head(); ?>


    </head>

    <?php 

    # SET Permalinks according to Page Type
    $p_permalink = array("ayala"=>"886", "outside"=>"891");
    ?>
    <body>
     <header>
         <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ayalaland-logo.jpg" width="240" height="80" alt="Ayala Land logo"></a>
     </header>
     <article class="welcome">
        <section>
            <?php
            while(have_posts()): the_post();
            the_content();
            endwhile;
            ?>
            <p>Please Select Your Employer</p>
            <p class="margbot10">
                <select name="employer" id="employer">
                    <option value="">List of Employer</option>
                    <?php 
                    $employers = get_field("employers_list");
                    foreach ($employers as $emp) { ?>
                    <option value="<?php echo $emp["employee_name"]; ?>"><?php echo $emp["employee_name"]; ?></option>
                    <?php
                } 
                ?>
            </select>
        </p>
        <p class="margbot10">
            <a href="<?php echo get_home_url(); ?>">
                <button>&laquo; Back</button>
            </a>
            <a href="<?php echo get_permalink($p_permalink[get_field("page_type")]); ?>">
                <button id="continue_employer">Continue &raquo;</button>
            </a> 
        </p>
    </section>
    <div class="overlay"></div>
</article>


<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script>
$("#continue_employer").click(function(e){
    
});
</script> -->
</body>

</html>
