<?php

namespace JayPayeezy;

class TransactionType extends Transaction
{
    /**
     * @var
     */
    private $method;

    /**
     * TransactionType constructor.
     * @param $method
     * @param $client
     */
    public function __construct($method, $client)
    {
        $this->method = $method;

        parent::__construct($client);
    }


    /**
     * @Notes:通用配置文件设置
     *
     * @param string $name
     * @param array $args
     * @return array
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:08
     */
    protected function config(string $name, array $args):array
    {
        $args['transaction_type'] = $name;
        $args['method'] = $this->method;

        return $args;
    }


    /**
     * @Notes:Authorize Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:56
     * @throws PayeezyError
     */
      public function authorize($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return parent::doPrimaryTransaction($args);
      }

    /**
     * @Notes:Purchase Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:57
     * @throws PayeezyError
     */
      public function purchase($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doPrimaryTransaction($args);
      }


    /**
     * @Notes: Capture Transaction
     *
     * @param int $transactionId
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:57
     * @throws PayeezyError
     */
      public function capture(int $transactionId, array $args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doSecondaryTransaction($transactionId, $args);
      }

    /**
     * @Notes:Void Transaction
     *
     * @param int $transactionId
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:03
     * @throws PayeezyError
     */
      public function void(int $transactionId, array $args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doSecondaryTransaction($transactionId, $args);
      }

    /**
     * @Notes: Refund Transaction
     *
     * @param $transactionId
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:03
     * @throws PayeezyError
     */
      public function refund($transactionId, $args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doSecondaryTransaction($transactionId, $args);
      }

    /**
     * @Notes:cashout Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:04
     * @throws PayeezyError
     */
      public function cashout($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doPrimaryTransaction($args);
      }


    /**
     * @Notes:reload Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:05
     * @throws PayeezyError
     */
      public function reload($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doPrimaryTransaction($args);
      }

    /**
     * @Notes:balance_inquiry Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:06
     * @throws PayeezyError
     */
      public function balanceInquiry($args = [])
      {
          $args = $this->config('balance_inquiry', $args);

          return $this->doPrimaryTransaction($args);
      }

    /**
     * @Notes:deactivation Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:06
     * @throws PayeezyError
     */
      public function deactivation($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doPrimaryTransaction($args);
      }

    /**
     * @Notes:activation Transaction
     *
     * @param array $args
     * @return mixed
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 16:07
     * @throws PayeezyError
     */
      public function activation($args = [])
      {
          $args = $this->config(__FUNCTION__, $args);

          return $this->doPrimaryTransaction($args);
      }
}
