<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    const DATE_FORMAT  = 'Y-m-d';
    const NUMBER_REGEX = '[0-9]+(\.[0-9]+)?';
}
