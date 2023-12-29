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
                'courageous-plum': {
                    DEFAULT: '#320668',
					100: '#ebe6f0',
					200: '#cec3db',
					300: '#a794be',
                    400: '#7e62a0',
					500: '#573383',
                    600: "#320668",
					700: '#2b0558',
					800: '#24044a',
					900: '#1d033b',
					950: '#16032f',
                },
				'confident-carnation': {
					DEFAULT: '#f2b5d4',
					400: '#f7d0e4',
					600: '#f2b5d4',
				},
				'spark-gold': {
                    DEFAULT: '#cfae70',
					100: '#faf7f1',
					200: '#f3ecdd',
					300: '#eadcc2',
                    400: '#e1cca5',
					500: '#d8bd8a',
                    600: "#cfae70",
					700: '#b0945f',
					800: '#937c50',
					900: '#766340',
					950: '#5d4e32',
                },
				'spark-pink': {
					DEFAULT: '#f7d6e9',
					100: '#fefbfd',
					600: '#f7d6e9',
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
