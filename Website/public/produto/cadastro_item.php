<?php

require_once __DIR__ . "/../../backend/Api.php";

$request = new Request('sync', true);
$response = $api->process($request);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>KeyAr</title>
    <meta charset="UTF-8">
    <meta name="description" content=" Divisima | eCommerce Template">
    <meta name="keywords" content="divisima, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="/public/assets/img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <?php require_once __DIR__ . "/../assets/layout/main_css.php"; ?>

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header -->
<header class="header-section">
    <?php require_once __DIR__ . "/../assets/layout/header.php"; ?>
</header>

<!-- checkout section  -->
<section class="checkout-section">
    <div class="container">
        <div class="spad">
            <div class="col-md-10">
                <div class="cart-table">
                    <form class="checkout-form" method="post" action="?name=produto&action=insert">
                        <h3>Cadastro de Item</h3>
                        <?php
                        if($response->getCode() != 6){
                            echo '<div class="alert alert-warning" role="alert">';
                            echo $response->getMessage();
                            if($response->getCode() == 2){
                                echo " Invalid Fields: " . implode(", ", $response->getInvalidFields());
                            }
                            echo '</div>';
                        }
                        ?>
                        <div class="row address-inputs">
                            <div class="col-md-12">
                                <input type="text" placeholder="Nome" name="nome" id="nome" value='<?php  ?>'>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Preço" name="preco" id="preco" value='<?php  ?>'>
                            </div>
                            <div class="col-md-6">
                                <input style='width:120px' type='number' name='quantidade' placeholder='Quantidade'>
                                <div class="col-md-12">
                                    <select name="idcategoria">
                                        <option value="1">Salgados</option>
                                        <option value="2">Doces</option>
                                        <option value="3">Bebidas</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <button class="site-btn submit-order-btn">CADASTRAR</button>
                        <a href="/public/produto/gerenciar_itens.php?name=produto&action=list" class="site-btn sb-dark">VOLTAR</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- checkout section end -->

<!-- Scripts -->
<?php require_once __DIR__ . "/../assets/layout/main_scripts.php"; ?>
<script src="/public/assets/js/scripts.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>