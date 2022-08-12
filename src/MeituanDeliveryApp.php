<?php


namespace Cblink\HyperfMeituanDelivery;


use Cblink\HyperfMeituanDelivery\Kernel\ServiceContainer;

/**
 * @property Order\Client $order
 * @property Shop\Client $shop
 * Class MeituanDeliveryApp
 * @package Cblink\MeituanDeliveryApp
 */
class MeituanDeliveryApp extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://peisongopen.meituan.com/api';

    /**
     * {@inheritdoc}
     */
    protected function getCustomProviders(): array
    {
        return [
            Order\ServiceProvider::class,
            Shop\ServiceProvider::class,
        ];
    }


}