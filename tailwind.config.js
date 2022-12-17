/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "app/views/**/*.php",
    "./node_modules/tw-elements/dist/js/**/*.js"
  ],
  theme: {
    container: {
        center: true,
        padding: {
            md: "4rem",
            lg: "10rem"
        }
    },
    fontFamily: {
        main: ["Poppins", "Open\\ Sans", "Segoe\\ UI", "ui-sans-serif", "system-ui", "sans-serif", "Apple\\ Color\\ Emoji", "Segoe\\ UI\\ Emoji", "Segoe\\ UI\\ Symbol", "Noto\\ Color\\ Emoji"]
    },
    extend: {
        colors: {
            main: "#22c55e"
        },
    },
  },
  plugins: [
        require('tw-elements/dist/plugin'),
        require("@tailwindcss/forms")({
            strategy: 'class', // only generate classes
        }),
  ],
}
