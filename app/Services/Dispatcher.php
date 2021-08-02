<?php

namespace Tenbajt\Services;

use Closure;
use ReflectionMethod;
use ReflectionFunction;
use Illuminate\Container\Util;
use Illuminate\Container\Container;

class Dispatcher extends Service
{
    /**
     * The service container instance.
     * 
     * @var Container
     */
    protected $container;

    /**
     * Create a new dispatcher instance.
     * 
     * @param  Container  $container
     * @return void
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Bind a closure for the event.
     * 
     * @param  string  $hook
     * @param  callable|string  $callback
     * @return void
     */
    public function bind(string $hook, $listener): void
    {
        add_filter($hook, $this->makeCallback($listener), $this->getPriority($listener), 4);
    }

    /**
     * Make a new callback for the given listener.
     * 
     * @param  callable|string  $listener
     * @return Closure
     */
    protected function makeCallback($listener): Closure
    {
        return function () use ($listener) {
            return $this->container->call($listener, $this->getDependencies($listener, func_get_args()));
        };
    }

    /**
     * Resolve event priority for the given listener.
     * 
     * @param  callable|string  $listener
     * @return int
     */
    protected function getPriority($listener): int
    {
        foreach ($this->getParameters($listener) as $parameter) {
            if ('priority' == $parameter->name) {
                return $parameter->getDefaultValue();
            }
        }

        return 10;
    }

    /**
     * Resolve method dependencies for the given listener.
     * 
     * @param  callable|string  $listener
     * @param  array  $values
     * @return array
     */
    protected function getDependencies($listener, array $values): array
    {
        $keys = [];

        foreach ($this->getParameters($listener) as $parameter) {
            if ('priority' != $parameter->name && is_null(Util::getParameterClassName($parameter))) {
                $keys[] = $parameter->name;
            }
        }

        return count($keys) == count($values) ? array_combine($keys, $values) : [];
    }

    /**
     * Return the proper reflection instance for the given callback.
     *
     * @param  callable|string  $listener
     * @return ReflectionParameter[]
     */
    protected function getParameters($listener): array
    {
        if (is_string($listener) && strpos($listener, '@') !== false) {
            $listener = explode('@', $listener);
        } elseif (is_string($listener) && strpos($listener, '::') !== false) {
            $listener = explode('::', $listener);
        } elseif (is_object($listener) && ! $listener instanceof Closure) {
            $listener = [$listener, '__invoke'];
        }

        return (is_array($listener)
            ? new ReflectionMethod($listener[0], $listener[1])
            : new ReflectionFunction($listener))
                ->getParameters();
    }
}