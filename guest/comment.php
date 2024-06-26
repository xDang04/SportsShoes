<?php
require_once "pdo.php";

// Thêm bình luận
function Insert_Comment($comment, $id_product, $id_user, $DateComment, $stars)
{
  $sql = "INSERT INTO product_rev(comment, id_product, id_user, DateComment, stars)
   VALUES ('$comment', '$id_product', '$id_user', '$DateComment', $stars)";
  pdo_execute($sql);
}

// Xóa bình luận theo mã bình luận
function Delete_Comment($id)
{
  $sql = "DELETE FROM product_rev WHERE id = $id";
  pdo_execute($sql);
}

// Truy vấn tất cả bình luận
function Get_All_Comment()
{
  $sql = "SELECT * FROM product_rev ORDER BY DateComment DESC";
  $ListComment = pdo_query($sql);
  return $ListComment;
}

// Truy vấn bình luận theo từng hàng hóa
function Get_Comment_By_Shipment($id_product)
{
  // Truy vấn bình luận, tên hàng hóa, mã khách hàng, hình của khách hàng gộp từ 3 bảng hàng hóa, bình luận và khách hàng theo điều kiện mã hàng hoá của bảng bình luận trùng tham số mã hàng hóa truyền vào
  $sql = "SELECT bl.*, hh.product_name,kh.user_name, kh.id FROM product_rev bl JOIN product hh ON bl.id_product = hh.id JOIN user kh ON kh.id = bl.id_user WHERE bl.id_product = $id_product ORDER BY DateComment DESC";
  $ListComment = pdo_query($sql);
  return $ListComment;
}
