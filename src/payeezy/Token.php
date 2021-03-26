<?php

namespace JayPayeezy;

class Token extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('token', $client);
    }
}
