<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="../Resources/Openisoft/icon_only/color_with_background.jpg" type="image/x-icon">
    <!-- font awesome -->
    <link rel="stylesheet" href="../Resources\fontawesome-free-5.15.4-web\css\all.min.css" />
    <title>School system database</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        .table {
            /* width: 100%; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px;
            padding: 20px;
            overflow-x: scroll;
        }

        .each {
            /* width: 100%; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        table {
            width: 100%;
            max-width: 100vw;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
            cursor: pointer;
        }

        h3 {
            padding: 10px;

        }

        i {
            padding: 0.5rem;
        }

        h3:hover {
            cursor: pointer;
        }
    </style>
    <!-- jquery -->
    <script src="../js/jquery.js"></script>
</head>

<body>

    <div class="table">
        <h3>All tables</h3>
        <!-- <div class="each">
            <h3>Roles</h3>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>created_at</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>admin</td>
                    <td>2033</td>
                </tr>
            </table>
        </div> -->

        <?php
        require_once 'CreateDb.php';

        // create instance of Createdb class
        // $database = new CreateDb("Productdb", "Producttb");

        /* $sql = "DROP TABLE IF EXISTS student;
        "; */
        $statements = [];
        // roles table
        $sql1 = "CREATE TABLE IF NOT EXISTS roles (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(25) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // admins table
        $sql2 = "CREATE TABLE IF NOT EXISTS admins (
            u_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_name VARCHAR(25) NOT NULL,
            u_username VARCHAR(25) NOT NULL,
            u_email VARCHAR(50) NOT NULL,
            u_phone VARCHAR(15) NOT NULL,
            u_county VARCHAR(30) NOT NULL,
            u_address VARCHAR(15) NOT NULL,
            u_gender VARCHAR(20) NOT NULL,
            u_m_status VARCHAR(20) NOT NULL,
            u_dob DATE NOT NULL,
            u_image VARCHAR(255) NOT NULL,
            u_status VARCHAR(10) NOT NULL,
            u_password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // notifications table
        $sql3 = "CREATE TABLE IF NOT EXISTS notifications (
            n_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_id INT(11) NOT NULL,
            n_title VARCHAR(255) NOT NULL,
            n_message VARCHAR(255) NOT NULL,
            n_status VARCHAR(10) NOT NULL,
            n_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // qualifications table
        $sql4 = "CREATE TABLE IF NOT EXISTS qualifications (
            q_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_id INT(11) NOT NULL,
            q_cv TEXT NOT NULL,
            q_resume VARCHAR(255) NOT NULL,
            q_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // job-post table
        $sql5 = "CREATE TABLE IF NOT EXISTS job_post (
            jp_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_id INT(11) NOT NULL,
            jp_title VARCHAR(255) NOT NULL,
            jp_description TEXT NOT NULL,
            jp_type VARCHAR(255) NOT NULL,
            jp_category VARCHAR(255) NOT NULL,
            jp_location VARCHAR(255) NOT NULL,
            jp_salary VARCHAR(255) NOT NULL,
            jp_status VARCHAR(10) NOT NULL DEFAULT 'active',
            jp_image VARCHAR(255) NOT NULL,
            jp_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // messages table
        $sql6 = "CREATE TABLE IF NOT EXISTS messages (
            m_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_id INT(11) NOT NULL,
            jp_id INT(11) NOT NULL,
            m_title VARCHAR(255) NOT NULL,
            m_message TEXT NOT NULL,
            m_status VARCHAR(10) NOT NULL,
            m_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        // art table
        $sql7 = "CREATE TABLE IF NOT EXISTS art (
            a_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            u_id INT(11) NOT NULL,
            a_title VARCHAR(255) NOT NULL,
            a_description TEXT NOT NULL,
            a_category VARCHAR(255) NOT NULL,
            a_price VARCHAR(255) NOT NULL,
            a_status VARCHAR(10) NOT NULL DEFAULT 'available',
            a_image VARCHAR(255) NOT NULL,
            a_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        /* $sql1 = "CREATE TABLE IF NOT EXISTS student1 (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(25) NOT NULL
        )";*/

        // $statements[] = $sql1;
        // $statements[] =  $sql2;
        /*$statements[] =  $sql3;
        $statements[] =  $sql4;*/
        // $statements[] = $sql5;
        // $statements[] = $sql6;
        // $statements[] = $sql7;

        // print_r($statements);
        foreach ($statements as $s) {
            // echo $s;
            $sql = $s;
            $database = new CreateDb("art_project", "test", $sql);
        }
        // ---------------------------------------------------------------------------------------------
        // CRUD FUNCTIONS ---------------------------------------------------------------------------------------------
        // call truncateTable function
        /*  $sql = "TRUNCATE TABLE admins";
        truncateTable($sql); */

        // drop table
        /* $sql = "DROP TABLE IF EXISTS notifications";
        dropTable($sql);
        $sql1 = "DROP TABLE IF EXISTS employers";
        dropTable($sql1);
        $sql2 = "DROP TABLE IF EXISTS job_seekers";
        dropTable($sql2);
        $sql3 = "DROP TABLE IF EXISTS roles";
        dropTable($sql3);
        $sql4 = "DROP TABLE IF EXISTS users";
        dropTable($sql4); 
        $sql5 = "DROP TABLE IF EXISTS job_post";
        dropTable($sql5);*/
        // $sql6 = "DROP TABLE IF EXISTS messages";
        // dropTable($sql6);

        // insert role data into table
        /* $sql = "INSERT INTO roles (name) VALUES ('super-admin'), ('admin'), ('teacher'), ('student'), ('parent'), ('non-teaching-staff')";
        insertData($sql); */

        // display specified database tables and their columns
        class Database
        {
            private $host = 'localhost';
            private $username = 'root';
            private $password = '';
            private $dbname = 'art_project';

            public function connect()
            {
                $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                return $conn;
            }
        }
        $db = new Database();
        $sql_db = "SELECT * FROM information_schema.tables WHERE table_schema = 'art_project'";
        $result = $db->connect()->query($sql_db);
        echo '<h2>Available tables in art_project:</h2>';
        if ($result->num_rows > 0) {
            // fetch and display the tables with 5 row data each
            while ($row = $result->fetch_assoc()) {
                echo '<div class="each">
                        <h3>' . $row['TABLE_NAME'] . '</h3>';
                $sql_table = "SELECT * FROM information_schema.columns WHERE table_schema = 'art_project' AND table_name = '" . $row['TABLE_NAME'] . "'";
                $result_table = $db->connect()->query($sql_table);
                if ($result_table->num_rows > 0) {
                    // tmp table name
                    $tmp = [];
                    // echo table headers
                    echo '<table>
                        <tr>';
                    while ($row_table = $result_table->fetch_assoc()) {
                        // append column names to tmp array
                        $tmp[] = $row_table['COLUMN_NAME'];
                        echo '<th>' . $row_table['COLUMN_NAME'] . '</th>';
                    }
                    echo '</tr>';
                    // nwx
                    // get 5 table data
                    $t_name = $row['TABLE_NAME'];
                    $sql_data = "SELECT * FROM  $t_name LIMIT 10";
                    $result_data = $db->connect()->query($sql_data);
                    if ($result_data->num_rows > 0) {
                        // echo table data rows
                        while ($row_data = $result_data->fetch_assoc()) {
                            echo '<tr>';
                            // loop dynamically through column names
                            foreach ($tmp as $t) {
                                echo '<td>' . $row_data[$t] . '</td>';
                            }
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td>no data in table yet!</td></tr>';
                    }
                    // nwx
                    echo '</table>';
                    echo '</div>';
                }
            }
            /*while ($row = $result->fetch_assoc()) {
        echo '<h3>' . $row['TABLE_NAME'] . "</h3>";
        $sql_table = "SELECT * FROM information_schema.columns WHERE table_schema = 'online_jobs_portal' AND table_name = '" . $row['TABLE_NAME'] . "'";
        $result_table = $db->connect()->query($sql_table);
        if ($result_table->num_rows > 0) {
            while ($row_table = $result_table->fetch_assoc()) {
                echo $row_table['COLUMN_NAME'] . "<br>";
            }
        }
        } */
        } else {
            echo "0 results";
        }

        // truncate table
        function truncateTable($sql)
        {
            // sql for table to be truncated
            $sql = $sql;
            $dbt = new Database();

            if ($dbt->connect()->query($sql) === TRUE) {
                echo "Table truncated successfully";
            } else {
                echo "Error truncating table: " . $dbt->connect()->error;
            }
        }

        // call truncateTable function
        // truncateTable();

        // drop table
        function dropTable($sql)
        {
            $sql = $sql;
            $dbt = new Database();

            if ($dbt->connect()->query($sql) === TRUE) {
                echo "Table dropped successfully";
            } else {
                echo "Error dropping table: " . $dbt->connect()->error;
            }
        }

        // insert data into table
        function insertData($sql)
        {
            $sql = $sql;
            $dbt = new Database();

            if ($dbt->connect()->query($sql) === TRUE) {
                echo "Data inserted successfully";
            } else {
                echo "Error inserting data: " . $dbt->connect()->error;
            }
        }
        ?>
    </div>

    <script>
        // jquery script to collapse and expand table data on click of table header
        $(document).ready(function() {
            $(".each h3").next().slideUp();
            // add right chevron icon to table header
            $(".each h3").append('<i class="fas fa-chevron-right"></i>');
            $(".each h3").click(function() {
                $(this).next().slideToggle();
                $(this).css('color', 'red');
                // change chevron icon on click
                $(this).find("i").toggleClass("fa-chevron-right fa-chevron-down");

            });
        });
    </script>
</body>

</html>