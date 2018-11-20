<?php
/**
 * PHP Dataverse API - Builtin_users
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
 * @subpackage Builtin_users
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

// namespace Dataverse;

class Builtin_users extends Request_handler {
    /**
     * Create a Builtin User
     *
     * For security reasons, builtin users cannot be created via API unless the team who runs the Dataverse installation has populated a database setting called `BuiltinUsers.KEY`, which is described under “Securing Your Installation” and “Database Settings” in the Configuration section of the Installation Guide.
     * You will need to know the value of `BuiltinUsers.KEY` before you can proceed.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-a-builtin-user
     * @see http://guides.dataverse.org/en/latest/installation/config.html
     * @method POST
     * @example http://guides.dataverse.org/en/latest/_downloads/user-add.json
     *
     * @param string                            $new_password                  The new password
     * @param string                            $builtin_users_key             The BuiltinUsers Key
     */
    public static function create_builtin_user($new_password, $builtin_users_key) {
        parent::check("\$new_password", $new_password);
        parent::check("\$builtin_users_key", $builtin_users_key);
        return Request_handler::post("builtin-users?password={$new_password}&key={$builtin_users_key}&file=user-add.json");
    }
}
?>
