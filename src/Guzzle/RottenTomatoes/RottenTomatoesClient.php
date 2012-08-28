<?php

namespace Guzzle\RottenTomatoes;

use Guzzle\Service\Client;
use Guzzle\Service\Inspector;
use Guzzle\Service\Description\XmlDescriptionBuilder;

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
    public static function factory($config)
    {
        $default = array(
            'base_url' => 'http://api.rottentomatoes.com/api/public/v1.0?apikey={{apikey}}'
        );
        $required = array('base_url', 'apikey');
        $config = Inspector::prepareConfig($config, $default, $required);

        $client = new self($config->get('base_url'));
        $client->setConfig($config);
        $client->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'client.xml'));

        return $client;
    }
}