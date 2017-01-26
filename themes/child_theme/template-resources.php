<?php
/**
 *
 * Template Name: Resources Page
 *
**/

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php get_template_part( 'content', 'page' ); ?>
      </div>
    </div>
  </div>
<?php endwhile; // end of the loop. ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <?php

            // we need to get the last three posts that are tagged as news that are published
            $args = array('post_status' => 'publish');
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ) :
              // grab the featured image from the post
              $thumb_id = get_post_thumbnail_id($recent["ID"]);
              $featured_thumb_URL = wp_get_attachment_url($thumb_id);
              $custom_fields = get_post_custom($recent["ID"]);
              $author = $custom_fields["Author"];
            ?>
            <div class="col-md-4">
                <h3><a href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo $recent["post_title"]; ?></a></h3>
                <?php if(!empty($author[0])) : ?>
                  <span class="text-muted">By <?php echo $author[0]; ?></span>
                <?php endif; ?>
                <p><?php echo get_the_excerpt($recent["ID"])?></p>
            </div>
          <?php endforeach; ?>

</div></div></div></div></div></div></div></div>

<?php
//get_sidebar();
get_footer();


