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

<div class="full-width-banner" style="background-image: url('https://dev.ag.purdue.edu/soybeanstation/wp-content/uploads/2017/01/soybean.jpg');">
  <div class="container">
    <div class="col-lg-12">
      <div class="shader">
      <article>
        <div class="fullwidthheader">Managing Farm Risk</div>
        <p class="fullwidthparagraph">Spiffy Tagline You Created</p>
      </article>
      </div>
    </div>
  </div>
</div>
<br>
</div>

<!-- Start Feature Stories Section -->
<div class="section" style="padding-top:0;">
  <div class="container">
    <h1 class="featuredstorytitle">FEATURED STORIES</h1>
    <div class="row">
      <div id="firstfeature" class="col-lg-6 primarystory">
        <div id="primaryfeature">
          <a href="" style="text-decoration:none;">
            <div class="grids primarygrid">
              <figure class="effect-ruby">
                <img class="img-responsive img-home-portfolio primarystorypic" alt="Plant sciences innovation fund helps ag startups move technology to the marketplace" src="https://ag.purdue.edu/PublishingImages/primaryFeatureImages/bruceApplegate.png">
                <figcaption class="hidden-xs hidden-sm hidden-md" style="padding-top: 115px;"><p>Read More</p></figcaption>
              </figure>
            </div>
            <div class="primarytitle">
              <div class="primarybutton">
                <h2 class="topstory">Top Story</h2>
              </div>
              <div id="fitinprimary">
                <div class="secondarystorytitle" style="font-size: 1.5em;">
                  Plant sciences innovation fund helps ag startups move technology to the marketplace
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div id="secondaryfeatures">
        <div id="firstfeature" class="col-lg-6 col-md-12 secondary pappysborder">
          <a href="" style="text-decoration:none;">
            <div class="col-sm-6 picpadding">
              <div class="grids">
                <figure class="effect-ruby">
                  <img class="img-responsive centersmall secondaryimage" alt="Solar-powered crop dryer could help reduce post-harvest losses" src=" https://ag.purdue.edu/PublishingImages/secondaryFeatureImages/kleinAndReikoIleleji.png">
                  <figcaption class="hidden-xs hidden-sm hidden-md"> <p>Read More</p> </figcaption>
                </figure>
              </div>
            </div>
            <div class="col-sm-6">
              <div id="fitin">
                <div class="secondarystorytitle centertext" style="font-size: 1.5em;">Solar-powered crop dryer could help reduce post-harvest losses</div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</div>
<!-- End Feature Section -->


<hr><hr>

<div class="container">
  <div class="row" style="padding: 15px 0; border-bottom: 1px solid #dadada;">
    <div class="col-sm-12">
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
    while ($the_query->have_posts()) :
      $the_query->the_post();
    ?>


      <?php if(has_post_thumbnail()) : ?>
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( array( 250, 350), array( 'class' => 'img-responsive' ) ) ?>
          </a>
        </div>
      <?php else : ?>
        <div class="col-sm-4 text-center">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <img width="350" height="250" src="https://dev.ag.purdue.edu/soybeanstation/wp-content/uploads/2017/01/soybeandefault.jpg" class="img-responsive wp-post-image" alt="Default Image" >
          </a>
        </div>
      <?php endif; ?>
        <div class="col-sm-8">
          <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <?php if(get_the_date()) :?>
            <p class="meta-news"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></p>
          <?php endif; ?>
          <?php the_excerpt(); ?>
          <p><a href="<?php the_permalink(); ?>" class="btn btn-default btn-sm btn-block">Read More &raquo;</a></p>
        </div>
        <br style="clear:both;"><br style="clear:both;">
    <?php endwhile;
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



