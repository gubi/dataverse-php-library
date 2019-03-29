<?php
/**
 * PHP Dataverse API
 *
 * PHP Version 7.2.11
 *
 * @copyright
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

/**
 * A set of classes class that allow a simple Dataverse API use via PHP
 *
 * @package Bioversity AGROVOC Indexing
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse;

// Suppress PHP Warning: "Declaration of ... should be compatible with ... in ... on line 0"
if(PHP_MAJOR_VERSION >= 7) { set_error_handler(function ($errno, $errstr) { return strpos($errstr, 'Declaration of') === 0; }, E_WARNING); }


class Request_handler {
    public static function check($variable_name, $param) {
        if(!isset($param)) {
            print "ERROR: MISSING {$variable_name}";
            exit();
        }
    }

    /**
     * GET API contents
     *
     * @param  string                           $url                            The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function get($url) {
        return API\cURL::cli_exec("GET", $url);
    }

    /**
     * POST API contents
     *
     * @param  string                           $url                            The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function post($url, $post_data) {
        return API\cURL::cli_exec("POST", $url, $post_data);
    }

    /**
     * PUT API contents
     *
     * @param  string                           $url                            The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function put($url, $post_data) {
        return API\cURL::cli_exec("PUT", $url, $post_data);
    }

    /**
     * DELETE API contents
     *
     * @param  string                           $url                            The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function delete($url, $post_data) {
        return API\cURL::cli_exec("DELETE", $url, $post_data);
    }
}

?>
