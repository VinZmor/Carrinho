<?php
session_start();
$connect = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($connect, "lojinha");
mysqli_set_charset($connect, "UTF8");


if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];
    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id]++;
    } else {
        $_SESSION['carrinho'][$produto_id] = 1;
    }
    header("Location: telaCarrinho.php");
    exit();
}

if (isset($_POST['remover_id'])) {
    $remover_id = $_POST['remover_id'];
    if (isset($_SESSION['carrinho'][$remover_id])) {
        unset($_SESSION['carrinho'][$remover_id]);
    }
    header("Location: telaCarrinho.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Seu Carrinho</h2>

        <?php if (!empty($_SESSION['carrinho'])) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_carrinho = 0;

                    foreach ($_SESSION['carrinho'] as $id => $quantidade) :
                        $query = mysqli_query($connect, "SELECT nome, preco FROM produtos WHERE id = $id");
                        $produto = mysqli_fetch_assoc($query);
                        $total_produto = $produto['preco'] * $quantidade;
                        $total_carrinho += $total_produto;
                    ?>
                        <tr>
                            <td><?= $produto['nome']; ?></td>
                            <td><?= $quantidade; ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                            <td>R$ <?= number_format($total_produto, 2, ',', '.'); ?></td>
                            <td>
                                <form action="telaCarrinho.php" method="post" class="d-inline">
                                    <input type="hidden" name="remover_id" value="<?= $id; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4 class="text-end">Total: R$ <?= number_format($total_carrinho, 2, ',', '.'); ?></h4>
            <div class="text-end">
                <a href="telaLojinha.php" class="btn btn-primary">Continuar Comprando</a>
                <a href="telaLojinha.php" class="btn btn-success">Finalizar Compra</a>
            </div>
        <?php else : ?>
            <div class="alert alert-warning text-center" role="alert">
                Seu carrinho está vazio. <a href="telaLojinha.php" class="alert-link">Volte à loja</a>.
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
