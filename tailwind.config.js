/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        ink: {
          200: '#2d3039',
          400: '#16181d',
        },
      },
    },
  },
  plugins: [],
}