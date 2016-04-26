<?php
// let's hook late to allow anything modifying the template to kick in
use rqd\Template\Control;

// let's take care of the template inclusion
add_filter( 'template_include', [ new Control(), 'templateInclude' ], 999 );
