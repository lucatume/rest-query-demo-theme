<?php
// let's hook late to allow anything modifying the template to kick in
use rqd\Template\Control;

add_filter( 'template_include', [ new Control(), 'templateInclude' ], 999 );
