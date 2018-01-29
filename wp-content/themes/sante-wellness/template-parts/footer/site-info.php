<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Sesha
 * @since 1.0
 * @version 1.0
 */

?>

<p class="site-info small / text-center">
	Contact: <a href="mailto:<?php echo get_option( 'setting_contact_email' ) ?>">
		<?php echo get_option( 'setting_contact_email' ) ?>
	</a> 
	<span class="visible-lg-inline-block visible-sm-inline-block visible-md-inline-block">
	| </span>

	<br class="visible-xs-block">

	
	Call: 
	<a href="tel:<?php echo str_replace(' ','', get_option( 'setting_contact_number' ) ) ?>">
		<?php echo get_option( 'setting_contact_number' ); ?>
	</a> 
</p>
