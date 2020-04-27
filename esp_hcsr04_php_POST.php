<?php
    // Vincent 18217042 untuk keperluan sensor HC-SR04

    include 'db_config.php';
    $api_key_value = 'tPmAT5Ab3j7F9';
    $api_key= $sensor = $location = $distance = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $api_key = test_input($_POST["api_key"]);
        if ($api_key == $api_key_value) {
            if (isset($_POST['sensor']) && isset($_POST['location']) && isset($_POST['distance'])) {
                $conn = OpenCon();

                $sensor = $_POST['sensor'];
                $location = $_POST['location'];
                $distance = $_POST['distance'];
                $sql = "INSERT INTO DistanceData(sensor, location, distance) VALUES ('".$sensor."', '".$location."', '".$distance."')";

                $result = $conn->query($sql);
                if ($result) {
                    echo 'Success';
                } else {
                    echo 'Failed';
                }
                CloseCon($conn);
            } else {
                echo 'Masukan Kurang';
            }
        } else {
            echo 'API Key salah';
        }
    } else {
        echo 'Method Salah';
    }
