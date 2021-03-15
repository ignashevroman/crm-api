<?php


namespace Elephantom\CrmAPI\Crm;



use Elephantom\CrmAPI\Contracts\CrmAuthenticationDataContract;

abstract class AbstractClient
{
    protected $authData;

    /**
     * AbstractClient constructor.
     * @param CrmAuthenticationDataContract $authData
     */
    public function __construct(CrmAuthenticationDataContract $authData)
    {
        $this->authData = $authData;
    }
}