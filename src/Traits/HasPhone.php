<?php

namespace IsaEken\Hes\Traits;

trait HasPhone
{
    /**
     * @return string|null
     */
    public function getPhone(): string|null
    {
        return $this->getAttribute('phone') ?? null;
    }

    /**
     * @param string|null $phone
     * @return HasPhone
     */
    public function setPhone(string|null $phone): static
    {
        return $this->setAttribute('phone', $phone);
    }
}
