<?php

namespace App\Domain;

class Travaux
{
    const TYPE_AGRANDISSEMENT = 'agrandissement';
    const TYPE_CHANGEMENT_EXTERIEUR = 'changement-exterieur';
    const TYPE_ANNEXE = 'annexe';
    const TYPE_CLOTURE = 'cloture';
    const TYPE_DIVISION = 'division';
    const TYPE_MULTI = 'multitravaux';

    const TYPES = [
        self::TYPE_AGRANDISSEMENT,
        self::TYPE_CHANGEMENT_EXTERIEUR,
        self::TYPE_ANNEXE,
        self::TYPE_CLOTURE,
        self::TYPE_DIVISION,
        self::TYPE_MULTI,
    ];

    static function isValidType($type) {
        return in_array($type, self::TYPES);
    }
}
