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
use function bin2hex;
use function hash_equals;
use function random_bytes;
use Exception;

/**
 *  Security class.
 *
 * The `Security` class provides utility methods for enhancing security measures in
 * a web application. It includes functionalities for managing CSRF tokens, securing
 * form submissions,and validating input data against specified rules.
 *
 * @category    Omega
 * @package     Omega\Helpers
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
class Security
{
    /**
     * Set the CSRF token.
     *
     * Generates a CSRF token and stores it in the session.
     *
     * @return string Returns the generated CSRF token.
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
     * Compares the CSRF token from the session with the one submitted in the POST data.
     *
     * @return void
     * @throws Exception if session is not enabled or CSRF token mismatch.
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
     * Validates input data against specified rules.
     *
     * @param  array  $data        Holds an array of data to validate.
     * @param  array  $rules       Holds an array of rules.
     * @param  string $sessionName Holds the session name for storing validation errors.
     * @return mixed Returns the validation result.
     */
    public static function validate( array $data, array $rules, string $sessionName = 'errors' ) : mixed
    {
        return App::application( 'validator' )->validate( $data, $rules, $sessionName );
    }
}