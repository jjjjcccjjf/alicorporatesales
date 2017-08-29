<?php
/* Template Name: Welcome - Dropdown */

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php the_title(); ?></title>
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

  <style media="screen">

  .select {
    position: relative!important;
    display: block;
    margin: 0 auto;
    width: 100%;
    max-width: 325px;
    color: #cccccc;
    vertical-align: middle;
    text-align: left;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
  }
  .select .placeholder {
    position: relative;
    display: block;
    background-color: #393d41;
    z-index: 1;
    padding: 1em;
    border-radius: 2px;
    cursor: pointer;
  }
  .select .placeholder:hover {
    background: #34383c;
  }
  .select .placeholder:after {
    position: absolute;
    right: 1em;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    font-family: 'FontAwesome';
    content: '\f078';
    z-index: 10;
  }
  .select.is-open .placeholder:after {
    content: '\f077';
  }
  .select.is-open ul {
    display: block;
  }
  .select.select--white .placeholder {
    background: #fff;
    color: #999;
  }
  .select.select--white .placeholder:hover {
    background: #fafafa;
  }
  .select ul {
    display: none;
    position: absolute;
    overflow: hidden;
    overflow-y: auto;
    width: 100%;
    background: #fff;
    border-radius: 2px;
    top: 100%;
    left: 0;
    list-style: none;
    margin: 5px 0 0 0;
    padding: 0;
    z-index: 100;
    max-height: 120px;
  }
  .select ul li {
    display: block;
    text-align: left;
    padding: 0.8em 1em 0.8em 1em;
    color: #999;
    cursor: pointer;
    width: 100%!important;
    float:left;
    clear: both;
  }
  .select ul li:hover {
    background: #4ebbf0;
    color: #fff;
  }
  </style>
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
    <div class="select">
      <span class="placeholder">Select your Employer</span>
      <ul>
        <?php
        $employers = get_field("employers_list");
        foreach ($employers as $emp) { ?>
          <li data-value="<?php echo $emp["employee_name"]; ?>"><?php echo $emp["employee_name"]; ?></li>
          <?php
        }
        ?>
      </ul>
      <input type="hidden" name="changeme"/>
    </div>
    <?php if($_GET['t'] == 1): ?>
    <!-- <p class="margbot10">
      <select name="employer" id="employer">
        <?php
    #    $employers = get_field("employers_list");
    #    foreach ($employers as $emp) { ?>
          <option value="<?php #echo $emp["employee_name"]; ?>"><?php #echo $emp["employee_name"]; ?></option>
          <?php
      #  }
        ?>
      </select>
    </p> -->
  <?php endif; ?>

    <p class="margbot10">
      <a href="<?php echo get_home_url(); ?>">
        <button>&laquo; Back</button>
      </a>
      <button id="continue_employer">Continue &raquo;</button>
    </p>
  </section>
  <div class="overlay"></div>
</article>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $("#continue_employer").on('click', function(e){
    $.ajax({
      url:"<?php echo get_template_directory_uri(); ?>/ajax/set_session.php",
      type: "POST",
      data: {
        'employer_type': '<?php echo get_field('page_type') ?>',
        // 'employer_name': $("#employer option:selected").text()
        'employer_name': $(".placeholder").text() // Value pag gamitin na yung official shit
      },
      success:function(data){
        if(data == 1){
          window.location.href = '<?php echo get_permalink($p_permalink[get_field("page_type")]); ?>';
        }
      }, // success end
      error: function(e){
        console.log(e);
      }
    }); // ajax end
  });
});

$('.select').on('click','.placeholder',function(){
  var parent = $(this).closest('.select');
  if ( ! parent.hasClass('is-open')){
    parent.addClass('is-open');
    $('.select.is-open').not(parent).removeClass('is-open');
  }else{
    parent.removeClass('is-open');
  }
}).on('click','ul>li',function(){
  var parent = $(this).closest('.select');
  parent.removeClass('is-open').find('.placeholder').text( $(this).text() );
  parent.find('input[type=hidden]').attr('value', $(this).attr('data-value') );
});


</script>
</body>

</html>
