<?php
/**
 * PHP Dataverse API
 *
 * PHP Version 7.2.11
 *
 * @copyright
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

/**
 * A script for manage XML file and prepare data for Dataverse
 *
 * @package PHP Dataverse API
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

class Dataverses extends Dataverse {
    /**
     * Create a Dataverse
     * Generates a new dataverse under `$id`.
     * Expects a JSON content describing the dataverse.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#create-a-dataverse
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust). If `$id` is omitted, a root dataverse is created
     */
    public static function create($id) {
        parent::get("dataverses/{$id}?key=" . parent::$apiKey);
    }

    /**
     * View a Dataverse
     * View data about the dataverse identified by `$id`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#view-a-dataverse
     * @method GET
     */
    public static function view($id) {
        parent::get("dataverses/{$id}");
    }

    /**
     * Delete a Dataverse
     */
    public static function delete() {

    }

    /**
     * Show Contents of a Dataverse
     */
    public static function show_contents() {

    }

    /**
     * List Roles Defined in a Dataverse
     */
    public static function list_defined_roles() {

    }

    /**
     * List Facets Configured for a Dataverse
     */
    public static function list_facets() {

    }

    /**
     * Set Facets for a Dataverse
     */
    public static function set_facets() {

    }

    /**
     * Create a New Role in a Dataverse
     */
    public static function new_role() {

    }

    /**
     * List Role Assignments in a Dataverse
     */
    public static function list_roles_assignments() {

    }

    /**
     * Assign a New Role on a Dataverse
     */
    public static function assign_role() {

    }

    /**
     * Delete Role Assignment from a Dataverse
     */
    public static function delete_role() {

    }

    /**
     * List Metadata Blocks Defined on a Dataverse
     */
    public static function list_defined_metadata_blocks() {

    }

    /**
     * Define Metadata Blocks for a Dataverse
     */
    public static function define_metadata_block() {

    }

    /**
     * Determine if a Dataverse Inherits Its Metadata Blocks from Its Parent
     */
    public static function is_metadata_block_root() {

    }

    /**
     * Configure a Dataverse to Inherit Its Metadata Blocks from Its Parent
     */
    public static function set_metadata_block_root() {

    }

    /**
     * Create a Dataset in a Dataverse
     */
    public static function create_dataset() {

    }

    /**
     * Import a Dataset into a Dataverse
     */
    public static function import_dataset() {

    }

    /**
     * Publish a Dataverse
     */
    public static function publish_dataverse() {

    }
}
?>
