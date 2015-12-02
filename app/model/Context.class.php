<?php


class Context
{
    // Class constantes, to common button images.
	const BDC_IMG     		   = "assets/images/BDC.png";
    const VIEW_BUTTON_IMG      = "assets/images/loupe.png";
    const ADD_BUTTON_IMG       = "assets/images/add.png";
    const EDIT_BUTTON_IMG      = "assets/images/pencil.png";
    const DEL_BUTTON_IMG       = "assets/images/delete.png";
    const BACK_BUTTON_IMG      = "assets/images/back.png";
    const HELP_BUTTON_IMG      = "assets/images/help.png";
    const MANAGE_BUTTON_IMG    = "assets/images/manage.png";

    // Class variables.
    private $_pageUrl;
    private $_prefixPageUrl;
    private $_pageTitle;
    private $_pageId;
    private $_header;

    private $_data;
    private $_githubAuthor;
    private $_githubRepo;


    public function __construct()
    {
        $this->_pageUrl = "welcome.php";
        $this->_prefixPageUrl = "view";
        $this->_pageTitle = "Welcome";
        $this->_pageId = "welcome";
        $this->_header = "Welcome";
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

    public function getHeader() {
        return $this->_header;
    }

    public function setHeader($header) {
        $this->_header = $header;
    }

    public function getData() {
        return $this->_data;
    }

    public function setData($data) {
        $this->_data = $data;
    }

    public function getGithubRepo() {
        return $this->_githubRepo;
    }

    public function setGithubRepo($data) {
        $this->_githubRepo = $data;
    }

    public function getGithubAuthor() {
        return $this->_githubAuthor;
    }

    public function setGithubAuthor($data) {
        $this->_githubAuthor = $data;
    }
}
