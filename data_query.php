<?php
//tampilkan data
function query($query)
{
    global $conn; //ambil variabel diluar function
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
