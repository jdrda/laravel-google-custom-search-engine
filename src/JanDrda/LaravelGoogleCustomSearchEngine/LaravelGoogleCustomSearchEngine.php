<?php

namespace JanDrda\LaravelGoogleCustomSearchEngine;

use Exception;
use JDrda\LaravelGoogleCustomSearchEngine\Interfaces\LaravelGoogleCustomSearchEngineInterface;

class LaravelGoogleCustomSearchEngine implements LaravelGoogleCustomSearchEngineInterface
{

    /**
     * Custom search engine ID
     *
     * @var string
     */
    protected $engineId;

    /**
     * Google console API key
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Original response converted to array
     *
     * @var array
     */
    protected $originalResponse;

    /**
     * Constructor
     *
     * LaravelGoogleCustomSearchEngine constructor.
     * @param $engineId
     * @param $apiKey
     */
    public function __construct($engineId, $apiKey)
    {
        $this->engineId = $engineId;
        $this->apiKey = $apiKey;
    }

    /**
     * Setter for engineId, overrides the value from config
     *
     * @param $engineId
     */
    public function setEngineId($engineId){
        $this->engineId = $engineId;
    }

    /**
     * Setter for apiKey, overrides the value from config
     *
     * @param $engineId
     */
    public function setApiKey($apiKey){
        $this->apiKey = $apiKey;
    }

    /**
     * Get search results
     *
     * @param $phrase
     * @return array
     * @throws Exception
     */
    public function getResults($phrase)
    {
        $searchResults = array();

        if ($phrase == '') {
            return $searchResults;
        }

        if ($this->engineId == '') {
            throw new \Exception('You must specify a engineId');
        }

        if ($this->apiKey == '') {
            throw new \Exception('You must specify a apiKey');
        }

        // create a new cURL resource
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $output = curl_exec($ch);

        $info = curl_getinfo($ch);

        curl_close($ch);

        if ($output === false || $info['http_code'] != 200) {

            throw new \Exception("No data returned, code [". $info['http_code']. "] - " . curl_error($ch));

        }


        return $searchResults;
    }

}
