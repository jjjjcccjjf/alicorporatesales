<?php
/* Template Name: Send inquiry */
get_header();
while(have_posts()): the_post();
?>
<section class="projects">

  <article class="forms">
    <h3 style="color:#000">Inquire Now</h3>
    <aside class="tab">
      <ul>
        <li ><a href="<?php echo get_permalink(925); ?>">Am I qualified for Acentives Discount?</a></li>
        <li class="current"><a href="<?php echo get_permalink(943); ?>">Send Inquiry</a></li>
      </ul>
    </aside>
    <div class="forms-main">
      <p>Fill out the form below:</p>
      <ul>
        <li>
          <label>Your Employer</label>
          <form id="_form">
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
              <label>Your Telephone at Work</label>
              <input type="text" name="phone">
            </li>
            <li>
              <label>Your Mobile</label>
              <input type="text" name="mobile">
            </li>
            <li>
              <label>Your Message</label>
              <textarea name="message"></textarea>

              <p>
                <input type="hidden" value="0" name="send_me_more">
                <input type="checkbox" value="1" name="send_me_more"> Please send me more information about the Employee Discount
              </p>
            </li>

            <li>

              <input type="submit">
            </form>
          </li>
        </ul>
      </div>

    </article>

    <div class="other-links">
      <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
    </div>
  </section>
  <?php
endwhile;
get_footer();?>


<script>
$(document).ready(function() {
  $("#_form").on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url:"<?php echo get_template_directory_uri(); ?>/ajax/send_inquiry.php",
      type: "POST",
      data: $(this).serialize(),
      success:function(data){

        if(data == 1){
          window.location.href = '<?php echo get_permalink(1141); ?>?type=send_inquiry';
        }
      }, // success end
      error: function(e){
        console.log(e);
      }
    }); // ajax end


  });
});
</script>
