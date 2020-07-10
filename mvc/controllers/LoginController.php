<?php
require_once "models/DBConnection.php";
require_once "models/Customers.php";
require_once "models/CustomerDB.php";
require_once "models/CustomerDetail.php";
require_once "models/CartDB.php";

class LoginController
{
   public function index($note = null, $note2 = null)
   {
      return view("formLogin", [
         "note" => $note, "note2" => $note2
      ]);
   }
   public function regis($note = null, $note2 = null)
   {
      return view("registration", [
         "note" => $note, "note2" => $note2
      ]);
   }
   public function login()
   {
      $cartDB = new CartDB(DbConnection::make());
      $customerDB = new CustomerDB(DbConnection::make());
      if (empty($_POST['username'])) {
         $note = "*Không được bỏ trống !";
         return $this->index($note);
      }
      if (empty($_POST['password'])) {
         $note = "*Không được bỏ trống !";
         return $this->index(null, $note);
      }
      $customer = new Customers($_POST['username'], md5($_POST['password']));
      $result = $customerDB->getUser($customer);
      if (count($result)) {

         $_SESSION['customer'] = $result[0];
         if ($customerDB->isAdmin($customer)) {
            // return $home->admin();
         }
         $count = $cartDB->getCountCart($result[0]['user_ID']);
         $_SESSION["countCart"] = $count;
         return redirect('');
      } else {
         $note = "*Tên đăng nhập hoặc mật khẩu sai !";

         return $this->index($note);
      }
   }

   public function registration()
   {
      $cartDB = new CartDB(DbConnection::make());
      $customerDB = new CustomerDB(DbConnection::make());
      if (empty($_POST['username'])) {
         $note = "*Không được bỏ trống !";
         return $this->regis($note);
      }
      if (empty($_POST['password']) || empty($_POST['password2'])) {
         $note = "*Không được bỏ trống !";
         return $this->regis(null, $note);
      }
      if ($_POST['password'] !== $_POST['password2']) {
         $note = "*Mật khẩu không trùng khớp";
         return $this->regis(null, $note);
      }
      $userName = $_POST['username'];
      $password = md5($_POST['password']);
      $customer = new Customers($userName, $password);
      $result = $customerDB->getUser($customer);

      if (count($result) === 0) {
         $customerDetail = new CustomerDetail();
         $customerDB->addDetail($customerDetail);
         $detail = $customerDB->getDetail();
         $customerDB->registration($customer, $detail[0]['customer_ID']);
         $result = $customerDB->getUser($customer);
         $cartDB->addCart($result[0]['user_ID']);
         $note = "Đăng kí thành công";
         return $this->login();
      } else {
         $note = "*Tên đăng nhập đã được đăng kí!";

         return $this->regis($note);
      }
   }
   public function logout()
   {
      session_destroy();
      return  redirect('');
   }
}
