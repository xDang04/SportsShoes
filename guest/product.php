<?php
require_once "pdo.php";

// Thêm hàng hóa
function Insert_Product($product_name, $product_price, $product_price_sale, $description, $image, $image2, $image3, $origin, $id_categories)
{
    
    $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_price_sale`, `description`, `image`, `image2`, `image3`, `origin`, `id_categories`) VALUES ('$product_name','$product_price','$product_price_sale','$description','$image','$image2','$image3','$origin','$id_categories')";
    pdo_execute($sql);
}

function update_view($id)
{
    $sql = "UPDATE product SET view = view + 1 WHERE id = $id";
    pdo_execute($sql);
}

// Xóa hàng hóa theo mã hàng hóa
function showspdetail($id)
{
    $sql = "select * from product where 1";
    if ($id > 0) $sql .= " AND id=" . $id;
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
function Delete_product($id)
{
    $sql = "DELETE FROM product WHERE id = $id";
    pdo_execute($sql);
}

function Load_All_Product_Home()
{
    $sql = "SELECT * FROM `product` ORDER BY view DESC LIMIT 0,6";
    $ListPproduct = pdo_query($sql);
    return $ListPproduct;
}
function Load_All_Product()
{
    $sql = "SELECT * FROM `product`";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}
function Get_All_Product_Admin()
{
    $sql = "SELECT * FROM product ORDER BY id DESC";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}
function Get_All_Product_Guest()
{
    $sql = "SELECT * FROM product ORDER BY id DESC";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}
// Truy vấn tất cả hàng hóa
function Get_All_Product($kw = "", $id_categories)
{

    $sql = "select * from product where 1 ";
    if ($kw != "") {
        $sql .= " and product_name like '%" . $kw . "%'";
    }
    if ($id_categories > 0) {
        $sql .= " and id_categories = '" . $id_categories . "'";
    }
    $sql .= "limit 0,9";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

function Get_Product_By_Page($order, $limit)
{
    if (!isset($_GET['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    // Sử pdo_query_value để lấy giá trị của câu lệnh sql count trả về(ở đây là lấy số lượng hàng hóa trong bảng hang_hoa)
    // Khởi tạo một biến $_SESSION['total_pro'](chứa số lượng sản phẩm)
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM product");
    // Nếu tồn tại biến page ở trên url 
    if (isset($_GET['page'])) {
        // Khởi tạo $_SESSION['page'] chứa biến page
        $_SESSION['page'] = $_GET['page'];
    }
    // Tạo biến begin để câu lệnh LIMIT lấy bắt đầu từ vị trí index = ?
    $begin = ($_SESSION['page'] - 1) * $limit;
    // ceil() làm tròn lên số nguyên gần nhất
    // Lấy $_SESSION['total_pro'] chia cho tham số $limit truyền vào và làm tròn lên số nguyên gần nhất gán vào biến $_SESSION['total_page']
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    // Truy vấn tất cả sản phẩm từ bảng hàng hóa sắp xếp theo tham số order truyền vào lấy tất cả sản phẩm từ vị trí $begin, và giới hạn $limit
    $sql = "SELECT * FROM product ORDER BY $order  LIMIT $begin, $limit";
    return pdo_query($sql);
}
// Truy vấn tất cả hàng hóa theo sắp xếp theo số lượt xem giới hạn là 5 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
function Get_Product_Hilight()
{
    $sql = "SELECT * FROM product  ORDER BY view DESC LIMIT 0,5";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}
function Get_Product_Suggest()
{
    $sql = "SELECT * FROM product  ORDER BY view DESC LIMIT 0,4";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}
// Truy vấn tất cả hàng hóa có thuộc tính đặc biệt là 1 sắp xếp theo mã hàng hóa giảm dần giới hạn là 5 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
function Get_Product_Special()
{
    $sql = "SELECT * FROM product WHERE view = (SELECT MAX(view) FROM product); ORDER BY id DESC LIMIT 0,8";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

// Truy vấn tất cả hàng hóa sắp xếp theo mã hàng hóa giảm dần
function Get_Product_New()
{
    $sql = "SELECT * FROM product WHERE 1 ORDER BY id DESC";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

// Truy vấn một hàng hóa theo mã hàng hóa
function Get_Product_By_Code($id)
{
    $sql = "SELECT * FROM product WHERE id = $id";
    $Product = pdo_query_one($sql);
    return $Product;
}


// Truy vấn tất cả hàng hóa theo mã loại(có cùng mã loại) và phải khác mã hàng hóa sắp xếp theo mã hàng hóa giảm giá giới hạn là 3 hàng hóa bắt đầu từ vị trí index = 0(đầu tiên)
function Get_Related_Products($id, $id_categories)
{
    $sql = "SELECT * FROM product WHERE id_categories = $id_categories AND id <> $id ORDER BY id DESC LIMIT 0,3";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

// Truy vấn tất cả hàng hóa theo loại hàng
function Get_Product_By_Category($id_categories)
{
    $sql = "SELECT * FROM product WHERE 1";
    // Nếu tham số mã loại truyền vào lớn hơn 0
    if ($id_categories > 0) {
        // Nối chuỗi biến $sql
        // Truy vấn hàng hóa theo mã loại 
        $sql .= " AND id_categories = $id_categories";
    }
    // Default nối chuỗi sắp xếp theo mã hàng hóa giảm dần
    $sql .= " ORDER BY id DESC";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

// Truy vấn hàng hóa theo từ khóa
function Get_Product_By_kw($kw)
{
    // Truy vấn hàng hóa theo tên hàng hóa so sánh với từ khóa
    // Sử dụng câu lệnh LIKE để so sánh tham số $kw truyền vào với tên hàng hóa
    $sql = "SELECT * FROM hang_hoa WHERE ten_hang_hoa LIKE '%" . $kw . "%'";
    $ListProduct = pdo_query($sql);
    return $ListProduct;
}

// Cập nhật hàng hóa theo mã hàng hóa
function Update_Product($id, $product_name, $product_price, $product_price_sale, $description, $origin, $image2, $id_categories)
{
    // Nếu tham số hình khác rỗng(ở đây là người dùng có đăng tải hình ảnh lên)
    if ($image2 != "") {
        // Sẽ update tất cả bao gồm cả hình ảnh 

        $sql = "UPDATE `product` SET `product_name`='$product_name',`product_price`='$product_price',`product_price_sale`='$product_price_sale',`description`='$description',`origin`='$origin',`image2`='$image2',`id_categories`='$id_categories' WHERE id = $id";
    } else {
        // Nếu tham số hình là rỗng(người dùng giữ nguyên) thì sẽ cập nhật tất cả trừ hình ảnh
        $sql = "UPDATE `product` SET `product_name`='$product_name',`product_price`='$product_price',`product_price_sale`='$product_price_sale',`description`='$description',`origin`='$origin',`id_categories`='$id_categories' WHERE id = $id";
    }
    pdo_execute($sql);
}
