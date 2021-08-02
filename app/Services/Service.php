<?php

namespace Tenbajt\Services;

use Closure;
use ReflectionMethod;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class Service
{
    /**
     * An array of hook bindings for the service.
     * 
     * @var array
     */
    protected $hookBindings = [];

    /**
     * Indicates if the service has "booted".
     * 
     * @var bool
     */
    protected $booted = false;

    /**
     * An array of "booted" listeners for the service.
     *
     * @var Closure[]
     */
    protected $bootedListeners = [];

    /**
     * Create a new service instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->bindHooks($this->hookBindings);
    }

    /**
     * Bind hooks with methods for the service.
     * 
     * @param  array  $hookBindings
     * @return void
     */
    protected function bindHooks(array $hookBindings): void
    {
        foreach ($hookBindings as $hook => $method) {
            $this->bindHook($hook, $method);
        }
    }

    /**
     * Bind hook with a method for the service.
     * 
     * @param  string  $hook
     * @param  string  $method
     * @return void
     */
    protected function bindHook(string $hook, string $method): void
    {
        $priority = 10;
        $parameters = collect((new ReflectionMethod($this, $method))->getParameters());
        $parametersCount = $parameters->count();

        if ($parameters->contains('name', 'priority')) {
            $priority = $parameters->last()->getDefaultValue();
            $parametersCount = $parametersCount - 1;
        }

        add_filter($hook, [$this, $method], $priority, $parametersCount);
    }

    /**
     * Boot the service.
     * 
     * @return mixed
     */
    public function boot()
    {
        $this->booted = true;

        $this->fireListeners($this->bootedListeners);
    }

    /**
     * Register a new "booted" listener for the service.
     * 
     * @param  Closure  $listener
     * @return void
     */
    public function booted(Closure $listener): void
    {
        $this->bootedListeners[] = $listener;

        if ($this->isBooted()) {
            $this->fireListeners([$listener]);
        }
    }

    /**
     * Determine if the service has booted.
     * 
     * @return bool
     */
    public function isBooted(): bool
    {
        return $this->booted;
    }

    /**
     * Call the listeners for the service.
     * 
     * @param  Closure[]  $filters
     * @return void
     */
    protected function fireListeners(array $listeners): void
    {
        foreach ($listeners as $listener) {
            $listener($this);
        }
    }

    /**
     * Dynamically set services's property.
     * 
     * @param  string  $name
     * @param  mixed  $value
     * @return void
     */
    public function __set(string $name, $value): void
    {
        $this->{'set'.Str::studly($name)}($value);
    }

    /**
     * Dynamically retrieve services' property.
     * 
     * @param  string  $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->{'get'.Str::studly($name)}();
    }

    /**
     * Handle dynamic method calls into the service.
     * 
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        //
    }
}