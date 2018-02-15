<?php
/**
 * Template part for displaying a menu similar to the landing page, but on any content page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>

<?php 
if( have_rows('landing_blocks') ): 
	$row_index = 1;
	$column_index = 1;
?>

	<div class="row baseline-grid">

	<?php 
	while( have_rows('landing_blocks') ): the_row();
		$title = get_sub_field('landing_title');
		$content = get_sub_field('landing_text');
		$image = 'style="background-image: url('. get_sub_field('landing_image')['url']. '); "';
		$buttons = get_sub_field('landing_buttons');
	?>
		<?php
			if($row_index%2 == 0) {
				if($column_index%2 == 0) {
					$col = '';		
				} else {
					$col = 'text-white';
				}			
			} else {
				if($column_index%2 == 0) {
					$col = 'text-white';
				} else {
					$col = '';
				}		
			}	
		?>

		<div class="landing__block-wrapper / <?php echo $col; ?> / col-md-6 col-lg-6" <?php echo $image; ?>>

			<div class="landing__block-content">
			
				<h2 class="landing__block-title / j1 baseline-sm">
					<?php echo $title; ?>
				</h2>

				<?php echo $content; ?>
			</div>

			<?php if( $buttons ): ?>
			<div class="landing__block-buttons">
			<?php
				foreach ($buttons as $key => $button) {
					if( get_field('read_more_link', $button->ID) ) {
						$title = get_field('read_more_link', $button->ID);
					} else {
						$title = $button->post_title;
					}
					printf('
						<a href="%s" class="btn-landing / btn btn-default btn-xs">
							%s
						</a>
					',
					get_permalink( $button->ID),
					$title					
					);
				}
			?>
			</div>
			<?php endif; ?>

		</div>

	<?php 
	if($column_index%2 == 0) $row_index++; 
	$column_index++;
	endwhile; 
	?>

</div>



<?php endif; ?>