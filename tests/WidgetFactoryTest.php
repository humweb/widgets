<?php

namespace Humweb\Widgets\Tests;

use Humweb\Widgets\Widget;
use Humweb\Widgets\WidgetFactory;

/**
 * Class WidgetFactoryTest
 */
class WidgetFactoryTest extends \PHPUnit_Framework_TestCase
{

    /** @var WidgetFactory */
    protected $widgets;

    public function setUp()
    {
        parent::setUp();

        $this->widgets = new WidgetFactory();
    }

    public function tearDown()
    {
        unset($this->widgets);
        unset($this->blade);
    }


    /**
     * @test
     */
    public function it_can_register_and_render_closure_widgets()
    {

        // Assert widget not registered
        $this->assertEquals(false, $this->widgets->has('foo'));

        // Register widget
        $this->widgets->register('foo', function($val = '') {
           return 'bar'.$val;
        });

        // Assert widget is registered
        $this->assertEquals(true, $this->widgets->has('foo'));

        // Assert renders
        $this->assertEquals('bar', $this->widgets->render('foo'));

        // Assert renders with arguments
        $this->assertEquals('barbaz', $this->widgets->render('foo', ['baz']));
    }


    /**
     * @test
     */
    public function it_can_register_and_render_class_widgets()
    {

        // Assert widget not registered
        $this->assertEquals(false, $this->widgets->has('foo'));

        // Register widget
        $this->widgets->register('foo', 'Humweb\Widgets\Tests\FooWidget@render');

        // Assert widget is registered
        $this->assertEquals(true, $this->widgets->has('foo'));

        // Assert renders
        $this->assertEquals('bar', $this->widgets->render('foo'));

        // Assert renders with arguments
        $this->assertEquals('barbaz', $this->widgets->render('foo', ['baz']));
    }
}

/**
 * Fake FooWidget
 */
class FooWidget extends Widget {

    public function render($val = '')
    {
        return 'bar'.$val;
    }

}