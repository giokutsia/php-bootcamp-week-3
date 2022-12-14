<?php
include_once "Database.php";
$nameErr = "";
$county_name = "";
$url = "https://restcountries.com/v3.1/all";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["country_name"])) {
        $nameErr = "Name is required";
    } else {
        $county_name = strtolower($_POST["country_name"]);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        $resultphp = curl_exec($ch);
        $result = json_decode($resultphp, true);

        curl_close($ch);
        foreach ($result as $keys => $values) {


            if (strtolower($values['name']['common'])  === $county_name) {

                $name = $values['name']['common'];
                $region = $values['region'];
                $flag = $values['flags']['png'];
                $population = $values['population'];


                $capital = $values["capital"][0];
            }
        }
        if (!isset($name)) {
            $nameErr = "no country with this name";
        }
        //chekcing if there in DB there is country name like inputed name 
        //if there is one then fetch it from DB:
        if (empty($nameErr)) {
            $statement = $pdo->prepare("SELECT * FROM countries WHERE name LIKE :name_of_country");
            $statement->bindValue(':name_of_country', $name);
            $statement->execute();
            $country_matched = $statement->fetchAll(PDO::FETCH_ASSOC);

            //and if there is no store in DB  and fetch
            if (!$country_matched) {
                $statement = $pdo->prepare("INSERT INTO countries (name,region,flag,population)
                VALUES (:name_of_country, :country_reg, :country_flag, :country_populat)");
                $statement->bindValue(':name_of_country', $name);
                $statement->bindValue(':country_reg', $region);
                $statement->bindValue(':country_flag', $flag);
                $statement->bindValue(':country_populat', $population);
                $statement->execute();
                $statement = $pdo->prepare("SELECT * FROM countries WHERE name LIKE :name_of_country");
                $statement->bindValue(':name_of_country', $name);
                $statement->execute();
                $country_matched = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
}