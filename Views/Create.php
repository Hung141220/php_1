<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($errors) && count($errors) > 0) {
                ?>
                    <div class="row mt-3">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>List error!</strong>
                            <?php
                            foreach ($errors as $error) {
                            ?>
                                <p><?php echo $error ?></p>
                            <?php
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="col-md-12 mt-2">
                <h2>Thêm mới sinh viên</h2>
                <a href="index.php?controller=employee&action=index">Trang chu</a>
                <form action="index.php?controller=employee&action=store" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Họ tên</label>
                        <input type="text" name="name" class="form-control" id="" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tuổi</label>
                        <input type="number" name="age" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mô tả sinh viên</label>
                        <textarea class="form-control" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>