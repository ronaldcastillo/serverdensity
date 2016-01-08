<?php

namespace ronaldcastillo\ServerDensity;

use serverdensity\Client as ServerDensityClient;

/**
 * Class Client
 *
 * @author Ronald Castillo <ronaldcastillo@gmail.com>
 * @package ronaldcastillo\ServerDensity
 */
class Client extends ServerDensityClient
{
    public function api($name)
    {
        switch($name) {
            case 'postback':
            case 'postbacks':
                return new Api\PostBacks($this);

            default:
                return parent::api($name);
        }
    }
}