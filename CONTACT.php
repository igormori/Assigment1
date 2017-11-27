
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="ContactCss.css">
</head>
<body>


<h1 id='title'> Contact Application  </h1>

<form action="CONTACT.php"  id="search" method="post">

    <input name="search" type="search">
    <input name="submit1" type="submit" value="Search">

</form>

<a href="CONTACT.php"><h1 id="contactApp" >Contact App</h1></a>

<div id="action">
<a id="add" href="addContact.php">Add contacts</a>

<a id="view" href="viewContact.php">View Contacts</a>
</div>

</body>
</html>

<?php

if(isset($_POST['submit1']) && !empty($_POST['search']) ){
    function search($search)
    {

        $theData = file("data.txt");

        foreach ($theData as $line)
        {
            list($id,$title,$first,$last,$email,$site,$cellNumber,$homeNumber,$officeNumber,$twitter,$facebook,$picture,$comment)= explode("|",$line);
            if( $search == $last OR $search == $first)
            {
                print "<table><tr><th>Title</th><th>First Name</th><th>Last Name</th></tr>";
                print("<tr>");
                print("<td>$title</td>");
                print("<td>$first</td>");
                print("<td>$last</td>");
                print("<td><img src='$picture' height='100px' width='150px' > </td>");
                print("</tr>");
                break;

            }
//            else{
//                echo '<script language="javascript">alert("Contact was not found")</script>';
//            }

        }

        print("</table>");
    }

    search(@$_POST['search']);
}






?>