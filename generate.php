<?php

/**
 * Execute this on the server to generate the website
 * This file is for Pat (and Pat only!)
 *
 * Will :
 * - phrozn build src public
 * - TODO git commit -avm 'Automatic commit from generate.php'
 */

/**
 * Handy helper for printing HTML lines
 * @param $k
 * @param null $v
 */
function e ($k, $v=null) {
    echo $k;
    if (null !== $v) echo " : {$v}";
    echo "<br>\n";
}

e("Current Working Directory", getcwd());

//// CONFIGURATION

$in  = __DIR__ . '/src';
$out = __DIR__ . '/public';

$base = __DIR__ . '/vendor/farazdagi/phrozn';


//// COMPILATION

e("Starting compilation...");

try {

    // Bootstrap
    if (strpos('@PHP-BIN@', '@PHP-BIN') === 0) { // stand-alone version is running
        set_include_path($base . PATH_SEPARATOR . get_include_path());
    }
    require_once $base.'/app/bootstrap.php';

    // Add the plugins to the autoloader
    $loader = Phrozn\Autoloader::getInstance();
    $plugins = $in . '/plugins';
    if (is_dir($plugins)) {
        $loader->getLoader()->add('PhroznPlugin', $plugins);
    }

    // Compile !
    $outputter = new \Phrozn\Outputter\HtmlOutputter();
    $site = new \Phrozn\Site\DefaultSite($in, $out);
    $site->setOutputter($outputter)->compile();

    // Close
    unset($site, $loader, $outputter);

} catch (Exception $e) {
    e('Fail', $e->getMessage());
}

e("Done !");