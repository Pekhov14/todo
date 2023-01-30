<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind(string $key, callable $resolver): void
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {
        if (! array_key_exists($key, $this->bindings)) {
            throw new \RuntimeException("No matching binding found for {$key}");
        }

        $resolver = $this->bindings[$key];

        return $resolver();
    }
}