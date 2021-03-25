<?php


namespace Elephantom\CrmAPI\Crm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Exceptions\Crm\CrmConnectException;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;

abstract class AbstractCrm
{
    /**
     * Храним тип CRM из Enum
     *
     * @var CrmEnum
     */
    protected static $type;

    /**
     * Возможно понадобиться выводить назнавние CRM системы
     *
     * @var string
     */
    protected static $name = 'Abstract CRM';

    /**
     * Для разных юзеров создаем свой клиент
     *
     * @var AbstractClient[]
     */
    protected static $clients;

    /**
     * Колбэк, который должен возвращать общие (!) данные для подключения
     * Например id и secret интеграции, но не access token
     *
     * @var callable
     */
    protected static $authConfigResolver;

    /**
     * В этом методе нужно проинициализировать поле $type
     * По сути просто присвоить ему значение из CrmEnum
     *
     * @return void
     */
    abstract protected static function initType(): void;

    /**
     * Фабричный метод создания клиента.
     *
     * @param CrmConnectableContract $crmConnectable
     * @return AbstractClient
     */
    abstract protected static function createClient(CrmConnectableContract $crmConnectable): AbstractClient;

    /**
     * Метод для установки резолвера - функции,
     * которая вернет конфиг для подключения
     *
     * @param callable $resolver
     */
    public static function setAuthConfigResolver(callable $resolver): void
    {
        static::$authConfigResolver = $resolver;
    }

    /**
     * Получение типа CRM
     *
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
     * Получение названия CRM
     *
     * @return string
     * @noinspection PhpUnused
     */
    public static function getName(): string
    {
        return static::$name;
    }

    /**
     * Проверка подключен ли подключаемый объект к данной CRM
     *
     * @param CrmConnectableContract $crmConnectable
     * @return bool
     */
    public static function isConnectedBy(CrmConnectableContract $crmConnectable): bool
    {
        return $crmConnectable->hasConnected(static::class);
    }

    /**
     * Подключение подключаемого объекта к CRM
     *
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
     * Метод получения клиента для подключаемого объекта.
     * При наличии уже существующего инстанса, возвращает его,
     * Иначе создает новый
     *
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