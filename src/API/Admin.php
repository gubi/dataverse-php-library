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

namespace Dataverse\API;

class Admin extends Request_handler {
    /**
     * List All Database Settings
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-all-database-settings
     * @method GET
     */
    public static function get_settings($name) {
        return Request_handler::get("admin/settings");
    }

    /**
     * Configure Database Setting
     *
     * Sets setting `name` to the body of the request
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#configure-database-setting
     * @method PUT
     *
     * @param string                            $name                           Settings name
     */
    public static function set_setting($name) {
        return Request_handler::put("admin/settings/{$name}");
    }

    /**
     * Delete Database Setting
     *
     * Delete the setting under `name`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-database-setting
     * @method DELETE
     *
     * @param string                            $name                           Settings name
     */
    public static function delete_setting($name) {
        return Request_handler::delete("admin/settings/{$name}");
    }

    /**
     * List Authentication Provider Factories
     *
     * The alias field of these is used while configuring the providers themselves
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-authentication-provider-factories
     * @method GET
     */
    public static function get_authentication_provider_factories() {
        return Request_handler::get("admin/authenticationProviderFactories");
    }

    /**
     * List Authentication Providers
     *
     * List all the authentication providers in the system (both enabled and disabled)
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-authentication-providers
     * @method GET
     */
    public static function get_authentication_providers() {
        return Request_handler::get("admin/authenticationProviders");
    }

    /**
     * Add Authentication Provider
     *
     * The POST data is in JSON format, similar to the JSON retrieved from this command’s GET counterpart.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#add-authentication-provider
     * @method POST
     */
    public static function add_authentication_provider() {
        return Request_handler::post("admin/authenticationProviders");
    }

    /**
     * Show Authentication Provider
     *
     * Show data about an authentication provider
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#show-authentication-provider
     * @method GET
     *
     * @param string                            $id                             The Authentication Provider ID
     */
    public static function get_authentication_provider($id) {
        return Request_handler::get("admin/authenticationProviders/{$id}");
    }

    /**
     * Enable or Disable an Authentication Provider
     *
     * Enable or disable an authentication provider (denoted by `id`)
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#enable-or-disable-an-authentication-provider
     * @method PUT
     *
     * @param string                            $id                             The Authentication Provider ID
     */
    public static function toggle_authentication_provider($id) {
        return Request_handler::put("admin/authenticationProviders/{$id}/enabled");
    }

    /**
     * Check If an Authentication Provider is Enabled
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#check-if-an-authentication-provider-is-enabled
     * @method GET
     *
     * @param string                            $id                             The Authentication Provider ID
     */
    public static function is_authentication_provider_enable($id) {
        return Request_handler::get("admin/authenticationProviders/{$id}/enabled");
    }

    /**
     * Delete an Authentication Provider
     *
     * The command succeeds even if there is no such provider, as the postcondition holds: there is no provider by that id after the command returns
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#delete-an-authentication-provider
     * @method DELETE
     *
     * @param string                            $id                             The Authentication Provider ID
     */
    public static function delete_authentication_provider($id) {
        return Request_handler::delete("admin/authenticationProviders/{$id}/");
    }

    /**
     * List Global Roles
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#list-global-roles
     * @method GET
     */
    public static function get_roles() {
        return Request_handler::get("admin/roles");
    }

    /**
     * Create Global Role
     *
     * Creates a global role in the Dataverse installation. The data POSTed are assumed to be a role JSON
     * @see http://guides.dataverse.org/en/latest/api/native-api.html#create-global-role
     * @method POST
     */
    public static function create_role() {
        return Request_handler::post("admin/roles");
    }

    /**
     * List Users
     *
     * List users with the options to search and “page” through results. Only accessible to superusers.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#list-users
     * @method GET
     */
    public static function get_users() {
        return Request_handler::get("admin/list-users");
    }

