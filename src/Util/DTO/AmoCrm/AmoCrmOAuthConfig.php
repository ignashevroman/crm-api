<?php


namespace Elephantom\CrmAPI\Util\DTO\AmoCrm;


use AmoCRM\OAuth\OAuthConfigInterface;

final class AmoCrmOAuthConfig implements OAuthConfigInterface
{

    /**
     * @var string
     */
    private $integrationId;

    /**
     * @var string
     */
    private $secretKey;

    /**
     * @var string
     */
    private $redirectDomain;

    /**
     * AmoCrmOAuthConfig constructor.
     * @param string|null $integrationId
     * @param string|null $secretKey
     * @param string|null $redirectDomain
     */
    public function __construct(
        ?string $integrationId = null,
        ?string $secretKey = null,
        ?string $redirectDomain = null
    ) {
        $this->integrationId = $integrationId ?: (string)getenv('AMOCRM_INTEGRATION_ID');
        $this->secretKey = $secretKey ?: (string)getenv('AMOCRM_SECRET_KEY');
        $this->redirectDomain = $redirectDomain ?: (string)getenv('AMOCRM_REDIRECT_DOMAIN');
    }

    /**
     * @inheritDoc
     */
    public function getIntegrationId(): string
    {
        return $this->integrationId;
    }

    /**
     * @inheritDoc
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @inheritDoc
     */
    public function getRedirectDomain(): string
    {
        return $this->redirectDomain;
    }
}