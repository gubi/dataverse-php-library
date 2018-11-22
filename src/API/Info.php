<?php
/**
 * PHP Dataverse API - Info
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
 * @subpackage Info
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse\API;

class Info extends \Dataverse\Request_handler {
    /**
     * Show Dataverse Version and Build Number
     *
     * View data about the dataverse identified by `$id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-dataverse-version-and-build-number
     * @method GET
     */
    public static function version() {
        return Request_handler::get("info/version");
    }

    /**
     * Show Dataverse Server Name
     *
     * This is useful when a Dataverse system is composed of multiple Java EE servers behind a load balancer
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-dataverse-server-name
     * @method GET
     */
    public static function server_name() {
        return Request_handler::get("info/server");
    }

    /**
     * Show Custom Popup Text for Publishing Datasets
     *
     * For now, only the value for the `:DatasetPublishPopupCustomText` setting from the Configuration section of the Installation Guide is exposed
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-custom-popup-text-for-publishing-datasets
     * @method GET
     */
    public static function get_custom_popup_text() {
        return Request_handler::get("info/settings/:DatasetPublishPopupCustomText");
    }

    /**
     * Get API Terms of Use URL
     *
     * The response contains the text value inserted as API Terms of use which uses the database setting
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#get-api-terms-of-use-url
     * @method GET
     */
    public static function get_api_terms() {
        return Request_handler::get("info/apiTermsOfUse");
    }
}
?>
