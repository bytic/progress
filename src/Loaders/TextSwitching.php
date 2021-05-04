<?php

namespace ByTIC\Progress\Loaders;

/**
 * Class TextSwitching
 * @package ByTIC\Progress\Loaders
 */
class TextSwitching
{
    public static function animateDown(array $texts): string
    {
        return static::generate('animate-down-once', $texts);
    }

    /**
     * @param string $type
     * @param array $texts
     * @return string
     */
    public static function generate(string $type, array $texts): string
    {
        $items = array_map(
            function ($item) {
                return '<div>' . $item . '</div>';
            },
            $texts
        );
        return '<div class="progress-loaders-text ' . $type . ' count-' . count($texts) . '">'
            . implode('', $items)
            . '</div>';
    }
}
