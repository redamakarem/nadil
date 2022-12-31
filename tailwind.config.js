const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");
module.exports = {
    darkMode:'class',
    mode:'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                'lato' : ['Lato'],
                'din' : ['DIN-Medium'],
                'ahlan' : ['Ahlan-Regular'],
                'cairo' : ['Cairo-Regular'],
            },
            colors:{
                nadilBg:{
                    100: '#fefefe',
                },
                nadilBtn:{
                    100: '#e0e0e0',
                },
                trueGray: colors.trueGray,
            },
            screens: {
                '3xl' : '1920px'
            },
            maxWidth:{
                '8xl': '88rem',
                '9xl': '96rem',
                '10xl': '104rem',
                '11xl': '112rem',
                '12xl': '120rem',
            }

        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'),
        require('tailwind-scrollbar'),
        require('tailwind-scrollbar-hide'),
    ],
};
