<?php

namespace JayPayeezy;

class Config
{
    /**
     * @var string The Payeezy API key to be used for requests.
     */
    protected $apiKey;

    /**
     * @var string The Payeezy API Secret to be used for requests.
     */
    protected $apiSecret;

    /**
     * @var string The Payeezy Merchant Token to be used for requests.
     */
    protected $merchantToken;

    /**
     * @var string The Payeezy URL to be used for requests.
     */
    protected $url;

    /**
     *
     */
    const VERSION = '1.0.1';

    /**
     * @Notes: 查看版本号
     *
     * @return string
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:16
     */
    public static function version()
    {
        return self::VERSION;
    }

    public static function make()
    {
        return new static();
    }

    /**
     * @Notes:The API key used for requests.
     *
     * @return string
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:14
     */
      public function getApiKey():string
      {
          return $this->apiKey;
      }

    /**
     * @Notes: Sets the API key to be used for requests.
     *
     * @param string $apiKey
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:14
     * @return Config
     */
      public function setApiKey(string $apiKey):self
      {
           $this->apiKey = $apiKey;

           return $this;
      }

    /**
     * @Notes:The API key used for requests.
     *
     * @return string
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:14
     */
      public function getApiSecret():string
      {
          return $this->apiSecret;
      }

    /**
     * @Notes:Sets the API key to be used for requests.
     *
     * @param string $apiSecret
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:14
     * @return Config
     */
      public function setApiSecret(string $apiSecret):self
      {
          $this->apiSecret = $apiSecret;

          return $this;
      }


    /**
     * @Notes:The API key used for requests.
     *
     * @return string
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:14
     */
      public function getMerchantToken():string
      {
          return $this->merchantToken;
      }

    /**
     * @Notes:Sets the API key to be used for requests.
     *
     * @param string $merchantToken
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:13
     * @return Config
     */
      public function setMerchantToken(string $merchantToken):self
      {
          $this->merchantToken = $merchantToken;

          return $this;
      }
  

    /**
     * @Notes:The API key used for requests.
     *
     * @return string
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:13
     */
      public function getUrl():string
      {
          return $this->url;
      }


    /**
     * @Notes:Sets the API key to be used for requests.
     *
     * @param string $url
     * @auther: Jay
     * @Date: 2021/3/26 0026
     * @Time: 15:13
     * @return Config
     */
      public function setUrl(string $url):self
      {
          $this->url = $url;

          return $this;
      }
}
