module.exports = {
    trailingComma: "es5",
    tabWidth: 2,
    semi: false,
    singleQuote: true,
    printWidth: 120,
    overrides: [
        {
        files: '*.vue',
        options: {
            semi: false,
            singleQuote: true,
        }
        },
    ]
};
