<?php
/* Template Name: Inquire now */
get_header();

# Block for brand & project name
$page_id = 884; # Page ID: Welcome - Ayala Group Employee
if(isset($_SESSION['employer_type']) && $_SESSION['employer_type'] == "Outside partners")
{
  $page_id = 885; # Page ID: Welcome - Outside Partners
}
$employers = get_field("employers_list", $page_id);
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
    <h3 style="color:#000">Inquire Now</h3>
    <aside class="tab">
      <ul>
        <!-- <li class="current"><a href="<?php #echo get_permalink(925); ?>">Am I qualified for Acentives Discount?</a></li> -->
        <!-- <li><a href="<?php #echo get_permalink(943); ?>">Send Inquiry</a></li> -->
      </ul>
    </aside>
    <form method="post" id="_form">

      <div class="forms-main">
        <p>Get in touch with us. Fill up the form to send us your comments and feedback.</p>
        <ul>
          <li>
            <label>Your Employer</label>
            <select name="employer">

              <?php
              if($_SESSION['employer_type'] == 'Ayala Group Employee'){
                $employers = get_field("employers_list", 884);
              }else if($_SESSION['employer_type'] == 'Outside partners'){
                $employers = get_field("employers_list", 885);
              }else{
                $employers = array_merge(get_field("employers_list", 884), get_field("employers_list", 885));
              }

              $emp_formatted = [];
              foreach ($employers as $emp) {
                $emp_formatted[] = $emp['employee_name'];
              }
              sort($emp_formatted);

              foreach ($emp_formatted as $emp) { ?>
                <option <?php echo ($emp == $_SESSION['employer_name']) ? 'selected' :'' ; ?>>
                  <?php echo $emp ?></option>
                  <?php
                }
                ?>

              </select>
            </li>
            <li>
              <label>Your Name</label>
              <input type="text" name="name" required>
            </li>
            <li>
              <label>Your Email</label>
              <input type="email" name="email" required>
            </li>
            <li>
              <label>Years of Service</label>
              <select name="service_years" required>
                <option disabled >Select years of service</option>
                <option>1 - 2 years</option>
                <option>3 - 4 years</option>
                <option>5 - 6 years</option>
              </select>
            </li>
            <li>
              <label>Brand</label>
              <select name="brand" required  onchange="set_projects($(this).val());">
                <option disabled >Select Brand</option>
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
              <select name="project_name" id="project_name">
                <option>Select Project</option>
                <?php foreach ($projects as $title => $brand) { ?>
                  <option class="option_project <?php echo $brand ?>" value="<?php echo $title; ?>" <?php echo isset($_GET['t']) && $_GET['t'] == $title ? "selected" : ""; ?>><?php echo $title; ?></option>
                <?php } ?>
              </select>
            </li>
            <li>
              <label>Your Message</label>
              <textarea name="message"></textarea>
            </li>
            <!-- <li>
              <label class="hide">&nbsp;</label>
              <ul>
                <li><label><input type="radio" name="employee_type" value="Regular Employee">Regular Employee</label></li>
                <li><label><input type="radio" name="employee_type" value="Contractual Employee">Contractual Employee</label></li>
              </ul>
            </li> -->
            <li>
              <p style="width:100%;">
                <input type="checkbox" value="1" id="agree_terms"> I agree to the
                <a href="<?php echo get_permalink(917) ?>" class="linkstyle">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>" class="linkstyle">Terms and Conditions</a>
              </p>
            </li>
            <li>
              <div class="g-recaptcha" id="recaptcha"></div>
            </li>

            <li>
              <input type="submit">
            </li>
          </form>
        </ul>
      </div>
    </article>

    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </section>
  <?php
endwhile;
get_footer();
?>

<script>
$(document).ready(function() {
  $("#_form").on('submit', function(e){
    e.preventDefault();
    if($('#agree_terms:checked').length > 0 && grecaptcha.getResponse() != ""){
      // console.log(grecaptcha.getResponse());

      $.ajax({
        url:"<?php echo get_template_directory_uri(); ?>/ajax/acentives_discount_inquiry.php",
        type: "POST",
        data: $(this).serialize(),
        success:function(data){

          if(data == 1){
            window.location.href = '<?php echo get_permalink(1141); ?>?type=acentives_discount_inquiry';
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
</script>
