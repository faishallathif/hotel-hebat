module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    letterSpacing: {
      tightest: '-.075em',
      tighter: '-.05em',
      tight: '-.025em',
      normal: '0',
      wide: '.025em',
      wider: '.05em',
      widest: '.2em',
    },
    extend: {
      spacing: {
        '80': '80vh',
        '20': '20vh',
      },
      minHeight: {
        '80': '80vh',
        '20': '20vh',
      },
      colors:{
        "ungu1": "#7A17EE",
        "ungu2": "#CA84FF",
        "pink1": "#FD71AF",
        "pink2": "#FFF8FB",
      }
  }
},
  plugins: [],
  prefix:"tw-"
}
