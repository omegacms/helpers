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
 * @use
 */
use function is_null;
use Omega\Application\Application;

/**
 * Application helper class.
 *
 * This `App` class interacting with the Omega Application.
 *
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class App
{
    /**
     * Get an instance of the Omega Application.
     *
     * @param  ?string $alias Holdds the instance alias or null to get the main application instance.
     * @return mixed Returns the resolved instance or the main application instance if no alias is provided.
     */
    public static function application( ?string $alias = null ) : mixed
    {
        if ( is_null( $alias ) ) {
            return Application::getInstance();
        }

        return Application::getInstance()->resolve( $alias );
    }

    /**
     * Get the base path of the application.
     *
     * @return ?string Returns the base path or null if not set.
     */
    public static function basePath() : ?string
    {
        return static::application( 'paths.base' );
    }

    /**
     * Dump variables and end script execution.
     *
     * @param  mixed ...$params The variables to be dumped.
     * @return void
     */
    public static function dd( ...$params ) : void
    {
        var_dump( ...$params );

        die;
    }

    /**
     * Display a variable dump in a formatted manner.
     *
     * @param  array $array The array to be dumped.
     * @return void
     */
    public static function dump( array $array ) : void
    {
        echo "<pre>"; print_r( $array ); echo "</pre>";
    }
}