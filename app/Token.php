<?php

namespace Deployer;

/**
 * Class Token
 *
 * @property User $user
 *
 * @package Deployer
 */
class Token extends Model
{
    protected $fillable = ['token', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
