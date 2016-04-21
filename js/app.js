$(document).foundation();

$(document).ready(function () {
    // remove the no-js class from the body	
    $('body').removeClass('no-js');

    // change the search placeholder
    var $search = $('input[name="s"]');
    $search.attr('placeholder', 'Search and behold the power of REST!');

    var rqdEndpoint = {
        getPostsData: function (args) {
            args = args || {};

            var settings = {
                dataType: "json",
                url: window.rest.url,
                data: {filter: args},
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-NONCE', window.rest.nonce);
                }
            };

            return $.ajax(settings);
        }
    }

    // compile the content template
    contentTemplate = Handlebars.compile($('#tpl-content').html());

    // spinn up the spinner
    var spinner = new Spinner().spin()
    var contentArea = $('#content-area');

    // let's route
    var rqdRouter = Backbone.Router.extend({
        endpoint: rqdEndpoint,
        template: contentTemplate,
        routes: {
            '': 'index',
            '?s=:searchString': 'index',
        },
        index: function (searchString) {
            var args = searchString ? {s: searchString.substring(2)} : {};
            var self = this;
            contentArea.fadeTo(200, .3).append(spinner.el);
            this.endpoint.getPostsData(args).done(function (data) {
                var content = self.template({posts: data});
                contentArea.html(content).fadeTo(100, 1);
                spinner.stop();
            });
        }
    });

    // start history
    Backbone.history.start({pushState: true});

    // instance router
    var rqdRoutes = new rqdRouter();

    // listen for searches
    $search.closest('form').on('submit', function (ev) {
        ev.preventDefault();

        var searchString = $search.val().trim();

        if (searchString === '') {
            rqdRoutes.navigate('', {trigger: true});
        } else {
            rqdRoutes.navigate('?s=' + searchString, {trigger: true});
        }

        $search.val('');
    });
});
