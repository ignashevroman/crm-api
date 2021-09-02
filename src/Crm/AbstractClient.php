<?php


namespace Elephantom\CrmAPI\Crm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;

abstract class AbstractClient
{
    /**
     * @var CrmConnectableContract
     */
    protected $crmConnectable;

    /**
     * AbstractClient constructor.
     * @param CrmConnectableContract $crmConnectable
     */
    public function __construct(CrmConnectableContract $crmConnectable)
    {
        $this->crmConnectable = $crmConnectable;
    }

    /**
     * @return CrmConnectableContract
     * @noinspection PhpUnused
     */
    public function getCrmConnectable(): CrmConnectableContract
    {
        return $this->crmConnectable;
    }
}