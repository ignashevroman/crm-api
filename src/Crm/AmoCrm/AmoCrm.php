<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractCrm;
use Elephantom\CrmAPI\Crm\AbstractClient;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;

final class AmoCrm extends AbstractCrm
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
        static::$type = CrmEnum::AMOCRM();
    }

    /**
     * @inheritDoc
     */
    protected static function createClient(CrmConnectableContract $crmConnectable): AbstractClient
    {
        return new AmoCrmClient();
    }
}