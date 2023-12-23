<?php
/**
 * Part of Omega CMS -  Helpers Package
 *
 * @link       https://omegacms.github.io
 * @author     Adriano Giovannini <omegacms@outlook.com>
 * @copyright  Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/**
 * @declare
 */
declare( strict_types = 1 );

/**
 * @namespace
 */
namespace Omega\Helpers;

/**
 * Systen helper class.
 *
 *  The `System` helper class providing functions related to the system environment.
 *
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class System
{
    /**
     * Get the operating system name.
     *
     * @return string Returns the operating system name (e.g., "mac", "windows", "linux", or "unknown").
     */
    public static function getOperatingSystem() : string
    {
        $os = strtolower( PHP_OS_FAMILY );

        switch ( $os ) {
            case 'darwin':
                return 'mac';
            case 'win':
                return 'windows';
            case 'linux':
                return 'linux';
            default:
                return 'unknown';
        }
    }
}