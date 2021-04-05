module.exports = {
    trailingComma: 'es5',
    tabWidth: 4,
    semi: false,
    singleQuote: true,
    printWidth: 120,
    bracketSpacing: true,
    overrides: [
        {
            files: '*.vue',
            options: {
                semi: false,
                singleQuote: true,
            },
        },
    ],
}
