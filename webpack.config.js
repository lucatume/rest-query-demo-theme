var path = require( 'path' );

module.exports = {
	entry: {
		'rqd-handlebars-bundle': './js/handlebars-app.js',
		'rqd-mustache-bundle': './js/mustache-app.js',
	},
	output: {filename: './js/dist/[name].js'},
	module: {
		loaders: [
			{test: /\.js$/, loader: 'babel-loader', exclude: /node_modules/},
			{test: /\.css$/, loader: 'style!css'},
			{test: /\.scss$/, loaders: ['style', 'css', 'sass']}
		]
	},
	resolve: {
		root: [
			path.resolve( './js/modules' ),
			path.resolve( './js/vendor' ),
		],
		extensions: ['', '.min.js', '.js'],
	}
};