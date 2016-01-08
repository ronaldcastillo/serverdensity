<?php

namespace ronaldcastillo\ServerDensity\Api;

use serverdensity\Api\AbstractApi;

/**
 * Class Postbacks
 *
 * @author Ronald Castillo <ronaldcastillo@gmail.com>
 * @package ronaldcastillo\ServerDensity\Api
 */
class PostBacks extends AbstractApi
{

    /**
     *
     * Creating a postback
     *
     * You can use this method to post data back to Server Density without using the agent,
     * for example using your own scripts or to integrate in something custom you are doing.
     *
     * You will still be restricted to posting back once per minute using this method,
     * as you would be using the agent.
     *
     * @param $agentKey
     * @param $host
     * @param $attributes
     * @return mixed
     */
    public function create($agentKey, $host, $attributes)
    {

        $attributes = array(
            'agentKey' => $agentKey,
            'plugins' => $attributes
        );

        $jsonAttributes = $this->createJsonBody($attributes);

        $data = array(
            'hash' => md5($jsonAttributes),
            'payload' => $jsonAttributes
        );

        return $this->post('alerts/postbacks', $data, array(
            'X-Forwarded-Host' => $host
        ));
    }

}
