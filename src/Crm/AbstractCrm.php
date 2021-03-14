<?php


namespace Elephantom\CrmAPI\Crm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;

abstract class AbstractCrm
{
    /**
     * @var CrmEnum
     */
    protected static $type;

    /**
     * @var string
     */
    protected static $name = 'Abstract CRM';

    /**
     * @return void
     */
    abstract protected static function initType(): void;

    /**
     * @return CrmEnum
     */
    public static function getType(): CrmEnum
    {
        if (!static::$type) {
            static::initType();
        }

        return static::$type;
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * @param CrmConnectableContract $crmConnectable
     * @return bool
     */
    public static function isConnectedBy(CrmConnectableContract $crmConnectable): bool
    {
        return $crmConnectable->hasConnected(static::class);
    }
}