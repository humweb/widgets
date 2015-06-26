<?php

namespace Humweb\Widgets\Tests\Fake;

use Humweb\Widgets\Widget;

/**
 * Fake FooWidget
 */
class FooWidget extends Widget
{

    protected $name        = 'Foo Widget';
    protected $author      = 'Luke Skywalker';
    protected $description = 'Widget that foo\'s';
    protected $version     = '0.0.1';
    protected $keywords    = ['foo', 'bar'];
    protected $licence     = 'MIT';


    public function render($val = '')
    {
        return 'bar'.$val;
    }

}