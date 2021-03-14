<?php


namespace Elephantom\CrmAPI\Util\Enum;


class CrmEnum extends AbstractEnum
{
    public const AMOCRM = 'amocrm';

    public static function amocrm(): CrmEnum
    {
        return new static(static::AMOCRM);
    }
}