const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './app/**/*.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['scandia-web', ...defaultTheme.fontFamily.sans],
                mono: ['source-code-pro', ...defaultTheme.fontFamily.mono],
            },
            transitionProperty: {
                'width': 'width'
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
    ]
}
