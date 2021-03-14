<?php


namespace Elephantom\CrmAPI\Util\Enum;


abstract class AbstractEnum
{
    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public function equals(AbstractEnum $otherEnum): bool
    {
        return (string) $this === (string) $otherEnum &&
            get_class($this) === get_class($otherEnum);
    }

    public function getValue()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->getValue();
    }
}