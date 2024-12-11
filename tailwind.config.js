/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{html,js,jsx,ts,tsx}", // For React files
    "./resources/views/**/*.blade.php", // For Laravel Blade templates
    "./resources/js/**/*.js", // For Laravel's JavaScript files
    "./storage/framework/views/*.php", // Cached Blade views
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", // Laravel Pagination
  ],
  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms')],
};
