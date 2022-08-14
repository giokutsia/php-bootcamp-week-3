<?php include_once './config/api_rest.php';
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

<body class="bg-slate-900">
    <!-- search form -->
    <section class="relative w-full max-w-md px-5 py-4 mx-auto rounded-md">
        <?php if (!empty($countries)) :  ?>
        <a href="search_history.php"
            class=" text-white absolute -right-64 mt-3 ml-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">History</a>
        <?php endif;  ?>
        <form action="" method="post">
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" name="country_name" value="<?= $county_name ?>" id="default-search"
                    class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Country">
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        <!-- error messahges form-->
        <?php if (!empty($nameErr)) : ?>
        <div class="flex mt-5 w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="flex items-center justify-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z" />
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500 dark:text-red-400">Error Input</span>
                    <p class="text-sm text-gray-600 dark:text-gray-200"><?= $nameErr ?></p>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>


    <!-- data output with card styling -->
    <main class="grid grid-cols-1 px-64 py-8  place-items-center content-center">
        <?php if (!empty($country_matched)) : ?>

        <div class="w-96 grid grid-col-2 gap-4 p-4 rounded-md shadow-lg bg-slate-800 overflow-hidden">

            <img class="w-16 h-16 rounded-full shadow-lg absolute -ml-16" src="<?= $flag ?>" alt="flag">



            <div class="col-start-2 col-span-4 ml-8">
                <ul class="text-indigo-600 ">
                    <li><span class=" text-sky-500 ">Country:</span> <?= $name ?></li>
                    <li><span class=" text-sky-500 ">Region:</span> <?= $region ?></li>
                    <li><span class=" text-sky-500 ">Population:</span> <?= $population  ?></li>
                </ul>
            </div>

        </div>

        <?php endif ?>



    </main>







</body>

</html>