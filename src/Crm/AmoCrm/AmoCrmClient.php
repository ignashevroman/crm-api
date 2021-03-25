<?php


namespace Elephantom\CrmAPI\Crm\AmoCrm;


use AmoCRM\AmoCRM\Client\AmoCRMApiClientFactory;
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\OAuth\OAuthConfigInterface;
use AmoCRM\OAuth\OAuthServiceInterface;
use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractClient;
use League\OAuth2\Client\Token\AccessTokenInterface;

final class AmoCrmClient extends AbstractClient implements OAuthServiceInterface
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

        $this->client = (new AmoCRMApiClientFactory($authConfig, $this))->make();
    }

    /**
     * @inheritDoc
     */
    public function saveOAuthToken(AccessTokenInterface $accessToken, string $baseDomain): void
    {
        // TODO: Implement saveOAuthToken() method.
    }
}