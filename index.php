<?php
require_once 'dados.php';
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
        <h1 class="mt-4 self-start font-bold text-lg">Explorar</h1>
        <form action="" class="flex justify-start items-center w-full flex-start">
            <input type="text" placeholder="Procurar por livros" id="search" name="search" class="w-full h-8 border-gray-400 border bg-gray-300 text-sm px-2 py-1 focus:outline-none focus:border-emerald-400 border rounded-tl-md rounded-bl-md">
            <button type="submit" class="h-8 bg-emerald-400 hover:bg-emerald-500 font-semibold px-2 py-1 rounded-tr-md rounded-br-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#1f2937">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                </svg>
            </button>
        </form>
        <section class="gap-4 grid-cols-1 xl:grid-cols-4 grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2">
            <?php foreach ($livros as $livro) : ?>
                <div class="bg-white border border-gray-300 rounded-lg shadow p-2 py-4 hover:shadow-lg transition-shadow duration-200">
                    <div class="flex flex-row gap-x-2 h-2/3">
                        <div class="w-1/3 bg-emerald-400">
                            <img class="size-full" src="<?= $livro['capa']; ?>" alt="">
                        </div>
                        <div class="w-2/3 p-1.5">
                            <a href="/livro.php?id=<?= $livro['id']; ?>" class="font-semibold text-3xl sm:text-2xl hover:underline"><?= $livro['titulo']; ?></a>
                            <div class="sm:text-sm italic"><?= $livro['autor']; ?></div>
                            <div class="sm:text-sm italic"><?php for ($i = 0; $i < $livro['nota']; $i++) {
                                                                echo "⭐";
                                                            } ?>(<?= $livro['avaliacoes']; ?> avaliações)</div>
                        </div>
                    </div>
                    <div class="text-sm sm:text-xs mt-2">
                        <?= $livro['descricao']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>

</html>