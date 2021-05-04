<?php

namespace ByTIC\Progress\Spinners;

/**
 * Class SpinnerCircles
 * @package ByTIC\Progress\Spinners
 */
class SpinnerCircles
{

    /**
     * @param null $size
     * @param null $color
     * @param null $border_size
     * @param null $duration
     * @param null $align
     * @return mixed
     */
    public static function circle01(
        $size = null,
        $color = null,
        $border_size = null,
        $duration = null,
        $align = null
    ) {
        return static::generate(__FUNCTION__, $size, $color, $border_size, $duration, $align);
    }

    /**
     * @param null $size
     * @param null $color
     * @param null $border_size
     * @param null $duration
     * @param null $align
     * @return mixed
     */
    public static function circle02(
        $size = null,
        $color = null,
        $border_size = null,
        $duration = null,
        $align = null
    ) {
        return static::generate(__FUNCTION__, $size, $color, $border_size, $duration, $align);
    }

    /**
     * @param null $size
     * @param null $color
     * @param null $border_size
     * @param null $duration
     * @param null $align
     * @return mixed
     */
    public static function circle03(
        $size = null,
        $color = null,
        $border_size = null,
        $duration = null,
        $align = null
    ) {
        return static::generate(__FUNCTION__, $size, $color, $border_size, $duration, $align);
    }

    /**
     * @param null $size
     * @param null $color
     * @param null $border_size
     * @param null $duration
     * @param null $align
     * @return mixed
     */
    public static function circle04(
        $size = null,
        $color = null,
        $border_size = null,
        $duration = null,
        $align = null
    ) {
        return static::generate(__FUNCTION__, $size, $color, $border_size, $duration, $align);
    }
    /**
     * @param $type
     * @param null $size
     * @param null $color
     * @param null $border_size
     * @param null $duration
     * @param null $align
     */
    protected static function generate(
        $type,
        $size = null,
        $color = null,
        $border_size = null,
        $duration = null,
        $align = null
    ) {
        return '<div class="progress-spinner progress-spinners-' . $type . '">Loading...</div>';
    }
}