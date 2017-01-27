<?php
/**
 *
 * Template Name: Home Banner Page
 *
**/

get_header(); ?>

      <style>
      .breadcrumb{
       display: none;
      }
      </style>


<div class="full-width-banner" style="background-image: url('<?php echo site_url(); ?>/wp-content/themes/child_theme/img/farmrisk-bg.jpg');">
  <div class="container">
    <div class="col-lg-12">
      <article>
        <div class="fullwidthheader"><img class="img-responsive" src="<?php echo site_url(); ?>/wp-content/themes/child_theme/img/farmrisk.png" </div>
      </article>
    </div>
  </div>
</div>
<br>
</div>


<div class="container">
  <div class="row" style="padding: 15px 0; border-bottom: 1px solid #dadada;">
    <div class="col-sm-12">
    <h1>Managing Risk in Agriculture</h1>
    <p style="font-size: 1.2em;">When it comes to farm management, one key to success is managing risk. That can be challenging in the current agricultural environment, but Managing Farm Risk is here to help. A partnership between Purdue University’s Center for Commercial Agriculture, the Indiana Soybean Alliance and the Indiana Corn Marketing Council, this site offers information and tools to help you better understand risk and develop an integrated approach to managing it. Case studies and worksheets give you hands-on practice with the tools and theories provided throughout the site.</p>
    <br><br>
    <h1>Featured Resources</h1><br>
    <?php
    // set the "paged" parameter (use 'page' if the query is on a static front page)
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    // the query

    $args = array(
        'posts_per_page' => '4',

);
$the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) :
    // the loop
    $counter = 0;
    while ($the_query->have_posts()) :
      $the_query->the_post();
      $colors = array("pappysborder", "fountainborder", "mackeyborder");
      if($counter == 0) :
    ?>
      <div id="firstfeature" class="col-lg-6 primarystory">
        <div id="primaryfeature">
          <a href="<?php echo the_permalink(); ?>" style="text-decoration:none;">
            <div class="grids primarygrid">
              <figure class="effect-ruby">
                <?php if(has_post_thumbnail()) : ?>
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive img-home-portfolio primarystorypic" alt="<?php the_title(); ?>">
                <?php else : ?>
                  <img class="img-responsive img-home-portfolio primarystorypic" alt="<?php the_title();?>" src="http://placehold.it/550x350?text=No Image">
                <?php endif; ?>
                <figcaption class="hidden-xs hidden-sm hidden-md" style="padding-top: 115px;"><p>Read More</p></figcaption>
              </figure>
            </div>
            <div class="primarytitle">
              <div class="primarybutton">
                <h2 class="topstory">Featured Resource</h2>
              </div>
              <div id="fitinprimary">
                <div class="secondarystorytitle" style="font-size: 1.5em;">
                  <?php the_title(); ?>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    <?php
      else : // if not primary story ?>

      <div id="secondaryfeatures">
        <div id="firstfeature" class="col-lg-6 col-md-12 secondary <?php echo $colors[$counter-1]; ?>">
          <a href="<?php the_permalink(); ?>" style="text-decoration:none;">
            <div class="col-sm-6 picpadding">
              <div class="grids">
                <figure class="effect-ruby">
                  <?php if(has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive img-home-portfolio primarystorypic" alt="<?php the_title(); ?>">
                  <?php else : ?>
                    <img class="img-responsive img-home-portfolio primarystorypic" alt="<?php the_title();?>" src="http://placehold.it/310x205?text=No Image">
                  <?php endif; ?>
                  <figcaption class="hidden-xs hidden-sm hidden-md"> <p>Read More</p> </figcaption>
                </figure>
              </div>
            </div>
            <div class="col-sm-6">
              <div id="fitin">
                <div class="secondarystorytitle centertext" style="font-size: 1.5em;"><?php the_title()?></div>
              </div>
            </div>
          </a>
        </div>
      </div>

    <?php
      endif;
      $counter++;
      endwhile;
      if(function_exists('wp_bootstrap_pagination')) {
        wp_bootstrap_pagination();
      }
      // clean up after the query and pagination
      wp_reset_postdata();
    ?>
    <?php else:  ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
    </div>
  </div> <!-- /.row -->
</div> <!-- /.container -->

<?php
//get_sidebar();
get_footer();



