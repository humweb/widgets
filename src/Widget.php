<?php

namespace Humweb\Widgets;

/**
 * Class Widget
 *
 * @package Humweb\Widgets
 */
abstract class Widget
{

    /**
     * Widget name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Widget Author
     *
     * @var string
     */
    protected $author = '';

    /**
     * Widget description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Widget version
     *
     * @var string
     */
    protected $version = '0.0.1';

    /**
     * Widget keywords
     *
     * @var array
     */
    protected $keywords = [];

    /**
     * Widget license type
     *
     * @var string
     */
    protected $licence = 'MIT';


    public function __construct()
    {
    }


    abstract public function render();


    /**
     * Get widget name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get widget author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     * Get widget description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }


    /**
     * Get keywords
     *
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }


    /**
     * Get license
     *
     * @return string
     */
    public function getLicence()
    {
        return $this->licence;
    }

} 