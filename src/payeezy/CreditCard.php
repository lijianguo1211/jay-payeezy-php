<?php

namespace JayPayeezy;

class CreditCard extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('credit_card', $client);
    }
}
