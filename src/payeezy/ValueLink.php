<?php

namespace JayPayeezy;

class ValueLink extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('valuelink', $client);
    }
}
