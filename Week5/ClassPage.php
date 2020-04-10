<?php

class Page {

    private $page, $title, $content, $year;

    function __construct($title, $year) {
        $this->page = '';
        $this->title = $title;
        $this->year = $year;
        $this->addHeader();
    }

    private function addHeader() {
        $this->page .= <<<EOD
            <html>
            <head>
            <title>$this->title</title>
            </head>
            <body>
            <h2 align="center">$this->title</h2>
            EOD;
    }

    public function addContent($content) {
        $this->page = $content;
    }

    private function addFooter() {
        $this->page .= <<<EOD
            <div class="footer" align="center">&copy; $this->year</div>
            </body>
            </html>
        EOD;
    }

    public function get() {
        //Keep a copy of $page with no footer
        $temp = $this->page;
        $this->addFooter();
        //Restore $page for the next call to get
        $page = $this->page;
        $this->page = $temp;
        return $page;
        //if not needed, use $this->addFooter(); return $this->page;
    }

}

?>