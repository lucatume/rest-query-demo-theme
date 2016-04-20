<?php
add_action( 'pre_get_posts', function ( WP_Query &$query ) {
	if ( is_admin() || ! ( $query->is_main_query() & ( $query->is_home() || $query->is_search() ) ) ) {
		return;
	}

	$query->query_vars['restify'] = true;
} );
