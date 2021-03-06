<?php
/**
 * The Sidebar containing the main widget area.
 */
?>
<div id="sidebar" class="widget-area" role="complementary">
	<?php $active_post = $post; ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		<aside id="chapter-listing" class="widget">
			<h3 class="widget-title"><?php _e( 'Chapters', 'twentyeleven' ); ?></h3>
			<ul>
				<?php $chapters = learn_chapter_listing(); ?>
				<?php while ( $chapters->have_posts() ) : $chapters->the_post(); ?>
					<?php $is_active = ($active_post->ID == $chapters->post->ID) || ($active_post->post_parent == $chapters->post->ID); ?>
					<li <?php if ($is_active) { echo "class='active'"; } ?>>
						<a href="<?php the_permalink(); ?>">
							<?php if ( get_post_meta( $post->ID, "icon" ) ) : ?>
								<i class="icon-<?php echo get_post_meta( $post->ID, "icon", true ); ?>"></i>
							<?php endif; ?>
							<?php the_title(); ?>
						</a>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</aside>


	<?php endif; // end sidebar widget area ?>
</div><!-- #sidebar .widget-area -->
