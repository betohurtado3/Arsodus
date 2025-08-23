// tailwind.config.js
module.exports = {
    content: [
      "./*.php",          // todos los archivos php en raíz
      "./Front/**/*.php", // todos los archivos php dentro de Front
      "./assets/**/*.js"  // si tienes scripts JS
    ],
    theme: {
      extend: {
        fontFamily: {
          raleway: ['Raleway', 'sans-serif'],
          montserrat: ['Montserrat', 'sans-serif'],
        },
      },
    },
    plugins: [],
  }
  