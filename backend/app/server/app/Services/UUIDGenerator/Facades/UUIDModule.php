<?php

namespace App\Services\UUIDGenerator\Facades;

use App\Services\UUIDGenerator\Logic\UUIDGenerator;
use Illuminate\Support\Facades\Facade;

/**
 * Class UUIDModule
 * @package App\Services\UUIDGenerator\Facades
 */
class UUIDModule extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UUIDGenerator::class;
    }
}