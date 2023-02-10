const path = require("path");

module.exports = {
    entry: "./src/js/admin.js",
    output: {
        path: path.resolve(__dirname, "public/js"),
        filename: "admin.min.js",
    },
    mode: "development",
};
