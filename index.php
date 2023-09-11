<?php
// ARRAY HOTELS
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Condizione per filtro parking
if (isset($_GET['parking']) && !empty($_GET['parking'])) {
    if ($_GET['parking'] == 'true') {
        $hotels = array_filter($hotels, fn ($value) => $value['parking']);
    } else {
        $hotels = array_filter($hotels, fn ($value) => !$value['parking']);
    };
};
// Condizione per filtro vote
if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $hotels = array_filter($hotels, fn ($value) => $value['vote'] >= $_GET['vote']);
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>PHP HOTEL</title>
</head>




<body>
    <h1>HOTEL LIST</h1>

    <!-- Form con filtri -->
    <form class="d-flex mt-5" action="index.php">
        <!-- Select parking -->
        <select name="parking" id="parking" class="form-select w-25 bg-black text-white">
            <option value="" selected>Parking</option>
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
        <!-- Select Vote -->
        <select name="vote" id="vote" class="form-select w-25 bg-black text-white mx-3">
            <option value="" selected>Vote</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit" class="btn btn-dark">Search</button>
    </form>

    <!-- Tabella HOTELS -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
                <th scope="col">Distance to center</th>
            </tr>
        </thead>

        <!-- Ciclo foreach per ciclare l'Array nella tabella -->
        <?php foreach ($hotels as $key => $hotel) {
            $name = $hotel['name'];
            $description = $hotel['description'];
            $parking = $hotel['parking'];
            $vote = $hotel['vote'];
            $distance_to_center = $hotel['distance_to_center']; ?>

            <tbody>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $name ?></td>
                    <td><?php echo $description ?></td>
                    <td><?php echo $parking === true ? "Yes" : "No" ?></td>
                    <td><?php echo $vote . "/5 stars"  ?></td>
                    <td><?php echo $distance_to_center . "Km" ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>

</body>

</html>