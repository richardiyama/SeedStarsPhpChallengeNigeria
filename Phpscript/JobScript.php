<?php

function http_get_contents($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(FALSE === ($retval = curl_exec($ch))) {
            echo curl_error($ch);
        } else {
            return $retval;
        }
    }s

$link = 'http://localhost:8080/api/json?tree=jobs[displayName,lastBuild[result]]';

try {

    $jobsString = http_get_contents($link);

    $jobs = json_decode($jobsString);


    $db = new PDO('sqlite:JenkinSqlite');

    $query = 'INSERT INTO jobs (name, status) VALUES (:name, :status)';

    if (sizeof($jobs->jobs) > 0) {

        foreach ($jobs->jobs as $key => $value) {

            $sql = $db->prepare($query);
            $sql->bindParam(':name', $value->displayName, PDO::PARAM_STR);
            $sql->bindParam(':status', $value->lastBuild->result, PDO::PARAM_STR);
            $sql->execute();

            $errors = $sql->errorInfo();

            if ($errors[0] !== "00000") {
                echo "For Job " . $value->displayName . " ERROR:" . $errors[2];
            }
        }

        echo "DONE!!!!";
    } else {
        echo "There isn't any job to insert";
    }
} catch (Exception $e) {
    echo "Error:" . $e->getMessage();
}
