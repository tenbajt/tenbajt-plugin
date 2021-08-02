<?php

namespace Tenbajt\Tenbajt\Foundation;

class ClassLoader
{
    /**
     * List of binded namespaces with paths.
     * 
     * @var array
     */
    private $bindings = [];

    /**
     * Create a new class loader instance.
     * 
     * @return void
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    /**
     * Bind namespace with path for loader to load classes from.
     * 
     * @param  string  $namespace
     * @param  string  $path
     * @return ClassLoader
     */
    public function bind(string $namespace, string $path): ClassLoader
    {
        $this->bindings[$namespace] = $path;

        return $this;
    }

    /**
     * Autoload class file when requested.
     * 
     * @param  string  $abstract
     * @return void
     */
    public function load(string $abstract): void
    {
        $namespace = $this->resolveNamespace($abstract);

        // Bail early if requested abstract belongs to unbinded namespace.
        if (! $this->hasNamespace($namespace)) {
            return;
        }
        
        // Resolve root path from the binding.
        $path = $this->bindings[$namespace];

        // Convert abstract's namespace path to usable file path.
        $abstract = $this->parseAbstract($abstract, $namespace);

        require_once $path.$abstract.'.php';
    }

    /**
     * Resolve namespace from a given abstract.
     * 
     * @param  string  $abstract
     * @return string
     */
    private function resolveNamespace(string $abstract): string
    {
        $parts = array_filter(explode('\\', $abstract));

        if (! is_array($parts) || empty($parts)) {
            return '';
        }

        return reset($parts);
    }

    /**
     * Determine if a namespace has been bound.
     * 
     * @param  string  $namespace
     * @return bool
     */
    private function hasNamespace(string $namespace): bool
    {
        return array_key_exists($namespace, $this->bindings);
    }

    /**
     * Parse given abstract to file path format.
     * 
     * @param  string  $abstract
     * @param  string  $namespace
     * @return string
     */
    private function parseAbstract(string $abstract, string $namespace): string
    {
        // Remove namespace from the abstract.
        $abstract = substr_replace($abstract, '', 0, strlen($namespace));
        // Convert namespace path to file path.
        $abstract = strtr($abstract, ['\\' => '/']);

        return $abstract;
    }
}

return new ClassLoader();