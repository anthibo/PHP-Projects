<?php
require_once("db.php");
require_once("component.php");
$con =Createdb();
//create buttonClick
if(isset($_POST['create'])){
    createData();
}
if(isset($_POST['update'])){
    updateData();
}
if(isset($_POST['delete'])){
    deleteRecord();
}
if(isset($_POST['deleteall'])){
    deleteall();
}





function createData(){
    $bookname = textBoxValue("book_name");
    $bookpublisher = textBoxValue("book_publisher");
    $bookprice = textBoxValue("book_price");
    if($bookname&&$bookpublisher&&$bookprice){
        $sql = "INSERT INTO books (book_name, book_publisher, book_price) 
                        VALUES ('$bookname','$bookpublisher','$bookprice')";
        if (mysqli_query($GLOBALS['con'],$sql)){
            Message('success',"Record successfully inserted");
        }
        else{
            echo "ERROR" .mysqli_error($GLOBALS['con']);
        }
    }
    else{
        Message("error","Provide data in the textBoxes please");
    }
}
function textBoxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }
    else{
        return $textbox;
    }
}
//Messages
function Message($className,$msg){
    $element = "<h6 class='$className'>$msg</h6>";
    echo $element;
}
//get the data from the database
function getData(){
    $sql = "SELECT * FROM books";
    $result =   mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)>0){
        return $result;
    }
}
//update data
function updateData()
{
    $bookid = textboxValue("book_id");
    $bookname = textBoxValue("book_name");
    $bookpublisher = textBoxValue("book_publisher");
    $bookprice = textBoxValue("book_price");
    if($bookname&&$bookpublisher&&$bookprice){
        $sql="
              UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid'
        
        ";
        if(mysqli_query($GLOBALS['con'],$sql)){
            Message("success","Data Successfully Updated ");

        }
        else{
            Message("error","Unable to update data ".mysqli_error($GLOBALS['con']));
        }

    }
    else{
        Message("error","Select Data using Edit icon");


    }
}
//delete record
function deleteRecord(){
    $bookid = (int)textBoxValue("book_id");
    $sql = "DELETE FROM books WHERE id='$bookid'";
    if(mysqli_query($GLOBALS['con'],$sql)){
        Message("success","Record Deleted Successfully");

    }
    else{
        Message("error","There was an error deleting this record" .mysqli_error($GLOBALS['con']));
    }
}
// delete all data
function deleteBtn(){
    $res = getData();
    $i = 0;
    if($res){
        while($row = mysqli_fetch_assoc($res)){
           $i++;
        }
        if($i>3){
            buttonElement("btn-deleteall","btn btn-danger","<i class=' fas fa-trash'></i>Delete all","deleteall","");
            return;
        }
    }
}
function deleteall(){
    $sql = "DROP TABLE books";
    if(mysqli_query($GLOBALS['con'],$sql)){
        Message("success","All records are deleted successfully");
        Createdb();
    }
    else{
        Message("error","There was an error deleting records" .mysqli_error($GLOBALS['con']));
    }

}
// set id to textbox
function getID(){
    $getID= getData();
    $id = 0 ;
    if($getID){
        while($row = mysqli_fetch_assoc($getID)){
            $id = $row['id'];
        }
    }
    return $id +1 ;
}

