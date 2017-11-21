<?php

include "CONTACT.php";  // include the header and search box

if(file_exists("ids"))
{
    $ids = fopen('ids', 'r');
    $s = fread($ids, filesize("ids"));
    fclose($ids);


    for ($i = 1; $i <= $s; $i++) {

        print "<table><tr><th>Title</th><th>First Name</th><th>Last Name</th><th>Action</th></tr>";

        $theData = file("$i.txt");

        foreach ($theData as $line) {
            list($title, $first, $last, $email, $site, $cellNumber, $homeNumber, $officeNumber, $twitter, $facebook, $picture, $comment) = explode("\t", $line);
            print("<tr>");
            print("<td>$title</td>");
            print("<td>$first</td>");
            print("<td>$last</td>");
            print("<td><a href='edit.php'>edit</a> </td>");
            print("<td><img src='$picture' height='100px' width='150px' > </td>");
            print("</tr>");
        }

        print("</table>");

    }
}
else
    echo '<script language="javascript">alert("")</script>';



?>






