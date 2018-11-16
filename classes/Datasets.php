<?php
/**
 * PHP Dataverse API - Datasets
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

class Datasets extends Dataverse\Request_handler {
    /**
     * Get JSON Representation of a Dataset
     *
     * Show the dataset whose id is passed.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#get-json-representation-of-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     * @param boolean                           $persistentId                   Prefer the persistent identifier (Default `true`)
     */
    public static function get_dataset($id, $persistentId = true) {
        parent::check("\$id", $id);
        if($persistentId) {
            return parent::get("datasets/:persistentId/?persistentId={$persistentId}");
        } else {
            return parent::get("datasets/{$id}");
        }
    }

    /**
     * Delete Dataset
     *
     * Delete the dataset whose id is passed
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-dataset
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function delete_dataset($id) {
        parent::check("\$id", $id);
        return parent::delete("datasets/{$id}");
    }

    /**
     * List Versions of a Dataset
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-versions-of-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     */
    public static function list_dataset_versions($id) {
        parent::check("\$id", $id);
        return parent::get("datasets/{$id}/versions");
    }

    /**
     * Get Version of a Dataset
     *
     * Show a version of the dataset. The Dataset also include any metadata blocks the data might have
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#get-version-of-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $versionNumber                  The Dataset version number
     */
    public static function get_dataset_version($id, $versionNumber) {
        parent::check("\$id", $id);
        parent::check("\$versionNumber", $versionNumber);
        return parent::get("datasets/{$id}/versions/{$versionNumber}");
    }

    /**
     * Export Metadata of a Dataset in Various Formats
     *
     * Export the metadata of the current published version of a dataset in various formats.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#export-metadata-of-a-dataset-in-various-formats
     * @method GET
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     * @param string                            $exporter                       The exporter format. Supported exporters (export formats) are `ddi`, `oai_ddi`, `dcterms`, `oai_dc`, `schema.org`, and `dataverse_json`
     */
    public static function export_dataset_metadata($persistentId, $exporter = "ddi") {
        parent::check("\$persistentId", $persistentId);
        return parent::get("datasets/export?exporter={$exporter}&persistentId={$persistentId}");
    }

    /**
     * List Files in a Dataset
     *
     * Lists all the file metadata, for the given dataset and version
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-files-in-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $versionId                      The Dataset version number
     */
    public static function list_dataset_files($id, $versionId) {
        parent::check("\$id", $id);
        parent::check("\$versionId", $versionId);
        return parent::get("datasets/{$id}/versions/{$versionId}/files");
    }

    /**
     * List All Metadata Blocks for a Dataset
     *
     * Lists all the metadata blocks and their content, for the given dataset and version:
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-all-metadata-blocks-for-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $versionId                      The Dataset version number
     */
    public static function list_dataset_metadata_blocks($id, $versionId) {
        parent::check("\$id", $id);
        parent::check("\$versionId", $versionId);
        return parent::get("datasets/{$id}/versions/{$versionId}/metadata");
    }

    /**
     * List Single Metadata Block for a Dataset
     *
     * Lists the metadata block named __blockname__, for the given dataset and version
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-single-metadata-block-for-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust)
     * @param string                            $versionId                      The Dataset version number
     * @param string                            $blockname                      The metadata block name
     */
    public static function list_dataset_metadata_block($id, $versionId, $blockname) {
        parent::check("\$id", $id);
        parent::check("\$versionId", $versionId);
        parent::check("\$blockname", $blockname);
        return parent::get("datasets/{$id}/versions/{$versionId}/metadata/{$blockname}");
    }

    /**
     * Update Metadata For a Dataset
     *
     * If a draft of the dataset already exists, the metadata of that draft is overwritten; otherwise, a new draft is created with this metadata.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#update-metadata-for-a-dataset
     * @method POST
     * @example http://guides.dataverse.org/en/latest/_downloads/dataset-update-metadata.json
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     */
    public static function update_dataset_metadata($persistentId) {
        parent::check("\$persistentId", $persistentId);
        // parent::post("datasets/:persistentId/versions/:draft?persistentId={$persistentId} --upload-file dataset-update-metadata.json");
    }

    /**
     * Edit Dataset Metadata
     *
     * Alternatively to replacing an entire dataset version with its JSON representation you may add data to dataset fields that are blank or accept multiple values with this method.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#edit-dataset-metadata
     * @method POST
     * @example http://guides.dataverse.org/en/latest/_downloads/dataset-edit-metadata-sample.json
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     * @param boolean                           $replace                        If true, replace existing metadata in dataset fields with the following
     */
    public static function edit_dataset_metadata($persistentId, $replace = true) {
        parent::check("\$persistentId", $persistentId);
        if($replace) {
            return parent::post("datasets/:persistentId/editMetadata?persistentId=$persistentId&replace=true --upload-file dataset-edit-metadata-sample.json");
        } else {
            return parent::post("datasets/:persistentId/editMetadata/?persistentId=$persistentId --upload-file dataset-edit-metadata-sample.json");
        }
    }

    /**
     * Delete Dataset Metadata
     *
     * You may delete some of the metadata of a dataset version by supplying a file with a JSON representation of dataset fields that you would like to delete with the following
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-dataset-metadata
     * @method PUT
     * @example http://guides.dataverse.org/en/latest/_downloads/dataset-delete-author-metadata.json
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     */
    public static function delete_dataset_metadata($persistentId) {
        parent::check("\$persistentId", $persistentId);
        return parent::put("datasets/:persistentId/deleteMetadata/?persistentId=$persistentId --upload-file dataset-delete-author-metadata.json");
    }

    /**
     * Publish a Dataset
     *
     * Publishes the dataset whose id is passed.
     * If this is the first version of the dataset, its version number will be set to 1.0. Otherwise, the new dataset version number is determined by the most recent version number and the type parameter.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#publish-a-dataset
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     * @param string                            $type                           Type of version to increase: "minor" increases the minor version number (2.3 is updated to 2.4); "major" increases the major version number (2.3 is updated to 3.0). Default "minor"
     */
    public static function publish_dataset($id, $type = "minor") {
        parent::check("\$id", $id);
        return parent::post("datasets/{$id}/actions/:publish?type={$type}");
    }

    /**
     * Delete Dataset Draft
     *
     * Deletes the draft version of dataset `$id`. Only the draft version can be deleted
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-dataset-draft
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function delete_dataset_draft($id) {
        parent::check("\$id", $id);
        return parent::delete("datasets/{$id}/versions/:draft");
    }

    /**
     * Set Citation Date Field for a Dataset
     *
     * Sets the dataset field type to be used as the citation date for the given dataset (if the dataset does not include the dataset field type, the default logic is used).
     * The name of the dataset field type should be sent in the body of the reqeust.
     * Note that the dataset field used has to be a date field
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#set-citation-date-field-for-a-dataset
     * @method PUT
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function set_dataset_citation_date($id) {
        parent::check("\$id", $id);
        return parent::put("datasets/{$id}/citationdate");
    }

    /**
     * Revert Citation Date Field to Default for Dataset
     *
     * Restores the default logic of the field type to be used as the citation date.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#revert-citation-date-field-to-default-for-dataset
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function set_default_citation_date($id) {
        parent::check("\$id", $id);
        return parent::delete("datasets/{$id}/citationdate");
    }

    /**
     * List Role Assignments for a Dataset
     *
     * List all the role assignments at the given dataset
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-role-assignments-for-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function list_roles($id) {
        parent::check("\$id", $id);
        return parent::get("datasets/{$id}/assignments");
    }

    /**
     * Create a Private URL for a Dataset
     *
     * Create a Private URL (must be able to manage dataset permissions)
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-a-private-url-for-a-dataset
     * @method POST
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function create_url($id) {
        parent::check("\$id", $id);
        return parent::post("datasets/{$id}/privateUrl");
    }

    /**
     * Get the Private URL for a Dataset(if available)
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#get-the-private-url-for-a-dataset
     * @method GET
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function get_url($id) {
        parent::check("\$id", $id);
        return parent::get("datasets/{$id}/privateUrl");
    }

    /**
     * Delete the Private URL from a Dataset (if it exists)
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-the-private-url-from-a-dataset
     * @method DELETE
     *
     * @param string                            $id                             A dataverse id (long) or a dataverse alias (more robust) or the persistent identifier
     */
    public static function delete_url($id) {
        parent::check("\$id", $id);
        return parent::delete("datasets/{$id}/privateUrl");
    }

    /**
     * Add a File to a Dataset
     *
     * Description and tags are optional
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#add-a-file-to-a-dataset
     * @method POST
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     * @param string                            $file                           The file to upload
     * @param string|object                     $json_data                      The JSON data to index file
     */
    public static function add_file($persistentId, $file, $json_data) {
        parent::check("\$persistentId", $persistentId);
        parent::check("\$file", $file);
        parent::check("\$json_data", $json_data);
        return parent::post("datasets/:persistentId/add?persistentId={$persistentId}&file={$file}&jsonData={$json_data}");
    }

    /**
     * Submit a Dataset for Review
     *
     * When dataset authors do not have permission to publish directly, they can click the “Submit for Review” button in the web interface (see Dataset + File Management), or perform the equivalent operation via API
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#submit-a-dataset-for-review
     * @see http://guides.dataverse.org/en/latest/user/dataset-management.html
     * @method POST
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     */
    public static function submit_for_review($persistentId) {
        parent::check("\$persistentId", $persistentId);
        return parent::post("datasets/:persistentId/submitForReview?persistentId={$persistentId}");
    }

    /**
     * Return a Dataset to Author
     *
     * After the curators or journal editors have reviewed a dataset that has been submitted for review (see “Submit for Review”, above) they can either choose to publish the dataset (see the `:publish` “action” above) or return the dataset to its authors.
     * In the web interface there is a “Return to Author” button (see Dataset + File Management), but the interface does not provide a way to explain why the dataset is being returned. There is a way to do this outside of this interface, however.
     * Instead of clicking the “Return to Author” button in the UI, a curator can write a “reason for return” into the database via API.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#return-a-dataset-to-author
     * @method POST
     * @example http://guides.dataverse.org/en/latest/_downloads/reason-for-return.json
     */
    public static function return_dataset_to_authors($persistentId) {
        parent::check("\$persistentId", $persistentId);
        // parent::post("datasets/:persistentId/returnToAuthor?persistentId={$persistentId} --upload-file reason-for-return.json");
    }

    /**
     * Link a Dataset
     *
     * Creates a link between a dataset and a dataverse (see the Linked Dataverses + Linked Datasets section of the Dataverse Management guide for more information).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#link-a-dataset
     * @see http://guides.dataverse.org/en/latest/user/dataverse-management.html#dataset-linking
     * @method PUT
     *
     * @param string                            $linked_dataset_id              The linked Dataset id
     * @param string                            $linking_dataverse_alias        The linking Dataverse alias
     */
    public static function link_dataset($linked_dataset_id, $linking_dataverse_alias) {
        parent::check("\$linked_dataset_id", $linked_dataset_id);
        parent::check("\$linking_dataverse_alias", $linking_dataverse_alias);
        return parent::put("datasets/{$linked_dataset_id}/link/{$linking_dataverse_alias}");
    }

    /**
     * Check if a dataset is locked
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#dataset-locks
     * @method GET
     *
     * @param string                            $dataset_id                     The Dataset id
     */
    public static function is_dataset_locked($dataset_id) {
        parent::check("\$dataset_id", $dataset_id);
        return parent::get("datasets/{$dataset_id}/locks");
    }

    /**
     * Check if a dataset is locked
     *
     * If the dataset is not locked (or if there is no lock of the specified type), the API will exit with a warning message.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#dataset-locks
     * @method DELETE
     *
     * @param string                            $dataset_id                     The Dataset id
     */
    public static function unloack_all_datasets($dataset_id) {
        parent::check("\$dataset_id", $dataset_id);
        return parent::delete("datasets/{$dataset_id}/locks");
    }
}
?>
