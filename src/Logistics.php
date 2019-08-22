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
    public function get(string $code, string $company = '', $channels = null): array
    {
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
    public function getByProxy(array $proxy, string $code, string $company = '', $channels = null): array
    {
        return $this->queryByProxy($proxy, $code, $channels ?? \config('logistics.provider'), $company);
    }
}
