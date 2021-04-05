module.exports = {
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
    extends: ['eslint:recommended', 'plugin:vue/essential', 'plugin:vue/recommended', 'prettier'],
    parserOptions: {
        ecmaVersion: 2021,
        sourceType: 'module',
    },
    plugins: ['vue'],
    rules: {
        quotes: ['warn', 'single'], // シングルクォートで囲む
        eqeqeq: 2, // 厳密等価演算子の使用のみを許可
        'no-var': 2, // varは禁止
        'no-console': 0, // コンソールは許可
        'vue/html-closing-bracket-newline': [2, { multiline: 'never' }], // "never" ...閉じ括弧の前の改行を禁止します。
    },
}
