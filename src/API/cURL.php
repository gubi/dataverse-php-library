<?php
/**
 * PHP Dataverse API - cURL
 *
 * PHP Version 7.2.11
 *
 * @copyright
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

/**
 * A set of classes class that allow a simple Dataverse API use via PHP
 *
 * @package PHP Dataverse API
 * @subpackage Datasets
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse\API;

class cURL extends Request_handler {
    private static $ch;
    public static $apiKey;
    public static $api_url;
    public static $url;
    public static $url_params;
    public static $post_data;
    public static $method;

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
     *
     * @param string                        $post_data                          Optional post data
     */
    private static function init($post_data) {
        if(!isset(self::$apiKey)) {
            print "ERROR: NO API KEY DEFINED\nPlease provide an API Key";
            exit();
        }
        if(!isset(self::$api_url)) {
            print "ERROR: NO SERVER DEFINED\nPlease provide a Server address";
            exit();
        }

        self::$ch = curl_init($post_data);
        curl_setopt(self::$ch, CURLOPT_URL, self::$url);
        curl_setopt(self::$ch, CURLINFO_HEADER_OUT, true);
        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt(self::$ch, CURLOPT_FAILONERROR, true);
        curl_setopt(self::$ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(self::$ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt(self::$ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt(self::$ch, CURLOPT_TIMEOUT, 10);
        curl_setopt(self::$ch, CURLOPT_VERBOSE, true);
        // curl_setopt(self::$ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, ["X-Dataverse-key:" . self::$apiKey]);

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
     *
     * @param string                            $url                            The given URL part
     */
    private static function set_uri($url) {
        /**
         * Adjust the url
         */
        self::$url = self::$api_url . "/api/v1/" . $url;
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
     *
     * @param string                            $post_data                      The post data to pass
     */
    private static function set_method($post_data) {
        self::$method = strtoupper(self::$method);
        self::$url .= "?" . self::$url_params;
        switch(self::$method) {
            case "GET":
                $action = "Getting";
                break;
            case "POST":
                $action = "Posting";
                break;
            case "PUT":
                $action = "Putting";
                break;
            case "DELETE":
                $action = "Deleting";
                break;
        }

        /**
         * Set cURL POST data
         */
        if(self::$method !== "GET") {
            curl_setopt(self::$ch, CURLOPT_POST, true);
            curl_setopt(self::$ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        }

        curl_setopt(self::$ch, CURLOPT_CUSTOMREQUEST, self::$method);
        trigger_error("[INFO] {$action} data " . ((self::$method == "GET" || self::$method == "DELETE") ? "from" : "to") . " " . self::$url, E_USER_NOTICE);
    }

    /**
     * Exec the cURL
     *
     * @param string                            $method                         The HTTP method (GET, POST, PUT or DELETE)
     * @param string                            $url                            The given URL part
     * @param string                            $post_data                      The post data to pass
     * @return object                                                           The JSON decoded cURL output
     */
    public static function cli_exec($method, $url, $post_data = "") {
        self::$post_data = $post_data;
        self::$method = $method;
        self::set_uri($url, $post_data);
        self::init($post_data);
        self::set_method($post_data);

        $curl_command = 'curl -kH "X-Dataverse-key: ' . self::$apiKey . '" -X ' . self::$method . ' ' . self::$url;
        if(isset($post_data)) {
            /**
             * Che if passed $post_data is a local path
             * @var string
             */
            if(file_exists($post_data)) {
                $curl_command .= ' --upload-file ' . escapeshellarg($post_data);
            }
        }
        trigger_error("[EXECUTE] {$curl_command}", E_USER_NOTICE);
        $output = shell_exec($curl_command);

        return $output;
    }

    /**
     * Exec the cURL
     *
     * @param string                            $method                         The HTTP method (GET, POST, PUT or DELETE)
     * @param string                            $url                            The given URL part
     * @param string                            $post_data                      The post data to pass
     * @return object                                                           The JSON decoded cURL output
     */
    public static function exec($method, $url, $post_data) {
        self::$post_data = $post_data;
        self::$method = $method;

        self::set_uri($url, $post_data);
        self::set_method($post_data);
        $output = self::init($post_data);

        $output = json_decode(curlexec(self::$ch));
        if ($output === false) {
            $output = json_decode(curl_error(self::$ch));
            print_r($output);
        } else {
            $output->headers = json_decode(json_encode(curl_getinfo(self::$ch)));
            $output = self::move_to_top($output, "headers");
            $output = self::move_to_top($output, "status");
        }

        // self::close();

        // $output_array = json_decode(json_encode($output), 1);
        return json_encode($output);
    }

    /**
     * Close the cURL session
     */
    private static function close() {
        close(self::$ch);
    }
}
