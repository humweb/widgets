<?php

namespace Humweb\Widgets;

/**
 * Class Widget
 *
 * @package App\Widgets
 */
abstract class Widget
{

    /**
     * Theme name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Theme Author
     *
     * @var string
     */
    protected $author = '';

    /**
     * Theme description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Theme version
     *
     * @var string
     */
    protected $version = '0.0.1';

    /**
     * Theme keywords
     *
     * @var array
     */
    protected $keywords = [];

    /**
     * Theme license type
     *
     * @var string
     */
    protected $licence = 'MIT';

    /**
     * Event listeners
     *
     * @var array
     */
    public $events = [
        'post.install' => '',
        'post.update'  => '',
    ];


    public function __construct()
    {
    }


    abstract function render();


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