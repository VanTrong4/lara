const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        container: {
            // you can configure the container to be centered
            center: true,

            // or have default horizontal padding
            padding: '50px',

            // default breakpoints but with 40px removed
            screens: {
                sm: '600px',
                md: '769px',
                lg: '1088px',
            }
        },
        fontSize: {
            sm: '0.8rem',
            base: '1rem',
            xl: '1.6rem',
            '2xl': '1.8rem',
            '3xl': '2rem',
            '4xl': '2.5rem',
            '5xl': '3rem',
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
