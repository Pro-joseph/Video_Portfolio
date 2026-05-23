export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#18181B',
        secondary: '#3F3F46',
        accent: '#2563EB',
        dark: '#18181B',
        light: '#FAFAFA',
      },
      fontFamily: {
        sans: ['Space Grotesk', 'sans-serif'],
        heading: ['Archivo', 'sans-serif'],
      },
    }
  }
};