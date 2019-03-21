<?php

namespace KolesárAndrás\Adóazonosító;

use DateTime;
use Carbon\Carbon;

class Adóazonosító {

    public static function helyes(string $adóazonosító): bool {
        return $adóazonosító[9] == self::ellenőrzőSzámjegy($adóazonosító);
    }

    public static function ellenőrzőSzámjegy(string $adóazonosító): int {
        $összeg = 0;
        for ($i = 0; $i<9; $i++) {
            $összeg += ($i+1) * (int) $adóazonosító[$i];
        }
        $maradék = $összeg % 11;
        if ($maradék == 10) {
            throw new Exception('a maradék nem lehet 10');
        }
        return $maradék;
    }

    public static function születésnap(string $adóazonosító): DateTime {
        $napok = substr($adóazonosító, 1, 5);
        $kezdet = new Carbon('1867-01-01');
        $születésnap = $kezdet->addDays($napok);
        return $születésnap;
    }

}
