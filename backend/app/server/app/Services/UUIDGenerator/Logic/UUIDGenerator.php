<?php

namespace App\Services\UUIDGenerator\Logic;

use Webpatser\Uuid\Uuid;

class UUIDGenerator
{
    const CHARSET = "0123456789abcdefghkmnpqrstvxyz";
    const CHARSET_LEN = 30;

    /**
     * @return mixed
     * @throws \Exception
     */
    function generate()
    {
        $uuid = Uuid::generate(4);
        /** @noinspection PhpUndefinedFieldInspection */
        return $uuid->string;
    }

    function generateShortId($len = 10)
    {
        $r = "";

        while ($len-- > 0) {
            do {
                $val = ord(random_bytes(1));
            } while ($val < (256 % self::CHARSET_LEN));
            $val -= 256 % self::CHARSET_LEN;
            $val %= self::CHARSET_LEN;
            $r .= self::CHARSET[$val];
        }

        return $r;
    }

    /**
     * @param integer $number
     * @param integer $min_len
     * @return string|null
     */
    function makeIdFromNumber($number, $min_len = 0)
    {
        $result = "";

        if ($number < 0) {
            return null;
        }

        if ($number === 0) {
            $result = self::CHARSET[$number % self::CHARSET_LEN];
        } else {
            while ($number > 0) {
                $result = self::CHARSET[$number % self::CHARSET_LEN] . $result;
                $number = floor($number / self::CHARSET_LEN);
            }
        }

        while (strlen($result) < $min_len) $result = self::CHARSET[0] . "$result";

        return $result;
    }

    /**
     * @param string $id
     * @return bool|int|null
     */
    public function getNumberFromId($id)
    {
        $chars = str_split($id);
        $base = 1;
        $result = 0;

        for ($i = count($chars) - 1; $i >= 0; $i--) {
            $value = strpos(self::CHARSET, $chars[$i]);

            if ($value === false) {
                return null;
            }

            $result += $base * $value;
            $base *= self::CHARSET_LEN;
        }

        return $result;
    }
}