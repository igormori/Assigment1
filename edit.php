<?php
session_start();// to be able to get a variable from other file it must to be on top of the page
include "CONTACT.php";  // include the header and search box

//      <---------   To get the image of a provisory directory to my current directory ---------->

$img = @$_FILES['picture']['name'];
$temporary = @$_FILES['picture']['tmp_name'];
$loc="C:xampp\htdocs\Assigment1\\";
move_uploaded_file($temporary,$loc.$img);



$holdId = $_SESSION['number'] ; // hold my variable from other file in a variale
//      <---------   show the form with filled fields ---------->

$mydata = file("data.txt"); //open the file in an array
list($holdId,$title, $first, $last, $email, $site, $cellNumber, $homeNumber, $officeNumber, $twitter, $facebook, $picture, $comment) = explode("|", $mydata[$holdId]);


print ("<form method='post' enctype='multipart/form-data'>

    *Title:<br/>
    <input name='title' type='text' value='$title' required ><br/>
    *First Name:<br/>
    <input name='first' type='text' value='$first' required><br/>
    *Last Name:<br/>
    <input name='last' type='text' value='$last' required><br/>
    Email:<br/>
    <input name='email' type='text' value='$email'><br/>
    Site:<br/>
    <input name='site' type='text' value='$site' ><br/>
    Cell Phone:<br/>
    <input name='cellPhone' type='text' value='$cellNumber'><br/>
    Home Number:<br/>
    <input name='homeNumber' type='text' value='$homeNumber'><br/>
    Office Number:<br/>
    <input name='officeNumber' type='text' value='$officeNumber'><br/>
    Twitter:<br/>
    <input name='twitter' type='text' value='$twitter' ><br/>
    Facebook:<br/>
    <input name='facebook' type='text' value='$facebook' ><br/>
    Picture:<br/>
    <input name='picture' type='file' value='$picture'><br/>
    Comment:<br/>
    <textarea name='comment' type='text' > </textarea><br/>
    <input id='edit' name='submit' type='submit' >
    <input name='cancel' type='submit' value='Cancel'>
</form>");

//  <-----------------  Function to add the edited contact on my flat file  ---------------------->

$holdIndex = $holdId;
echo $holdId;
//$holdIndex++; // this variable will be my id number in the flat file
$holdId--;


//this happen because when i create an array from my flat file the first line will be 0 the second will be 1
//and so on. So, i have to assign a different id for my first contact, that is why i increased it by one.

function edit1($title,$first,$last,$email,$site,$cellNumber,$homeNumber,$officeNumber,$twitter,$facebook,$picture,$comment)
{

    global $holdId,$holdIndex;
    if(isset($_POST['submit'])&& $title != null && $first!= null && $last != null)
    {
        $all = "$holdIndex|$title|$first|$last|$email|$site|$cellNumber|$homeNumber|$officeNumber|$twitter|$facebook|$picture|$comment\n";
        $mydata = file("data.txt");
        $mydata[$holdId] = $all;
        file_put_contents("data.txt",implode("",$mydata));
        echo '<script language="javascript">alert("The contact was updated!")</script>';

        header("Refresh:0; url=viewContact.php"); // to reload the page after click submit
    }
    else if(isset($_POST['cancel'])){

    }


}
edit1(@$_POST['title'], @$_POST['first'],@$_POST['last'],@$_POST['email'],@$_POST['site'],@$_POST['cellPhone'],@$_POST['homePhone'],@$_POST['officeNumber'],@$_POST['twitter'],@$_POST['facebook'],$img,@$_POST['comment']);



