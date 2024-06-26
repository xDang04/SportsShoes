<?php
// $db_con = mysqli_connect("localhost","root","","duan1");
function currency_format($number)
{
     if (!empty($number)) {
          return number_format($number, 0, ',', '.') . " VNĐ";
     }
     if ($number == 0)
          return "0 VNĐ";
}

if (isset($_POST['submit'])) {
     $phone = $_POST['phone'];
     $location = $_POST['location'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $money = 0;
     if (isset($phone) && isset($location) && isset($email) && isset($name)) {
          $subject = "Payment%20Success";
          // $Mem=mysqli_query($db_con,"SELECT * FROM detail_order");
          $Sp = '';
          //tạo code  ko trùng code đã có sẵn
          $CodeCart = rand(1000, 9999);
          while (mysqli_fetch_array(mysqli_query($db_con, "SELECT * FROM detail_order WHERE id_order='$CodeCart'")) == true)
               $CodeCart = rand(1000, 9999);
          //
          foreach ($_SESSION['cart'] as $n) {
               $Sp = $Sp . '
               <tr><th>' . $n[1] . '</th>
               <th>' . $n[4] . '</th>
               <th>' . currency_format($n[3]) . '</th></tr>';
               $money += $n[3] * $n[4];
               @mysqli_query($db_con, "INSERT into detail_order(id_product,id_order,quanlity,size,color)values('{$n[0]}','$CodeCart','{$n[4]}','{$n[6]}','{$n[5]}')");
          }
          $message = urlencode('
          <div style="margin-left:30px;width:420px;padding:40px;border:1px #ccc solid;border-radius:10px;color:#000;background-image: linear-gradient(-45deg, #cfcfcf, transparent);">
                  <h1 style="font-weight:400;text-align:center">Hoá đơn thanh toán</h1>
                                          <div>🔵 <b style="padding-left:5px;color:#888a8d;margin-top:">Buyer : </b><b style="color:#478fcc;font-weight: 500;margin-top:-30px;margin-left:30px">' . $name . '</b>
                                          <div>🔵 <b style="padding-left:5px;color:#888a8d;margin-top:">Receipt address : </b><b style="color:#478fcc;font-weight: 500;margin-top:-30px;margin-left:30px">' . $location . '</b>
                                          <div>
                                             <table border="1">
                                                  <thead>
                                                  <tr>
                                                       <th>Product</th>
                                                       <th>Quantities</th>
                                                       <th>Price</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>
                                                 ' . $Sp . '
                                                  </tbody>
                                             </table>
                                          </div>
          
          
                                  <div style="border-bottom: 1px #ccc dashed;width:400px;height:10px;margin:10px 0px"></div>
                                  <div style="margin: 20px 0px;">
                                         
                                          <div>Price : <b style="color:#009688;font-weight: bold;">' . currency_format($money) . '</b></div>
                                  </div>
          </div>
          ');
          $uid = $_SESSION['id_user'];
          // insert_bill($$uid, $name, $location, $phone, 'COD', '0000-00-00 00:00:00', $money);
          @mysqli_query($db_con, "INSERT into `order`(id_user,code_cart,status,total,ship_address,ship_name_user,ship_phone_user,pttt)values($uid,'$CodeCart',0,$money,'$location','$name','$phone','COD')");
          unset($_SESSION['cart']);

     }


}
?>
<style>
     #main {
          display: grid;
          grid-template-columns: 1fr;
     }

     .form_wrapper {
          margin: 10px;
          width: 50%;
          border: 1px #000 solid;
     }

     .form_wrapper>input {
          width: 100%;
          border: none;
          object-fit: cover;
     }
</style>
<?php if (isset($_POST['submit'])) { ?>
     <script>
          var xhttp = new XMLHttpRequest();
          xhttp.open("GET", "https://ketquaday99.com/api/AutoSendEmail.php?email=<?= $email ?>&message=<?= $message ?>&subject=<?= $subject ?>", true);
          xhttp.send();
          alert("Thành công");
          window.location.href = "?act=detail_order";
     </script>
<?php } ?>
<div id="main flex gap-10 relative">
     <div class="ml-10">
          <form action="" method="post">
               <label for="diachi" class="pl-[10px]"> Receipt address </label>
               <div class="form_wrapper rounded-md">
                    <input type="text" class="pl-3 my-2" name="location" id="diachi" placeholder="Receipt address"
                         required pattern=".{5,}" title="Vui lòng nhập ít nhất 5 ký tự" oninput="setCustomValidity('')"
                         onchange="this.value = this.value.trim()">
               </div>

               <label for="phonei" class="pl-[10px]"> Receiving Phone Number </label>
               <div class="form_wrapper rounded-md">
                    <input type="tel" name="phone" class="pl-3 my-2" id="phonei" placeholder="Receiving Phone Number" required
                         pattern=".{5,}" title="Vui lòng nhập ít nhất 5 ký tự" oninput="setCustomValidity('')"
                         onchange="this.value = this.value.trim()">
               </div>

               <label for="namei" class="pl-[10px]"> Receiver's name </label>
               <div class="form_wrapper rounded-md">
                    <input type="text" name="name" class="pl-3 my-2" id="namei" placeholder="Receiver's name" required
                         pattern=".{5,}" title="Vui lòng nhập ít nhất 5 ký tự" oninput="setCustomValidity('')"
                         onchange="this.value = this.value.trim()">
               </div>

               <label for="emaili" class="pl-[10px]"> Confirm registration email </label>
               <div class="form_wrapper rounded-md">
                    <input type="email" name="email" class="pl-3 my-2" id="emaili" placeholder="Confirm registration email"
                         required pattern=".{5,}" title="Vui lòng nhập ít nhất 5 ký tự" oninput="setCustomValidity('')"
                         onchange="this.value = this.value.trim()">
               </div>

               <button
                    class="bg-green-500 border border-green-600 rounded-md text-white text-xl font-bold p-4 w-1/2 ml-3 mt-4"
                    type="submit" name="submit">Confirm payment</button>
          </form>

     </div>
     <div class="absolute top-[27%] right-5">
          <img class="w-[600px] h-[390px] rounded-md shadow-xl" src="../upload/g16.jpg" alt="">
     </div>
</div>