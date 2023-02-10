const path = require("path");

module.exports = {
    entry: "./src/js/frontend.js",
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "frontend.min.js",
    },
    mode: "development",
};
