<?php


use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TestOrder extends TestCase
{
    protected $meituanApp;

    protected function setUp(): void
    {
        parent::setUp();

        $config = require 'testConfig.php';
        $developerId = $config['app_key'];
        $secret = $config['secret'];
        $this->meituanDeliveryApp = new \Cblink\HyperfMeituanDelivery\MeituanDeliveryApp([
            'app_key' => $developerId,
            'secret' => $secret,
        ]);
    }

    public function testOrderCheck()
    {
        $lat = '44.918119';
        $lng = '111.940749';
        $response = $this->meituanDeliveryApp->order->checkOrder([
            'shop_id' => 'test_0001',
            'delivery_service_code' => '4013',
            'receiver_address' => 'test大厦',
            'receiver_lng' => (int)($lng * pow(10, 6)),
            'receiver_lat' => (int)($lat * pow(10, 6)),
            'check_type' => 1,
            'mock_order_time' => time(),
        ]);

        var_dump($response);
    }

    public function testOrderCreate()
    {
        $lat = '22.5377174';
        $lng = '113.94006';

        $goods[] = [
            'goodCount' => 1,
            'goodName' => 'test',
        ];

        $orders = [
            'delivery_id' => 410443303666872321,
            'order_id' => 14,
            'poi_seq' => 4001, // 美团的流水号加4为前缀
            'shop_id' => 'test_0001',
            'outer_order_source_desc' => 202,
            'delivery_service_code' => '100005',
            'receiver_name' => 'test',
            'receiver_address' => 'test',
            'receiver_phone' => '13900000000',
            'receiver_lng' => (int)($lng * pow(10, 6)),
            'receiver_lat' => (int)($lat * pow(10, 6)),
            'goods_value' => 1,
            'goods_weight' => 2,
            'goods_detail' => json_encode(['goods' => $goods]),
        ];

        $response = $this->meituanDeliveryApp->order->createByShop($orders);

        var_dump($response);
    }

    public function testGetShop()
    {
        $response = $this->meituanDeliveryApp->shop->queryShopArea([
            'shop_id' => 'test_0001',
            'delivery_service_code' => '100005',
        ]);
        var_dump($response);
    }

}