    /**
     * List Single User
     *
     * List user whose `identifier` (without the `@` sign) is passed
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#list-single-user
     * @method GET
     *
     * @param string                            $identifier                     The user identifier (without the "@" sign)
     */
    public static function get_user($identifier) {
        return Request_handler::get("admin/authenticatedUsers/{$identifier}");
    }

    /**
     * Create an authenticateUser
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#list-single-user
     * @method POST
     */
    public static function create_user() {
        return Request_handler::post("admin/authenticatedUsers");
    }

    /**
     * Make User a SuperUser
     *
     * Toggles superuser mode on the `AuthenticatedUser` whose identifier (without the `@` sign) is passed
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#make-user-a-superuser
     * @method POST
     *
     * @param string                            $identifier                     The user identifier (without the "@" sign)
     */
    public static function set_superuser($identifier) {
        return Request_handler::post("admin/superuser/{$identifier}");
    }

    /**
     * List Role Assignments of a Role Assignee
     *
     * Note that `identifier` can contain slashes (e.g. `&ip/localhost-users`).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#list-role-assignments-of-a-role-assignee
     * @method GET
     *
     * @param string                            $identifier                     The user identifier (without the "@" sign)
     */
    public static function get_assignee_assignments($identifier) {
        return Request_handler::get("admin/assignments/assignees/{$identifier}");
    }

    /**
     * List Permissions a User Has on a Dataverse or Dataset
     *
     * The `$identifier` can be a dataverse alias or database id or a dataset persistent ID or database id
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#list-permissions-a-user-has-on-a-dataverse-or-dataset
     * @method GET
     *
     * @param string                            $identifier                     The user identifier (without the "@" sign)
     */
    public static function get_user_permissions($identifier) {
        return Request_handler::get("admin/permissions/{$identifier}");
    }

    /**
     * Show Role Assignee
     *
     * The `$identifier` should start with an `@` if it’s a user. Groups start with `&`.
     * "Built in" users and groups start with `:`. Private URL users start with #.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#show-role-assignee
     * @method GET
     *
     * @param string                            $identifier                     The user identifier (without the "@" sign)
     */
    public static function get_role_assignee($identifier) {
        return Request_handler::get("admin/assignee/{$identifier}");
    }

    /**
     * Saved Searches
     *
     * List all saved searches
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#saved-search
     * @method GET
     */
    public static function get_saved_searches() {
        return Request_handler::get("admin/savedsearches/list");
    }

    /**
     * Saved Search
     *
     * List a saved search by database id
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#saved-search
     * @method GET
     *
     * @param string                            $id                             The search ID
     */
    public static function get_saved_search($id) {
        return Request_handler::get("admin/savedsearches/{$id}");
    }

    /**
     * Get Dataverses and Datasets links by searches
     *
     * Execute all saved searches and make links to dataverses and datasets that are found.
     * The `debug=true` query parameter adds to the JSON response extra information about the saved search being executed (which you could also get by listing the saved search).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#saved-search
     * @method PUT
     */
    public static function get_links_by_searches($debug = true) {
        return Request_handler::put("admin/savedsearches/makelinks/all" . ($debug) ? "?debug=true" : "");
    }

    /**
     * Get Dataverses and Datasets links by searches
     *
     * Execute a saved search by database id and make links to dataverses and datasets that are found.
     * The JSON response indicates which dataverses and datasets were newly linked versus already linked.
     * The `debug=true` query parameter adds to the JSON response extra information about the saved search being executed (which you could also get by listing the saved search).
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#saved-search
     * @method PUT
     *
     * @param string                            $id                             The search ID
     */
    public static function get_links_by_search($id, $debug = true) {
        return Request_handler::put("admin/savedsearches/{$id}" . ($debug) ? "?debug=true" : "");
    }

    /**
     * Dataset Integrity
     *
     * Recalculate the UNF value of a dataset version, if it’s missing, by supplying the dataset version database id
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#dataset-integrity
     * @method POST
     *
     * @param string                            $datasetVersionId               The Dataverse version ID
     */
    public static function dataset_integrity($datasetVersionId) {
        return Request_handler::post("admin/datasets/integrity/{$datasetVersionId}/fixmissingunf");
    }

