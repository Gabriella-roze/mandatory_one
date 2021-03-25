<?php
require_once(__DIR__.'/../db.php');
$q = $db->prepare('SELECT * FROM User ORDER BY age ASC ');
$q->execute();
$users = $q->fetchAll();
?>
<div class="table">
    <div class="table-row">
        <div class="table-head">Full name</div>
        <div class="table-head">Age</div>
        <div class="table-head">Email</div>
        <div class="table-head">Status</div>
    </div>
    <?php
      foreach($users as $user){
        $status = 'Not active';
        if ($user->active) {
          $status = 'Active';
        }
        echo "
        <div class='table-row'>
              <div class='table-cell'>$user->name $user->last_name</div>
              <div class='table-cell'>$user->age</div>
              <div class='table-cell'>$user->email</div>
              <div class='table-cell'>$status</div>
          </div>
        ";
      }
    ?>
</div>