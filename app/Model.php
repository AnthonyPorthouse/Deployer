<?php

namespace Deployer;

use Rhumsaa\Uuid\Uuid;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public $incrementing = false;

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) $model->generateNewId();
        });
    }

    /**
     * Create a new ID as a random UUID.
     *
     * @return Uuid
     */
    public function generateNewId()
    {
        return Uuid::uuid4();
    }
}
