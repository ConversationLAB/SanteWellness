<?php 
class sub_menu_walker_mobile extends Walker_page {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "<optgroup>";
	}


	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "</optgroup>";

	}

	function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
		$css_level = $depth + 1;

		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		if ( $depth ) {
			$indent = str_repeat( $t, $depth );
		} else {
			$indent = '';
		}

        $selected = '';

		if ( ! empty( $current_page ) ) {
			if ( $page->ID == $current_page ) {
				$selected = 'selected';
			} 
		}
		$output .= $indent . sprintf(
			'<option value="%s" %s>%s',
            get_permalink( $page->ID ),
            $selected,
			apply_filters( 'the_title', $page->post_title, $page->ID )
		);
		
	}

	function end_el( &$output, $page, $depth = 0, $args = array() ) {
		if ( isset( $args['item_spacing'] ) && 'preserve' === $args['item_spacing'] ) {
			$t = "\t";
			$n = "\n";
		} else {
			$t = '';
			$n = '';
		}
		$output .= "</option>{$n}";

	}

}