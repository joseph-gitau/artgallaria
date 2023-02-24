<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_id']) && !isset($_SESSION['username'])) {
    $_SESSION['referer_page'] = $_SERVER['REQUEST_URI'];
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header_links.php'; ?>
    <title>ARTGALLERIA - Admin dashboard</title>
    <style>
        .chosen-container {
            width: 400px !important;
            height: auto;
        }
    </style>
</head>

<body>
    <header>
        <?php include 'nav.php'; ?>
    </header>

    <div class="category display">
        <?php
        echo $_SESSION['username'];
        echo $_SESSION['user_id'];
        ?>
        <!-- add new art btn -->
        <div class="add-new">
            <button class="btn btn-primary" id="add-new-art">Add new art</button>
        </div>

        <!-- display arts in table format with crud buttons -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Art name</th>
                        <th>Art type</th>
                        <th>Art description</th>
                        <th>Art image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../dbh.php';
                    $sql = "SELECT * FROM art";
                    $result = mysqli_query($conn, $sql);
                    $tot = mysqli_num_rows($result);
                    if ($tot > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $art_id = $row['a_id'];
                            $art_name = $row['a_title'];
                            $art_type = $row['a_category'];
                            $art_description = $row['a_description'];
                            $art_image = $row['a_image'];
                            echo "<tr>
                                    <td>$art_name</td>
                                    <td>$art_type</td>
                                    <td>$art_description</td>
                                    <td>$art_image</td>
                                    <td>
                                        <button class='btn btn-primary'>Edit</button>
                                        <button class='btn btn-danger'>Delete</button>
                                    </td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='5'>No arts found</td>
                            </tr>";
                    }
                    ?>

                    <!-- <tr>
                        <td>Art name</td>
                        <td>Art type</td>
                        <td>Art description</td>
                        <td>Art image</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr> -->
                </tbody>
            </table>

            <!-- add new art modal -->
            <div class="modal" id="add-art-modal">
                <h1>Add a new art</h1>
                <form action="../reg_exe.php" method="post" enctype="multipart/form-data">
                    <!-- artname -->
                    <div class="form-control">
                        <label for="name">art name</label>
                        <input type="text" name="name" id="name" placeholder="Art name">
                    </div>
                    <!-- art type -->
                    <div class="form-control">
                        <label for="art-type">art type</label>
                        <select name="art-type" id="art-type" class="chosen-select" multiple>
                            <option value="" selected disabled>Choose art category</option>
                            <option value="all">All</option>
                            <option value="Portraits">Portraits</option>
                            <option value="Abstract">Abstract</option>
                            <option value="Sketches">Sketches</option>
                            <option value="Photo realism">Photo realism</option>
                            <option value="Impression art">Impression art</option>
                            <option value="Photography">Photography</option>
                        </select>
                    </div>
                    <!-- art description -->
                    <div class="form-control">
                        <label for="art-description">art description</label>
                        <textarea name="art-description" id="art-description" cols="30" rows="10"></textarea>
                    </div>
                    <!-- art image -->
                    <div class="form-control">
                        <label for="art-image">art image</label>
                        <input type="file" name="art-image" id="art-image">
                    </div>
                    <!-- submit btn -->
                    <div class="form-control msg_submit">
                        <button type="submit" name="add-art" class="btn btn-primary" id="submit-add-art">Add art</button>
                    </div>
                </form>
            </div>

        </div>
        <script src="../js/index.js"></script>
        <script>
            $("#add-new-art").click(function() {
                $('#add-art-modal').modal();
            });
            // add art on submit
            $('#submit-add-art').click(function(event) {
                event.preventDefault();
                run_waitMe_custom('stretch', '.msg_submit', 'Adding art...', 'horizontal');
                var file = $('#art-image')[0].files[0];
                if (file == '' || file == 'undefined' || file == null) {
                    var place = 'no_file';
                } else {
                    var place = 'file';
                }
                var form_data = new FormData();
                form_data.append('add-art', true);
                form_data.append('name', $('#name').val());
                form_data.append('type', $('#art-type').val());
                form_data.append('description', $('#art-description').val());
                form_data.append('art-image', file);
                form_data.append('place', place);

                $.ajax({
                    url: '../reg_exe.php',
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // hide run_waitMe_custom
                        $('.msg_submit').waitMe('hide');
                        if (data == "success") {
                            // swal success
                            swal({
                                title: "Success",
                                text: "Art added successfully",
                                icon: "success",
                                button: "OK",
                            }).then(function() {
                                // reload page
                                location.reload();
                            });
                        } else {
                            // swal error
                            swal("Error", data, "error", {
                                button: "OK",
                            });
                        }
                    }
                });
            });
        </script>
</body>

</html>