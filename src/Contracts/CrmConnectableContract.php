<?php


namespace Elephantom\CrmAPI\Contracts;


use Elephantom\CrmAPI\Crm\AbstractCrm;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;

interface CrmConnectableContract
{
    /**
     * @param AbstractCrm|string $crm
     * @return bool
     */
    public function hasConnected($crm): bool;

    /**
     * @return mixed
     */
    public function getIdentifier();

    /**
     * @return AccessToken|null
     */
    public function getAmoCrmAccessToken(): ?AccessToken;

    /**
     * @param AccessTokenInterface $accessToken
     * @param string $domain
     * @return void
     */
    public function saveAmoCrmAccessToken(AccessTokenInterface $accessToken, string $domain): void;
}