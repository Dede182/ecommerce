const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors:{
            'gray':{
                100 : "#fff"
            }
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                Inter: ['Inter', 'sans-serif'],
                Merriweather: ['Merriweather', 'serif'],
                Mukta: ['Mukta', 'sans-serif'],
                Sono: ['Sono', 'sans-serif']
            },

            colors:{
                greu : '#0da487',
                grau :{
                    100 : "#f8f8f8"
                }
            }
        },


    },


    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
        require('tailwindcss-plugins/pagination'),
        require('tailwind-scrollbar-hide')
    ],
};
