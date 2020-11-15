<?php
require_once("../crud/php/component.php");
require_once("../crud/php/operations.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="https://kit.fontawesome.com/d85ee48990.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <!--    <link rel="stylesheet" href="style.css">-->
    <style>
        .d-flex button {
            margin: 1.5em 0.5em;
            padding: 0.3em 1.4em;
        }

        .d-flex table {
            margin: 1em 10em;
        }

        table .btnedit {
            color: lightsalmon;
            cursor: pointer;
        }

        .success {
            background: lightgreen;
            padding: 1em;

        }

        .error {
            background: tomato;
            padding: 1em;
        }
    </style>
</head>

<body>


<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "book_id", getID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name", ""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>", "Publisher", "book_publisher", ""); ?>
                    </div>
                    <div class="col"><?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "book_price", ""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                    <?php deleteBtn();?>
                </div>

            </form>

        </div>
        <!--   Bootstrap table     -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Book Price</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody id="tbody">
                <?php
                    if(isset($_POST["read"])){
                        $result = getData();
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['id'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher'];?></td>
                                    <td data-id="<?php echo $row['id'];?>"><?php echo '$' .$row['book_price'];?></td>
                                    <td><i class="fas fa-edit btnedit"data-id="<?php echo $row['id'];?>"></i></td>
                                </tr>
                <?php

                            }

                        }
                    } ?>



                </tbody>

            </table>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="../crud/php/main.js"></script>
</body>

</html>
