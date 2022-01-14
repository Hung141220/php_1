<?php
if (isset($_SESSION['msg'])) {
?>
    <script>
        alert('<?php echo $_SESSION['msg']; ?>')
    </script>
<?php
    unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <a href="index.php?controller=employee&action=create" class="btn btn-primary w-25">Create</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Tuổi</th>
                        <th>Ảnh đại diện</th>
                        <th>Mô tả sinh viên</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($employees as $employee) {
                    ?>
                        <tr>
                            <td><?php echo $employee['id'] ?></td>
                            <td><?php echo $employee['name'] ?></td>
                            <td><?php echo $employee['age'] ?></td>
                            <td><?php ?>
                                <img style="width:50px" src="./uploads/<?php  echo $employee['avatar'] ?>"></img>
                            </td>
                            <td><?php echo $employee['description'] ?></td>
                            <td><?php echo $employee['create_at'] ?></td>
                            <td>
                                <a href="index.php?controller=employee&action=edit&id=<?php echo $employee['id'] ?>">Edit</a>
                                <a href="index.php?controller=employee&action=delete&id=<?php echo $employee['id'] ?>" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>