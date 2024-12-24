import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkBlue: "#15192d",
                yellow: "#fbb204",
                lightBlue: "#3ec0ed",
            },
            backgroundImage: {
                "custom-gradient":
                    "linear-gradient(135deg, #15192d, #fbb204, #3ec0ed)",
            },
        },
    },

    plugins: [forms],
};
