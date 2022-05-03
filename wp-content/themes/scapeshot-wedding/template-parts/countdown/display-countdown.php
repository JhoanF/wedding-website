<?php
/**
 * The template for displaying featured content
 *
 * @package Scapeshot
 */

$scapeshot_enable_content = get_theme_mod( 'scapeshot_countdown_option', 'disabled' );

if ( ! scapeshot_check_section( $scapeshot_enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$scapeshot_background = '';

$scapeshot_image = get_theme_mod( 'scapeshot_countdown_bg_image' );

if ( $scapeshot_image ) {
	$scapeshot_thumb = $scapeshot_image;
} else {
	$scapeshot_thumb = trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/no-thumb-1920x1080.jpg';
}

$scapeshot_title       = get_theme_mod( 'scapeshot_countdown_title' , esc_html__( 'Countdown', 'scapeshot-wedding' ) );
$scapeshot_description = get_theme_mod( 'scapeshot_countdown_section_description' );

if( ! $scapeshot_title && ! $scapeshot_description ) {
 	$scapeshot_class = 'no-section-heading';
}
?>

<div id="countdown-section" class="section countdown-section content-center text-aligned-center section-with-background-image" style="background-image: url('<?php echo esc_url( $scapeshot_thumb ); ?>'">
	<div class="wrapper section-content-wrapper countdown-content-wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="hentry-inner">
				<div class="entry-container">
					<div class="content-wrapper">
					<?php if ( $scapeshot_title || $scapeshot_description ) : ?>
						<div class="section-heading-wrapper">
							<?php if ( $scapeshot_title ) : ?>
								<div class="section-title-wrapper">
									<h2 class="section-title"><?php echo esc_html( $scapeshot_title ); ?></h2>
								</div><!-- .page-title-wrapper -->
							<?php endif; ?>

							<?php if ( $scapeshot_description ) : ?>
								<div class="section-description">
									<?php echo wpautop( wp_kses_post( $scapeshot_description ) ); ?>
								</div><!-- .section-description-wrapper -->
							<?php endif; ?>
						</div><!-- .section-heading-wrapper -->
					<?php endif; ?>

						<div class="entry-content">
							<div id="clock"></div>
						</div><!-- .entry-content -->
					</div><!-- .content-wrapper -->
				</div><!-- .entry-container -->
			</div><!-- .hentry-inner -->
		</article><!-- #post-## -->
	</div><!-- .wrapper -->
</div><!-- .section -->
