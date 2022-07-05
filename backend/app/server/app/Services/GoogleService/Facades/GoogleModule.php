<?php
/**
 * User: vhnvn
 * Date: 9/12/17
 * Time: 4:43 AM
 */

namespace App\Services\GoogleService\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\GoogleService\Logic\GoogleService;

/**
 * Class UUIDModule
 * @package App\Services\UUIDGenerator\Facades
 */
class GoogleModule extends Facade
{
    protected static function getFacadeAccessor()
    {
        return GoogleService::class;
    }
}