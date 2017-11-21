
<?php

include "CONTACT.php";  // include the header and search box

$img = @$_FILES['picture']['name'];
$temporary = @$_FILES['picture']['tmp_name'];
$loc="C:xampp\htdocs\Assigment1\\";
move_uploaded_file($temporary,$loc.$img);


if(isset($_POST['submit']))
{
    function getId()
    {
        $file_name = "ids.txt";   // put my data.txt into a variable
        if (!file_exists($file_name))  // if the file does not exist
        {
            touch($file_name);   //if the file does not exist touch() will create it
            $handle = fopen($file_name, "r+"); // fopne() opens a file name

        } else {                                       // if the file exist
            $handle = fopen($file_name, "r+");// $handle you hold the file open function
            $id = fread($handle, filesize($file_name));  // id  holds the file size the file.lenght
            settype($id, "integer");            // this will set the $id (file lenght) to a integer
        }
        rewind($handle);                             // change the position of the file pointer for the begin of the file
        fwrite($handle, ++$id);                       //it will open a file and stop at the end of the file lenght in that case $id

        fclose($handle);                                // it closes a file
        return $id;
    }

    $id1 = getId();

}




function addContacts($title,$first,$last,$email,$site,$cellNumber,$homeNumber,$officeNumber,$twitter,$facebook,$picture,$comment)
{
    global $id1;


    if(isset($_POST['submit'])&& $title != null && $first!= null && $last != null)
    {
        $myFile = "data.txt";
        $handle = fopen($myFile, "a+");
        fwrite($handle,"$id1|$title|$first|$last|$email|$site|$cellNumber|$homeNumber|$officeNumber|$twitter|$facebook|$picture|$comment\n");
        fclose($handle);
        echo '<script language="javascript">alert("The contact was created!")</script>';
    }


}
addContacts(@$_POST['title'], @$_POST['first'],@$_POST['last'],@$_POST['email'],@$_POST['site'],@$_POST['cellPhone'],@$_POST['homePhone'],@$_POST['officeNumber'],@$_POST['twitter'],@$_POST['facebook'],$img,@$_POST['comment']);



?>

<form action="addContact.php" method="post" enctype="multipart/form-data">

    *Title:<br/>
    <input name="title" type="text" required ><br/>
    *First Name:<br/>
    <input name="first" type="text" required><br/>
    *Last Name:<br/>
    <input name="last" type="text" required><br/>
    Email:<br/>
    <input name="email" type="text"><br/>
    Site:<br/>
    <input name="site" type="text" ><br/>
    Cell Phone:<br/>
    <input name="cellPhone" type="text"><br/>
    Home Number:<br/>
    <input name="homeNumber" type="text"><br/>
    Office Number:<br/>
    <input name="officeNumber" type="text"><br/>
    Twitter:<br/>
    <input name="twitter" type="text"><br/>
    Facebook:<br/>
    <input name="facebook" type="text" ><br/>
    Picture:<br/>
    <input name="picture" type="file"><br/>
    Comment:<br/>
    <textarea name="comment" type="text"> </textarea><br/>
    <input name="submit" type="submit" value="Create">
</form>


</body>
</html>