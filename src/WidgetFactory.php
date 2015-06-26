<?php namespace Humweb\Widgets;

use Closure;

/**
 * Class WidgetFactory
 *
 * @package App\Modules\Themes
 */
class WidgetFactory
{
    /**
     * @var array
     */
    protected $widgets = array();

    protected $instantiatedWidgets = [];


    /**
     * @param $name
     * @param $callback
     */
    public function register($name, $callback)
    {
        $this->widgets[$name] = $callback;
    }


    /**
     * Render widget instance
     *
     * @param string $name
     * @param array  $args
     *
     * @return string
     */
    public function render($name, array $args = array())
    {
        if ($this->has($name)) {
            $callback = $this->widgets[$name];

            return $this->executeCallback($callback, $args);
        }

        return '';
    }


    /**
     * Check if widget is registered
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return isset($this->widgets[$name]);
    }


    /**
     * Execute callback
     *
     * @param $callback
     * @param $args
     *
     * @return string
     */
    private function executeCallback($callback, $args)
    {
        if (is_string($callback)) {
            return $this->callStringCallback($callback, $args);
        } elseif ($callback instanceof Closure) {
            return call_user_func_array($callback, $args);
        } else {
            return '';
        }
    }


    /**
     * Execute string callback
     *
     * @param string $callback
     * @param array  $args
     *
     * @return string
     */
    function callStringCallback($callback, $args = [])
    {
        if (strpos($callback, '@')) {
            list($klass, $method) = explode('@', $callback);
        } else {
            $klass  = $callback;
            $method = 'render';
        }

        $klass = isset($this->instantiatedWidgets[$klass]) ? $this->instantiatedWidgets[$klass] : new $klass;

        return call_user_func_array([$klass, $method], $args);
    }


    /**
     * Magically render widgets
     *
     * @param string $widget
     * @param array  $parameters
     *
     * @return string
     */
    public function __call($widget, $parameters = array())
    {
        return $this->render($widget, $parameters);
    }


    /**
     * @return array
     */
    public function getWidgets()
    {
        return $this->widgets;
    }
} 