<?php
/**
 * PHP Dataverse API - Files
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
 * @subpackage Files
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse\API;

class Files extends Request_handler {
    /**
     * Adding Files
     * NOTE: Files can be added via the native API but the operation is performed on the parent object, which is a dataset.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#adding-files
     * @see Datasets::add_file()
     */
    // public static function add_file() {}

    /**
     * Accessing (downloading) files
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#accessing-downloading-files
     * @see http://guides.dataverse.org/en/latest/api/dataaccess.html
     * @method GET
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     */
    public static function get_file($persistentId) {
        parent::check("\$persistentId", $persistentId);
        return Request_handler::get("access/datafile/:persistentId/?persistentId={$persistentId}");
    }

    /**
     * Restrict Files
     *
     * Restrict or unrestrict an existing file where `persistentId` is the persistent id (DOI or Handle) of the file to restrict.
     * NOTE: Some Dataverse installations do not allow the ability to restrict files.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#restrict-files
     * @method PUT
     *
     * @param string                            $persistentId                   The Dataset persistent identifier
     */
    public static function restrict_file($persistentId) {
        parent::check("\$persistentId", $persistentId);
        return Request_handler::put("files/:persistentId/restrict?persistentId={$persistentId}");
    }

    /**
     * Replacing Files
     *
     * Replace an existing file where pid is the persistent id (DOI or Handle) of the file.
     * NOTE: Metadata such as description and tags are not carried over from the file being replaced
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#replacing-files
     * @method POST
     *
     * @param string                            $id                             The file ID
     * @param string                            $file                           The file to upload
     * @param string|object                     $json_data                      The JSON data to index file
     */
    public static function replace_file($id, $file, $json_data) {
        parent::check("\$id", $id);
        parent::check("\$file", $file);
        parent::check("\$json_data", $json_data);
        return Request_handler::post("files/{$id}/replace?&file={$file}&jsonData={$json_data}");
    }

    /**
     * Uningest a File
     *
     * Reverse the tabular data ingest process performed on a file where `$id` is the database id of the file to process.
     * NOTE: This requires “super user” credentials
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#uningest-a-file
     * @method POST
     *
     * @param string                            $id                             The file ID
     */
    public static function uninget_file($id) {
        parent::check("\$id", $id);
        return Request_handler::post("files/{$id}/uningest");
    }

    /**
     * Reingest a File
     *
     * Attempt to ingest an existing datafile as tabular data.
     * This API can be used on a file that was not ingested as tabular back when it was uploaded.
     * For example, a Stata v.14 file that was uploaded before ingest support for Stata 14 was added (in Dataverse v.4.9).
     * It can also be used on a file that failed to ingest due to a bug in the ingest plugin that has since been fixed (hence the name “re-ingest”).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#reingest-a-file
     * @method POST
     *
     * @param string                            $id                             The file ID
     */
    public static function reingest_file($id) {
        parent::check("\$id", $id);
        return Request_handler::post("files/{$id}/prov-json");
    }

    /* -------------------------------------------------------------------------
                                    PROVENANCE
    ------------------------------------------------------------------------- */

    /**
     * Get Provenance JSON for an uploaded file
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#provenance
     * @method GET
     *
     * @param string                            $id                             The file ID
     */
    public static function get_provenance($id) {
        parent::check("\$id", $id);
        return Request_handler::get("files/{$id}/prov-json");
    }

    /**
     * Get Provenance Description for an uploaded file
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#provenance
     * @method GET
     *
     * @param string                            $id                             The file ID
     */
    public static function get_provenance_description($id) {
        parent::check("\$id", $id);
        return Request_handler::get("files/{$id}/prov-freeform");
    }

    /**
     * Create/Update Provenance JSON and provide related entity name for an uploaded file
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#provenance
     * @method POST
     *
     * @param string                            $id                             The file ID
     */
    public static function set_provenance($id) {
        parent::check("\$id", $id);
        // Request_handler::post("files/{$id}/prov-freeform --upload-file $filePath");
    }

    /**
     * Delete Provenance JSON for an uploaded file
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#provenance
     * @method DELETE
     *
     * @param string                            $id                             The file ID
     */
    public static function delete_provenance($id) {
        parent::check("\$id", $id);
        return Request_handler::delete("files/{$id}/prov-json");
    }
}
?>
