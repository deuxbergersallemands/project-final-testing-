<?php


class Context
{
    private $_pageUrl;
    private $_prefixPageUrl
    private $_pageTitle;
    private $_pageId;


    public __construct()
    {
        $_pageUrl = "welcome.php";
        $_prefixPageUrl = "/view/content/";
        $_pageTitle = "Welcome"
        $_pageId = "welcome";
    }


    public function getPageUrl() {
        return $this->_prefixPageUrl . "/" . $this->_pageUrl;
    }

    public setPageUrl($url) {
        $this->_pageUrl = $url;
    }

    public setPrefixPageUrl($prefix) {
        $this->_prefixPageUrl = $prefix;
    }


    public function getPageTitle() {
        return $this->_pageTitle;
    }

    public setPageUrl($title) {
        $this->_pageTitle = $title;
    }


    public function getPageId() {
        return $this->_pageId;
    }

    public setPageUrl($id) {
        $this->_pageId = $id;
    }
}
