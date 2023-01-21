<?php

namespace Rakhasa\LaravelUtility\Concerns;

use Rakhasa\LaravelUtility\Models\Progress;

trait ProgressableModel
{
    /**
     * Get all of the post's comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function progress(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Progress::class, 'progressable');
    }

    /**
     * Create Progress Task
     *
     * @param string $actorType
     * @param string $actorId
     * @param string $description
     * @return Progress
     */
    public function createProgress(string $actorType, string $actorId, string $description): Progress
    {
        return $this->progress()->create([
            'progressable_id' => $this->id,
            'progressable_type' => $this::class,
            'description' => $description,
            'actor_type' => $actorType,
            'actor_id' => $actorId
        ]);
    }
}
