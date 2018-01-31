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


$hide_the_sidebar = get_field('hide_the_sidebar');

if($subMenu) {	
	if($hide_the_sidebar) {
		// Nav Column, no Sidebar
		$col_content = "col-lg-9 col-md-12";
	} else {
		// Nav Column, and Sidebar
		$col_content = "col-lg-7 col-md-7";
		$col_sidebar = "col-lg-2 col-md-12";
	}
} else {
	if($hide_the_sidebar) {
		// No Nav Column, No Sidebar
		$col_content = "col-lg-12 col-md-12";
	} else {
		// No Nav Column, and Sidebar
		$col_content = "col-lg-10 col-md-10";
		$col_sidebar = "col-lg-2 col-md-12";
	}
}

$book_now_url = get_permalink( get_option( 'setting_book_now_link' ) );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('page-single / clearfix row'); ?>>

	<?php if($subMenu) : ?>
	<div class="page__nav_sidebar / col-lg-3 col-md-3 / visible-md-block visible-lg-block">
		<ol class="subnav__menu / menu-vert">
			<?php echo $subMenu; ?>
		</ol>
	</div>	
	<?php endif; ?>

	<div class="page__content / <?php echo $col_content; ?>">
		<?php the_content(); ?>	
	</div>

	<?php if(!$hide_the_sidebar) : ?>
	<div class="page__sidebar / <?php echo $col_sidebar; ?>">
		<?php 
		if ( get_field('upload_documents') ) : 
			$document = get_field('upload_documents');
			if(get_field('upload_documents_title')) {
				$title = get_field('upload_documents_title');
			} else {
				$title = 'Download';
			}
		?>
		<p>
			<a class="btn btn-secondary btn-xs btn-block" href="<?php echo  $document['url']; ?>" target="_blank">
				<i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
				<?php echo $title; ?>
			</a>
		</p>
		
		<?php endif; ?>

		<p>
			<a href="<?php echo $book_now_url; ?>" class="btn btn-secondary btn-xs btn-block">
				Book Now
			</a>
		</p>

	</div>
	<?php endif; ?>

</div>
