<?php
    require "libs/variables.php";
    require "libs/functions.php";
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Katergori Adı</th>
                        <th> </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getCategories(); while($category =mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td> <? echo $category["id"]?></td>
                        <td> <? echo $category["kategori_adi"]?></td>
                        <td>
                            
                        </td>
                        
                    </tr>


                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>