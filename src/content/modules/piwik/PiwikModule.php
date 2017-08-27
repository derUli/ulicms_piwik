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
            Settings::set("piwik_url", trim(Request::getVar("piwik_url")), "str");
            Settings::set("piwik_site_id", Request::getVar("piwik_site_id", null, "int"));
        }
        return Template::executeModuleTemplate($this->moduleName, "settings.php");
    }

    public function uninstall()
    {
        Settings::delete("piwik_url");
        Settings::delete("piwik_site_id");
    }
}