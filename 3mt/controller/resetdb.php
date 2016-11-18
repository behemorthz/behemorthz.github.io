<?php
    include('connectDB.php');

    $conn->query('TRUNCATE competitor ALTER TABLE competitor AUTO_INCREMENT = 1');
?>