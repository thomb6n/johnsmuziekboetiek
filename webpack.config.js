const path = require("path");
const globImporter = require("node-sass-glob-importer");

module.exports = {
	entry: "./source/javascript/index.js",
	mode: "development",
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "bundle.js",
	},
	module: {
		rules: [
			{
				test: /\.s?css$/i,
				use: [
					"style-loader",
					"css-loader",
					{
						loader: "sass-loader",
						options: {
							sassOptions: {
								importer: globImporter(),
							},
						},
					},
				],
			},
			{
				test: /\.(jpe?g|png|gif|svg)$/i,
				type: "asset",
			},
		],
	},
};
