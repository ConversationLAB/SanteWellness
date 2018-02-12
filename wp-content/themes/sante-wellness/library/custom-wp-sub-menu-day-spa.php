<?php
// Customise the HTML for the main menu
// -------------------------------------------------------------------------------
class site_day_spa_menu extends Walker_Nav_Menu {
	// Displays start of a level. E.g '<ul>'
	// @see Walker::start_lvl()
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class='subnav__sub-menu / menu-vert'>\n";
	}

	// Displays end of a level. E.g '</ul>'
	// @see Walker::end_lvl()
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "</ul>\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;

		$css_level = $depth + 1;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		$output .= $indent . '<li class="subnav__level-'.$css_level.' / subnav__menu-item '. esc_attr( $class_names ) .'">';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ' class="subnav__button / btn btn-primary btn-block btn-lg"';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
		// $item_output .= $description.$args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
?>