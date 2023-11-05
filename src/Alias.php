<?php
/**
 * Part of Banco Omega CMS -  Helpers Package
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
     * Response alias.
     *
     * @return mixed
     */
    public static function response() : mixed
    {
        return App::application( 'response' );
    }

    /**
     * Redirect alias.
     *
     * @param  string $url Holds the URL where redirect.
     * @return mixed
     */
    public static function redirect( string $url ) : mixed
    {
        return static::response()->redirect( $url );
    }

    /**
     * Alias for session.
     *
     * @param  ?string $key     Holds the session key or null.
     * @param  mixed   $default Holds the default session value or null.
     * @return mixed
     */
    public static function session( ?string $key = null, mixed $default = null ) : mixed
    {
        if ( is_null( $key ) ) {
            return App::application( 'session' );
        }

        return App::application( 'session' )->get( $key, $default );
    }

    /**
     * View alias.
     *
     * @param  string $template Holds the template name.
     * @param  array  $data     Holds an array of value.
     * @return View Return an instance of View.
     */
    public static function view( string $template, array $data = [] ) : View
    {
        return App::application( 'view' )->render( $template, $data );
    }

    /**
     * Alias for config.
     *
     * @param  ?string $key     Holds the config key.
     * @param  mixed   $default Holds the default config value.
     * @return mixed
     */
    public static function config( ?string $key = null, mixed $default = null ) : mixed
    {
        if ( is_null( $key ) ) {
            return App::application( 'config' );
        }

        return App::application( 'config' )->get( $key, $default );
    }

    /**
     * Env alias.
     *
     * @param  string $key     Holds the environment key.
     * @param  mixed  $default Holds the environment default value.
     * @return mixed
     */
    public static function env( string $key, mixed $default = null ) : mixed
    {
        if ( isset( $_SERVER[ $key ] ) ) {
            return $_SERVER[ $key ];
        }

        return $default;
    }
}