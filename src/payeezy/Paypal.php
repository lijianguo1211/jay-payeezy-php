<?php

namespace JayPayeezy;

class Paypal extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('paypal', $client);
    }
}
