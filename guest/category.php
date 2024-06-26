<?php
require_once "pdo.php";

// Thêm loại hàng
function Insert_Category($categories_name, $image)
{
    $sql = " INSERT INTO `categories`(`categories_name`,`image`) VALUES ('$categories_name','$image')";

    pdo_execute($sql);
}

// Xóa loại hàng theo mã loại
function Delete_Category($id)
{
    $sql = "DELETE FROM categories WHERE id = $id";
    pdo_execute($sql);
}

// Truy vấn tất cả dữ liệu của bảng loại hàng
function Get_All_Category($order = "DESC") // Tham số order nhận giá trị mặc định DESC sắp xếp theo giảm dần
{
    $sql = "SELECT * FROM categories ORDER BY id $order";
    $List_Category = pdo_query($sql);
    return $List_Category;
}
function Load_Category_Name($id_categories){
    if($id_categories>0){
    $sql="select * from categories where id=".$id_categories;
    $Category= pdo_query_one($sql);
    extract($Category);
    return $categories_name;
    }else {
        return "";
    }
} 
// Truy vấn một loại hàng theo mã loại
function Get_Category_By_Code($id)
{
    $sql = "SELECT * FROM categories WHERE id = $id";
    $Category = pdo_query_one($sql);

    return $Category;
}

// Lấy ra tên loại hàng theo mã loại
function Get_Category_Name($id)
{
    // Nếu mã loại truyền vào lớn hơn 0
    if ($id > 0) {
        $sql = "SELECT * FROM categories WHERE id = $id";
        $Category = pdo_query_one($sql);
        // Biến các cột(thuộc tính) trong bảng loại hàng thành các biến

        $categories_name = $Category['categories_name'];

        return $categories_name; // Trả về biến(ten_loai) tên loại hàng
    } else {
        // Nếu $ma_loại nhỏ hơn 0 trả về chuỗi rỗng
        return "";
    }
}

// Cập nhật loại hàng theo mã loại
function Set_Category($id, $categories_name, $image)
{
    $sql = " UPDATE `categories` SET `categories_name`='$categories_name',`image`='$image' WHERE id = $id";
    pdo_execute($sql);
}
