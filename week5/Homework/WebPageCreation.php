<?php

function __autoload($class) {

    include(ucfirst($class) . ".php");
}

$title = filter_input(INPUT_POST, "title");
$content = filter_input(INPUT_POST, "content");
$footer = filter_input(INPUT_POST, "footer");

$web = new WebPage;
$web->addHeader($title);
$web->addContent($content);
$web->addFooter($footer);
print "<head><title>$title</title></head>";
print"<p>$content</p>";
print"<h7>Copy right by $footer </h7>";
?>


