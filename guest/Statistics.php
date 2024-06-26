<?php
require_once "pdo.php";

// Thông kế bình luận
function Statistics_Comment()
{
    // Truy vấn mã khách hàng, tên hàng hóa, số lượng bình luận, ngày bình luận cũ nhất, ngày bình luận mới nhất từ 2 bảng bình luận, hàng hóa gộp lại theo điều kiện mã hàng hóa của bảng bình luận = mã hàng hóa của bảng hàng hóa 
    // Sử dụng GROUP BY để gộp nhóm các dữ liệu, thuộc tính(mã hàng hóa, tên hàng hóa) giống nhau thành 1 theo điều kiện HAVING số lượng lớn hơn 0
    $sql = "SELECT hh.ma_hang_hoa, hh.ten_hang_hoa, COUNT(*) quantities, MIN(bl.DateComment) Oldest, MAX(bl.DateComment) newest FROM Comment cm JOIN hang_hoa hh ON hh.ma_hang_hoa = bl.ma_hang_hoa GROUP BY hh.ma_hang_hoa, hh.ten_hang_hoa HAVING quantities > 0";
    $ListComment = pdo_query($sql);
    return $ListComment;
}

function Statistics_Shipment()
{
    // Truy vấn mã loại, tên loại, số lượng hàng hóa, giá thấp nhất,giá cao nhất từ 2 bảng loại hàng, hàng hóa gộp lại theo điều kiện mã loại của bảng hàng hóa = mã loại của bảng loại hàng
    // Sử dụng GROUP BY để gộp nhóm các dữ liệu, thuộc tính(mã loại, tên loại) giống nhau thành 1 
    $sql = "SELECT lh.id, lh.categories_name, COUNT(*) quantities, MIN(hh.product_price) min_price, MAX(hh.product_price) max_price, AVG(hh.product_price) avg_price FROM product hh JOIN loai_hang lh ON lh.ma_loai = hh.ma_loai GROUP BY lh.ma_loai, lh.ten_loai";
    $ListShipment = pdo_query($sql);
    return $ListShipment;
}
function Load_All_Statistics_2()
{
    $sql = "select categories.id as madm, categories.categories_name as tendm, count(product.id) as countsp, min(product.product_price) as minprice, max(product.product_price) as maxprice, avg(product.product_price) as avgprice";
    $sql .= " from product left join categories on categories.id=product.id_categories";
    $sql .= " group by categories.id order by categories.id desc";
    $List_Statistics = pdo_query($sql);
    return $List_Statistics;
}
