<?php
require_once __DIR__ . '/vendor/autoload.php';

use MatthiasMullie\Minify;
use ScssPhp\ScssPhp\Compiler;

echo "🔨 Building assets...\n";

if (!is_dir(__DIR__ . '/public/css')) {
    mkdir(__DIR__ . '/public/css', 0755, true);
}
if (!is_dir(__DIR__ . '/public/js')) {
    mkdir(__DIR__ . '/public/js', 0755, true);
}

echo "📝 Compiling SCSS...\n";
try {
    $scss = new Compiler();
    $scss->setOutputStyle(\ScssPhp\ScssPhp\OutputStyle::COMPRESSED);
    
    $scssContent = file_get_contents(__DIR__ . '/assets/scss/main.scss');
    $compiledCss = $scss->compileString($scssContent)->getCss();
    
    $minifier = new Minify\CSS();
    $minifier->add($compiledCss);
    $minifiedCss = $minifier->minify();
    
    file_put_contents(__DIR__ . '/public/css/main.min.css', $minifiedCss);
    echo "✅ CSS compiled and minified\n";
} catch (Exception $e) {
    echo "❌ SCSS compilation failed: " . $e->getMessage() . "\n";
    exit(1);
}

echo "📦 Minifying JavaScript...\n";
try {
    $minifier = new Minify\JS(__DIR__ . '/assets/js/main.js');
    $minifiedJs = $minifier->minify();
    
    file_put_contents(__DIR__ . '/public/js/main.min.js', $minifiedJs);
    echo "✅ JavaScript minified\n";
} catch (Exception $e) {
    echo "❌ JavaScript minification failed: " . $e->getMessage() . "\n";
    exit(1);
}

echo "🎉 Build completed successfully!\n";
echo "📁 Assets created:\n";
echo "   - public/css/main.min.css (" . number_format(filesize(__DIR__ . '/public/css/main.min.css') / 1024, 2) . " KB)\n";
echo "   - public/js/main.min.js (" . number_format(filesize(__DIR__ . '/public/js/main.min.js') / 1024, 2) . " KB)\n";