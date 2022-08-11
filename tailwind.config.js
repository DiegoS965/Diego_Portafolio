/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      backgroundImage: {
        'white-background': "url('/images/white-background.jpg')",
        'dark-background': "url('/images/dark-background.jpg')",
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
