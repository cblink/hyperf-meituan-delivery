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

}