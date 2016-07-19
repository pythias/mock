<?php
namespace Mock\Random;

class Image {
    /**
     * 生成一个随机的图片地址。
     *
     * @link http://rensanning.iteye.com/blog/1933310 [<description>]
     * @link http://code.tutsplus.com/articles/the-top-8-placeholders-for-web-designers--net-19485 [<description>]
     * @param  [type] $size       [description]
     * @param  [type] $background [description]
     * @param  [type] $foreground [description]
     * @param  [type] $format     [description]
     * @param  [type] $text       [description]
     * @return [type]             [description]
     */
    static public function image($size = '200x100', $background = '', $foreground = '', $format = 'png', $text = '') {
        $argsNum = func_num_args();

        // Random.image( size, background, foreground, text )
        if ($argsNum === 4) {
            $text = $format;
            $format = null;
        }

        // Random.image( size, background, text )
        if ($argsNum === 3) {
            $text = $foreground;
            $foreground = null;
        }

        if (empty($size)) { 
            $size = \Mock\Dictionary\UI::pickSize();
        }

        if ($background == '') {
            $background = \Mock\Dictionary\UI::pickColor();
        }

        if ($foreground == '') {
            $foreground = \Mock\Dictionary\UI::pickColor();
        }

        if ($background && $background[0] == '#') {
            $background = substr($background, 1);
        }

        if ($foreground && $foreground[0] == '#') {
            $foreground = substr($foreground, 1);
        }

        // http://dummyimage.com/600x400/cc00cc/470047.png&text=hello
        return 'http://dummyimage.com/' . $size .
            ($background ? '/' . $background : '') .
            ($foreground ? '/' . $foreground : '') .
            ($format ? '.' . $format : '') .
            ($text ? '&text=' . $text : '');
    }

    static public function img() {
        return call_user_func_array(array(__NAMESPACE__ .'\Image', 'image'), func_get_args());
    }

    /**
     * 生成一段随机的 Base64 图片编码。
     * @link https://github.com/imsky/holder [<description>]
     * @param  [type] $size [description]
     * @param  [type] $text [description]
     * @return [type]       [description]
     */
    static public function dataImage($size, $text) {
        return '';
    }
}