<?php

namespace Guzzle\RottenTomatoes;

use Guzzle\Common\Collection;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class RottenTomatoesClient extends Client
{
    /**
     * Factory method to create a new RottenTomatoesClient
     *
     * @param array|Collection $config Configuration data. Array keys:
     *    base_url - Base URL of web service
     *    apikey   - Rotten Tomatoes API key
     *
     * @return RottenTomatoesClient
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => 'http://api.rottentomatoes.com/api/public/v1.0?apikey={{apikey}}'
        );
        $required = array('base_url', 'apikey');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'));
        $client->setConfig($config);
        $client->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'client.xml'));

        return $client;
    }
}
