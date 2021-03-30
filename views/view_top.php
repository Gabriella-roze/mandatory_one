<?php
    if ( isset($display_error) ) {
        $css_path = '../../app.css';
    } else {
        $css_path = './app.css';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= $css_path ?>>
    <title><?= $page_title ?? 'COMPANY' ?></title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="/mandatory-1">
                    home
                </a>
            </li>
            <li>
                <a href="/mandatory-1/show-users">
                    users
                </a>
            </li>
            <li>
                <a href="/mandatory-1/login">
                    login
                </a>
            </li>
            <li>
                <a href="/mandatory-1/signup">
                    signup
                </a>
            </li>
        </ul>
    </nav>