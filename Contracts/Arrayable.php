<?php
/**
 * Created by Cestbon.
 * Author Cestbon <734245503@qq.com>
 * Date 2021/1/26 19:49
 */

namespace Chenpkg\Support\Contracts;


interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray();
}