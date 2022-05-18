<?php

declare(strict_types=1);

namespace ByTIC\Progress;

use ByTIC\Progress\Utility\PackageConfig;
use ByTIC\PackageBase\BaseBootableServiceProvider;

/**
 * Class ProgressProvider.
 */
class ProgressProvider extends BaseBootableServiceProvider
{
    public const NAME = 'progress';

    public function migrations(): ?string
    {
        if (PackageConfig::shouldRunMigrations()) {
            return dirname(__DIR__) . '/migrations/';
        }

        return null;
    }
}
