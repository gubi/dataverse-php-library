<?php
/**
 * PHP Dataverse API - Roles
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
 * @subpackage Roles
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

class Roles extends Dataverse {
    /**
     * Create a New Role in a Dataverse
     *
     * Creates a new role in dataverse object whose Id is `dataverseIdtf` (that’s an id/alias)
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#id1
     * @method POST
     *
     * @param string                            $dataverseIdtf                  A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function create_role($dataverseIdtf) {
        parent::check("\$dataverseIdtf", $dataverseIdtf);
        parent::post("roles?dvo={$dataverseIdtf}");
    }

    /**
     * Show Role
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#show-role
     * @method GET
     *
     * @param string                            $id                             The role ID
     */
    public static function get_role($id) {
        parent::check("\$id", $id);
        parent::get("roles/{$id}");
    }

    /**
     * Delete Role
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#delete-role
     * @method DELETE
     *
     * @param string                            $id                             The role ID
     */
    public static function delete_role($id) {
        parent::check("\$id", $id);
        parent::delete("roles/{$id}");
    }
}
?>
