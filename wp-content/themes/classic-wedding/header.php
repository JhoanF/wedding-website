<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Wedding
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>
<?php if ( get_theme_mod('classic_wedding_preloader',true) != "") { ?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<?php }?>
<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-wedding' ); ?></a>

<div class="row m-0">
  <div class="col-lg-2 col-md-12 bg-color">
    <div class="header">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="logo text-center py-5 py-md-3">
            <?php classic_wedding_the_custom_logo(); ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( get_theme_mod('classic_wedding_title_enable',true) != "") { ?>
              <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
              <?php } ?>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <?php if ( get_theme_mod('classic_wedding_tagline_enable',true) != "") { ?>
                <span class="site-description"><?php echo esc_html( $description ); ?></span>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-12 col-md-6 col-6">
          <div class="toggle-nav text-right text-md-right">
            <?php if(has_nav_menu('primary')){ ?>
              <button role="tab"><?php esc_html_e('MENU','classic-wedding'); ?></button>
            <?php }?>
          </div>
        </div>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-nav my-2" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-wedding' ); ?>">
            <?php if(has_nav_menu('primary')){
              wp_nav_menu( array( 
                'theme_location' => 'primary',
                'container_class' => 'main-menu clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) );
            } ?>
            <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-wedding'); ?></a>
          </nav>
        </div>
        <?php if ( get_theme_mod('classic_wedding_rsvp_link') != "" || get_theme_mod('classic_wedding_rsvp_text') != "") { ?>
        <div class="col-lg-12 col-md-6 col-6 p-0">
          <div class="rsvp_button my-lg-5 my-md-0">
            <a href="<?php echo esc_url(get_theme_mod( 'classic_wedding_rsvp_link','') ); ?>"><?php echo esc_html(get_theme_mod( 'classic_wedding_rsvp_text','') ); ?></a>
          </div>
        </div>
        <?php }?>
        <?php if ( get_theme_mod('classic_wedding_header_text') != "") { ?>
          <div class="col-12 p-0">
            <div class="rsvp_text py-5 py-md-3 text-center text-lg-left text-md-center">
              <hr>
              <p><?php echo esc_html(get_theme_mod( 'classic_wedding_header_text','') ); ?></p>
            </div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
  <div class="col-lg-10 col-md-12 pl-0 pr-0">
    <div class="scroll-box">