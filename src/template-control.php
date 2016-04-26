<?php
// let's hook late to allow anything modifying the template to kick in
use rqd\Template\Control;

// let's take care of the template inclusion
add_filter( 'template_include', [ new Control(), 'templateInclude' ], 999 );
function remove_next_link(){
	remove_action('wp_head', 'adjacent_posts_rel_link');
}
