<?php

namespace JanDrda\LaravelGoogleCustomeSearchEngine\Interfaces;

interface LaravelGoogleCustomSearchEngineInterface
{
    /**
     * Get search results
     *
     * @param $phrase search phrase
     * @param array $parameters all parameters listed at https://developers.google.com/custom-search/json-api/v1/reference/cse/list
     * @return mixed
     */
    public function getResults($phrase, $parameters = array());
}
