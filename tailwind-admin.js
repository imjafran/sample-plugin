module.exports = {
  purge: {
    enabled: false,
    content: ["./includes/templates/admin.php", "./public/js/admin.min.js"],
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
