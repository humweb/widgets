<?php

namespace Humweb\Widgets\Tests;

use Humweb\Widgets\Tests\Fake\FooWidget;
use Humweb\Widgets\Widget;

/**
 * Class WidgetTest
 */
class WidgetTest extends \PHPUnit_Framework_TestCase
{

    /** @var Widget */
    protected $widget;


    public function setUp()
    {
        parent::setUp();

        $this->widget = new FooWidget();
    }


    public function tearDown()
    {
        unset($this->widget);
    }


    /**
     * @test
     */
    public function it_gets_widget_name()
    {
        $this->assertEquals('Foo Widget', $this->widget->getName());
    }


    /**
     * @test
     */
    public function it_gets_widget_description()
    {
        $this->assertEquals('Widget that foo\'s', $this->widget->getDescription());
    }


    /**
     * @test
     */
    public function it_gets_widget_author()
    {
        $this->assertEquals('Luke Skywalker', $this->widget->getAuthor());
    }


    /**
     * @test
     */
    public function it_gets_widget_version()
    {
        $this->assertEquals('0.0.1', $this->widget->getVersion());
    }


    /**
     * @test
     */
    public function it_gets_widget_keywords()
    {
        $this->assertEquals(['foo', 'bar'], $this->widget->getKeywords());
    }


    /**
     * @test
     */
    public function it_gets_widget_license()
    {
        $this->assertEquals('MIT', $this->widget->getLicence());
    }


    /**
     * @test
     */
    public function it_can_render_widget()
    {
        $this->assertEquals('bar', $this->widget->render());
        $this->assertEquals('barfoo', $this->widget->render('foo'));
    }
}

