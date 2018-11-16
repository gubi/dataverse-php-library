<?php
/**
 * Bioversity AGROVOC Indexing
 *
 * PHP Version 7.2.11
 *
 * @copyright 2018 Bioversity International (http://www.bioversityinternational.org/)
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
    public static $api_url;
    public static $apiKey;

    public function set_api_key($apiKey) {
        self::$apiKey = $apiKey;
    }

    public function set_server($server) {
        $server = preg_replace('/http(s)\:\/\/(.*?)/', "http$1://$2");
        self::$api_url = "http://{$server}/api/";
    }

    /**
     * Open an URL using cURL
     *
     * @param  string                           $url                            The given URL
     * @return object                                                           A JSON decoded output
    */
    private static function get($data) {
        $url = self::$api_url . "/" . $data;

        trigger_error("[INFO] Getting data from {$url}", E_USER_NOTICE);
        $logger = new Logger("agrovoc-indexing");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE,true);

        $output = json_decode(curl_exec($ch));
        $output->headers = @curl_getinfo($ch);

        if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
            // $logger->pushHandler(new StreamHandler(getcwd() . "/curl.log", Logger::ERROR));
            // $logger->error(json_encode($output));

            return json_encode($output);
        }
        $output_array = json_decode(json_encode($output), 1);
        return json_decode(json_encode($output));

        curl_close($ch);
    }


    private static function post($data) {}
    private static function put($data) {}
    private static function delete($data) {}
}


?>
