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


//// ERROR HANDLING

error_reporting(E_ALL);
function handleError($errno, $errstr, $error_file, $error_line) {
    echo "<b>Error:</b> [$errno] $errstr - $error_file:$error_line<br />";
    echo "Generation aborted.";
    die();
}

set_error_handler("handleError");


//// ~COMPILATION

e("Starting generation...");


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
    e("<b>Fail</b>", $e->getMessage());
}

e("Done !");