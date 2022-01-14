<?php
class Employee
{
    public function connect()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'quanlysinhvien';
        $connect = mysqli_connect($host, $username, $password, $database);
        return $connect;
    }
    public function all()
    {
        $sql = "SELECT * FROM students";
        $result = $this->connect()->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function create($request, $fileName)
    {
        $name = $request['name'];
        $age = $request['age'];
        $description = $request['description'];
        $sql = "INSERT INTO students (name, age, avatar, description) values ('$name', '$age','$fileName', '$description')";
        return $this->connect()->query($sql);
    }
    public function find($id)
    {
        $sql = "SELECT * FROM students where id = $id";
        $result = $this->connect()->query($sql);
        return mysqli_fetch_assoc($result);
    }
    public function update($request, $id, $fileName)
    {
        $name = $request['name'];
        $age = $request['age'];
        $description = $request['description'];
        $sql = "UPDATE students SET name = '$name', description='$description', age = '$age', avatar='$fileName' where id = $id";
        return $this->connect()->query($sql);    
    }
    public function delete($id)
    {
        $sql = "delete from students where id = $id";
        return $this->connect()->query($sql);
    }
}
?>