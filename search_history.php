<?php
include_once './config/Database.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
    <title>Country Rest API</title>
</head>

<body class="bg-slate-900 ">
    <!-- header -->
    <nav>
        <div class=" grid border-b border-gray-700 place-items-center content-center">
            <h1
                class="flex items-center h-10 px-2 py-2 -mb-px text-center bg-transparent border-b-2 border-blue-500 sm:px-4 -px-1 dark:border-blue-400 dark:text-blue-300 whitespace-nowrap focus:outline-none text-sky-500">
                Your searched Countries</h1>
        </div>
    </nav>

    <div class=" grid my-4 place-items-center content-center">
        <a href="index.php"
            class=" flex items-center px-2 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 26 26"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                </path>
            </svg>
            <span class="mx-1">Search</span>

        </a>

    </div>


    <main class="grid grid-cols-1 px-64 py-8 gap-4  place-items-center content-center">
        <?php if (!empty($countries)) : ?>
        <?php foreach ($countries as  $data) :  ?>
        <div class="w-96 grid grid-col-2 gap-4 p-4 rounded-md shadow-lg bg-slate-800 overflow-hidden">

            <img class=" w-16 h-16 rounded-full shadow-lg absolute -ml-16 " src="<?= $data["flag"] ?>" alt="flag">



            <div class="col-start-2 col-span-4 ml-8">
                <ul class="text-indigo-600 ">
                    <li><span class=" text-sky-500 ">Country:</span> <?= $data["name"] ?></li>
                    <li><span class=" text-sky-500 ">Region:</span> <?= $data["region"] ?></li>
                    <li><span class=" text-sky-500 ">Population:</span> <?= $data["population"] ?></li>
                </ul>
            </div>

        </div>
        <?php endforeach; ?>
        <?php endif ?>




</body>

</html>