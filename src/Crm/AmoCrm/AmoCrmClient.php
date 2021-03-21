<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\OAuth\OAuthConfigInterface;
use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractClient;
use Elephantom\CrmAPI\Util\DTO\AmoCrm\AmoCrmOAuthConfig;

final class AmoCrmClient extends AbstractClient
{
    /**
     * @var AmoCRMApiClient
     */
    private $client;

    public function __construct(CrmConnectableContract $crmConnectable, ?OAuthConfigInterface $authConfig = null)
    {
        parent::__construct($crmConnectable);

        $authConfig = $authConfig ?: new AmoCrmOAuthConfig();

        $this->client = new AmoCRMApiClient(
            $authConfig->getIntegrationId(),
            $authConfig->getSecretKey(),
            $authConfig->getRedirectDomain()
        );
    }
}