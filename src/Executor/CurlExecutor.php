<?php
declare(strict_types = 1);

namespace Jowy\RajaOngkir\Executor;

/**
 * Class CurlExecutor
 * @package Jowy\RajaOngkir\Executor
 */
class CurlExecutor implements ExecutorInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $endpoint = "http://api.rajaongkir.com/";

    /**
     * CurlExecutor constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(string $url, string $method = 'GET', array $params = []) : array
    {
        $curlOptions = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                "key: {$this->apiKey}"
            ]
        ];

        if ($method === 'GET') {
            $curlOptions[CURLOPT_URL] = $this->endpoint . $url . '?' . http_build_query($params);
        }

        if ($method === 'POST') {
            $curlOptions[CURLOPT_URL] = $this->endpoint . $url;
            $curlOptions[CURLOPT_POSTFIELDS] = http_build_query($params);
            $curlOptions[CURLOPT_HTTPHEADER][] = 'content-type: application/x-www-form-urlencoded';
        }

        $curl = curl_init();
        curl_setopt_array($curl, $curlOptions);


        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!$err) {
            return json_decode($response, true);
        }

        throw new \DomainException("Curl error #{$err}");
    }
}
