<?php


namespace Jianminlee\Traits;


trait Config
{
    /**
     * 获取配置.
     *
     * @return array
     */
    protected function getChannelConfig(): array
    {
        return config('logistics.' . strtolower($this->getClassName()));
    }
}
