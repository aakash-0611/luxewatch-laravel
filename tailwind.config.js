import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
        colors: {
            bg: 'var(--bg)',
            surface: 'var(--surface)',
            'surface-alt': 'var(--surface-alt)',
            border: 'var(--border)',

            text: 'var(--text)',
            'text-muted': 'var(--text-muted)',
            'text-subtle': 'var(--text-subtle)',

            gold: 'var(--gold)',
            'gold-soft': 'var(--gold-soft)',

            success: 'var(--success)',
            warning: 'var(--warning)',
            danger: 'var(--danger)',
        },
        },
    },

    plugins: [forms, typography],
};
