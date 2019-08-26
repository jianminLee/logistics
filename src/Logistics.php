<?php

namespace Jianminlee\Logistics;

use Jianminlee\Logistics\Traits\Config;
use Wythe\Logistics\Exceptions\InvalidArgumentException;
use Wythe\Logistics\Exceptions\NoQueryAvailableException;

/**
 * 抓取物流信息.
 */
class Logistics extends \Wythe\Logistics\Logistics
{
    use Config;

    public function __construct()
    {
        $this->factory = new Factory();
    }

    /**
     * 通过接口获取物流信息.
     *
     * @param string $code
     * @param string $company
     * @param null $channels
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws NoQueryAvailableException
     */
    public function get(string $code, string $company = '', $channels = null) : array
    {
        if(\config('logistics.cache.use')){
            return \Cache::tags($this->logisticsCacheTagName())
                ->remember(get_class() . $code, now()->addMinutes(config('logistics.cache.expire')), function () use ($code,$company, $channels) {
                    return $this->query($code, $channels ?? \config('logistics.provider'), $company);
                });
        }
        return $this->query($code, $channels ?? \config('logistics.provider'), $company);
    }

    /**
     * 通过代理IP获取物流信息.
     *
     * @param array $proxy
     * @param string $code
     * @param string $company
     * @param null $channels
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws NoQueryAvailableException
     */
    public function getByProxy(array $proxy, string $code, string $company = '', $channels = null) : array
    {
        return $this->queryByProxy($proxy, $code, $channels ?? \config('logistics.provider'), $company);
    }

    public function logisticsCacheTagName()
    {
        return \config('logistics.cache.tag_name');
    }

    /**
     * 清除缓存
     *
     * @param string $express_no
     *
     * @return bool
     */
    public function forgetLogisticsCache(string $express_no = ''){
        if( !$express_no){
            return \Cache::tags($this->logisticsCacheTagName())->flush();
        }
        return \Cache::tags($this->logisticsCacheTagName())->forget($express_no);
    }
}
