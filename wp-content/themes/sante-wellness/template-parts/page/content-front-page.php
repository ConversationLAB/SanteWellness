<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>

<?php the_content(); ?>


<?php 
if( have_rows('landing_blocks') ): 
	$row_index = 1;
	$column_index = 1;
?>

	<div class="row baseline-grid">

	<?php while( have_rows('landing_blocks') ): the_row();
		$title = get_sub_field('landing_title');
		$content = get_sub_field('landing_text');
		$image = 'style="background-image: url('. get_sub_field('landing_image')['url']. '); "';
		$buttons = get_sub_field('landing_buttons');
		?>
		<?php
			if($row_index%2 == 0) {
				if($column_index%2 == 0) {
					$col = 'is-main / col-md-8 col-lg-8';
					$h_class = 'h1';
				} else {
					$col = 'is-alternate / col-md-4 col-lg-4';
					$h_class = 'h2';
				}			
			} else {
				if($column_index%2 == 0) {
					$col = 'is-alternate / col-md-4 col-lg-4';
					$h_class = 'h2';
				} else {
					$col = 'is-main / col-md-8 col-lg-8';
					$h_class = 'h1';
				}		
			}	
		?>




		<div class="landing__block-wrapper / <?php echo $col; ?>" <?php echo $image; ?>>

			<div class="landing__block-content">
			
				<h2 class="landing__block-title / <?php echo $h_class; ?>">
					<?php echo $title; ?>
				</h2>

				<?php echo $content; ?>
			</div>

			<?php if( $buttons ): ?>
			<div class="landing__block-buttons">
			<?php
				foreach ($buttons as $key => $button) {
					printf('
						<a href="%s" class="btn-landing / btn btn-default btn-xs">
							%s
						</a>
					',
					get_permalink( $button->ID),
					$button->post_title
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