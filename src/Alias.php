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
use Omega\View\View;

/**
 * Alias class.
 *
 * The `Alias` class providing convenient shortcuts for commonly used component.
 *
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class Alias
{
    /**
     * Get the response instance..
     *
     * @return mixed Returns the response instance.
     */
    public static function response() : mixed
    {
        return App::application( 'response' );
    }

    /**
     * Redirect to a specific URL.
     *
     * @param  string $url Holds the URL to redirect to.
     * @return mixed Return that result of the redirect operation.
     */
    public static function redirect( string $url ) : mixed
    {
        return static::response()->redirect( $url );
    }

    /**
     * Get or set a session value.
     *
     * @param  ?string $key     Holds the session key or null to get the entire session.
     * @param  mixed   $default Holds the default value if the key is not found.
     * @return mixed Returns the session value or the entire session if no key is provided.
     */
    public static function session( ?string $key = null, mixed $default = null ) : mixed
    {
        if ( is_null( $key ) ) {
            return App::application( 'session' );
        }

        return App::application( 'session' )->get( $key, $default );
    }

    /**
     * Render a view with the specified template and data.
     *
     * @param  string $template Holds the template name.
     * @param  array  $data     Holds an array of value to pass to the view.
     * @return View Return an instance of the View class.
     */
    public static function view( string $template, array $data = [] ) : View
    {
        return App::application( 'view' )->render( $template, $data );
    }

    /**
     * Alias or set a configuration value.
     *
     * @param  ?string $key     Holds the configuration key or null to get the entire configuration.
     * @param  mixed   $default Holds the default value if the key is not found.
     * @return mixed Returns the configuration value or the entire configuration if no key is provided.
    */
    public static function config( ?string $key = null, mixed $default = null ) : mixed
    {
        if ( is_null( $key ) ) {
            return App::application( 'config' );
        }

        return App::application( 'config' )->get( $key, $default );
    }

    /**
     * Get an environment variable.
     *
     * @param  string $key     Holds the environment key.
     * @param  mixed  $default Holds the default value if the key is not set.
     * @return mixed Returns the value of the environment variable or the default value if the key is not set.
     */
    public static function env( string $key, mixed $default = null ) : mixed
    {
        if ( isset( $_SERVER[ $key ] ) ) {
            return $_SERVER[ $key ];
        }

        return $default;
    }
}