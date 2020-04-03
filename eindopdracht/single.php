<?php
get_header();
if (have_posts()) :
    while (have_posts()) :
      the_post();
      ?>
      <article class="post">
      <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>

      <p class="post-info"><?php the_time('F jS, Y');?> at <?php the_time('g:i a')?>
         | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author()?>
         </a> | Posted in
         <?php
          $categories = get_the_category();
          $seperator = ", ";
          $output = '';

          if($categories){

              foreach ($categories as $category){

                $output .= '<a href="'. get_category_link($category->term_id).'">'.$category->cat_name .'</a>'. $seperator;
              }
            echo trim($output, $seperator);
          }
          ?>
       </p>
       <?php the_post_thumbnail('banner');?>
      <?php the_content();?>
    </article>
      <?php
    endwhile;

    else :
        echo '<p>No content found</p>';
endif;



get_footer();
?>
