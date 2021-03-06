<?php include "db.php";?>
<?php
$myDatabase = new Database();
$newQuery = $myDatabase->select_news('news');

  if(isset($_GET["id"])){
     $id = $_GET["id"];
     $myDatabase->deleteNews($id);
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>NEWS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>

    <body>
        <style>

            html,body{
                background: url('https://hd.unsplash.com/photo-1469386220931-a05a3a71cbb5') no-repeat center;
            }
        </style>


        <div class="container">
            <h1>NEWS</h1>
            <div class="col-md-12">
                <div class="btn btn-success"><a href="create.php">CREATE</a></div>
                <button class="btn btn-default"><a href="../admin.php">BACK to ADMIN PANEL</a></button>
                <table class="table table-bordered">
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>TEXT</th>
                    <th>PHOTO</th>
                    <th>INSERT TIME</th>
                    <th>VIEW</th>
                    <th colspan="2" >Edit</th>

                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($newQuery)) { ?>
                            <tr> 
                                <?php foreach ($row as $key => $value) { ?>

                                    <td><?= $value ?></td> 

                                <?php } ?>
                                   
                                    <td><a id="edit" href='update.php?id=<?= $row['id'] ?>' class="btn btn-primary">Edit</a></td>
                                    <td><a id="delete" href='?id=<?= $row['id'] ?>' class="btn btn-danger" name="delete">Delete</a></td>
     

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>
