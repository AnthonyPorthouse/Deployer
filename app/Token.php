<?php

namespace Deployer;

/**
 * Class Token.
 *
 * @property User $user
 */
class Token extends Model
{
    protected $fillable = ['token', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
