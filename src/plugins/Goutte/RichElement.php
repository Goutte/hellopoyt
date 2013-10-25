<?php

namespace Goutte;

use Symfony\Component\Yaml\Yaml;

/**
 * This is an OOP approach to Rich Elements for Phrozn.
 * It will look into the folder for :
 * - description.yml
 *   Will read its contents and parse them as array into `$data`.
 *   Then, a magic getter will fetch any property held in `$data`.
 *   This is where the magic lies, so if you have the property `foo: "bar"` in the YAML,
 *   you will be able to do `{{ element.foo }}` in the template, and it will print `bar`.
 * - thumbnail.jpg
 * - other image files
 *
 * Other files and subfolders will be ignored.
 * Thumbnail and images will then be accessible as relative URLs, HTML-ready.
 *
 * /!\ This will probably not work as expected if the path has special characters.
 *     Make sure your folders are simple alphanumericals validating \^[a-zA-Z0-9-]+$\
 *
 * Class RichElement
 * @author Goutte <antoine@goutenoir.com>
 */
class RichElement {

    /**
     * The directory holding the data for this element
     * @var \SplFileInfo
     */
    protected $dir;

    /**
     * The root directory (phrozn input dir)
     * This is used to build proper relative URLs
     * @var \SplFileInfo
     */
    protected $rootDir;

    /**
     * @var array An array of relative URLs
     */
    protected $images = array();

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string A relative URI to the thumbnail image
     */
    protected $thumbnail;

    /**
     * Data held in description.yml
     *
     * @var array
     */
    protected $data = array();



    /**
     * Builds the element from the data in the directory
     * @param \SplFileInfo $dir The directory holding the data for this element
     * @param \SplFileInfo $rootDir The root directory (phrozn input dir)
     */
    function __construct($dir, $rootDir)
    {

        $this->setDir($dir);
        $this->setRootDir($rootDir);

        $it = new \DirectoryIterator($dir->getPathname());
        foreach ($it as $file) {
            if ($file->isFile() && $file->isReadable()) {

                $filename = $file->getBasename('.'.$file->getExtension());

                if ($filename === 'thumbnail' || $filename === 'thumb') {
                    $this->setThumbnail($this->urlize($file));
                } else if ($file->getBasename() === 'description.yml') {
                    $data = Yaml::parse($file->getPathname());
                    $this->setData($data);
                } else if (in_array($file->getExtension(), array('jpg', 'jpeg', 'png', 'gif', 'webp'))) {
                    $this->addImage($this->urlize($file));
                }

            }
        }

    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }


    /**
     * Removes the input root dir from the full path, so that we may use the result in the html.
     * Eg: /var/www/hellopoyt/src/projects/01-ubi/thumb.jpg -> projects/01-ubi/thumb.jpg
     *
     * @param $fileinfo
     * @return string
     */
    protected function urlize($fileinfo)
    {
        $url = substr($fileinfo->getPathname(), strlen($this->getRootDir()->getPathname())+1);

        return $url;
    }


    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \SplFileInfo $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @return \SplFileInfo
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @param \SplFileInfo $rootDir
     */
    public function setRootDir($rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * @return \SplFileInfo
     */
    public function getRootDir()
    {
        return $this->rootDir;
    }

    /**
     * @param string $image
     */
    public function addImage($image)
    {
        $this->images[] = $image;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

}