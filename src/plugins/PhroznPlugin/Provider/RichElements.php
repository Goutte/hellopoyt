<?php

namespace PhroznPlugin\Provider;

use Goutte\RichElement;
use Phrozn\Provider\Base;
use Phrozn\Provider;

/**
 * Class RichElements
 * See Goutte\RichElement
 *
 * @author Goutte <antoine@goutenoir.com>
 */
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
                $element = new RichElement($item, $inputRootDir);
                $elements[$element->getSlug()] = $element;
            }
        }

        ksort($elements);

        return $elements;
    }

}