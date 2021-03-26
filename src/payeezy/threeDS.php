<?php

namespace JayPayeezy;

class threeDS extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('3ds', $client);
    }
}
