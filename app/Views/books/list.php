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
                        <div class="nav-link">Book / list</div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- nav end -->

        <!-- Add button -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-end">
                    <a href="<?php echo base_url('/create') ?>" class="btn btn-primary ">Add</a>
                </div>
            </div>
        </div>

        <!-- Add button end-->

        <!-- main body start -->
        <div class="container mt-4">
            <div class="row">
            <div class="col-md-12">
                    <?php
                        if(!empty($session->getFlashdata('success'))) {
                    ?>
                        <div class="alert alert-success">
                        <?php echo $session->getFlashdata('success');?>
                        </div>
                    <?php 
                        }
                     ?>
                    <?php
                        if(!empty($session->getFlashdata('error'))) {
                    ?>
                        <div class="alert alert-danger">
                        <?php echo $session->getFlashdata('error');?>
                        </div>
                    <?php 
                        }
                     ?>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <!-- card header start -->
                        <div class="card-header bg-primary text-white">
                            <div class="card-header-title">
                                books List
                            </div>
                        </div>
                        <!-- card header end -->
                        <!-- card body start -->
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>

                                    <th>Serial No</th>
                                    <th>Title</th>
                                    <th>ISBN No</th>
                                    <th>Action</th>
                                </tr>
                                <?php if(empty($book)){
                                    $n=1;
                                    foreach($books as $book) {
                               ?>
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td><?php echo $book['title']; ?></td>
                                    <td><?php echo $book['isbnNo']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('/edit/'.$book['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" onclick ="deleteConform(<?php echo $book['id']; ?>)"class="btn btn-danger btn-sm">Delete</a>  
                                    </td>
                                </tr>
                                <?php 
                                }
                            }
                                else
                                {?>
                                    <tr>
                                        <td colspan = '5'>no record found </td>
                                    </tr>
                                <?php }     ?>
                                
                            </table>
                        </div>
                        <!-- card body end -->
                    </div>
                </div>
            </div>

        </div>
        <!-- main body end -->
    </div>
</body>
</html>

<script>
    function deleteConform(id){
        // alert(id);
        if (confirm("Are your sure to delete this")){
           location.href="<?php echo base_url('/delete/')?>" + id ;
        }
    }
</script>