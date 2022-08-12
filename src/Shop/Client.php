<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfMeituanDelivery\Shop;

use Cblink\HyperfMeituanDelivery\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 查询门店信息
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function queryShop(array $params)
    {
        return $this->sendRequest('post', 'shop/query', $params);
    }

    /**
     * 查询合作方配送范围
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function queryShopArea(array $params)
    {
        return $this->sendRequest('post', 'shop/query', $params);
    }

    /**
     * 创建配送门店
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function createShop(array $params)
    {
        return $this->sendRequest('post', 'shop/create', $params);
    }

    /**
     * 修改门店信息
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function updateShop(array $params)
    {
        return $this->sendRequest('post', 'shop/update', $params);
    }

    /**
     * 模拟门店范围变更回调测试
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testShopAreaCallback(array $params)
    {
        return $this->sendRequest('post', 'test/shop/area/callback', $params);
    }

    /**
     * 模拟配送风险等级变更回调测试
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testShopDeliveryRiskLeveCallback(array $params)
    {
        return $this->sendRequest('post', 'test/shop/deliveryRiskLevel/callback', $params);
    }

    /**
     * 模拟门店状态回调测试
     *
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testShopStatusCallback(array $params)
    {
        return $this->sendRequest('post', 'test/shop/status/callback', $params);
    }
}
