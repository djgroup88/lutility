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
     * Generate Progress
     *
     * @param string $modelId
     * @param string $modelType
     * @param string $description
     * @param string $actorType
     * @param string $actorId
     * @return self
     */
    public static function generate(string $modelId, string $modelType, string $description, string $actorType, string $actorId): self
    {
        return self::create([
            'progressable_id' => $modelId,
            'progressable_type' => $modelType,
            'description' => $description,
            'actor_type' => $actorType,
            'actor_id' => $actorId
        ]);
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

    /**
     * Get Actor Model
     *
     * @return Model
     */
    public function getActorModel(): Model
    {
        return $this->actor_type::find($this->actor_id);
    }
}
