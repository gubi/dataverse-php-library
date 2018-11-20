<?php
/**
 * PHP Dataverse API - Dataverses
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
 * @subpackage Dataverses
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

// namespace Dataverse;

class Dataverses extends Request_handler {
    /**
     * Create a Dataverse
     *
     * Generates a new dataverse under `$id`.
     * Expects a JSON content describing the dataverse.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-a-dataverse
     * @method POST
     *
     * @param string                            $id                             (Optional) A dataverse id (long) or a dataverse alias (more robust). If `$id` is omitted, a root dataverse is created
     */
    public static function create($id) {
        return Request_handler::post("dataverses/{$id}");
    }

    /**
     * View a Dataverse
     *
     * View data about the dataverse identified by `$id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#view-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function view($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}");
    }

    /**
     * Delete a Dataverse
     *
     * Deletes the dataverse whose ID is given
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-a-dataverse
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function delete($id) {
        parent::check("\$id", $id);
        return Request_handler::delete("dataverses/{$id}");
    }

    /**
     * Show Contents of a Dataverse
     *
     * Lists all the DvObjects under dataverse `id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-contents-of-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function show_contents($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/contents");
    }

    /**
     * List Roles Defined in a Dataverse
     *
     * All the roles defined directly in the dataverse identified by `id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-roles-defined-in-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function list_defined_roles($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/roles");
    }

    /**
     * List Facets Configured for a Dataverse
     *
     * List all the facets for a given dataverse `id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-facets-configured-for-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function list_facets($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/facets");
    }

    /**
     * Set Facets for a Dataverse
     *
     * Assign search facets for a given dataverse with alias `$alias`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#set-facets-for-a-dataverse
     * @method POST
     * @example facets.json:
     * ``` json
     * ["authorName","authorAffiliation"]
     * ```
     *
     * @param string                            $alias                          A dataverse alias
     */
    public static function set_facets($alias) {
        parent::check("\$alias", $alias);
        // Request_handler::post("dataverses/{$id}/facets --upload-file facets.json");
    }

    /**
     * Create a New Role in a Dataverse
     *
     * Creates a new role under dataverse `id`.
     * Needs a json file with the role description
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-a-new-role-in-a-dataverse
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function new_role($id) {
        parent::check("\$id", $id);
        return Request_handler::post("dataverses/{$id}/roles");
    }

    /**
     * List Role Assignments in a Dataverse
     *
     * List all the role assignments at the given dataverse
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-role-assignments-in-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function list_roles_assignments($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/assignments");
    }

    /**
     * Assign a New Role on a Dataverse
     *
     * Assigns a new role, based on the POSTed JSON
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#assign-a-new-role-on-a-dataverse
     * @method POST
     * @example POSTed JSON:
     * ``` json
     * {
     *     "assignee": "@uma",
     *     "role": "curator"
     * }
     * ```
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function assign_role($id) {
        parent::check("\$id", $id);
        // Request_handler::post("dataverses/{$id}/assignments  --upload-file POSTed.json");
    }

    /**
     * Delete Role Assignment from a Dataverse
     * Delete the assignment whose id is `$id`
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-role-assignment-from-a-dataverse
     * @method DELETE
     */
    public static function delete_role($id) {
        parent::check("\$id", $id);
        return Request_handler::delete("dataverses/{$id}/assignments");
    }

    /**
     * List Metadata Blocks Defined on a Dataverse
     * Get the metadata blocks defined on the passed dataverse
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-metadata-blocks-defined-on-a-dataverse
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function get_metadata_blocks($id) {
        parent::check("\$id", $id);
        return Request_handler::get("dataverses/{$id}/metadatablocks");
    }

    /**
     * Define Metadata Blocks for a Dataverse
     *
     * Sets the metadata blocks of the dataverse.
     * Makes the dataverse a metadatablock root.
     * The query body is a JSON array with a list of metadatablocks identifiers (either id or name).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#define-metadata-blocks-for-a-dataverse
     * @method POST
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function set_metadata_block($id) {
        parent::check("\$id", $id);
        return Request_handler::post("dataverses/{$id}/metadatablocks");
    }

    /**
     * Determine if a Dataverse Inherits Its Metadata Blocks from Its Parent
     *
     * Get whether the dataverse is a metadata block root, or does it uses its parent blocks
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#determine-if-a-dataverse-inherits-its-metadata-blocks-from-its-parent
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function is_metadata_block_root($id) {
        parent::check("\$id", $id);
        return Request_handler::post("dataverses/{$id}/metadatablocks/isRoot");
    }

    /**
     * Configure a Dataverse to Inherit Its Metadata Blocks from Its Parent
     *
     * Set whether the dataverse is a metadata block root, or does it uses its parent blocks.
     * Possible values are `true` and `false` (both are valid JSON expressions).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#configure-a-dataverse-to-inherit-its-metadata-blocks-from-its-parent
     * @method PUT
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function set_metadata_block_root($id) {
        parent::check("\$id", $id);
        return Request_handler::post("dataverses/{$id}/metadatablocks/isRoot");
    }

    /**
     * Create a Dataset in a Dataverse
     *
     * To create a dataset, you must create a JSON file containing all the metadata you want.
     * Then, you must decide which dataverse to create the dataset in and target that datavese with either the “alias” of the dataverse (e.g. “root” or the database id of the dataverse (e.g. “1”).
     * The initial version state will be set to `DRAFT`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-a-dataset-in-a-dataverse
     * @method POST
     * @example http://guides.dataverse.org/en/latest/_downloads/dataset-finch1.json
     *
     * @param string                            $alias                          A dataverse alias
     */
    public static function create_dataset($alias) {
        parent::check("\$alias", $alias);
        // Request_handler::post("dataverses/{$alias}/datasets --upload-file dataset-finch1.json");
    }

    /**
     * Import a Dataset into a Dataverse
     *
     * To import a dataset with an existing persistent identifier (PID), the dataset’s metadata should be prepared in Dataverse’s native JSON format.
     * The PID is provided as a parameter at the URL.
     * The following line imports a dataset with the PID PERSISTENT_IDENTIFIER to Dataverse, and then releases it
     * NOTE This action requires a Dataverse account with super-user permissions
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#import-a-dataset-into-a-dataverse
     * @method POST
     *
     * @param string                            $alias                          A dataverse alias
     * @param string                            $PID                            The persistent identifier
     */
    public static function import_dataset($alias, $PID) {
        parent::check("\$alias", $alias);
        parent::check("\$PID", $PID);
        // Request_handler::post("dataverses/{$alias}/datasets/:import?pid=$PID&release=yes --upload-file dataset.json");
    }

    /**
     * Publish a Dataverse
     *
     * Publish the Dataverse pointed by `identifier`, which can either by the dataverse alias or its numerical id
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#publish-a-dataverse
     * @method POST
     *
     * @param string                            $identifier                     A dataverse alias or its numerical id
     */
    public static function publish_dataverse($identifier) {
        parent::check("\$identifier", $identifier);
        return Request_handler::post("dataverses/{$identifier}/actions/:publish");
    }
}
?>
