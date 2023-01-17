<?php
namespace Salesforce\Rest;

use \Phalcon\Text;

class Client extends \Phalcon\Di\Injectable{
    
    protected $guzzle;
    protected $options;
    protected $access_token;
    protected $instance_url;

    public function __construct(\stdClass $options = null)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->options = $this->defaultOptions($options);
    }

    /**
     * Accepts options object to define key settings
     * Overridden by config object if present in DI
     * @param \stdClass|null $options
     * @return \stdClass
     */
    protected function defaultOptions(\stdClass $options = null): \stdClass
    {
        $obj = (object) [
            "uri"              => "https://login.salesforce.com/",
            "oauth"            => [
                'grant_type'    => 'password',
                'client_id'     => 'CONSUMERKEY',
                'client_secret' => 'CONSUMERSECRET',
                'username'      => 'SALESFORCE_USERNAME',
                'password'      => 'SALESFORCE_PASSWORD AND SECURITY_TOKEN'
            ],
            "access_token"      => "",
            "instance_url"      => ""
        ];

        if ($options) {
            $obj->uri           = $options->uri ?: $obj->uri;
            $obj->access_token  = $options->access_token ?: $obj->access_token;
            $obj->instance_url  = $options->instance_url ?: $obj->instance_url;
            $obj->oauth         = $options->oauth ?: $obj->oauth;
        }

        return $obj;
    }

    protected function authenticate() {
        $this->guzzle = new GuzzleHttp\Client();
        $request = $this->guzzle->request('post', "{$this->endPoint}services/oauth2/token", ['form_params' => $this->options]);
        $response = json_decode($request->getBody(), true);

        if ($response) {
            $this->access_token = $response['access_token'];
            $this->instance_url = $response['instance_url'];

            $_SESSION['salesforce'] = $response;
        } else {
            throw new \Salesforce\Exception\Authentication($request->getBody());
        }
    }

    public function query(string $query) {
        $url = "{$this->instance_url}/services/data/v39.0/query";

        $client = new Client();
        $request = $client->request('GET', $url, [
            'headers' => [
                'Authorization' => "OAuth {$this->access_token}"
            ],
            'query' => [
                'q' => $query
            ]
        ]);

        return json_decode($request->getBody(), true);
    }
}
?>