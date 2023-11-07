<?php
    require 'scripts/data_init/vendor/autoload.php';

    $faker = Faker\Factory::create('en-PH');
    $conn = new mysqli("localhost", "root", "lonelyheart05", "recordsapp_db");
    if ($conn->connect_error){
        die("connection failed" . $conn->connect_error);
    }

    for ($i = 0; $i < 200; $i++) {
        $lastname = $faker->lastName;
        $firstname = $faker->firstName;
        $address = $faker->address;
    
        $sql = "INSERT INTO employee(lastname, firstname, address) VALUES (?, ?, ?)";
        $valuesParam = $conn->prepare($sql);
        $valuesParam->bind_param("sss", $lastname, $firstname, $address);
        
        if ($valuesParam->execute()) {
            echo "Successfully added";
        } else {
            echo "Error inserting data for record";
        }
        $valuesParam->execute();
        
    }
    for($i = 0; $i < 50; $i++){
        $contactnum = $faker->phoneNumber;
        $name = $faker->name;
        $email = $faker->email;
        $address = $faker->address;
        $city = $faker->city;
        $country = $faker->country;
        $postal = $faker->postcode;

        $sql = "INSERT INTO office(contactnum, name, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $valuesParam = $conn->prepare($sql);
        $valuesParam->bind_param("ssssssi", $contactnum, $name, $email, $address, $city, $country, $postal);
        
        if ($valuesParam->execute()) {
            echo "Successfully added";
        } else {
            echo "Error inserting data for record";
        }
        $valuesParam->execute();
    }
    for($i = 0; $i < 500; $i++){
        $datelog = $faker->date('now');
        $action = $faker->valid($action)->randomElement(['IN', 'OUT']);
        $remark = $faker->sentence();
        $documentcode = $faker->documentcode;

        $sql = "INSERT INTO transaction(datelog, action, remark, documentcode) VALUES (?, ?, ?, ?)";
        $valuesParam = $conn->prepare($sql);
        $valuesParam->bind_param("ssss", $datelog, $action, $remark, $documentcode);
        
        if ($valuesParam->execute()) {
            echo "Successfully added";
        } else {
            echo "Error inserting data for record";
        }
        $valuesParam->execute();
    }
?>