<?php
require_once "models/DBConnection.php";
require_once "models/Customers.php";
require_once "models/CustomerDB.php";
require_once "models/CustomerDetail.php";
require_once "models/CartDB.php";
require_once "models/BillDB.php";
require_once "models/ProductDB.php";
class LoginController
{
   public $cartDB;
   public $customerDB;
   public $BillDB;
   public $ProductDB;

   public function __construct()
   {
      $this->cartDB = new CartDB(DbConnection::make());
      $this->customerDB = new CustomerDB(DbConnection::make());
      $this->BillDB = new BilDB(DbConnection::make());
      $this->ProductDB = new ProductDB(DbConnection::make());
   }

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
      if (empty($_POST['username'])) {
         $note = "*Không được bỏ trống !";
         return $this->index($note);
      }
      if (empty($_POST['password'])) {
         $note = "*Không được bỏ trống !";
         return $this->index(null, $note);
      }
      $customer = new Customers($_POST['username'], md5($_POST['password']));
      $result = $this->customerDB->getUser($customer);


      if (count($result)) {
         $customerDetail = $this->customerDB->getDetail($result[0]["customer_ID"]);
         $_SESSION['customer'] = $result[0];
         $_SESSION["customerDetail"] = $customerDetail[0];

         if ($this->customerDB->isAdmin($customer)) {
            return redirect("admin");
         }
         $count = $this->cartDB->getCountCart($result[0]['user_ID']);
         $_SESSION["countCart"] = $count[0]["count"];
         return redirect('');
      } else {
         $note = "*Tên đăng nhập hoặc mật khẩu sai !";

         return $this->index($note);
      }
   }

   public function registration()
   {
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
      $result = $this->customerDB->getUser($customer);

      if (count($result) === 0) {
         $customerDetail = new CustomerDetail();
         $this->customerDB->addDetail($customerDetail);
         $detail = $this->customerDB->getDetail();
         $this->customerDB->registration($customer, $detail[0]['customer_ID']);
         $result = $this->customerDB->getUser($customer);
         $this->cartDB->addCart($result[0]['user_ID']);
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

   public function personal()
   {

      $productDelivery = $this->BillDB->getProductDelivery($_SESSION["customer"]["user_ID"]);
      $productBought = $this->BillDB->getProductBought($_SESSION["customer"]["user_ID"]);
      return view('personal', ["productDelivery" => $productDelivery, "productBought" => $productBought]);
   }

   

}
