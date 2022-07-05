<?php


namespace App;


use \Illuminate\Support\Facades\DB;

class DBChecker
{
    function isDbReady() {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}