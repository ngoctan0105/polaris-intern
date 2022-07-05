<?php

namespace App\Services\UUIDGenerator\Models\Traits;

use App\Services\UUIDGenerator\Logic\UUIDGenerator;

trait HasUUIDPrimaryKey
{
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if ($model->incrementing) {
                throw new \Exception("UUID Model must not be incrementing");
            }
            if (!$model->{$model->getKeyName()}) {
                $model->{$model->getKeyName()} = app(UUIDGenerator::class)->generate();
            }
        });
    }
}
