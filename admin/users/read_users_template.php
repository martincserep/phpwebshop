<?php
global $user_srv;
// display the table if the number of users retrieved was greater than zero
if($num>0){

    echo "<table class='table table-hover table-responsive table-bordered list-border-background'>";

    // table headers
    echo "<tr>";
    echo "<th>Firstname</th>";
    echo "<th>Lastname</th>";
    echo "<th>Email</th>";
    echo "<th>Contact Number</th>";
    echo "<th>Access Level</th>";
    echo "</tr>";

    // loop through the user records
    foreach ($usersList as $user){

        // display user details
        echo "<tr>";
        echo "<td>{$user->getFirstName()}</td>";
        echo "<td>{$user->getLastName()}</td>";
        echo "<td>{$user->getEmail()}</td>";
        echo "<td>{$user->getContactNumber()}</td>";
        echo "<td>{$user->getAccessLevel()}</td>";
        echo "</tr>";
    }
    echo "</table>";

    $page_url="read_users.php?";
    $total_rows = count($user_srv->ReadAllUser());

    // actual paging buttons
    include_once 'paging.php';
}

// tell the user there are no selfies
else{
    echo "<div class='alert alert-danger'>
        <strong>No users found.</strong>
    </div>";
}
