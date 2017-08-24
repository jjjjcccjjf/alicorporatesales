<?php
/* Template Name: Inquire now */
get_header();
while(have_posts()): the_post();
?>
<section class="projects">

  <article class="forms">
    <h3 style="color:#000">Inquire Now</h3>
    <aside class="tab">
      <ul>
        <li class="current"><a href="<?php echo get_permalink(925); ?>">Am I qualified for Acentives Discount?</a></li>
        <li><a href="<?php echo get_permalink(943); ?>">Send Inquiry</a></li>
      </ul>
    </aside>
    <form method="post" id="_form">

      <div class="forms-main">
        <p>Fill out the form below:</p>
        <ul>
          <li>
            <label>Your Employer</label>
            <select name="employer">

              <?php
              $employers = get_field("employers_list", 884);
              foreach ($employers as $emp) { ?>
                <option <?php echo ($emp["employee_name"] == $_SESSION['employer_name']) ? 'selected' :'' ; ?>>
                  <?php echo $emp["employee_name"]; ?></option>
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
              <select name="service_years">
                <option>Select years of service</option>
                <option>1 - 2 years</option>
                <option>3 - 4 years</option>
                <option>5 - 6 years</option>
              </select>
            </li>
            <li>
              <label>Name of Project/Unit</label>
              <select name="project">
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
            </li>
            <li>
              <label class="hide">&nbsp;</label>
              <ul>
                <li><label><input type="radio" name="employee_type" value="Regular Employee">Regular Employee</label></li>
                <li><label><input type="radio" name="employee_type" value="Contractual Employee">Contractual Employee</label></li>
              </ul>
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


  });
});
</script>
