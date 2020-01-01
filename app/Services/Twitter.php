<?php
/**
 * Owner: Muhammad Saimon Uddin
 * 12/6/2019 6:21 PM
 */

namespace App\Services;


class Twitter {

    protected $apiKey;

    function __construct($api = 'default Parameter')
    {
        $this->apiKey = $api;
    }

}