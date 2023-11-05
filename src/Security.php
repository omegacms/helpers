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
use function bin2hex;
use function hash_equals;
use function random_bytes;
use Exception;

/**
 * Http helper class.
 *
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.com
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.com)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class Security
{
    /**
     * Set the CSRF token.
     *
     *
     * @return string Return the CSRF token.
     * @throws Exception if session is not enabled.
     */
    public static function csrf() : string
    {
        $session = Alias::session();

        if ( ! $session ) {
            throw new Exception(
                'Session is not enabled.'
            );
        }

        $session->put( 'token', $token = bin2hex( random_bytes( 32 ) ) );

        return $token;
    }

    /**
     * Secure the CSRF token.
     *
     * @return void
     * @throws Exception
     */
    public static function secure() : void
    {
        $session = Alias::session();

        if ( ! $session ) {
            throw new Exception(
                'Session is not enabled.'
            );
        }

        if ( ! isset( $_POST[ 'csrf' ] ) || ! $session->has( 'token' ) ||  ! hash_equals( $session->get( 'token' ), $_POST[ 'csrf' ] ) ) {
            throw new Exception(
                'CSRF token mismatch'
            );
        }
    }

    /**
     * Validate input.
     *
     * @param  array  $data        Holds an array of data to validate.
     * @param  array  $rules       Holds an array of rules.
     * @param  string $sessionName Holds the session name.
     * @return mixed
     */
    public static function validate( array $data, array $rules, string $sessionName = 'errors' ) : mixed
    {
        return App::application( 'validator' )->validate( $data, $rules, $sessionName );
    }
}