<?php
require_once 'models/employees.php'; // lấy dữ liệu từ model và trả về viewbook, đứng giữa trung gian!
// -- cung cấp các hàm tương ứng hành động mình muốn thực hiện 

class employeesController { // ----

    // la nhung action
    public function index() {   // ok
        echo "<h1>Trang liệt kê danh sách các nhân viên!</h1>";
        //gọi view để hiển thị dữ liệu
        //gọi view thực chất là nhúng file view vào
        //gọi file luôn phải nhớ là đứng tại
//        vị trí file index gốc của ứng dụng
        $employee = new employee(); // tu model
        $employees = $employee->index(); // truyen sang view index trang chu
//        print_r($books);
        require_once 'views/employees/index.php';
    }

    public function add() { // okokokokok
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {

            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            

            //gọi model để insert dữ liệu vào database
            $employee = new employee();
            //gọi phương thức để insert dữ liệu
            //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
            $employeeArr = [
                'hovaten' => $hovaten,
                'chucvu' => $chucvu,
                'phongban' => $phongban,
                'luong' => $luong,
                'ngayvaolam' => $ngayvaolam,
                
            ];
            $isInsert = $employee->insert($employeeArr);
            if ($isInsert) {
                $_SESSION['success'] = "Thêm mới thành công";
            }
            else {
                $_SESSION['error'] = "Thêm mới thất bại";
            }
            header("Location: index.php?controller=employee&action=index");
            exit();

        }
        //gọi view
        require_once 'views/employees/add.php';
    }
    public function detail() { 
        $employee = new employee(); // tu model
        $employees = $employee->index(); // truyen sang view index trang chu
        require_once 'views/employees/detail.php';
    }
    public function edit() {
        //lấy ra thông tin sách dựa theo id đã gắn trên url
        //xử lý validate cho trường hợp id truyền lên không hợp lệ
        if (!isset($_GET['maNV'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=employee&action=index");
            return;
        }
        if (!is_numeric($_GET['maNV'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=employee&action=index");
            return;
        }
        $magv = $_GET['maNV']; // lay ma nv 2
        //gọi model để lấy ra đối tượng sách theo id
        $employeeModel = new employee();
        $employee = $employeeModel->getemployeeById($maNV); // lay sach theo id nhan duoc tu GET

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            
            
            //xử lý update dữ liệu vào hệ thống
            $employeeModel = new employee();
            $employeeArr = [
                'hovaten' => $hovaten,
                'chucvu' => $chucvu,
                'phongban' => $phongban,
                'luong' => $luong,
                'ngayvaolam' => $ngayvaolam,
            ];
            $isUpdate = $employeeModel->update($employeeArr); // sai
            if ($isUpdate) {
                $_SESSION['success'] = "Update bản ghi #$maNV thành công";
            }
            else { // nhay vao day
                $_SESSION['error'] = "Update bản ghi #$maNV thất bại";
            }
            header("Location: index.php?controller=employee&action=index");
            exit();
        }
        //truyền ra view
        require_once 'views/employees/edit.php';
    }

    public function delete() {
        //url trên trình dueyjet sẽ có dạng
//        ?controller=book&action=delete&id=1
        //bắt id từ trình duyêtj
        $manv = $_GET['maNV'];
        if (!is_numeric($maNV)) {
            header("Location: index.php?controller=employee&action=index");
            exit();
        }

        $book = new employee();
        $isDelete = $book->delete($maNV);

        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa bản ghi #$maNV thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa bản ghi #$maNV thất bại";
        }
        header("Location: index.php?controller=employee&action=index");
        exit();
    }
}