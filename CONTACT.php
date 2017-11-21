
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

<form action="CONTACT.php" id="search" method="post">

    <input name="search" type="search">
    <input name="submit1" type="submit" value="Search">

</form>

<a href="CONTACT.php"><h1>Contact App</h1></a>

<a href="addContact.php">Add contacts</a>
<a href="viewContact.php">View Contacts</a>


</body>
</html>

<?php

if(isset($_POST['submit1']) AND !empty($_POST['search']) ){



    function search($search)
    {


        print "<table><tr><th>Title</th><th>First Name</th><th>Last Name</th></tr>";

        $theData = file("data.txt");

        foreach ($theData as $line)
        {
            list($id,$title,$first,$last,$email,$site,$cellNumber,$homeNumber,$officeNumber,$twitter,$facebook,$picture,$comment)= explode("|",$line);
            if( $search == $last || $search == $first)
            {
                print("<tr>");
                print("<td>$title</td>");
                print("<td>$first</td>");
                print("<td>$last</td>");
                print("<td><img src='$picture' height='100px' width='150px' > </td>");
                print("</tr>");
                break;
            }

        }

        print("</table>");
    }

    search(@$_POST['search']);
}




?>