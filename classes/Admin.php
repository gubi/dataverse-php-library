<?php
/**
 * PHP Dataverse API - Admin
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
 * @subpackage Admin
 * @author Alessandro Gubitosi <a.gubitosi@cgiar.org>
 * @license
 * @link https://github.com/gubi/bioversity_agrovoc-indexing
*/

class Admin extends Dataverse {
    /**
     * List All Database Settings
     */
    public static function get_settings($name) {

    }

    /**
     * Configure Database Setting
     */
    public static function set_setting() {

    }

    /**
     * Delete Database Setting
     */
    public static function delete_setting() {

    }

    /**
     * List Authentication Provider Factories
     */
    public static function get_authentication_provider_factories() {

    }

    /**
     * List Authentication Providers
     */
    public static function get_authentication_providers() {

    }

    /**
     * Add Authentication Provider
     */
    public static function add_authentication_provider() {

    }

    /**
     * Show Authentication Provider
     */
    public static function get_authentication_provider() {

    }

    /**
     * Enable or Disable an Authentication Provider
     */
    public static function toggle_authentication_provider() {

    }

    /**
     * Check If an Authentication Provider is Enabled
     */
    public static function is_authentication_provider_enable() {

    }

    /**
     * Delete an Authentication Provider
     */
    public static function delete_authentication_provider() {

    }

    /**
     * List Global Roles
     */
    public static function get_roles() {

    }

    /**
     * Create Global Role
     */
    public static function create_role() {

    }

    /**
     * List Users
     */
    public static function get_users() {

    }

    /**
     * List Single User
     */
    public static function get_user() {

    }

    /**
     * Make User a SuperUser
     */
    public static function set_superuser() {

    }

    /**
     * List Role Assignments of a Role Assignee
     */
    public static function get_assignee_assignments() {

    }

    /**
     * List Permissions a User Has on a Dataverse or Dataset
     */
    public static function get_user_permissions() {

    }

    /**
     * Show Role Assignee
     */
    public static function get_role_assignee() {

    }

    /**
     * Saved Search
     */
    public static function get_saved_searches() {

    }

    /**
     * Dataset Integrity
     * Recalculate the UNF value of a dataset version, if it’s missing, by supplying the dataset version database id
     */
    public static function dataset_integrity() {

    }

    // Workflows


    /**
     * List all available workflows in the system.
     * If `$id is defined, get details of a workflow with a given id
     */
    public static function get_workflow($id) {

    }

    /**
     * Add a new workflow
     */
    public static function add_workflow() {

    }

    /**
     * Delete a workflow
     * @NOTE If the workflow designated by $id is a default workflow, a 403 FORBIDDEN response will be returned, and the deletion will be canceled.
     */
    public static function delete_workflow() {

    }

    /**
     * List the default workflow for each trigger type
     */
    public static function get_default_workflows($triggerType) {

    }

    /**
     * Set the default workflow for a given trigger
     */
    public static function set_default_workflow($triggerType) {

    }

    /**
     * Unset the default workflow for triggerType
     */
    public static function unset_default_workflow($triggerType) {

    }

    /**
     * Get the whitelist of IP addresses allowed to resume workflows
     */
    public static function get_workflow_ip_whitelist() {

    }

    /**
     * Set the whitelist of IP addresses separated by a semicolon (;) allowed to resume workflows
     */
    public static function set_workflow_ip_whitelist() {

    }

    /**
     * Restore the whitelist of IP addresses allowed to resume workflows to default (localhost only)
     */
    public static function set_default_workflow_ip_whitelist() {

    }

    // Metrics

    /**
     * Clear all cached metric results
     */
    public static function clear_metrics_cache($metricDbName) {

    }
}
?>
