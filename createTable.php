<?php
    session_start();
    
    $servername = "james";
    $username = "cs4220";
    $password = "";
    $dbname = "cs4220";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, username FROM APDH_users";
    $result = $conn->query($sql);

    $users = null;
    $ids = null;
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $users[$i] = $row['username'];
            $ids[$i] = $row['id'];
            $i++;
        }
    } else {
            echo "0 results";
    }

    $sql = "SELECT id, open FROM APDH_projects";
    $result = $conn->query($sql);

    $projIds = null;
    $open = null;
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $projIds[$i] = $row['id'];
            $open[$i] = $row['open'];
            $i++;
        }
    } else {
            echo "0 results";
    }

    echo '<table border>';

    echo "<tr>";
        echo "<td></td>";
        for ($j = 0; $j < sizeof($projIds); $j++) {
            echo "<td>Project " . $projIds[$j] . "</td>";
        }
    echo "</tr>";

    for ($j = 0; $j < sizeof($users); $j++) {
        if ($users[$j] != "Admin") {
            echo "<tr>";
            echo "<td>" . $users[$j] . "</td>";
            for ($k = 0; $k < sizeof($projIds); $k++) {
                $sql = "SELECT userRank FROM APDH_userProject where projectID = '" . $projIds[$k] . "' AND userID = '" . $ids[$j] . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<td>" . $row['userRank'] . "</td>";
                    }
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
    }

    echo '</table>';

    $conn->close();
?>