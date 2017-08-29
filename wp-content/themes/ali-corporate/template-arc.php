<?php
/* Template Name: ARC Inquire */
get_header();
while(have_posts()): the_post();
?>
<section class="projects">

  <article class="forms">
    <h3 style="color:#000">ARC Inquire Now</h3>
    <!-- <aside class="tab">
    <ul>
    <li ><a href="<?php #echo get_permalink(925); ?>">Am I qualified for Acentives Discount?</a></li>
    <li class="current"><a href="<?php# echo get_permalink(943); ?>">Send Inquiry</a></li>
  </ul>
</aside> -->
<form id="_form">
  <div class="forms-main">
    <p>Fill out the form below:</p>
    <ul>
      <li>
        <label>Your Name</label>
        <input type="text" name="name" required>
      </li>
      <li>
        <label>Your Email</label>
        <input type="email" name="email" required>
      </li>
      <li>
        <label>Property Purchased</label>
        <select name="property_purchased" required>
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
        <label>Price</label>
        <input type="text" name="price">
      </li>
      <li>
        <p>
          <input type="checkbox" value="1" id="agree_terms"> I agree to the
          <a href="<?php echo get_permalink(917) ?>">Privacy Policy</a> and <a href="<?php echo get_permalink(907) ?>">Terms and Conditions</a>
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

    if($('#agree_terms:checked').length > 0){
      $.ajax({
        url:"<?php echo get_template_directory_uri(); ?>/ajax/arc_inquiry.php",
        type: "POST",
        data: $(this).serialize(),
        success:function(data){

          if(data == 1){
            window.location.href = '<?php echo get_permalink(1141); ?>?type=arc_inquiry';
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
