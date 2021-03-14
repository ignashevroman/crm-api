<?php


namespace Elephantom\CrmAPI\Exceptions\Crm;


use Elephantom\CrmAPI\Contracts\CrmConnectableContract;
use Elephantom\CrmAPI\Crm\AbstractCrm;
use Exception;
use Throwable;

final class CrmConnectException extends Exception
{
    /**
     * @var AbstractCrm|string|null
     */
    private $crm;

    /**
     * @var CrmConnectableContract|null
     */
    private $crmConnectable;

    /**
     * CrmConnectException constructor.
     * @param string $message
     * @param AbstractCrm|string|null $crm
     * @param CrmConnectableContract|null $crmConnectable
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = '', $crm = null, ?CrmConnectableContract $crmConnectable = null, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->crm = $crm;
        $this->crmConnectable = $crmConnectable;
    }

    /**
     * @return AbstractCrm|string|null
     */
    public function getCrm()
    {
        return $this->crm;
    }

    /**
     * @return CrmConnectableContract|null
     */
    public function getCrmConnectable(): ?CrmConnectableContract
    {
        return $this->crmConnectable;
    }
}