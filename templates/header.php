<?php
    // Get the current time in UTC
    $currentDateTime = new DateTime('now', new DateTimeZone('UTC'));
    // Format the current time in ISO 8601 date format
    $iso8601DateTime = $currentDateTime->format('c');
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $selectedRoute['title'] ?></title>

      <!-- Open Graph meta tags -->
      <meta property="og:title" content="Vulps' Developer Portfolio">
    <meta property="og:description" content="A collection of projects completed and maintained by Vulps">
    <meta property="og:image" content="https://ajmcallister.co.uk/img/developer.png">
    <meta property="og:url" content="https://ajmcallister.co.uk">
    <meta property="og:type" content="website">
    <meta property="og:updated_time" content="<?php echo $iso8601DateTime; ?>">


    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    <!--Local files-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>