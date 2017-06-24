<div class="home-about">


<div class="hero" style="background-image:url(<?php the_field('hero_background'); ?>)">
	<div class="cell">
		<div class="copy">
		<h1>Internet Health Report</h1>

		<?php //the_content(); ?>
		<p>An open source initiative to document and explain what’s happening to the health of the Internet combining research from multiple sources.</p>
		

		<a class="read-more" href="">Read More</a>
		</div>
	</div>

</div>




<?php
if( have_rows('feature_pages') ): ?>

<div class="feature-pages">

	<?php
	$i=1;
		# code...
    while ( have_rows('feature_pages') ) : the_row();    
    ?>

		<div class="feature<?php echo ($i%2 == 0 ? ' right' : '');?>">

			<?php
			$image = get_sub_field('image');
			$size = 'medium';

			if( !empty($image) ) {

				echo wp_get_attachment_image( $image, $size );
			}
			?>

			<div class="copy">

				<h2><?php the_sub_field('title'); ?></h2>
				<p><?php the_sub_field('excerpt'); ?> test</p>
			</div>
			<a class="read-more button" href="<?php the_sub_field('url'); ?>"<?php echo (get_sub_field('new_window') ? ' target="_blank"' : ''); ?>><?php the_sub_field('cta_text'); ?></a>

		</div>

	<?php
	$i++;
    endwhile;
	?>

</div>

<?php
endif;
?>





<?php
$post_objects = get_field('feature_posts');

if( $post_objects ): ?>

<div class="featured-blog-posts">

	<h3 class="bar">featured blog posts</h3>

    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        
        <article class="entry-container">

	        <?php the_post_thumbnail('thumbnail'); ?>

	        <div class="entry-copy">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php

					
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
					

					$time_string = sprintf( $time_string,
						get_the_date( DATE_W3C ),
						get_the_date()
					);


					$categories = get_the_category();
					$separator = ' ';
					$category_list = '';
					if ( ! empty( $categories ) ) {
					    foreach( $categories as $category ) {
					        //$category_list .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					        $category_list .= '<span>' . esc_html( $category->name ) . '</span>' . $separator;
					    }
					}

				?>

				<div class="entry-meta">
					<span class="cat"><?php echo trim( $category_list, $separator ); ?></span> <span class="pipe">|</span> 
					<span class="byline"><span class="author vcard"><?php echo get_the_author(); ?></span></span> <span class="pipe">|</span> 
					<?php echo $time_string; 
					//<time class="entry-date published" datetime="2008-10-17T04:33:51+00:00">October 17, 2008</time>?>
				</div>
			</div>

		</article>

    <?php endforeach; ?>

    <a class="read-more" href="/blog/">View all blog posts</a>
    
    </div>


    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;
?>








</div>

