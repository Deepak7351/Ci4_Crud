<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crude basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- STYLES -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid ">
        <!-- heading start -->
        <div class="container p-2 bg-primary shadow-sm">
            <h1>
                Basic crud of CI 4
            </h1>
        </div>
        <!-- heading end -->
        <!-- nav start -->
        <div class="container bg-white shadow-sm p-1">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav nav-underline">
                        <div class="nav-link">Book / edit</div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- nav end -->

        <!-- Add button -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-end">
                    <a href="<?php echo base_url('/index'); ?>" class="btn btn-danger ">Back</a>
                </div>
            </div>
        </div>

        <!-- Add button end-->

        <!-- main body start -->
        <div class="container mt-4">

            <div class="col-md-12">
                <div class="card">
                    <!-- card header start -->
                    <div class="card-header bg-primary text-white">
                        <div class="card-header-title">
                            Edit Book
                        </div>
                    </div>
                    <!-- card header end -->
                    <!-- card body start -->
                    <div class="card-body">
                        <!-- form start -->
                        <form method="POST" name="form_action" id="form_action" action="<?php echo base_url("edit/".$book['id'])?>">
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control <?php echo(isset($validation) && $validation->hasError('name')) ? 'is-invalid' : "";?>" placeholder="Enter Name" value="<?php echo set_value('name', $book['title']);?>">
                                <?php
                                 if (isset($validation) && $validation->hasError('name')): ?>
                                    <div class="text-danger">
                                        <?php echo $validation->getError('name'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-2">
                                <label for="author" class="form-label">Authoe:</label>
                                <input type="text" name="author" class="form-control <?php echo(isset($validation) && $validation->hasError('author')) ? 'is-invalid' : "";?>" placeholder="Enter Author" value="<?php echo set_value('author', $book['author']);?>">
                                <?php
                                 if (isset($validation) && $validation->hasError('author')): ?>
                                    <div class="text-danger">
                                        <?php echo $validation->getError('author'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-2">
                                <label for="sbin" class="form-label">SBIN No:</label>
                                <input type="text" name="sbin" class="form-control <?php echo(isset($validation) && $validation->hasError('sbin')) ? 'is-invalid' : "";?>" placeholder="Enter SBIN No" value="<?php echo set_value('sbin',  $book['isbnNo']);?>">
                            </div>
                            <?php
                                 if (isset($validation) && $validation->hasError('sbin')): ?>
                                    <div class="text-danger">
                                        <?php echo $validation->getError('sbin'); ?>
                                    </div>
                                <?php endif; ?>
                            <div class="form-group mb-2">
                                <!-- <a href="#" class="btn btn-primary">Create Now</a> -->
                                <input type="submit" name="submit" id="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                        <!-- form end -->

                    </div>
                    <!-- card body end -->
                </div>
            </div>

        </div>
        <!-- main body end -->

    </div>




</body>

</html>