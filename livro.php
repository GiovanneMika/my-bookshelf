<?php
require_once 'dados.php';

$id = $_REQUEST['id'];

$livro = array_filter($livros, fn($livro) => $livro['id'] == $id);

$livro = array_values($livro)[0];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBookShelf</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-gray-800 text-gray-100 shadow">
        <nav class="mx-auto max-w-screen-2xl py-4 px-8 flex justify-between text-lg flex-wrap gap-y-4 gap-x-8">
            <div class="flex gap-x-8 items-center">
                <h1 class="text-2xl font-bold underline tracking-wide"><a href="/">MyBookShelf</a></h1>
            </div>
            <ul class="flex gap-x-8 items-center font-bold">
                <li><a class="text-emerald-400 transition-colors duration-200" href="/">Explorar</a></li>
                <li><a class="hover:underline transition-colors duration-200" href="/my-books.php">Meus Livros</a></li>
            </ul>
            <ul class="flex gap-x-8 items-center">
                <li><a class="hover:underline transition-colors duration-200" href="/login.php">Entrar</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex px-8 py-4 gap-4 flex-wrap mx-auto max-w-screen-xl items-center justify-center flex-col gap-y-6">
        <h1 class="mt-4 self-start font-bold text-lg"><?= $livro['titulo'] ?></h1>
        <div class="bg-white border border-gray-300 rounded-lg shadow p-2 py-4 hover:shadow-lg transition-shadow duration-200 w-full">
            <div class="flex flex-row gap-x-2 h-2/3">
                <div class="w-1/3 bg-emerald-400">
                    <img class="h-fit" src="<?= $livro['capa']; ?>" alt="">
                </div>
                <div class="w-2/3 p-1.5">
                    <a href="/livro.php?id=<?= $livro['id']; ?>" class="font-semibold text-3xl sm:text-2xl hover:underline"><?= $livro['titulo']; ?></a>
                    <div class="sm:text-sm italic"><?= $livro['autor']; ?></div>
                    <div class="sm:text-sm italic">
                        <?php for ($i = 0; $i < $livro['nota']; $i++) {
                            echo "⭐";
                        } ?>
                        (<?= $livro['avaliacoes']; ?> avaliações)
                    </div>
                </div>
            </div>
            <div class="text-sm sm:text-xs mt-2">
                <?= $livro['descricao']; ?>
            </div>
        </div>
    </main>
</body>

</html>