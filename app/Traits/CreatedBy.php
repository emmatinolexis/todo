<?php

namespace App\Traits;

use App\Models\User;

trait CreatedBy
{
    public static function bootCreatedBy()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->check() ? auth()->id() : null;
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault([
            'name' => 'No name'
        ]);
    }
}
