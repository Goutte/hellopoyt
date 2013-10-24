<?php

namespace PhroznPlugin\Provider;

use Phrozn\Provider\Base;
use Phrozn\Provider;

class RichElements
    extends Base
    implements Provider
{

    public function get()
    {
        $config = $this->getConfig();

        if (!isset($config['folder'])) {
            throw new \Exception("Specify a folder for Provider RichElements.");
        }
        $folder = $config['folder'];

        $inputRootDir = new \SplFileInfo($this->getProjectPath());

        $elements = array();
        $it = new \DirectoryIterator($this->getProjectPath().DIRECTORY_SEPARATOR.$folder);
        foreach ($it as $item) {
            if (!$item->isDot() && $item->isDir()) {
                $elements[] = new \Goutte\Element($item, $inputRootDir);
            }
        }

        // fixme: mocking multiple elements, REMOVE FOR PROD
        $elements = array_merge(
            $elements, $elements,
            $elements, $elements,
            $elements, $elements,
            $elements, $elements
        );

        return $elements;
    }

}