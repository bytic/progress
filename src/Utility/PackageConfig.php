<?php

declare(strict_types=1);

namespace ByTIC\Progress\Utility;

use ByTIC\Progress\ProgressProvider;
use Exception;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class PackageConfig.
 */
class PackageConfig extends \ByTIC\PackageBase\Utility\PackageConfig
{
    use SingletonTrait;

    protected $name = ProgressProvider::NAME;

    /**
     * @throws Exception
     */
    public static function databaseConnection(): ?string
    {
        return (string)static::instance()->get('database.connection');
    }

    public static function shouldRunMigrations(): bool
    {
        return false !== static::instance()->get('database.migrations', false);
    }

    public static function baseConfigFile(): string
    {
        return dirname(dirname(__DIR__)) . '/config/progress.php';
    }
}
