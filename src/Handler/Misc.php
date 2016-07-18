<?php
namespace Mock\Handler;

class Misc {
    /**
     * 控制请求耗时，单位毫秒
     * @param  integer $ms [description]
     * @return [type]      [description]
     */
    static public function sleep($ms = 100) {
        usleep($ms * 1000);
    }
}
