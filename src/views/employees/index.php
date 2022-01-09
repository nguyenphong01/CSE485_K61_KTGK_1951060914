<?php
//file hiển thị thông báo lỗi
require_once 'views/commons/error.php';
?>
<a href="index.php?controller=employee&action=add">
    Thêm nhân viên mới
</a>
<br>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Mã nhân viên</th>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Phòng ban</th>
        <th>Lương</th>
        <th>Ngày vào làm</th>
       
    </tr>
    <?php if (!empty($employees)): ?>          <!-- bien books nay truyen tu BookController.php sang -->
        <?php foreach ($employees AS $employee) : ?>
            <tr>
                <td><?php echo $employee['maNV'] ?></td>
                <td><?php echo $employee['hovaten'] ?></td>
                <td><?php echo $employee['chucvu'] ?></td>
                <td><?php echo $employee['phongban'] ?></td>
                <td><?php echo $employee['luong'] ?></td>
                <td><?php echo $employee['ngayvaolam'] ?></td>
                <td>
                    <?php
                    //khai báo 3 url xem, sửa, xóa
                    $urlDetail =
                        "index.php?controller=employee&action=detail&maNV=" . $employee['maNV'];
                    $urlEdit =
                        "index.php?controller=employee&action=edit&maNV=" . $employee['maNV'];
                    $urlDelete =
                        "index.php?controller=employee&action=delete&maNV=" . $employee['maNV'];
                    ?>
                    <a href="<?php echo $urlDetail?>">Chi tiết</a> &nbsp;
                    <a href="<?php echo $urlEdit?>">Sửa</a> &nbsp;
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                       href="<?php echo $urlDelete?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>