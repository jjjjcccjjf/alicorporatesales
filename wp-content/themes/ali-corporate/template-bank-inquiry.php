<?php

/* Template Name: Bank Inquiry Page */

get_header();

$projects_query = new WP_Query(array("post_type" => "project", "posts_per_page" => "-1", 'order' => 'asc', 'orderby' => 'post_title'));

$projects = array();

if ( $projects_query->have_posts() ) {  while ( $projects_query->have_posts() ): $projects_query->the_post();

  $title = get_the_title();

  $brand = str_replace(" ", "_", get_field("brand"));

  $projects[$title] = $brand;

endwhile; wp_reset_postdata(); }

# / Block for brand & project name

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

                <li>Assign Me a Seller</li>

                <li class="active">With Existing Seller</li>

            </ul>

            <div class="resp-tabs-container hor_1" >

                <div>

                    <form method="post" id="form_new_seller">

                      <div class="forms-main">

                        <p style="color:white!important;">Get in touch with us. Please provide the details below and we will assign you a seller.</p>

                        <ul>

                          <li>

                            <label>Name</label>

                            <input type="text" name="name" required>

                          </li>

                          <li>

                            <label>Email Address</label>

                            <input type="email" name="email" required>

                          </li>

                          <li>

                            <label>Contact Number</label>

                            <input type="text" name="contact_num" required>

                          </li>

                          <li>

                            <label>Message</label>

                            <textarea name="message" required></textarea>

                          </li>

                          <li>

                            <label>Referral From</label>

                            <select name="referral_from" required  onchange="referral_from_change($(this).val());">

                              <option value="" >Select Bank</option>

                              <?php

                              $field = get_field("bank_referrals");

                              if($field){

                                foreach( $field as $bank ) { ?>

                                  <option><?php echo $bank["bank_name"]; ?></option>

                                  <?php

                                }

                              }

                              ?>

                              <!-- <option>None</option>

                              <option>Personal Inquiry</option>

                              <option>Other Banks</option> -->

                            </select>

                            <input type="text" name="other_referral" id="other_referral" style="display:none;" placeholder="Please specify other banks">

                          </li>

                          <li>

                            <label>Name of Bank Officer</label>

                            <input type="text" name="bank_officer" id="bank_officer" required>

                          </li>

                          <li>

                            <p style="width:100%;color:white!important;">

                              <input type="checkbox" value="1" id="agree_terms_new_seller" required> I agree to the

                              <a href="<?php echo get_permalink(917) ?>" class="linkstyle">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>" class="linkstyle">Terms and Conditions</a>
                            
                            </p>

                          </li>

                          <li>

                            <div class="g-recaptcha" id="recaptcha_new_seller"></div>

                          </li>

                          <li>

                            <input type="submit" id="new_seller_submit" disabled>

                          </li>

                        </ul>

                      </div>

                    </form>

                </div>

                <div>

                  <form method="post" id="form_existing_seller">

                    <div class="forms-main">

                      <p style="color:white!important;">Get in touch with us. Please provide details below and we will process your inquiry.</p>

                      <ul>

                        <li>

                          <label>Name</label>

                          <input type="text" name="name" required>

                        </li>

                        <li>

                          <label>Email Address</label>

                          <input type="email" name="email" required>

                        </li>

                        <li>

                          <label>Contact Number</label>

                          <input type="text" name="contact_num" required>

                        </li>

                        <li>

                          <label>Message</label>

                          <textarea name="message" required></textarea>

                        </li>

                        <li>

                          <label>Brand</label>

                          <select name="brand" required  onchange="set_projects($(this).val());">

                            <option value="" >Select Brand</option>

                            <?php

                            $field_key = "field_59914863f7455"; # Find this in ACF itself under `Screen Options`

                            $field = get_field_object($field_key);

                            if($field){

                              foreach( $field['choices'] as $choice ) { ?>

                                <option <?php echo isset($_GET['b']) && $_GET['b'] == $choice ? "selected" : ""; ?>><?php echo $choice; ?></option>

                                <?php

                              }

                            }

                            ?>

                          </select>

                          <select name="project_name" id="project_name" required>

                            <option>Select Project</option>

                            <?php foreach ($projects as $title => $brand) { ?>

                              <option class="option_project <?php echo $brand ?>" value="<?php echo $title; ?>"><?php echo $title; ?></option>

                            <?php } ?>

                          </select>

                        </li>

                        <li>

                          <label>Name of Seller</label>

                          <input type="text" name="seller_name" id="seller_name" required>

                        </li>

                        <li>

                          <p style="width:100%;color:white!important;" >

                            <input type="checkbox" value="1" id="agree_terms_existing_seller" required> I agree to the

                            <a href="<?php echo get_permalink(917) ?>" class="linkstyle">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>" class="linkstyle">Terms and Conditions</a>

                          </p>

                        </li>

                        <li>

                          <div class="g-recaptcha" id="recaptcha_existing_seller"></div>

                        </li>

                        <li>

                          <input type="submit" id="existing_seller_submit" disabled>

                        </li>

                      </ul>

                    </div>

                  </form>

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

get_footer(); ?>

<script>

var enableNewSeller = function ()

{
  $('#new_seller_submit').removeAttr("disabled");
};



var disableNewSeller = function ()

{

  $('#new_seller_submit').attr("disabled", "disabled");

};



var enableExistingSeller = function ()

{

  $('#existing_seller_submit').removeAttr("disabled");

};



var disableExistingSeller = function ()

{

  $('#existing_seller_submit').attr("disabled", "disabled");

};





$(document).ready(function() {

  $("#form_new_seller").on('submit', function(e){

    e.preventDefault();

    if($('#agree_terms_new_seller:checked').length > 0){

      // console.log(grecaptcha.getResponse());



      $.ajax({

        url:"<?php echo get_template_directory_uri(); ?>/ajax/bank_inquiry_new_seller.php",

        type: "POST",

        data: $(this).serialize(),

        success:function(data){

          if(data == 1){

            window.location.href = '<?php echo get_permalink(1141); ?>?type=bank_inquiry_new_seller';

          }

        }, // success end

        error: function(e){

          console.log(e);

        }

      }); // ajax end



    }else{

      alert('You must agree to the privacy policy and terms and conditions and pass recaptcha to proceed.');

    }



  });



  $("#form_existing_seller").on('submit', function(e){

    e.preventDefault();

    if($('#agree_terms_existing_seller:checked').length > 0){

      // console.log(grecaptcha.getResponse());



      $.ajax({

        url:"<?php echo get_template_directory_uri(); ?>/ajax/bank_inquiry_existing_seller.php",

        type: "POST",

        data: $(this).serialize(),

        success:function(data){

          if(data == 1){

            window.location.href = '<?php echo get_permalink(1141); ?>?type=bank_inquiry_existing_seller';

          }

        }, // success end

        error: function(e){

          console.log(e);

        }

      }); // ajax end



    }else{

      alert('You must agree to the privacy policy and terms and conditions and pass recaptcha to proceed.');

    }



  });

});





function set_projects(brand)

{

  if(brand != "")

  {

    brand = brand.replace(" ", "_");

    $('#project_name').val("");

    $(".option_project").attr("style", "display:none");

    $("."+brand).attr("style", "display:block");

  }

  else

  {

    $('#project_name').val("");

    $(".option_project").attr("style", "display:block");

  }

}



function referral_from_change(value)

{

  var style_value = "display:none";

  if(value != "" && value == "Other Banks")

  {

    style_value = "display:block";

  }

  $("#other_referral").val("");

  $("#other_referral").attr("style", style_value);

}

</script>

