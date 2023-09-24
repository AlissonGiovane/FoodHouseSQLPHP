
    <?php include('partials-front/menu.php'); ?>

<!-- Seção de procurar comida começa aqui -->
<section class="food-search text-center">
    <div class="container">
        <?php 

            //Obtendo as teclas do teclado
            // $search = $_POST['search'];
            $search = mysqli_real_escape_string($conn, $_POST['search']);
        
        ?>


        <h2>Comidas na sua busca <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- Seção de procurar comida termina aqui -->



<!-- Menu de comida Section começa aqui -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 

            //SQL Query para obter a comida baseado nas teclas digitas
            //$search = burger '; DROP database name;
            // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //executar Query
            $res = mysqli_query($conn, $sql);

            //Contar linhas
            $count = mysqli_num_rows($res);

            //Verifica se tem comida disponível
            if($count>0)
            {
                //comida disponível
                while($row=mysqli_fetch_assoc($res))
                {
                    //OBter detalhes
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                // Verifica se imagem está disponível ou não
                                if($image_name=="")
                                {
                                    //Imagem não disponível
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    //Imagem disponível
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php 

                                }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">R$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="#" class="btn btn-primary">Peça agora</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                //Comida não disponível
                echo "<div class='error'>Food not found.</div>";
            }
        
        ?>

        

        <div class="clearfix"></div>

        

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>