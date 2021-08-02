<?php

namespace Tenbajt\Services;

class Request
{
    /**
     * The request data passed through GET method.
     * 
     * @var array
     */
    protected $query;
    
    /**
     * The request's data passed through POST method.
     * 
     * @var array
     */
    protected $request;

    /**
     * Create a new request instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->query = $_GET;
        $this->request = $_REQUEST;
    }

    /**
     * Determine whether the key exists.
     * 
     * @param  string  $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->request);
    }

    /**
     * Return the request input value.
     * 
     * @param  string  $key
     * @return mixed
     */
    public function input(string $key = '')
    {
        if ($key) {
            return $this->request[$key];
        }

        return $this->request;
    }
}