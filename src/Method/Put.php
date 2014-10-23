<?php
    namespace sylouuu\Curl\Method;

    /**
    * Put
    *
    * @author sylouuu
    * @link https://github.com/sylouuu/php-curl
    * @version 0.7.1
    * @license MIT
    */
    class Put extends \sylouuu\Curl\Curl
    {
        /**
        * Constructor
        *
        * @param array $options
        */
        public function __construct($url, $options = null)
        {
            parent::__construct($url, $options);

            $this->prepare();
        }

        /**
        * Prepare the request
        */
        public function prepare()
        {
            // Option
            $this->setCurlOption(CURLOPT_CUSTOMREQUEST, 'PUT');

            if(isset($this->options['data'])) {
                // Data
                $this->setCurlOption(CURLOPT_POSTFIELDS, http_build_query($this->options['data']));
            }
        }
    }
