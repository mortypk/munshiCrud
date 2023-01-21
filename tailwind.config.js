/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./lang/en/theme.php",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}
