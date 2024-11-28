<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit();
}

$connect = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($connect, "lojinha");
mysqli_set_charset($connect, "UTF8");

$query = mysqli_query($connect, "SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojinha do seu Zé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-dark text-light py-3">
        <div class="container">
            <h1 class="text-center">Bem-vindo à Lojinha do Seu Zé</h1>
            <p class="text-center">Escolha os melhores produtos para o seu carrinho!</p>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php while ($result = mysqli_fetch_array($query)) : ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="img/<?= $result[4]; ?>" class="card-img-top" alt="<?= $result[1]; ?>" style="height: 300px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $result[1]; ?></h5>
                            <p class="card-text">R$ <?= number_format($result[3], 2, ',', '.'); ?></p>
                            <p class="card-text">Estoque: <?= $result[2]; ?></p>

                            <form action="telaCarrinho.php" method="post">
                                <input type="hidden" name="produto_id" value="<?= $result[0]; ?>">
                                <button type="submit" class="btn btn-primary w-100">Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>

    <footer class="text-center py-4 mt-5 bg-light border-top">
        <a href="telaCarrinho.php" class="btn btn-success btn-lg me-2">Ir para o Carrinho</a>
        <a href="telaSaida.php" class="btn btn-danger btn-lg">Sair</a>
    </footer>
</body>

</html>
