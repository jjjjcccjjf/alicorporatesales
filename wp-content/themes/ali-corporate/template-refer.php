<?php
/* Template Name: Refer Now */
get_header();
$page_id = 884; # Page ID: Welcome - Ayala Group Employee
if(isset($_SESSION['employer_type']) && $_SESSION['employer_type'] == "Outside partners")
{
  $page_id = 885; # Page ID: Welcome - Outside Partners
}
$employers = get_field("employers_list", $page_id);
while(have_posts()): the_post();
?>
<section class="projects">
  <div class="pagewrapper2">
    <article class="forms">
      <section class="banner"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/spot-reap-inner.jpg"></section>
      <aside class="overview">
        <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/reap+rewards+orig.jpg"></figure>
        <figcaption>
          <?php the_content(); ?>
          <!-- <h4>Refer and Earn: Earn Extra Cash in Exchange of your Referrals</h4>
          <p>Refer family and friends to purchase their Ayala Land dream home and earn Php8,500 for every million of property purchase of successful referral</p> -->
        </figcaption>
      </aside>

      <form name="referral_form" id="referral_form">
        <div class="forms-main">
          <h3>Refer Now!</h3>
          <p>Fill out the form below:</p>
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
                <select name="referral_brand_1" id="referral_brand_1">
                  <option>Select Brand</option>
                  <option>Ayala Land Premier</option>
                  <option>Alveo Land</option>
                  <option>Avida Land</option>
                  <option>Amaia Land</option>
                  <option>Bellavita</option>
                </select>
                <select name="referral_project_1" id="referral_project_1">
                  <option>Select Project</option>
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
                <a id="add_refer_anchor">Refer another and win more</a>
                <input type="hidden" name="refer_count" id="refer_count" value="1">
                <input type="submit" name="submit_referral" id="submit_referral">
              </li>
            </ul>
          </div>
        </div>
      </form>

    </article>

    <div class="other-links">
      <?php displaySideNav('generic'); # Find this in header.php ?>
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
        html_new_refer += '<select name="referral_brand_'+count_next_referral+'" id="brand_'+count_next_referral+'">';
        html_new_refer += '<option>Select Brand</option>';
        html_new_refer += $("#referral_brand_"+count_current_referral).html();
        html_new_refer += '</select>';
        html_new_refer += '<select name="referral_project_'+count_next_referral+'" id="project_'+count_next_referral+'">';
        html_new_refer += '<option>Select Project</option>';
        html_new_refer += $("#referral_project_"+count_current_referral).html();
        html_new_refer += '</select>';
        html_new_refer += '</li><li>';
        html_new_refer += '<label>Budget</label>';
        html_new_refer += '<select name="referral_budget_'+count_next_referral+'" id="referral_budget_'+count_next_referral+'">';
        html_new_refer += '<option>Select Budget</option>';
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
  alert("Hello");
  $.ajax({
	    url:"<?php echo get_template_directory_uri(); ?>/ajax/sendReferral.php",
	    type: "POST",
	    data: $("#referral_form").serialize(),
	    success:function(data){
        alert(data);
	    },
	    error: function(e){
	      console.log(e);
	    }
	  });
  return false;
});

</script>
