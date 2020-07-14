<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href="<?= base_url() ?>/assets/img/logoits.png" type="image/gif">
</head>

<style>
    body {
        background-image: url("<?= base_url(); ?>/assets/img/background.png");
        margin-top: 125px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container {
        background-color: #f6f6f6;
        padding: 20px;
        width: 30%;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        box-shadow: 4px 4px 5px 3px rgba(0, 0, 0, 0.2);
    }

    .logo {
        display: block;
        margin: auto;
        width: 80px;
        height: 80px;
    }

    h4 {
        text-align: center;
        color: #6a6a6a;
    }

    h6 {
        text-align: center;
        color: #6a6a6a;
        margin-top: -5px;
    }

    .daftar {
        text-align: center;
    }
</style>

<body>