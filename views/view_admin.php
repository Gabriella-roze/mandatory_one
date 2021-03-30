<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Admin</title>
</head>

<body>

    <h1>
        <?php   
        $user = $_SESSION['user'];
        $status = 'Not active';
        if ($user->active) {
          $status = 'Active';
        }
      echo "
    <div class='user'>
      <div>Hi, $user->name</div>
      <div>Status: $status</div>
      <div>Email: $user->email</div>
    </div>
    ";
  ?>
    </h1>
    <a href="/mandatory-1/deactivate_user">Deactivate account</a>
    <a href="/mandatory-1/logout">logout</a>