<?php


namespace Elephantom\CrmAPI\Crm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Exceptions\Crm\CrmConnectException;
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
     * @var AbstractClient[]
     */
    protected static $clients;

    /**
     * @return void
     */
    abstract protected static function initType(): void;

    /**
     * @param CrmConnectableContract $crmConnectable
     * @return AbstractClient
     */
    abstract protected static function createClient(CrmConnectableContract $crmConnectable): AbstractClient;

    /**
     * @return CrmEnum
     * @noinspection PhpUnused
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
     * @noinspection PhpUnused
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

    /**
     * @param CrmConnectableContract $crmConnectable
     * @throws CrmConnectException
     * @noinspection PhpUnused
     */
    public static function connectFor(CrmConnectableContract $crmConnectable): void
    {
        if (static::isConnectedBy($crmConnectable)) {
            throw new CrmConnectException('Already connected', static::class, $crmConnectable);
        }
        // TODO: connection logic
    }

    /**
     * @param CrmConnectableContract $crmConnectable
     * @return AbstractClient
     * @noinspection PhpUnused
     */
    public static function client(CrmConnectableContract $crmConnectable): AbstractClient
    {
        if (!array_key_exists($crmConnectable->getIdentifier(), static::$clients)) {
            static::$clients[$crmConnectable->getIdentifier()] = static::createClient($crmConnectable);
        }

        return static::$clients[$crmConnectable->getIdentifier()];
    }

}