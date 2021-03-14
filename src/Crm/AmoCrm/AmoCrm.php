<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use Elephantom\CrmAPI\Crm\AbstractCrm;
use Elephantom\CrmAPI\CrmClients\AbstractClient;
use Elephantom\CrmAPI\CrmClients\AmoCrm\AmoCrmClient;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;

class AmoCrm extends AbstractCrm
{
    /**
     * @var string
     */
    protected static $name = 'AMOCRM';

    /**
     * @inheritDoc
     */
    protected static function initType(): void
    {
        static::$type = CrmEnum::amocrm();
    }

    /**
     * @inheritDoc
     */
    protected function createClient(): AbstractClient
    {
        return new AmoCrmClient();
    }
}