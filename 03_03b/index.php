<?php

/* DATABASE INFO:
Type of Database: MariaDB (All MySQL queries and functions work for MariaDB)
Host: 127.0.0.1
username: mariadb
Password: mariadb
Database: mariadb

The table we’re working with is called “speakers”
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Display Speaker Information</title>
        <meta name="author" value="Joe Casabona" />
    </head>
    <body>
        <main>
            <h1>Speakers and Sessions</h1>
            <table>
                <thead>
                    <td>Name</td>
                    <td>Bio</td>
                    <td>Session Title</td>
                    <td>Session Desc</td>
                    <td>Track</td>
                </thead>
                <tbody>
                    <?php
                    // Database connection settings for the speaker list.
                    $host = '127.0.01';
                    $user = 'mariadb';
                    $pass = 'mariadb';
                    $db = 'mariadb';

                    // Connect to the database and retrieve all speakers.
                    $mysqli = new mysqli($host, $user, $pass, $db);
                    $result = $mysqli->query('SELECT * FROM speakers;');

                    // Format each speaker row into the table.
                    $format = '<tr>
                        <td>%1$s</td>
                        <td>%2$s</td>
                        <td>%3$s</td>
                        <td>%4$s</td>
                        <td>%5$s</td>
                        </tr>';

                        foreach ($result as $row) {
                            printf( $format,
                                $row['name'],
                                $row['bio'],
                                $row['session_name'],
                                $row['session_desc'],
                                $row['track']
                            );
                        }
                        ?>
                    </tbody>
            </table>
        </main>
    </body>
</html>