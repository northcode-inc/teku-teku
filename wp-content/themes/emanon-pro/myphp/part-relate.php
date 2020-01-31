<?php
/**
 * Related post
 * @package WordPress
 * @subpackage Emanon_Pro
 * @since Emanon Pro 1.0
 */
$related_post_pc_style = get_theme_mod( 'related_post_pc_style', 'display_two_row' );
$related_post_sp_style = get_theme_mod( 'related_post_sp_style', 'display_related_list' );
$emanon_related_post_title = get_theme_mod( 'emanon_related_post_title', __( 'Related Post', 'emanon' ) );
$related_post_max = get_theme_mod( 'related_post_max', 4 );
$display_related_post_date = get_theme_mod( 'display_related_post_date', true );
$taxonomy_slug = 'parts'; // タクソノミーのスラッグを指定
$post_type_slug = 'voice'; // 投稿タイプのスラッグを指定
$post_terms = wp_get_object_terms( $post->ID, $taxonomy_slug ); // タクソノミーの指定
if ( $post_terms && !is_wp_error( $post_terms ) ) { // 値があるときに作動
	$terms_slug = array(); // 配列のセット
	foreach ( $post_terms as $value ) { // 配列の作成
		$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
	}
}
$args = array(
	'post_type' => $post_type_slug, // 投稿タイプを指定
	'posts_per_page' => 4, // 表示件数を指定
	'orderby' => 'rand', // ランダムに投稿を取得
	'post__not_in' => array( $post->ID ), // 現在の投稿を除外
	'tax_query' => array( // タクソノミーパラメーターを使用
		array(
			'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
			'field' => 'slug', // スラッグに一致するタームを返す
			'terms' => $terms_slug // タームの配列を指定
		)
	)
);
$query = new WP_Query( $args );
?>
<?php if( is_mobile() ) :?>
<?php if ( $related_post_sp_style == 'display_related_list' ): ?>
<!--related post two row-->
<aside>
	<div class="related wow fadeIn" data-wow-delay="0.2s">
		<?php if ( $emanon_related_post_title ): ?>
		<h3><?php echo esc_html( $emanon_related_post_title ); ?></h3>
		<?php endif; ?>
		<?php if( $query -> have_posts() ): ?>
		<ul class="related-list-two">
			<?php while ( $query -> have_posts()) : $query -> the_post(); ?>
			<li class="related-col6">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="related-thumbnail-square">
					<a class="image-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'square-thumbnail' ); ?>
					</a>
				</div>
				<?php else: ?>
				<div class="related-thumbnail-square">
					<a class="image-link" href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/lib/images/no-img/square-no-img.png" alt="no image" width="80" height="80" />
					</a>
				</div>
				<?php endif; ?>
				<div class="related-date">
					<?php if( $display_related_post_date ): ?>
					<span class="post-meta small"><?php echo esc_html( get_the_date() ); ?></span>
					<?php endif; ?>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if( mb_strlen( $post -> post_title ) > 27 ) { $title= mb_substr( $post -> post_title, 0, 27 ) ; echo $title. '...' ;} else { echo $post -> post_title; }?>
						</a>
					</h4>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
		<?php else:?>
		<p>
			<?php _e( 'Not Related Post', 'emanon' ); ?>
		</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</aside>
