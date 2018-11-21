<?php
/**
 * PHP Dataverse API - Groups
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
 * @subpackage Groups
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse\API;

class Groups extends Request_handler {
    /**
     * Create New Explicit Group
     *
     * Explicit groups list their members explicitly.
     * These groups are defined in dataverses, which is why their API endpoint is under `api/dataverses/$id/`, where `$id` is the id of the dataverse.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-new-explicit-group
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function create_group($id) {
        parent::check("\$id", $id);
        return Request_handler::post("dataverses/{$id}/groups");
    }

    /**
     * List Explicit Groups in a Dataverse
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-explicit-groups-in-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function list_groups($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/groups");
    }

    /**
     * Show Single Group in a Dataverse
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-single-group-in-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     */
    public static function get_group($id, $groupAlias) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        return Request_handler::get("dataverses/{$id}/groups/{$groupAlias}");
    }

    /**
     * Update Group in a Dataverse
     *
     * The request body is the same as the create group one, except that the group alias cannot be changed.
     * Thus, the field `aliasInOwner` is ignored.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#update-group-in-a-dataverse
     * @method PUT
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     */
    public static function update_group($id, $groupAlias) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        return Request_handler::put("dataverses/{$id}/groups/{$groupAlias}");
    }

    /**
     * Delete Group from a Dataverse
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-group-from-a-dataverse
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     */
    public static function delete_group($id, $groupAlias) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        return Request_handler::delete("dataverses/{$id}/groups/{$groupAlias}");
    }

    /**
     * Add Multiple Role Assignees to an Explicit Group
     *
     * The request body is a JSON array of role assignee identifiers, such as `@admin`, `&ip/localhosts` or `:authenticated-users`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#add-multiple-role-assignees-to-an-explicit-group
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     */
    public static function add_group_roles($id, $groupAlias) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        return Request_handler::post("dataverses/{$id}/groups/{$groupAlias}/roleAssignees");
    }

    /**
     * Add a Role Assignee to an Explicit Group
     *
     * Add a single role assignee to a group. Request body is ignored
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#add-a-role-assignee-to-an-explicit-group
     * @method PUT
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     * @param string                            $roleAssigneeIdentifier
     */
    public static function add_group_role_assignee($id, $groupAlias, $roleAssigneeIdentifier) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        parent::check("\$roleAssigneeIdentifier", $roleAssigneeIdentifier);
        return Request_handler::put("dataverses/{$id}/groups/{$groupAlias}/roleAssignees/{$roleAssigneeIdentifier}");

    }

    /**
     * Remove a Role Assignee from an Explicit Group
     *
     * Add a single role assignee to a group. Request body is ignored
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#remove-a-role-assignee-from-an-explicit-group
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $groupAlias                     The group alias
     * @param string                            $roleAssigneeIdentifier
     */
    public static function remove_group_role_assignee($id, $groupAlias, $roleAssigneeIdentifier) {
        parent::check("\$id", $id);
        parent::check("\$groupAlias", $groupAlias);
        parent::check("\$roleAssigneeIdentifier", $roleAssigneeIdentifier);
        return Request_handler::delete("dataverses/{$id}/groups/{$groupAlias}/roleAssignees/{$roleAssigneeIdentifier}");
    }
}
?>
