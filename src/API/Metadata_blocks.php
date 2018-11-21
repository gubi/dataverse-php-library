<?php
/**
 * PHP Dataverse API - Metadata_blocks
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
 * @subpackage Metadata_blocks
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

namespace Dataverse\API;

class Metadata_blocks extends Request_handler {
    /**
     * Show Info About All Metadata Blocks
     *
     * Lists brief info about all metadata blocks registered in the system
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-info-about-all-metadata-blocks
     * @method GET
     */
    public static function get_all_metadata_info() {
        return Request_handler::get("metadatablocks");
    }

    /**
     * Show Info About Single Metadata Block
     *
     * Return data about the block whose `identifier` is passed.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-info-about-single-metadata-block
     * @method GET
     *
     * @param string                            $identifier                     The identifier can either be the block’s id, or its name
     */
    public static function get_metadata_info($identifier) {
        parent::check("\$identifier", $identifier);
        return Request_handler::get("metadatablocks/{$identifier}");
    }
}
?>
