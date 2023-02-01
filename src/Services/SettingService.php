<?php

namespace Rakhasa\Lutility\Services;

use Rakhasa\Lutility\Enums\SettingTypeEnum;
use ArrayAccess;
use Illuminate\Support\Facades\Storage;
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
            return $this->formatValue($item->key, $item->value);
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
     * @return bool
     */
    public function put(string $key, mixed $value): bool
    {
        if (is_null($value)) {
            return false;
        }

        if ($this->getType($key) == SettingTypeEnum::Image) {
            $disk = $this->getUploadDisk(SettingTypeEnum::Image->value);

            Storage::disk($disk)->delete($this->offsetGet($key));

            $value = $value->store('/', ['disk' => $disk]);
        }

        $this->offsetSet($key, $value);

        return Setting::where('key', $key)->update(['value' => $value]);
    }

    /**
     * Get Setting Type
     *
     * @param string $key
     * @return mixed
     */
    public function getType(string $key): mixed
    {
        return config('lutility.setting.list')[$key][0];
    }

    /**
     * Update Multiple Setting
     *
     * @param array $data
     * @return boolean
     */
    public function update(array $data): bool
    {
        foreach ($data as $key => $value) {
            $this->put($key, $value);
        }

        return true;
    }

    /**
     * Format Value
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    protected function formatValue(string $key, mixed $value): mixed
    {
        if ($this->getType($key) == SettingTypeEnum::Image) {
            $value = Storage::disk($this->getUploadDisk(SettingTypeEnum::Image->value))->url($value);
        }

        return $value;
    }

    /**
     * Get Setting Upload Disk
     *
     * @param string $type
     * @return string
     */
    public function getUploadDisk(string $type): string
    {
        return config('lutility.setting.upload_disk')[$type];
    }
}
