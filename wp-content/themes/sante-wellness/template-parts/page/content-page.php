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
	$postID = wp_get_post_parent_id( $post_ID );
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
	<div class="col-lg-3">
		<ol class="subnav__menu / menu-vert">
			<?php echo $subMenu; ?>
		</ol>
	</div>	
	<?php endif; ?>

	<div class="entry-content / col-lg-7">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'sesha' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<div class="col-lg-2"></div>

</div>
