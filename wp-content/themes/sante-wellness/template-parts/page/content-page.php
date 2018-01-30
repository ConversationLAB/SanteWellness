<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

if ( is_page() && $post->post_parent ) {
	$is_parent = true;
	// $postID = wp_get_post_parent_id( $post_ID );

	$ancestors = get_post_ancestors($post->ID);
	$root = count($ancestors)-1;
	$postID = $ancestors[$root];	

} else {
	$is_parent = false;
	$postID = get_the_ID();
}

$subMenu = wp_list_pages(array(
	'child_of' => $postID, 
	'title_li' => '',
	'echo' => 0,
	'walker' => new sub_menu_walker() 
));
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('page-single / clearfix row'); ?>>

	<?php if($subMenu) : ?>
	<div class="col-lg-3 col-md-3 / visible-md-block visible-lg-block">
		<ol class="subnav__menu / menu-vert">
			<?php echo $subMenu; ?>
		</ol>
	</div>	
	<?php endif; ?>

	<div class="entry-content / col-lg-7  col-md-7">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sesha' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<div class="col-lg-2 col-md-12"></div>

</div>
