<?php

namespace Rakhasa\LaravelUtility\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Rakhasa\LaravelUtility\Concerns\HasPackageFactory;
use Rakhasa\LaravelUtility\Contracts\ProgressModelContract;

class Progress extends Model
{
    use HasPackageFactory, HasUuids;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Get the parent progressable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function progressable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Set Progress to Complete
     *
     * @return void
     */
    public function setAsComplete(): void
    {
        $this->completed_at = now();
        $this->save();
    }
}
