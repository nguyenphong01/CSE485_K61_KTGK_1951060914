<?php
require_once 'configs/db.php'; // ------ kết nối csdl để truy vấn xử lý DL, ánh xạ 1-1 với csdl
class employee {
    public $maNV;
    public $hovaten;
    public $chucvu;
    public $phongban;
    public $luong;
    public $ngayvaolam;

    // insert into truyen vao 1 mang du lieu -> insert mang du lieu
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO nhanvien (maNV, hovaten, chucvu, phongban, luong, ngayvaolam) 
        VALUES ('{$param['hovaten']}', '{$param['chucvu']}', '{$param['phongban']}', '{$param['luong']}', '{$param['ngayvaolam']}')";

        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }

    public function getemployeeById($maNV = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM nhanvien WHERE maNV=$maNV";

        $results = mysqli_query($connection, $querySelect);
        $employee = [];

        if (mysqli_num_rows($results) > 0) {
            $employees = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $employee = $employees[0];
        }
        $this->closeDb($connection);

        return $employee;
    }

    /**
     * Truy vấn lấy ra tất cả sách trong CSDL
     */
    public function index() {
        $connection = $this->connectDb();
        //truy vấn
        $querySelect = "SELECT * FROM nhanvien";
        $results = mysqli_query($connection, $querySelect);
        $employees = [];
        if (mysqli_num_rows($results) > 0) {
            $employees = mysqli_fetch_all($results, MYSQLI_ASSOC); //MYSQLI_ASSOC chỉ định lấy kqua dạng mảng kết hợp
        }
        $this->closeDb($connection);

        return $employees; // return ra kết quả dạng mảng
    }

    public function update($employee = []) { // update chay ok
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE nhanvien
                    SET `hovaten` = '{$employee['hovaten']}', `chucvu` = '{$employee['chucvu']}',`phongban` = '{$employee['phongban']}',`luong` = '{$employee['luong']}',

                    `ngayvaolam` = '{$employee['ngayvaolam']}'
                    
                    WHERE `maNV` = {$employee['maNV']}";

        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }

    public function delete($maNV = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM nhanvien WHERE maNV = $maNV";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
    // ----- phương thức kết nối tới csdl dùng chung cho cả các hàm bên trong class này
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    // -- đóng db khi mở db
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
}