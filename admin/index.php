<?php
session_start();
include "../global.php";
include "../guest/pdo.php";
include "../guest/product.php";
include "../guest/category.php";
include "../guest/order.php";
include "../guest/account.php";
include "../guest/comment.php";
include "layout/header.php";
include "../guest/thongke.php";

// echo "<script>alert('".$_SESSION['id_user']."')</script>";

$adminUser = array('admin', 'admin1');
if (isset($_SESSION['id_user']) && in_array(mysqli_fetch_array(mysqli_query($db_con, "SELECT user_name from user WHERE id='{$_SESSION['id_user']}' "))['user_name'], $adminUser)) {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case "status":
                if (isset($_POST['luu']) && ($_POST['luu'])) {
                    $ttdh = $_POST['status'];
                    $id = $_POST['id'];
                    update_order($id, $ttdh);
                }
                $order = loadall_order_admin();
                if (!empty($order)) {
                    include "order/listorder.php";
                }
                break;
            case "Add_cate":
                if (isset($_POST['btn_save'])) {
                    $categories_name = $_POST['categories_name'];
                    //file upload
                    $file = $_FILES['upload'];
                    $image = $file['name'];
                    Insert_Category($categories_name, $image);
                    $message = "Add successfully uploaded";
                }
                include "Category/add.php";
                break;

            case "list-cate":
                $ListCategory = Get_All_Category();
                include "Category/list-cate.php";
                break;

            case "Delete_cate":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    Delete_Category($_GET['id']);
                }
                $ListCategory = Get_All_Category();
                include "Category/list-cate.php";
                break;
            case "View_Update_Cate":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $id = $_GET['id'];
                    $Category = Get_Category_By_Code($id);
                    include "Category/update-cate.php";
                }
                break;
            case "Update_Category":
                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id = $_POST['id'];
                    $categories_name = $_POST['categories_name'];
                    $image = $_FILES['image']['name'];
                    $target_dir = "../upload/";

                    if ($image == "") {
                        $image = $_POST['old_image'];
                    }
                    $target_file = $target_dir . basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $message = "Image posted successfully";
                    } else {
                        $message = "Image update failed !";
                    }
                    Set_Category($id, $categories_name, $image);
                    $message = "Cập nhật thành công";
                }
                $ListCategory = Get_All_Category();
                include "Category/list-cate.php";
                break;

            case "Add_Product":
                if (isset($_POST['btn_save'])) {

                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_price_sale = $_POST['product_price_sale'];

                    $description = $_POST['description'];
                    $origin = $_POST['origin'];
                    $id_categories = $_POST['id_categories'];

                    //file upload
                    $file = $_FILES['image'];
                    $image = $file['name'];

                    $file = $_FILES['image2'];
                    $image2 = $file['name'];
                    $file = $_FILES['image3'];
                    $image3 = $file['name'];

                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['image']['name']);
                    $target_file = $target_dir . basename($_FILES['image2']['name']);
                    $target_file = $target_dir . basename($_FILES['image3']['name']);
                    Insert_Product($product_name, $product_price, $product_price_sale, $description, $image, $image2, $image3, $origin, $id_categories);
                    $message = "Thêm thành công";
                }
                $ListCategory = Get_All_Category();
                include "Product/addsp.php";
                break;

            case "listsp":
                $ListCategory = Get_All_Category();
                $ListProduct = Get_All_Product_Admin();
                include "Product/listsp.php";
                break;

            /* case "danh_sach_sp_trang":
            $danh_sach_sp = lay_san_pham_theo_trang('id', 5);
            include "san_pham/listsp.php";
            break;
*/
            case "Delete_product":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $Product = Delete_product($_GET['id']);
                }
                $ListProduct = Get_All_Product_Admin();
                include "Product/listsp.php";
                break;

            case "Update_Product":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $Product = Get_Product_By_Code($_GET['id']);
                }
                $ListCategory = Get_All_Category();
                include "Product/updatesp.php";
                break;

            case "Update_Product":
                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id = $_POST['id'];
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_price_sale = $_POST['product_price_sale'];
                    $description = $_POST['description'];
                    $origin = $_POST['origin'];
                    $image2 = $_FILES['image2']['name'];

                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['image2']['name']);

                    if (move_uploaded_file($_FILES['image2']['tmp_name'], $target_file)) {
                        $thong_bao = "Image posted successfully";
                    } else {
                        $thong_bao = "Image update failed !";
                    }

                    $id_categories = $_POST['id_categories'];

                    Update_Product($id, $product_name, $product_price, $product_price_sale, $description, $origin, $image2, $id_categories);
                }
                $danh_sach_sp = Get_All_Product_Admin();
                include "Product/listsp.php";
                break;
            case "InsertAccount":
                if (isset($_POST['btn_insert'])) {
                    $user_name = $_POST['user_name'];
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];
                    InsertAccount($user_name, $full_name, $email, $phone, $address, $password, $role);
                    $message = "Thêm tài khoản thành công";
                }
                include "user/add-user.php";
                break;

            case "list-user":
                $role_test = role();
                $users = Load_All_Account();
                include "user/list-user.php";
                break;


            case "Delete_us":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $Account = Delete_Account($_GET['id']);
                }

                $users = Load_All_Account();
                include "user/list-user.php";
                break;

            case "View_Update_us":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $Account = Get_Account_By_Code($_GET['id']);
                    include "user/update-user.php";
                }
                break;
            case "Update_Account":
                if (isset($_POST['btn_update']) && ($_POST['btn_update'])) {
                    $id = $_POST['id'];
                    $user_name = $_POST['user_name'];
                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];

                    Update_Account_Admin($id, $user_name, $full_name, $email, $phone, $address, $password, $role);
                    $message = "Update successfully";
                    $users = Load_All_Account();
                }
                include "user/list-user.php";
                break;
            case "listorder":
                $order = loadall_order_admin();
                if (!empty($order)) {
                    include "order/listorder.php";
                }
                break;

            case "detail_order":
                $code_cart = $_GET['code_cart'];

                $listorder_detail = loadone_order($code_cart);

                include "order/detail_order.php";
                break;

            case "binh_luan":
                $List_Comment = Get_All_Comment();
                $ListProduct = Get_All_Product_Admin();

                include "comment/listComment.php";
                break;
            case "thong_ke":
                $ds_thong_ke_hh = Load_All_Statistics_2();
                include "Statistics/list.php";
                break;
            // case "chi_tiet_bl":
            //     if (isset($_GET['ma_hang_hoa']) && ($_GET['ma_hang_hoa'] > 0)) {
            //         $ds_chi_tiet_bl = lay_binh_luan_theo_hh($_GET['ma_hang_hoa']);
            //     }
            //     include "comment/chi_tiet_binh_luan.php";
            //     break;

            case "Delete_Comment":
                if (isset($_GET['id']) && ($_GET['id']) > 0) {
                    $Account = Delete_Comment($_GET['id']);
                }
                if (isset($_GET['id_product']) && ($_GET['id_product'] > 0)) {
                    $List_Details_Comment = Get_Comment_By_Shipment($_GET['id_product']);
                }
                $List_Comment = Get_All_Comment();
                include "comment/listComment.php";
                break;


            /*case "thong_ke":
            $ds_thong_ke_hh = thong_ke_hang_hoa();
            include "thong_ke/list.php";
            break;
            // case "bieu_do":
            //   $ds_thong_ke_hh = thong_ke_hang_hoa();
            //   include "thong_ke/chart.php";
            //   break;*/

            default:
                $Category = count(Get_All_Category());
                $Product = count(Get_All_Product_Admin());
                $Account = count(Load_All_Account());
                $Comment = count(Get_All_Comment());
                include "layout/home.php";
                break;
        }
    } else {
        $Category = count(Get_All_Category());
        $Product = count(Get_All_Product_Admin());
        $Account = count(Load_All_Account());
        $Comment = count(Get_All_Comment());

        include "layout/home.php";
    }
} else {
    //ko có quyền admin
    echo "<script>alert('Hãy đăng nhập bằng tài khoản admin để tiếp tục');window.location.href='../index.php'</script>";

}
?>