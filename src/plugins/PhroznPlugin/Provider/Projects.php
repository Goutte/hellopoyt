<?php

namespace PhroznPlugin\Provider;

use Phrozn\Provider\Base;
use Phrozn\Provider;

class Projects
    extends Base
    implements Provider
{

    public function get()
    {
        // get reference to configuration object (it holds passed vars, if any)
        $config = $this->getConfig();

        $inputRootDir = new \SplFileInfo($this->getProjectPath());

        // iterate through the folders in the src/projects dir
        $elements = array();
        $it = new \DirectoryIterator($this->getProjectPath()."/projects");
        foreach ($it as $item) {
            if (!$item->isDot() && $item->isDir()) {
                $elements[] = new \Goutte\Element($item, $inputRootDir);
            }
        }

        // fixme: remove for prod
        $elements = array_merge(
            $elements, $elements,
            $elements, $elements,
            $elements, $elements,
            $elements, $elements
        );

        return $elements;
    }

}