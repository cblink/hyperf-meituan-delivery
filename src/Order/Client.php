<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\HyperfMeituanDelivery\Order;

use Cblink\HyperfMeituanDelivery\Kernel\BaseClient;

class Client extends BaseClient
{

    /**
     * 创建订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function createByShop(array $params)
    {
        return $this->sendRequest('post', 'order/createByShop', $params);
    }

    /**
     * 取消订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function cancelOrder(array $params)
    {
        return $this->sendRequest('post', 'order/delete', $params);
    }

    /**
     * 订单状态查询
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function queryStatus(array $params)
    {
        return $this->sendRequest('post', 'order/status/query', $params);
    }

    /**
     * 评价骑手
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function evaluate(array $params)
    {
        return $this->sendRequest('post', 'order/evaluate', $params);
    }

    /**
     * 获取骑手当前位置
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function location(array $params)
    {
        return $this->sendRequest('post', 'order/location', $params);
    }

    /**
     * 配送能力校验
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function checkOrder(array $params)
    {
        return $this->sendRequest('post', 'order/check', $params);
    }

    /**
     * 修改订单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function modifyOrder(array $params)
    {
        return $this->sendRequest('post', 'order/modify', $params);
    }

    /**
     * 增加小费
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function addTipOrder(array $params)
    {
        return $this->sendRequest('post', 'order/addTip', $params);
    }

    /**
     * 取餐码信息下发
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function mealCode(array $params)
    {
        return $this->sendRequest('post', 'order/mealCode/saveMealCodeByPkgId', $params);
    }

    /**
     * 获取骑手位置H5
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function locationH5(array $params)
    {
        return $this->sendRequest('post', 'order/rider/location/h5url', $params);
    }

    /**
     * 预发单接口
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function preCreateByShop(array $params)
    {
        return $this->sendRequest('post', 'order/preCreateByShop', $params);
    }

    /**
     * 模拟接单
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testArrange(array $params)
    {
        return $this->sendRequest('post', 'test/order/arrange', $params);
    }

    /**
     * 模拟取货
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testPickup(array $params)
    {
        return $this->sendRequest('post', 'test/order/pickup', $params);
    }

    /**
     * 模拟送达
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testDeliver(array $params)
    {
        return $this->sendRequest('post', 'test/order/deliver', $params);
    }

    /**
     * 模拟改派
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testRearrange(array $params)
    {
        return $this->sendRequest('post', 'test/order/rearrange', $params);
    }

    /**
     * 模拟上传异常
     *
     * @param array $params
     * @return mixed
     * @throws \Cblink\HyperfMeituanDelivery\Kernel\Exception\MeituanException
     */
    public function testReportException(array $params)
    {
        return $this->sendRequest('post', 'test/order/reportException', $params);
    }

}
