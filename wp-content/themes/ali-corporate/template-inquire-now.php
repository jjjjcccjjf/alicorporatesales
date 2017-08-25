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
        <!-- <li class="current"><a href="<?php #echo get_permalink(925); ?>">Am I qualified for Acentives Discount?</a></li> -->
        <!-- <li><a href="<?php #echo get_permalink(943); ?>">Send Inquiry</a></li> -->
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
              <label>Name of Project</label>
              <select name="project" required>
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
              <p>
                <input type="checkbox" value="1" id="agree_terms"> I agree to the
                <a href="<?php echo get_permalink(917) ?>">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>">Terms and Conditions</a>
              </p>
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
    if($('#agree_terms:checked').length > 0){


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
      alert('You must agree to the privacy policy and terms and conditions to proceed.');
    }

  });
});
</script>
