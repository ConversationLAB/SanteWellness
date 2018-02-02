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


 // Get Top level page ID
if ( is_page() && $post->post_parent ) {
	$is_parent = true;
	$ancestors = get_post_ancestors($post->ID);
	$root = count($ancestors)-1;
	$postID = $ancestors[$root];	
} else {
	$is_parent = false;
	$postID = get_the_ID();
}


// Are we on a Tabbed Page Template?
$is_tabbed_page = is_page_template('page-tabbed-content.php');


// Print out Sub Navigation Menu
$subMenu = wp_list_pages(array(
	'child_of' => $postID, 
	'title_li' => '',
	'echo' => 0,
	'walker' => new sub_menu_walker() 
));

$subMenu_mobile = wp_list_pages(array(
	'child_of' => $postID, 
	'title_li' => '',
	'echo' => 0,
	'walker' => new sub_menu_walker_mobile() 
));

// Show or hide the sidebar
$hide_the_sidebar = get_field('hide_the_sidebar');


// Column layout logic
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

// Book now URL
$book_now_url = get_permalink( get_option( 'setting_book_now_link' ) );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('page-single / clearfix row'); ?>>

	<?php if($subMenu) : ?>
	<div class="page__nav_sidebar / col-lg-3 col-md-3">
		<ol class="subnav__menu / menu-vert / visible-md-block visible-lg-block">
			<?php echo $subMenu; ?>
		</ol>

		<select class="js-page-select / subnav__menu / visible-xs-block visible-sm-block baseline-sm input-lg">
			<option value="">Choose a page ...</option>
			<?php echo $subMenu_mobile; ?>
		</select>
	</div>
	<?php endif; ?>

	<div class="page__content / <?php echo $col_content; ?>">

		<h1>
			<?php the_title() ?>
		</h1>

		<?php the_content(); ?>	

		<?php 
		if($is_tabbed_page) : 
			if ( have_rows('content_tabs') ) : 
				$row_index = 0;
		?>
			
			<ul class="nav nav-tabs" role="tablist">
		<?php 
			while( have_rows('content_tabs') ) : the_row();
				$active_class = '';
				$hash = str_replace(' ', '-', get_sub_field('tab_title') ); 
				if($row_index === 0) $active_class = 'active';
			?>
				<li role="presentation" class="<?php echo $active_class; ?>">
					<a href="<?php echo '#'.$hash; ?>" aria-controls="<?php echo $hash; ?>" role="tab" data-toggle="tab">
						<?php the_sub_field('tab_title'); ?>
					</a>
				</li>
		<?php 
			$row_index++;
			endwhile; 
		?>
			</ul>

			<div class="tab-content">
		<?php 
			$row_index = 0;
			while( have_rows('content_tabs') ) : the_row(); 
			$active_class = '';
			if($row_index === 0) $active_class = 'active';
			?>					
			<?php $hash = str_replace(' ', '-', get_sub_field('tab_title') ); ?>
				<div role="tabpanel" class="tab-pane <?php echo $active_class; ?>" id="<?php echo $hash; ?>">
					<?php the_sub_field('tab_content'); ?>
				</div>		
			<?php 
			$row_index++;
			endwhile; 
		?>
			</div>

		<?php endif; ?>	
		<?php endif; ?>

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
