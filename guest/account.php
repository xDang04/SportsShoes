
<?php
function Load_All_Account()
{
    $sql = "select * from user order by id desc";
    $ListAccount = pdo_query($sql);
    return $ListAccount;
}
function getaddress($id)
{
    $sql = "SELECT `full_name`, `phone`, `address` FROM `user` WHERE id =" . $id;
    $address = pdo_query_one($sql);
    return $address;
}
function search_id()
{
    $sql = "select id from user order by id desc LIMIT 0,1";
    $ListAccount = pdo_query_one($sql);
    $iduser = $ListAccount['id'];
    return $iduser;

}
function role(){
    $sql = "SELECT * FROM `role`";
    $role = pdo_query($sql);
    return $role;
}
function role_check($id){
    $sql = "SELECT * FROM `role` where id = " . $id;
    $role = pdo_query_one($sql);
    return $role;
}
// Cập nhật tài khoản phía admin
function Update_Account_Admin($id, $user_name, $full_name, $email, $phone, $address, $password, $role)
{
    $sql = "UPDATE `user` SET `user_name`='$user_name',`full_name`='$full_name',`email`='$email',`phone`='$phone',`address`='$address',`password`='$password',`role`='$role' WHERE `id` = '$id'";
    pdo_execute($sql);
}

// Xóa tài khoản theo mã khách hàng
function Delete_Account($id)
{
    $sql = "DELETE FROM user WHERE id = '$id'";
    pdo_execute($sql);
}

// Kiểm tra email
function Check_email($email)
{
    // Truy vấn đến tài khoản mà email trùng với tham số email truyền vào
    $sql = "SELECT * FROM khach_hang WHERE email = '$email'";
    $tai_khoan_email = pdo_query_one($sql);
    return $tai_khoan_email;
}

// Kiểm tài khoản có tồn tại trong database ko

// Cập nhật mật khẩu theo mã khách hàng
function Change_Password_Account($ma_kh, $mat_khau_moi)
{
    $sql = "UPDATE khach_hang SET mat_khau = '$mat_khau_moi' WHERE ma_kh = '$ma_kh'";
    pdo_execute($sql);
}

require_once "pdo.php";

// Truy vấn tất cả khách hàng
function Get_All_Account()
{
    $sql = "SELECT * FROM user ORDER BY id DESC";
    $ds_khach_hang = pdo_query($sql);
    return $ds_khach_hang;
}

// Truy vấn một khách hàng theo mã khách hàng
function Get_Account_By_Code($id)
{
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $Account_Code_Guest = pdo_query_one($sql);
    return $Account_Code_Guest;
}

// Thêm tài khoản ở phía client(đăng ký)
function InsertAccount($user_name, $full_name, $email, $phone, $address, $password, $role)
{
    $sql = "INSERT INTO `user`(`user_name`, `full_name`, `email`, `phone`, `address`, `password`,`role`) 
    VALUES ('$user_name', '$full_name', '$email', '$phone', '$address', '$password','$role')";
    pdo_execute($sql);
}

// Thêm tài khoản ở phía admin
function InsertAccount_Admin($ma_kh, $mat_khau, $ho, $ten, $kich_hoat, $hinh, $email, $vai_tro)
{
    $sql = "INSERT INTO khach_hang(ma_kh, mat_khau, ho, ten, kich_hoat, hinh, email, vai_tro) VALUES ('$ma_kh', '$mat_khau', '$ho', '$ten', $kich_hoat, '$hinh', '$email', $vai_tro)";
    pdo_execute($sql);
}

// Kiểm tra tài khoản theo mã khách hàng và mật khẩu (đăng nhập)
function Check_Account($ma_kh, $mat_khau)
{
    // Truy vấn đến tài khoản mà mã khách hàng và mật khẩu giống tham số truyền vào
    $sql = "SELECT * FROM khach_hang WHERE ma_kh = '$ma_kh' AND mat_khau = '$mat_khau'";
    $tai_khoan = pdo_query_one($sql);
    return $tai_khoan;
}

function check_user($user, $pass)
{
    $sql = "select * from user where user_name='" . $user . "' AND password='" . $pass . "'";
    $kq = pdo_query_one($sql);
    return $kq;
}
// Cập nhật tài khoản phía client
function Update_Account($ma_kh, $ho, $ten, $hinh, $email)
{
    // Nếu hình khác chuỗi rỗng(khách hàng không đăng tải hình ảnh)
    if ($hinh != "") {
        // Update thêm cả hình ảnh
        $sql = "UPDATE khach_hang SET ho = '$ho', ten = '$ten', hinh = '$hinh', email = '$email' WHERE ma_kh = '$ma_kh'";
    } else {
        // Ngược lại thì không update hình ảnh
        $sql = "UPDATE khach_hang SET ho = '$ho', ten = '$ten', email = '$email' WHERE ma_kh = '$ma_kh'";
    }
    pdo_execute($sql);
}

// Cập nhật tài khoản phía admin


// Xóa tài khoản theo mã khách hàng


// Kiểm tra email


// Kiểm tài khoản có tồn tại trong database ko

// Cập nhật mật khẩu theo mã khách hàng