    /* -------------------------------------------------------------------------
                                    WORKFLOWS
    ------------------------------------------------------------------------- */

    /**
     * List all available workflows in the system.
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method GET
     */
    public static function get_workflows() {
        return Request_handler::get("admin/workflows");
    }

    /**
     * Get details of a workflow with a given id
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method GET
     *
     * @param string                            $id                             The search ID
     */
    public static function get_workflow($id) {
        return Request_handler::get("admin/admin/workflows/{$id}");
    }

    /**
     * Add a new workflow
     *
     * Request body specifies the workflow properties and steps in JSON format. Sample `json` files are available at `scripts/api/data/workflows/`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method POST
     */
    public static function add_workflow() {
        return Request_handler::post("admin/workflows");
    }

    /**
     * Delete a workflow
     *
     * NOTE If the workflow designated by `$id` is a default workflow, a 403 FORBIDDEN response will be returned, and the deletion will be canceled.
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method DELETE
     *
     * @param string                            $id                             The workflow ID
     */
    public static function delete_workflow($id) {
        return Request_handler::delete("admin/workflows/{$id}");
    }

    /**
     * List the default workflow for each trigger type
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method GET
     */
    public static function get_default_workflows() {
        return Request_handler::get("admin/workflows/default");
    }

    /**
     * Get the default workflow for `triggerType`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method GET
     *
     * @param string                            $triggerType                    The Trigger type
     */
    public static function get_default_workflow($triggerType) {
        return Request_handler::get("admin/workflows/default/{$triggerType}");
    }

    /**
     * Set the default workflow for a given trigger
     *
     * This workflow is run when a dataset is published. The body of the PUT request is the id of the workflow. Trigger types are `PrePublishDataset`, `PostPublishDataset`
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method PUT
     *
     * @param string                            $triggerType                    The Trigger type
     */
    public static function set_default_workflow($triggerType) {
        return Request_handler::put("admin/workflows/default/$triggerType");
    }

    /**
     * Unset the default workflow for triggerType
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method DELETE
     *
     * @param string                            $triggerType                    The Trigger type
     */
    public static function unset_default_workflow($triggerType) {
        return Request_handler::delete("admin/workflows/default/{$triggerType}");
    }

    /**
     * Get the whitelist of IP addresses allowed to resume workflows
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method GET
     */
    public static function get_workflow_ip_whitelist() {
        return Request_handler::get("admin/workflows/default");
    }

    /**
     * Set the whitelist of IP addresses separated by a semicolon (;) allowed to resume workflows
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method PUT
     */
    public static function set_workflow_ip_whitelist() {
        return Request_handler::put("admin/workflows/default");
    }

    /**
     * Restore the whitelist of IP addresses allowed to resume workflows to default (localhost only)
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method DELETE
     */
    public static function set_default_workflow_ip_whitelist() {
        return Request_handler::delete("admin/workflows/default");
    }

    /* -------------------------------------------------------------------------
                                    METRICS
    ------------------------------------------------------------------------- */

    /**
     * Clear a specific metric cache
     *
     * Currently this must match the name of the row in the table, which is named metricName*_*metricYYYYMM (or just metricName if there is no date range for the metric). For example dataversesToMonth_2018-05
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method DELETE
     *
     * @param string                            $triggerType                    The Trigger type
     */
    public static function clear_specific_metrics_cache($metricDbName) {
        return Request_handler::delete("admin/clearMetricsCache/{$metricDbName}");
    }

    /**
     * Clear all cached metric results
     *
     * @see http://guides.dataverse.org/en/latest/api/native-api.html?highlight=import#workflows
     * @method DELETE
     */
    public static function clear_metrics_cache() {
        return Request_handler::delete("admin/clearMetricsCache");
    }
}
?>