<!--end related post two row-->
<?php elseif ( $related_post_sp_style == 'display_related_card' ): ?>
<!--related post-->
<aside>
	<div class="related wow fadeIn" data-wow-delay="0.2s">
		<?php if ( $emanon_related_post_title ): ?>
		<h3><?php echo esc_html( $emanon_related_post_title ); ?></h3>
		<?php endif; ?>
		<?php if( $query -> have_posts() ): ?>
		<ul class="related-list-three">
			<?php while ( $query -> have_posts()) : $query -> the_post(); ?>
			<li class="related-col4">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="related-thumbnail-small">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'small-thumbnail' ); ?>
					</a>
				</div>
				<?php else: ?>
				<div class="related-thumbnail-small">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/lib/images/no-img/small-no-img.png" alt="no image" />
					</a>
				</div>
				<?php endif; ?>
				<div class="related-date">
					<?php if( $display_related_post_date ): ?>
					<span class="post-meta small"><?php echo esc_html( get_the_date() ); ?></span>
					<?php endif; ?>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if( mb_strlen( $post -> post_title ) > 27 ) { $title = mb_substr( $post -> post_title, 0, 27 ) ; echo $title. '...' ;} else { echo $post -> post_title; }?>
						</a>
					</h4>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
		<?php else:?>
		<p>
			<?php _e( 'Not Related Post', 'emanon' ); ?>
		</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</aside>
<!--end related post-->
<?php endif; ?>
<?php else:?>
<?php if ( $related_post_pc_style == 'display_two_row' ): ?>
<!--related post two row-->
<aside>
	<div class="related wow fadeIn" data-wow-delay="0.2s">
		<?php if ( $emanon_related_post_title ): ?>
		<h3><?php echo esc_html( $emanon_related_post_title ); ?></h3>
		<?php endif; ?>
		<?php if( $query -> have_posts() ): ?>
		<ul class="related-list-two">
			<?php while ( $query -> have_posts()) : $query -> the_post(); ?>
			<li class="related-col6">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="related-thumbnail-square">
					<a class="image-link" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'square-thumbnail' ); ?>
					</a>
				</div>
				<?php else: ?>
				<div class="related-thumbnail-square">
					<a class="image-link" href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/lib/images/no-img/square-no-img.png" alt="no image" width="80" height="80" />
					</a>
				</div>
				<?php endif; ?>
				<div class="related-date">
					<?php if( $display_related_post_date ): ?>
					<span class="post-meta small"><?php echo esc_html( get_the_date() ); ?></span>
					<?php endif; ?>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if( mb_strlen( $post-> post_title ) > 27 ) { $title = mb_substr( $post -> post_title, 0, 27 ) ; echo $title. '...' ;} else { echo $post -> post_title; }?>
						</a>
					</h4>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
		<?php else:?>
		<p>
			<?php _e( 'Not Related Post', 'emanon' ); ?>
		</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</aside>
<!--end related post two row-->
<?php elseif ( $related_post_pc_style == 'display_three_row' ): ?>
<!--related post-->
<aside>
	<div class="related wow fadeIn" data-wow-delay="0.2s">
		<?php if ( $emanon_related_post_title ): ?>
		<h3><?php echo esc_html( $emanon_related_post_title ); ?></h3>
		<?php endif; ?>
		<?php if( $query -> have_posts() ): ?>
		<ul class="related-list-three">
			<?php while ( $query -> have_posts()) : $query -> the_post(); ?>
			<li class="related-col4">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="related-thumbnail-small">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'small-thumbnail' ); ?>
					</a>
				</div>
				<?php else: ?>
				<div class="related-thumbnail-small">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/lib/images/no-img/small-no-img.png" alt="no image" />
					</a>
				</div>
				<?php endif; ?>
				<div class="related-date">
					<?php if( $display_related_post_date ): ?>
					<span class="post-meta small"><?php echo esc_html( get_the_date() ); ?></span>
					<?php endif; ?>
					<h4>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php if( mb_strlen( $post -> post_title ) > 27 ) { $title = mb_substr( $post -> post_title, 0, 27 ) ; echo $title. '...' ;} else { echo $post -> post_title; }?>
						</a>
					</h4>
				</div>
			</li>
			<?php endwhile;?>
		</ul>
		<?php else:?>
		<p>
			<?php _e( 'Not Related Post', 'emanon' ); ?>
		</p>
		<?php endif; wp_reset_postdata(); ?>
	</div>
</aside>
<!--end related post-->
<?php endif; ?>
<?php endif; ?>
