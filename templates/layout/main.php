<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>

    <!-- include styles -->
    <link rel="stylesheet" href="/public/css/style.css" />
    <link rel="stylesheet" href="/public/css/<?=$style?>.css" />

    <!-- include js -->
    <script type="module" src="/public/js/<?=$js?>.js" defer></script>

    <title><?=$title?></title>
</head>

<body>
    <div class="wrapper">
        <?=$header?>
        <main class='page'>
            <?=$content?>
        </main>
        <?=$footer?>
    </div>
</body>

</html>