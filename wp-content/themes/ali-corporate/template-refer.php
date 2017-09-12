<?php
/* Template Name: Refer Now */
get_header();
$page_id = 884; # Page ID: Welcome - Ayala Group Employee
if(isset($_SESSION['employer_type']) && $_SESSION['employer_type'] == "Corporate partners")
{
  $page_id = 885; # Page ID: Welcome - Corporate partners
}
$employers = get_field("employers_list", $page_id);
$banner = get_field("banner");
$aside_banner = get_field("aside_banner");
$projects_query = new WP_Query(array("post_type" => "project", "posts_per_page" => "-1"));
$projects = array();
if ( $projects_query->have_posts() ) {  while ( $projects_query->have_posts() ): $projects_query->the_post();
  $title = get_the_title();
  $brand = str_replace(" ", "_", get_field("brand"));
  $projects[$title] = $brand;
endwhile; wp_reset_postdata(); }

while(have_posts()): the_post();
?>
<section class="projects">
  <div class="pagewrapper2">
    <article class="forms">
      <!-- <section class="banner"> -->
        <!-- <img src="<?php# echo $banner; ?>"> -->
      <!-- </section> -->
      <aside class="overview">
        <figure>
          <img src="<?php echo $aside_banner; ?>">
        </figure>
        <figcaption>
          <?php the_content(); ?>
          <!-- <h4>Refer and Earn: Earn Extra Cash in Exchange of your Referrals</h4>
          <p>Refer family and friends to purchase their Ayala Land dream home and earn Php8,500 for every million of property purchase of successful referral</p> -->
        </figcaption>
      </aside>

      <form name="referral_form" id="referral_form">
        <div class="forms-main">
          <h3>Refer Now!</h3>
          <p>Get in touch with us. Fill up the form to submit your inquiry.</p>
          <ul>
            <li>
              <label>Your Employer</label>
              <select name="employer" id="employer">
                <option value="">List of Employer</option>
                <?php
                foreach ($employers as $emp) { ?>
                  <option <?php echo isset($_SESSION['employer_name']) && $_SESSION['employer_name'] == $emp["employee_name"] ? "selected" : ""; ?>><?php echo $emp["employee_name"]; ?></option>
                  <?php
                }
                ?>
              </select>
            </li>
            <li>
              <label>Your Name</label>
              <input type="text" name="name" id="name">
            </li>
            <li>
              <label>Contact Number</label>
              <input type="text" name="contact" id="contact">
            </li>
            <li>
              <label>Email Address</label>
              <input type="email" name="email" id="email">
            </li>
          </ul>
          <div class="referralsec">
            <ul class="refer" id="div_refer_1">
              <li><h4>Referral 1</h4></li>
              <li>
                <label>Name of Referral <span>(Interested Buyer)</span></label>
                <input type="text" name="referral_name_1">
              </li>
              <li>
                <label>Preferred Project</label>
                <select name="referral_brand_1" id="referral_brand_1" onchange="set_projects($(this).val(), 'referral_project_1');">
                  <option value="">Select Brand</option>
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
                <select name="referral_project_1" id="referral_project_1">
                  <option>Select Project</option>
                  <?php
                  ksort($projects);
                  foreach ($projects as $title => $brand) { ?>
                    <option class="option_project <?php echo $brand ?>" value="<?php echo $title; ?>" ><?php echo $title; ?></option>
                  <?php } ?>
                </select>

              </li>
              <li>
                <label>Budget</label>
                <select name="referral_budget_1" id="referral_budget_1">
                  <option>Select Budget</option>
                  <option>1M - 2M</option>
                  <option>3M - 4M</option>
                  <option>5M - 6M</option>
                  <option>7M - 8M</option>
                  <option>10M - ABOVE</option>
                </select>

              </li>
              <li>
                <label>Contact Number</label>
                <input type="text" name="referral_contact_1" id="referral_contact_1">
              </li>
              <li>
                <label>Email Address</label>
                <input type="email" name="referral_email_1" id="referral_email_1">
              </li>
            </ul>

            <ul>
              <li>
                <p class="p100">
                  <input type="checkbox" value="1" id="agree_terms"> I agree to the
                  <a href="<?php echo get_permalink(917) ?>" class="linkstyle">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>" class="linkstyle">Terms and Conditions</a>
                </p>
              </li>
              <li>
                <div class="g-recaptcha" id="recaptcha"></div>
              </li>
              <li>
                <a id="add_refer_anchor">Refer another and Earn more</a>
                <input type="hidden" name="refer_count" id="refer_count" value="1">
                <input type="submit" name="submit_referral" id="submit_referral">
              </li>
            </ul>
          </div>
        </div>
      </form>

    </article>

    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </div>
