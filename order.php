
<?php include('partials-front/menu.php'); ?>



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore comidas</h2>

        <?php 

            //Display all the cateories that are active
            //Sql Query
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //CHeck whether categories available or not
            if($count>0)
            {
                //Categorias disponíveis
                while($row=mysqli_fetch_assoc($res))
                {
                    //Obter valores
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                if($image_name=="")
                                {
                                    //Imagem indisponível
                                    echo "<div class='error'>Image not found.</div>";
                                }
                                else
                                {
                                    //Imagem disponível
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categorias indisponíveis
                echo "<div class='error'>Category not found.</div>";
            }
        
        ?>
        

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categorias Section Termina aqui -->


<?php include('partials-front/footer.php'); ?>