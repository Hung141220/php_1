<?php
require("./Models/Employee.php");
class EmployeeController
{
    public function index()
    {
        $employee = new Employee();
        $employees = $employee->all();
        require("./Views/index.php");
    }
    public function create()
    {
        require("./Views/create.php");
    }
    public function store()
    {
        $errors = array();
        $name = $_POST['name'];
        $age = $_POST['age'];
        $description = $_POST['description'];
        $avatar = array();
        if(isset($_FILES['avatar'])){
            $avatar = $_FILES['avatar'];
        }
        $tmpName = $avatar['tmp_name'];
        $fileName = $avatar['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if ($name === "") {
            $errors[] = 'Họ và tên không được để trống';
        }
        if ($age === "") {
            $errors[] = 'Tuổi không được để trống';
        }
        if ($description === "") {
            $errors[] = 'Mô tả không được để trống';
        }
        if ($avatar['error'] === UPLOAD_ERR_NO_FILE) {
            $errors[] = 'Avatar không được để trống';
        } elseif(!in_array($fileExtension, $extensions)) {
            $errors[] = 'Cần upload avatar có định dạng ảnh';
        }
        if (count($errors) > 0) {
            require("./Views/create.php");
        } elseif (count($errors) === 0) {
            if (!file_exists(('uploads'))) {
                mkdir('uploads');
            }
            if ($avatar['error'] == UPLOAD_ERR_OK) {
                move_uploaded_file($tmpName, 'uploads/' . $fileName);
            }
            $employee = new Employee();
            $isCreated = $employee->create($_REQUEST, $fileName);
            if ($isCreated) {
                $_SESSION['msg'] = 'Thêm mới thành công';
                header('location:index.php?controller=employee&action=index');
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $employee = new Employee();
        $employee = $employee->find($id);
        require("./Views/edit.php");
    }
    public function update()
    {
        $id = $_GET['id'];
        $errors = array();
        $name = $_POST['name'];
        $age = $_POST['age'];
        $description = $_POST['description'];
        $avatar = array();
        if(isset($_FILES['avatar'])){
            $avatar = $_FILES['avatar'];
        }
        $tmpName = $avatar['tmp_name'];
        $fileName = $avatar['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if ($name === "") {
            $errors[] = 'Họ và tên không được để trống';
        }
        if ($age === "") {
            $errors[] = 'Tuổi không được để trống';
        }
        if ($description === "") {
            $errors[] = 'Mô tả không được để trống';
        }
        if ($avatar['error'] === UPLOAD_ERR_NO_FILE) {
            $errors[] = 'Avatar không được để trống';
        } elseif(!in_array($fileExtension, $extensions)) {
            $errors[] = 'Cần upload avatar có định dạng ảnh';
        }
        if (count($errors) > 0) {
            $employee = new Employee();
            $employee = $employee->find($id);
            require("./Views/edit.php");
        } elseif (count($errors) === 0) {
            if (!file_exists(('uploads'))) {
                mkdir('uploads');
            }
            if ($avatar['error'] == UPLOAD_ERR_OK) {
                move_uploaded_file($tmpName, 'uploads/' . $fileName);
            }
            $employee = new Employee();
            $isUpdated = $employee->update($_REQUEST, $id, $fileName);
            if ($isUpdated) {
                $_SESSION['msg'] = 'Chỉnh sửa thành công';
                header('location:index.php?controller=employee&action=index');
            }
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $employee = new Employee();
        $isDeleted = $employee->delete($id);
        if ($isDeleted) {
            $_SESSION['msg'] = 'Xóa thành công';
            header('location:index.php?controller=employee&action=index');
        }
    }
}
?>