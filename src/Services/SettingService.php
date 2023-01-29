<?php

namespace Rakhasa\Lutility\Services;

use ArrayAccess;
use Rakhasa\Lutility\Models\Setting;

class SettingService implements ArrayAccess
{
    /**
     * Container
     *
     * @var array
     */
    private $container = [];

    /**
     * Construct
     */
    public function __construct()
    {
        $this->container = $this->source();
    }

    /**
     * Source
     *
     * @return array
     */
    protected function source(): array
    {
        return Setting::all()->keyBy('key')->map(function($item) {
            return $item->value;
        })->toArray();
    }

    /**
     * Check Offset Exist
     *
     * @param mixed $offset
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Get Data of Offset
     *
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Set Data of Offset
     *
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unset Data of Offset
     *
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Get All Setting
     *
     * @return array
     */
    public function all(): array
    {
        return $this->container;
    }

    /**
     * Get Setting by Specific Key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->offsetGet($key);
    }

    /**
     * Put Setting Value With Specific Key
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function put(string $key, mixed $value): void
    {
        $this->offsetSet($key, $value);
    }
}
