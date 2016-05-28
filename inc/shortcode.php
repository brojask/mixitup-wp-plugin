<?php


function get_classes(){
	global $post;
	$terms = wp_get_post_terms( $post->ID, array( 'gallery-categories' ) );
	$classes = '';
	foreach ( $terms as $term ) :
		$classes .= 'mixitup-cat-'.$term->slug.' ';
	endforeach;
	return trim($classes);
}	

function mixitup_html_generation($atts) {
    $a = shortcode_atts(array(
        'foo' => 'something',
        'bar' => 'something else',
            ), $atts);

    $options = array(
        'post_type' => 'gallery',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => '-1',
        /*'color' => $color,
        'fabric' => $fabric,
        'category_name' => $category,*/
    );
    $gallery = new WP_Query( $options );
     

	$args = array (
	    'taxonomy' => 'gallery-categories', //your custom post type
	    'orderby' => 'name',
	    'order' => 'ASC',
	    'hide_empty' => 0 //shows empty categories
	);
	$categories = get_categories( $args );
    ob_start();
?>
<?php 
	if ( $gallery->have_posts() ):
?>

<div class="filter" data-filter="all">Show All</div>
<?php foreach ($categories as $cat) : ?>
	<div class="filter" data-filter=".mixitup-cat-<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></div>	
<?php endforeach; ?>



<div id="Container">
	<?php while ( $gallery->have_posts() ) : $gallery->the_post(); ?>
		<?php  ?>
		<div class="mix <?php echo get_classes(); ?>" data-myorder="2">
			<?php the_title(); ?>
			
		</div>
</div>
<?php endwhile;
            wp_reset_postdata(); ?>
<?php else: ?>
	<h3>Sorry! No items found. Please add some in your Gallery.</h3>
<?php endif; ?>
<?php
    $myvariable = ob_get_clean();
    return $myvariable;
}

add_shortcode('mixitup', 'mixitup_html_generation');
