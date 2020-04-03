<?php

/*
Template Name: Special Layout
*/

get_header();
if (have_posts()) :
    while (have_posts()) :
      the_post();
      ?>
      <article class="post page">
      <h1><?php the_title();?></h1>

      <div class="info-box">
          <h4>Disclaimer Title</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia.</p>
      </div>
      <?php the_content();?>
    </article>
      <?php
    endwhile;

    else :
        echo '<p>No content found</p>';
endif;



get_footer();
?>
