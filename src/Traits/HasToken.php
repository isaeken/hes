<?php

namespace IsaEken\Hes\Traits;

trait HasToken
{
    /**
     * @return string|null
     */
    public function getToken(): string|null
    {
        return $this->getAttribute('id_token') ?? null;
    }

    /**
     * @param string|null $token
     * @return static
     */
    public function setToken(string|null $token): static
    {
        return $this->setAttribute('id_token', $token);
    }
}
