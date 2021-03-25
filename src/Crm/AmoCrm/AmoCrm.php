<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use AmoCRM\OAuth\OAuthConfigInterface;
use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractClient;
use Elephantom\CrmAPI\Crm\AbstractCrm;
use Elephantom\CrmAPI\Util\Enum\CrmEnum;
use Webmozart\Assert\Assert;

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
        // Проверям, что резолвер установлен
        Assert::isCallable(static::$authConfigResolver, sprintf('Cannot create client. You should set %s::authConfigResolver() first', static::class));

        // Получаем конфиг
        $config = call_user_func(static::$authConfigResolver);

        // Проверяем, что конфиг верного типа
        Assert::isInstanceOf($config, OAuthConfigInterface::class, sprintf('Result of %s::authConfigResolver() should be %s', static::class, OAuthConfigInterface::class));

        // Создаем клиент
        return new AmoCrmClient($crmConnectable, $config);
    }
}