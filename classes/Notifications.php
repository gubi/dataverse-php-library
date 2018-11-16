<?php
/**
 * PHP Dataverse API - Notifications
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
 * @subpackage Notifications
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

class Notifications extends Dataverse {
    /**
     * Get All Notifications by User
     *
     * Each user can get a dump of their notifications by passing in their API token
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#get-all-notifications-by-user
     * @method GET
     */
    public static function get_user_notifications() {
        parent::get("notifications/all");
    }
}
?>
