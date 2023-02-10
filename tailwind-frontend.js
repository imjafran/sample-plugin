module.exports = {
    purge: {
        enabled: true,
        content: ["./includes/templates/*.php"],
    },
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [ 
    require("postcss"),
    require("postcss-import"),
    require("tailwindcss"),
    require("autoprefixer"), 
    ],
};
