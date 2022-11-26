/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.html'],
  theme: {
    screens: {
      sm: '480px',
      md: '760px',
      lg: '976px',
      xl: '1440px',
    },
    extend: {
      spacing: {
        '608px': '38rem',
        '800px': '50rem',
        '880px': '55rem',
        '912px': '57rem',
        '960px': '60rem'
      },
      fontSize: {

      },
      backgroundImage: {
        'zigzag': "url('http://www.transparenttextures.com/patterns/zig-zag.png')",
        'kitty': "url('https://i.pinimg.com/originals/cc/71/00/cc7100f5ebe73b5cda9c8a949f56cfd7.jpg')"
      },
      colors: {
        'evendarkerBlue': '#100D29',
        'darkerBlue': '#1B1641',
        'darkBlue': '#3C249C',
        'darkerPurple': '#6F18BA',
        'evendarkerPurple': '#610DA8',
        'customPurple': '#8933D4',
        'lighterPurple': '#9A52D9',
        'lightGreen': '#47FFBF',
        'notsolightGreen': '#2DB586',
        'tosca': '#35DECE',
        'teal': '#2D9ABB'
      },
    },
  },
  plugins: [],
}