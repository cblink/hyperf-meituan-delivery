<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfMeituanDelivery\Kernel;

use Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException;
use Cblink\HyperfMeituanDelivery\Kernel\Traits\HasHttpRequest;

/**
 * Class BaseClient.
 */
class BaseClient
{
    use HasHttpRequest;

    /**
     * @var ServiceContainer
     */
    protected $app;

    protected $config;

    /**
     * BaseClient constructor.
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;

        $this->config = $app->config;
    }

    protected function getBaseOptions()
    {
        $options = [
            'base_uri' => method_exists($this, 'getBaseUri') ? $this->getBaseUri() : '',
            'timeout' => method_exists($this, 'getTimeout') ? $this->getTimeout() : 10.0,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];

        return $options;
    }

    /**
     * 发送请求
     *
     * @param $method
     * @param $uri
     * @param array $params
     *
     * @return mixed
     */
    public function sendRequest($method, $uri, $params = [])
    {
        $data = array_merge($params, [
            'appkey' => $this->config['app_key'],
            'timestamp' => time(),
            'version' => '1.0',
        ]);

        $data['sign'] = $this->getSign($data);

        $response = $this->$method($this->url($uri), $data, $this->getBaseOptions());

        if ($response['code'] != 0) {
            throw new MeituanException($response['message']);
        }
        return $response;
    }

    /**
     * url
     *
     * @param string $uri
     * @return string
     */
    protected function url($uri = ''): string
    {
        return rtrim($this->app->baseUrl(), '/') . '/' . ltrim($uri, '/');
    }

    /**
     * 数字签名.
     *
     * @param $params
     * @return string
     */
    public function getSign(&$params)
    {
        ksort($params);

        $waitSign = '';
        foreach ($params as $key => $item) {
            if ($item || $item === 0) {
                $waitSign .= $key.$item;
            }
        }

        return strtolower(sha1(sprintf('%s%s', $this->config['secret'], $waitSign)));
    }
}
