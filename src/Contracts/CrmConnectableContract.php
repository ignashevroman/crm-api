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
     * @return mixed
     */
    public function getIdentifier();
}