<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\OAuth\OAuthConfigInterface;
use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractClient;
use League\OAuth2\Client\Token\AccessTokenInterface;

final class AmoCrmClient extends AbstractClient
{
    /**
     * @var AmoCRMApiClient
     */
    private $client;

    /**
     * AmoCrmClient constructor.
     * @param CrmConnectableContract $crmConnectable
     * @param OAuthConfigInterface $authConfig
     */
    public function __construct(CrmConnectableContract $crmConnectable, OAuthConfigInterface $authConfig)
    {
        parent::__construct($crmConnectable);

        $this->client = new AmoCRMApiClient(
            $authConfig->getIntegrationId(),
            $authConfig->getSecretKey(),
            $authConfig->getRedirectDomain()
        );

        $this->client->onAccessTokenRefresh([$crmConnectable, 'saveAmoCrmAccessToken']);

        $accessToken = $crmConnectable->getAmoCrmAccessToken();

        if ($accessToken instanceof AccessTokenInterface) {
            $this->client
                ->setAccessToken($accessToken)
                ->setAccountBaseDomain($accessToken->getValues()['domain']);
        }
    }
}