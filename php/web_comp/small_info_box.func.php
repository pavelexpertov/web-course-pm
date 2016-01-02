<?php
// The function prints a display box with custom
// message, title, classname for the box and image
function printSmallInfoBox(
    $title,
    $message,
    $classname = '',
    $imageSrc = '')
{
    if($classname != '')
    {
        print "<div class=\"{$classname}\">\n";
    }
    else
    {
        print "<div>\n";
    }

        print "<h3>";
            print "$title";
        print "</h3>\n";

        print "<p>";
            print "$message";
        print "</p>\n";

    print "</div>\n";
}
?>
