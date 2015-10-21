<?php


class Context
{
    private $_pageUrl;
    private $_prefixPageUrl;
    private $_pageTitle;
    private $_pageId;

    private $_data;


    public function __construct()
    {
        $this->_pageUrl = "welcome.php";
        $this->_prefixPageUrl = "view/content";
        $this->_pageTitle = "Welcome";
        $this->_pageId = "welcome";
    }


    public function getPageUrl() {
        return $this->_prefixPageUrl . "/" . $this->_pageUrl;
    }

    public function setPageUrl($url) {
        $this->_pageUrl = $url;
    }

    public function setPrefixPageUrl($prefix) {
        $this->_prefixPageUrl = $prefix;
    }


    public function getPageTitle() {
        return $this->_pageTitle;
    }

    public function setPageTitle($title) {
        $this->_pageTitle = $title;
    }


    public function getPageId() {
        return $this->_pageId;
    }

    public function setPageId($id) {
        $this->_pageId = $id;
    }


    public function getData() {
        return $this->_data;
    }

    public function setData($data) {
        $this->_data = $data;
    }
}
