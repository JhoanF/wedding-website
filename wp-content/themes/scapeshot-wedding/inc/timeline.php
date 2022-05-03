<?php
/**
 * The template for displaying the Timeline
 *
 * @package ScapeShot_Wedding
 */


if ( ! function_exists( 'scapeshot_timeline_display' ) ) :
	/**
	* Add Timeline
	*
	* @uses action hook scapeshot_before_content.
	*
	* @since ScapeShot Wedding 1.0
	*/
	function scapeshot_timeline_display() {
		$enable = get_theme_mod( 'scapeshot_timeline_option', 'disabled' );

		if ( scapeshot_check_section( $enable ) ) {
			$scapeshot_title       = get_theme_mod( 'scapeshot_timeline_section_title' , esc_html__( 'Timeline', 'scapeshot-wedding' ) );
			$scapeshot_description = get_theme_mod( 'scapeshot_timeline_section_description' );
			?>
			<div id="timeline-section" class="section page">
				<div class="wrapper">
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

					<div class="section-content-wrapper">
						<?php scapeshot_page_timeline(); ?>
					</div><!-- .section-content-wrapper -->
				</div><!-- .wrapper -->
			</div><!-- #timeline-section -->
			<?php
		}
	}
endif;

if ( ! function_exists( 'scapeshot_page_timeline' ) ) :
	/**
	 * Display Page Timeline
	 *
	 * @since ScapeShot Wedding 1.0
	 */
	function scapeshot_page_timeline() {
		global $post;

		$quantity     = get_theme_mod( 'scapeshot_timeline_number', 4 );
		$no_of_post   = 0; // for number of posts
		$post_list    = array();// list of valid post/page ids
		$output       = '';

		//Get valid number of posts
		for( $i = 1; $i <= $quantity; $i++ ){
			$post_id = get_theme_mod( 'scapeshot_timeline_page_' . $i ) ;

			if ( $post_id ) {
				$post_list = array_merge( $post_list, array( $post_id ) );

				$no_of_post++;
			}
		}

		$args = array(
			'post_type' => 'page',
			'post__in'  => $post_list,
			'orderby'   => 'post__in',
		);
			
		if ( 0 == $no_of_post ) {
			return;
		}

		$args['posts_per_page'] = $no_of_post;

		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) {
			$loop->the_post();

			$title_attribute = the_title_attribute( 'echo=0' );
			?>
			<article id="timeline-post-<?php echo esc_attr( get_the_id() ); ?>" class="post hentry post">
				<div class="hentry-inner">
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">

						<?php  if ( has_post_thumbnail() ) : 
							the_post_thumbnail( 'scapeshot-featured' );
						else : ?>
							<img class="wp-post-image" src="<?php echo esc_url( trailingslashit( get_stylesheet_directory_uri() ) ); ?>assets/images/no-thumb-666x444.jpg" >
						<?php
						endif;
						?>
						</a>
					</div>

					<div class="entry-container">
						<header class="entry-header">
							<?php
							$event_date = get_theme_mod( 'scapeshot_events_timeline_date_' . absint( $loop->current_post + 1 ) );
						
							if ( $event_date ) :
								$event_date = date('d F, Y', strtotime( $event_date ) );
								?>
								<div class="entry-meta">
									<span class="posted-on">
										<a href="<?php the_permalink(); ?>">
											<time class="entry-date"><?php echo esc_html( $event_date ); ?></time>
										</a>
									</span>
								</div>
							<?php endif; ?>

							<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">','</a></h2>' ); ?>
						</header>

						<div class="entry-summary"><?php the_excerpt(); ?></div><!-- .entry-summary -->
					</div><!-- .entry-container -->
				</div><!-- .hentry-inner -->
			</article><!-- .timeline-post -->
			<?php
			} //endwhile

		wp_reset_postdata();

		return $output;
	}
endif; // scapeshot_page_timeline
