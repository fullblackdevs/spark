module.exports = {
    content: ["./web/**/*.php", "./templates/**/*.php"],
    theme: {
        fontFamily: {
            display: ["PlakatGrotesk", "sans-serif"],
            body: ["ui-sans-serif", "system-ui", "sans-serif"],
            sans: ["ui-sans-serif", "system-ui", "sans-serif"],
        },
        extend: {
            colors: {
                "courageous-plum": {
                    DEFAULT: "#320668",
					300: '#a794be',
                    400: "#7e62a0",
                    600: "#320668",
					900: '#1d033b',
                },
				'confident-carnation': {
					DEFAULT: '#f2b5d4',
					400: '#f7d0e4',
					600: '#f2b5d4',
				},
            },
            backgroundImage: {
                "masthead-hero": "url('../images/leighann-blackwood-hx87JWG4yCI-unsplash.png')",
                "masthead-about": "url('../images/alex-starnes-tbYPDBChsZU-unsplash.png')",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
