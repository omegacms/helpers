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
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class App
{
    /**
     * Create a new instance of Application object.
     *
     * @param  ?string $alias Holds the instance alias.
     * @return mixed
     */
    public static function application( ?string $alias = null ) : mixed
    {
        if ( is_null( $alias ) ) {
            return Application::getInstance();
        }

        return Application::getInstance()->resolve( $alias );
    }

    /**
     * Set the base path.
     *
     * @return ?string Return the base path or null.
     */
    public static function basePath() : ?string
    {
        return static::application( 'paths.base' );
    }

    /**
     * Set the base path.
     *
     * @param  ...$params Holds the variadic params.
     * @return void
     */
    public static function dd( ...$params ) : void
    {
        var_dump( ...$params );

        die;
    }

    /**
     * Variables dump.
     *
     * @param  array %array Holds an array of dumping.
     * @return void
     */
    public static function dump( array $array ) : void
    {
        echo "<pre>"; print_r( $array ); echo "</pre>";
    }
}