<?php

include "CONTACT.php";  // include the header and search box

//   <---------   Shows the data in a table  ---------->

print "<table><tr><th>Title</th><th>First Name</th><th>Last Name</th><th>Picture</th></tr>";
$theData = file("data.txt");
$i = 0;
foreach ($theData as $line) {
    list($id,$title, $first, $last, $email, $site, $cellNumber, $homeNumber, $officeNumber, $twitter, $facebook, $picture, $comment) = explode("|", $line);
    print("<tr>");
    print("<td>$title</td>");
    print("<td>$first</td>");
    print("<td>$last</td>");
    print("<td><img src='$picture' height='100px' width='150px' ></td>");
    print("<td><form  method='post' ><input name='$i' type='submit' value='edit'> </form></td>");//$id creates a unique name each time that the loop goes
    print("<td><form method='post'><input name='delete$i' type='submit' value='delete'></form></td>");
    print("</tr>");
    $i++;

}

print("</table>");


//  <------------------------------------------------------------------------------------------->



if($i>0) {
    for ($i = 0; $i <= $id; $i++) //this loop goes until the last $id name generated
    {

        if (isset($_POST[$i])) { // this take only the id that i have clicked



            session_start();// to save the variable to be accessed in other files in this project
            $_SESSION['number'] = $i;// this is the variable that i want to save
            echo("<script>if(confirm('Would you like to edit this contact?$i')){window.location = 'edit.php';} else {};</script>");//script to do the validation then go the de page that i want to go
            break;

        } else if (isset($_POST['delete' . $i])) {

//          <---------   To delete the image file  ---------->

            echo("<script>if(confirm('Would you like to edit this contact?$i')){} else {window.location = 'viewContact.php';};</script>");
            $mydata = file("data.txt"); // open a file and put into an array
            list($id,$title, $first, $last, $email, $site, $cellNumber, $homeNumber, $officeNumber, $twitter, $facebook, $picture, $comment) = explode("|", $mydata[$i]);
            unlink("$picture");//delete the image file

//          <---------   To delete the content in my file  ---------->

            $mydata = file('data.txt');//open the file into an array
            $empty = ""; //empty content created
            $mydata[$i] = $empty;// put the empty content inside of my file in array index $i
            file_put_contents("data.txt", implode("", $mydata));//function to open the file and put inside of my file

            header("Refresh:0; url=viewContact.php"); // to reload the page after click submit

        }
    }
}





