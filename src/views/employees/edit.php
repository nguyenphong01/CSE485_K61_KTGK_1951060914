<div style="color: red">
    <?php echo $error; ?>
</div>

<h1>
    Sửa nhân viên
</h1>

<form action="" method="post">
    Họ và tên:
    <input type="text"
           name="hovaten"
           value="<?php
           echo isset($_POST['hovaten']) ? $_POST['hovaten'] : $employee['hovaten']?>"
    />
    <br />

    Chức vụ:
    <input type="text"
           name="chucvu"
           value="<?php
           echo isset($_POST['chucvu']) ? $_POST['chucvu'] : $employee['chucvu']?>"
    />
    <br />

    Phòng ban:
    <input type="text"
           name="phongban"
           value="<?php
           echo isset($_POST['phongban']) ? $_POST['phongban'] : $employee['phongban']?>"
    />
    <br />
    
    Lương: 
    <input type="text"
           name="luong"
           value="<?php
           echo isset($_POST['luong']) ? $_POST['luong'] : $employee['luong']?>"
    />
    <br />

    Ngày vào làm :
    <input type="text"
           name="chuyenmon"
           value="<?php
           echo isset($_POST['ngayvaolam']) ? $_POST['ngayvaolam'] : $employee['ngayvaolam']?>"
    />
    <br />

    

    <input type="submit" name="submit" value="Update" />
</form>