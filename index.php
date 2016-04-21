<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST Query Demo</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <?php use Handlebars\Handlebars;

    wp_head() ?>
</head>
<body>

<header class='container row' id='header'>
    <h1 class="small-12 columns text-center">The Loop</h1>
</header>

<nav class='container row' id='nav'>
    <form action="/" method="GET" class="medium-8 medium-centered columns">
        <div class="input-group">
            <input class="input-group-field" type="text" name="s" data-placehoder="Search me: no JavaScript for you though.">
            <div class="input-group-button">
                <input type="submit" class="button" value="Search">
            </div>
        </div>
    </form>
</nav>

<section class='container row' id='main'>

    <h2 class="small-12 columns text-center">Articles</h2>

    <section id='content' class="small-12 columns">

        <h3 class="show-for-sr">Latest blog posts</h3>

        <div id="content-area">
            <?php
            // get hold of the global 'restified' query
            global $wp_query;

            // extract data from each post in the query
            $posts = array_map(function ($post) {
                return $post->data;
            }, $wp_query->posts);

            // the `rqdTemplate::templateInclude` method set up the `$handlebars` var so that we can use it here
            /** @var Handlebars $handlebars */
            $template_contents = $handlebars->getLoader()->load('content')->getString();

            // print the template to the page for Handlebars.js to use on following states
            echo '<script type="text/x-handlebars-template" id="tpl-content">', $template_contents, '</script>';

            // render the content initial state with PHP
            echo $handlebars->render('content', ['posts' => $posts]);
            ?>
        </div>
    </section>

</section>

<footer class='container row' id='footer'>
    <section class="medium-8 medium-centered columns text-center">
        <h2 class="show-for-sr">Footer Credits</h2>
        <p>Made with <a href="http://wordpress.org">WordPress</a> and the amazing <a
                href="https://wordpress.org/plugins/rest-api/">REST API</a>.</p>
    </section>
</footer>

<?php wp_footer() ?>
<script src="js/jquery.js"></script>
<script src="js/underscores.js"></script>
<script src="js/backbone.js"></script>
<script type="text/javascript">
    // let's alias jQuery to '$' for Foundation to use
    window.$ = $ || jQuery;

    // and localize the REST API url and nonce
    window.rest = {
        url: '<?php echo rest_url('wp/v2/posts') ?>',
        nonce: '<?php echo wp_create_nonce('wp_rest') ?>'
    };
</script>
<script src="js/vendor/what-input.js"></script>
<script src="js/vendor/foundation.js"></script>
<script src="js/vendor/handlebars.min.js"></script>
<script src="js/vendor/spin.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>
