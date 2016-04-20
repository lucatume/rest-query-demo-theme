# REST Query Demo Theme

*A one page silly stupid WordPres theme illustrating the use of the [REST Query plugin](https://github.com/lucatume/rest-query), the [REST API plugin](https://wordpress.org/plugins/json-rest-api/) and Handlebars in its [PHP](https://github.com/XaminProject/handlebars.php "GitHub - XaminProject/handlebars.php: Handlebars processor for php") and [JS](http://handlebarsjs.com/ "Handlebars.js: Minimal Templating on Steroids") versions.*

## Installation
* Download the theme `.zip` file and extract it in your local WordPress theme folder **or** clone it there:
    ```bash
    git clone https://github.com/lucatume/rest-query-demo-theme.git
    ```
* Run `composer update` from the theme root folder.
* Make sure the following plugins are installed and active on the site:
    * [WP REST API plugin](https://wordpress.org/plugins/json-rest-api/)
    * [REST Query plugin](https://github.com/lucatume/rest-query)

* Make sure your local installation is running PHP 5.4 or above.
* Activate the theme.

## So?
The relevant part of the theme is the code used to render the content loop initial state using [handlebars.php](https://github.com/XaminProject/handlebars.php "GitHub - XaminProject/handlebars.php: Handlebars processor for php") and the following refresh using [Backbone](http://backbonejs.org/ "Backbone.js") and [Handlebars.js](http://handlebarsjs.com/ "Handlebars.js: Minimal Templating on Steroids").
The template re-use possibility comes from a "RESTified" `WP_Query` done tapping into the [REST Query plugin](https://github.com/lucatume/rest-query) and the [WP REST API plugin](https://wordpress.org/plugins/json-rest-api/).
The theme is meant to be a proof of concept and not a "state of the art" approach to WordPress themes; I've gone for code simplicity over a more OOP approach for the sake of clarity.  
Deactivate JavaScript support on the page to see the theme gracefully degrading to Web 1.0 behaviour and still rock on the REST API.

