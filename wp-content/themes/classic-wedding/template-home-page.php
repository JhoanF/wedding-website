<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Classic Wedding
 */

get_header(); ?>

<div id="content">
  <?php
    $hidcatslide = get_theme_mod('classic_wedding_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('classic_wedding_slidersection',false) ) { ?>
            <?php $queryvar = new WP_Query(
              array( 
                'cat' => esc_attr(get_theme_mod('classic_wedding_slidersection',true)),
                'posts_per_page' => esc_attr(get_theme_mod('classic_wedding_slider_count',true))
              )
            );
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php esc_url(the_post_thumbnail( 'full' )); ?>
                <div class="slider-box text-center">
                  <h3><?php the_title(); ?></h3>
                  <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                  <?php if ( get_theme_mod('classic_wedding_button_text',true) != "") { ?>
                    <div class="slide-btn mt-5">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('classic_wedding_button_text',__('Book Now','classic-wedding'))); ?></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php } ?>

  <section class="about_us text-center">
    <div class="container">
      <?php $classic_wedding_querymed = new WP_query('page_id='.esc_attr(get_theme_mod('classic_wedding_about_us',true)) ); ?>
        <?php while( $classic_wedding_querymed->have_posts() ) : $classic_wedding_querymed->the_post(); ?>
          <div class="img-inner-box mb-5">
            <?php if (has_post_thumbnail() ){ ?><?php the_post_thumbnail();?><?php } ?>
          </div>
          <div class="content-inner-box">
            <?php if ( get_theme_mod('classic_wedding_pgboxes_title') != "") { ?>
              <div class="title-img"></div>
              <span><?php echo esc_html(get_theme_mod('classic_wedding_pgboxes_title','')); ?></span>
            <?php } ?>
            <h3 class="py-5"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3> 
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 40, '...' ) );  ?></p>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      <div class="clear"></div>
    </div>
  </section>

  <section class="py-4">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  <section>
</div>

<?php get_footer(); ?>