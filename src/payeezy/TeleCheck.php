<?php

namespace JayPayeezy;

class TeleCheck extends TransactionType
{
    public function __construct($client)
    {
        parent::__construct('tele_check', $client);
    }
}
