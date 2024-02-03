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

    /**
     * Join the given paths together.
     * 
     * @param  ?string $basePath Holds the base path for the framework.
     * @param  string  ...$paths Holds the variadic arguments for the base path.
     * @return Return the joined paths.
     */
    public static function joinPaths( string $basePath, string ...$paths ) : string
    {
        foreach ( $paths as $index => $path ) {
            if ( empty( $path ) ) {
                unset( $paths[ $index ] );
            } else {
                $paths[ $index ] = DIRECTORY_SEPARATOR . ltrim( $path, DIRECTORY_SEPARATOR );
            }
        }

        return $basePath . implode( '', $paths );
    }
}