</section>
<?php
endwhile;
get_footer();
?>
<script>
$("#add_refer_anchor").click(function(e) {
  e.preventDefault();
  var count_current_referral = $("#refer_count").val();
  var count_next_referral = parseInt(count_current_referral) + 1;
  var html_new_refer = '<ul class="refer" id="div_refer_'+count_next_referral+'">';
  html_new_refer += '<li><h4>Referral '+count_next_referral+'</h4></li><li>';
  html_new_refer += '<label>Name of Referral <span>(Interested Buyer)</span></label>';
  html_new_refer += '<input type="text" name="referral_name_'+count_next_referral+'">';
  html_new_refer += '</li><li>';
  html_new_refer += '<label>Preferred Project</label>';
  html_new_refer += '<select name="referral_brand_'+count_next_referral+'" id="referral_brand_'+count_next_referral+'" onchange="set_projects($(this).val(), \'referral_project_'+count_next_referral+'\');">';
  html_new_refer += $("#referral_brand_"+count_current_referral).html();
  html_new_refer += '</select>';
  html_new_refer += '<select name="referral_project_'+count_next_referral+'" id="referral_project_'+count_next_referral+'">';
  html_new_refer += $("#referral_project_"+count_current_referral).html();
  html_new_refer += '</select>';
  html_new_refer += '</li><li>';
  html_new_refer += '<label>Budget</label>';
  html_new_refer += '<select name="referral_budget_'+count_next_referral+'" id="referral_budget_'+count_next_referral+'">';
  html_new_refer += $("#referral_budget_"+count_current_referral).html();
  html_new_refer += '</select>';
  html_new_refer += '</li><li>';
  html_new_refer += '<label>Contact Number</label>';
  html_new_refer += '<input type="text" name="referral_contact_'+count_next_referral+'" id="referral_contact_'+count_next_referral+'">';
  html_new_refer += '</li><li>';
  html_new_refer += '<label>Email Address</label>';
  html_new_refer += '<input type="email" name="referral_email_'+count_next_referral+'" id="referral_email_'+count_next_referral+'">';
  html_new_refer += '</li></ul>';

  $("#refer_count").val(count_next_referral);
  $("#div_refer_"+count_current_referral).after(html_new_refer);
  return false;
});

$("#submit_referral").click(function(e) {

  e.preventDefault();

  if($('#agree_terms:checked').length > 0 && grecaptcha.getResponse() != ""){
    $.ajax({
      url:"<?php echo get_template_directory_uri(); ?>/ajax/sendReferral.php",
      type: "POST",
      data: $("#referral_form").serialize(),
      success:function(data){
        if(data == "true")
        {
          window.location.href = '<?php echo get_permalink(1141); ?>?type=referral';
        }
      },
      error: function(e){
        console.log(e);
      }
    });
  }else{
    alert('You must agree to the privacy policy and terms and conditions to proceed.');
  }

  return false;
});

function set_projects(brand, project_id)
{
  if(brand != "")
  {
    brand = brand.replace(" ", "_");
    $('#'+project_id).val("");
    $(".option_project").attr("style", "display:none");
    $("."+brand).attr("style", "display:block");
  }
  else
  {
    $('#'+project_id).val("");
    $(".option_project").attr("style", "display:block");
  }
}
$(document).ready(function() {
  // This is for setting the default brand
  set_projects('<?php echo @$_GET['b'] ?>', 'referral_project_1');
  // And default project
  setTimeout(function () {
    $("select[name=referral_project_1] option[value='"+ '<?php echo @$_GET['t']; ?>' +"']").prop('selected', true);
  }, 400);
});
</script>
