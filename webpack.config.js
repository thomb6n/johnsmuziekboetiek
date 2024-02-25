const path = require("path");
const globImporter = require("node-sass-glob-importer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
	entry: "./source/javascript/index.js",
	mode: "development",
	output: {
		path: path.resolve(__dirname, "dist"),
		filename: "bundle.js",
	},
	plugins: [new MiniCssExtractPlugin()],
	module: {
		rules: [
			{
				test: /\.s?css$/i,
				use: [
					MiniCssExtractPlugin.loader,
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
