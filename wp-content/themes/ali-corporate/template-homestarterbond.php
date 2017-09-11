<?php
/* Template Name: Homestarterbond Template */
get_header();
while(have_posts()): the_post();
?>
<style media="screen">

.accordion {
  margin: 2em;
  font-family: "ralewaysemibold";
}

.toggle {
  display: none;
}

.option {
  position: relative;
  margin-bottom: 1em;
}

.title,
.content {
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}

.title {
  background: #fff;
  padding: 1em;
  display: block;
  color: #7A7572;
  font-weight: bold;
}

.title:after, .title:before {
  content: '';
  position: absolute;
  right: 1.25em;
  top: 1.25em;
  width: 2px;
  height: 0.75em;
  background-color: #7A7572;
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}

.title:after {
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.content {
  max-height: 0;
  overflow: hidden;
  background-color: #fff;
}
.content p {
  margin: 0;
  padding: 0.5em 1em 1em;
  font-size: 0.9em;
  line-height: 1.5;
}

.toggle:checked + .title, .toggle:checked + .title + .content {
  box-shadow: 3px 3px 6px #ddd, -3px 3px 6px #ddd;
}
.toggle:checked + .title + .content {
  max-height: 2000px;
}
.toggle:checked + .title:before {
  -webkit-transform: rotate(90deg) !important;
  transform: rotate(90deg) !important;
}

</style>
<section class="projects">

  <article class="forms">
    <?php if(get_field('image_banner') != ''): ?>
      <section class="banner">
        <img src="<?php the_field('image_banner') ?>" alt="">
      </section>
    <?php endif; ?>

    <div class="page-content">
      <h3><?php the_title(); ?></h3>


      <div class="accordion">


        <?php $i = 1; if( have_rows('faq') ): while ( have_rows('faq') ) : the_row(); ?>
          <div class="option">
            <input type="checkbox" id="toggle<?php echo $i; ?>" class="toggle" />
            <label class="title" for="toggle<?php echo $i++; ?>"><?php echo get_sub_field('title'); ?>
            </label>
            <div class="content">
              <p><?php echo get_sub_field('body'); ?></p>
            </div>
          </div>
        <?php endwhile; else : endif; ?>




        </div>

      </article>

      <div class="other-links">
        <?php displaySideNav($_SESSION['employer_type']); # Find this in header.php ?>
      </div>
    </section>

    <?php
  endwhile;
  get_footer();
