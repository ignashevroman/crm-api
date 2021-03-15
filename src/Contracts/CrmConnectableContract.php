<?php


namespace Elephantom\CrmAPI\Contracts;


use Elephantom\CrmAPI\Crm\AbstractCrm;

interface CrmConnectableContract
{
    /**
     * @param AbstractCrm|string $crm
     * @return bool
     */
    public function hasConnected($crm): bool;

    /**
     * @param AbstractCrm|string $crm
     * @return void
     */
    public function connect($crm): void;

    /**
     * @param AbstractCrm|string $crm
     * @return CrmAuthenticationDataContract
     */
    public function getAuthData($crm): CrmAuthenticationDataContract;
}