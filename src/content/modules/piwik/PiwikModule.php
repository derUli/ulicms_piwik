<?php

class PiwikModule extends Controller
{

    private $moduleName = "piwik";

    public function frontendFooter()
    {
        echo Template::executeModuleTemplate($this->moduleName, "piwik.php");
    }

    public function settings()
    {
        $acl = new ACL();
        if (Request::isPost() and $acl->hasPermission(getModuleMeta($this->moduleName, "admin_permission"))) {
            $normalizedURL = ltrim(Request::getVar("piwik_url"), "http://");
            $normalizedURL = ltrim($normalizedURL, "https://");
            $normalizedURL = rtrim($normalizedURL, "/piwik.php");
            $normalizedURL = rtrim($normalizedURL, "/");
            Settings::set("piwik_url", $normalizedURL, "str");
            Settings::set("piwik_site_id", Request::getVar("piwik_site_id", null, "int"));
        }
        return Template::executeModuleTemplate($this->moduleName, "settings.php");
    }
}