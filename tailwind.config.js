/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.{html,js,php}",
    "dynamic-html/*.{php,js}"],
  theme: {
    extend: {
      zIndex: {
        '100': '100',
        '999': '999'
      }
    },
  },
  plugins: [],
}
