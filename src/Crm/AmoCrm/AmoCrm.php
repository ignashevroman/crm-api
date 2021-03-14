<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use Elephantom\CrmAPI\Crm\AbstractCrm;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;

class AmoCrm extends AbstractCrm
{
    protected static $name = 'AMOCRM';

    protected static function initType(): void
    {
        static::$type = CrmEnum::amocrm();
    }
}