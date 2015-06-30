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
    }


    /**
     * @test
     */
    public function it_can_register_and_render_closure_widgets()
    {

        // Assert widget not registered
        $this->assertEquals(false, $this->widgets->has('foo'));

        // Register widget
        $this->widgets->register('foo', function ($val = '') {
            return 'bar'.$val;
        });

        // Assert widget is registered
        $this->assertEquals(true, $this->widgets->has('foo'));

        // Assert renders
        $this->assertEquals('bar', $this->widgets->render('foo'));

        $this->assertEquals('bar', $this->widgets->foo());

        // Assert renders with arguments
        $this->assertEquals('barbaz', $this->widgets->render('foo', ['baz']));

        $this->assertEquals('barbaz', $this->widgets->foo('baz'));
    }


    /**
     * @test
     */
    public function it_can_register_and_render_class_widgets()
    {

        // Assert widget not registered
        $this->assertEquals(false, $this->widgets->has('foo'));

        // Register widget
        $this->widgets->register('foo', 'Humweb\Widgets\Tests\Fake\FooWidget@render');
        $this->widgets->register('foo2', 'Humweb\Widgets\Tests\Fake\FooWidget');
        $this->assertEquals(2, count($this->widgets->getWidgets()));

        // Assert widget is registered
        $this->assertEquals(true, $this->widgets->has('foo'));
        $this->assertEquals(true, $this->widgets->has('foo2'));

        // Assert renders
        $this->assertEquals('bar', $this->widgets->render('foo'));
        $this->assertEquals('bar', $this->widgets->render('foo2'));

        // Assert renders with arguments
        $this->assertEquals('barbaz', $this->widgets->render('foo', ['baz']));
    }


    /**
     * @test
     */
    public function it_fails_silently_on_render()
    {
        $this->assertEquals('', $this->widgets->render('asdf123'));
    }


    /**
     * @test
     */
    public function it_fails_silently_on_executeCallback()
    {
        $this->widgets->register('foo123', 123);
        $this->assertEquals('', $this->widgets->render('foo123'));
    }
}