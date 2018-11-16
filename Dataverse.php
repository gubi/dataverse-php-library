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
 * A script for manage XML file and prepare data for Dataverse
 *
 * @package Bioversity AGROVOC Indexing
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

class Dataverse {
    private static $ch;
    public static $server;
    public static $apiKey;
    public static $api_url;
    public static $url;
    public static $url_params;

    /**
     * Move an array item to the top of order
     *
     * @param  array                            $array                          The array to sort
     * @param  string                           $key                            The item to move to the top
     * @return array                                                            The sorted array
     */
    private static function move_to_top($array, $key) {
        if(is_object($array)) {
            $a = json_decode(json_encode($array), 1);
        }
        $a = array_splice($a, array_search($key, array_keys($a)), 1) + $a;
        if(is_object($array)) {
            $a = json_decode(json_encode($a));
        }
        return $a;
    }

    /**
     * Init the cURL session
     */
    private static function curl_init() {
        if(!isset(self::$apiKey)) {
            print "ERROR: NO API KEY DEFINED\nPlease provide an API Key";
            exit();
        }
        if(!isset(self::$api_url)) {
            print "ERROR: NO SERVER DEFINED\nPlease provide a Server address";
            exit();
        }

        self::$ch = curl_init();
        curl_setopt(self::$ch, CURLOPT_URL, self::$url);
        curl_setopt(self::$ch, CURLINFO_HEADER_OUT, true);
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt(self::$ch, CURLOPT_TIMEOUT, 10);
        curl_setopt(self::$ch, CURLOPT_VERBOSE, true);

        $httpCode = curl_getinfo(self::$ch , CURLINFO_HTTP_CODE);
    }

    /**
    * Set the API Key
    */
    public function set_api_key($apiKey) {
        self::$apiKey = $apiKey;
    }

    /**
    * Set the Server address
    */
    public function set_server($server) {
        if(!preg_match("~^(?:f|ht)tps?://~i", $server)) {
            $server = preg_replace('/\/(\/)\\1+/', "//", "http://" . $server);
        }
        self::$api_url = $server;
    }

    /**
     * Set the cURL URI
     * @param string                            $data                           The given URL part
     */
    private static function set_curl_uri($data) {
        /**
         * Adjust the url
         */
        self::$url = self::$api_url . "/api/v1/" . $data;
        $url_schema = parse_url(self::$url);
        if(isset($url_schema["query"])) {
            parse_str($url_schema["query"], $query);
        } else {
            $query = [];
        }
        // Strip querystring
        self::$url = preg_replace('/\?.*/', "", self::$url);

        // Add provided API Key
        $query["key"] = self::$apiKey;

        self::$url_params = http_build_query($query);
    }

    /**
     * Set the cURL method
     * @param string                            $method                         The HTTP method (GET, POST, PUT or DELETE)
     */
    private static function set_curl_method($method) {
        $method = strtoupper($method);
        switch($method) {
            case "GET":
                $action = "Getting";
                self::$url .= "?" . self::$url_params;
                break;
            case "POST":    $action = "Posting";    break;
            case "PUT":     $action = "Putting";    break;
            case "DELETE":  $action = "Deleting";    break;
        }

        curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, $method);
        trigger_error("[INFO] {$action} data from " . self::$url, E_USER_NOTICE);
    }

    /**
     * Exec the cURL
     * @param string                            $data                           The given URL part
     * @param string                            $method                         The HTTP method (GET, POST, PUT or DELETE)
     * @return object                                                           The JSON decoded cURL output
     */
    private static function curl_exec($data, $method) {
        self::set_curl_uri($data);
        self::curl_init();
        self::set_curl_method($method);

        $output = json_decode(curl_exec(self::$ch));
        if ($output === false) {
            $output = json_decode(curl_error(self::$ch));
        } else {
            $output->headers = curl_getinfo(self::$ch);
            $output = self::move_to_top($output, "headers");
            $output = self::move_to_top($output, "status");
        }

        if(curl_getinfo(self::$ch, CURLINFO_HTTP_CODE) !== 200) {
            return json_encode($output);
        }
        self::curl_close();

        $output_array = json_decode(json_encode($output), 1);
        return $output;
    }

    /**
     * Close the cURL session
     */
    private static function curl_close() {
        curl_close(self::$ch);
    }

    /* ---------------------------------------------------------------------- */


    /**
     * GET API contents
     *
     * @param  string                           $data                           The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function get($data) {
        return self::curl_exec($data, "GET");
    }

    /**
     * POST API contents
     *
     * @param  string                           $data                           The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function post($data) {
        return self::curl_exec($data, "POST");
    }

    /**
     * PUT API contents
     *
     * @param  string                           $data                           The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function put($data) {
        return self::curl_exec($data, "PUT");
    }

    /**
     * PUT API contents
     *
     * @param  string                           $data                           The given URL part
     * @return object                                                           A JSON decoded output
    */
    public static function delete($data) {
        return self::curl_exec($data, "DELETE");
    }
}


?>
