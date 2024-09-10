<?php
    class ProductController extends Helper{
        private $product_id;
        private $product_name;
        private $product_price;
        private $connection;
        public function __construct($connection){
            $this->connection = $connection;
        }

        public function insert(){
            $this->product_name = htmlspecialchars(trim($_POST["product_name"]));
            $this->product_price = htmlspecialchars((int)$_POST["product_price"]);

            $query = "INSERT INTO tbl_product (`product_id`, `product_name`, `product_price`) 
                        VALUES (UUID(), ?, ?)";

            $stmt = mysqli_prepare($this->connection, $query);

            if(!$stmt){
                $this->sendStatusCode(401, "Can't execute query");
            }

            mysqli_stmt_bind_param($stmt, "si", $this->product_name, $this->product_price);
            $result = mysqli_stmt_execute($stmt);

            if(!$result){
                $this->sendStatusCode(401, "Something went wrong");
            }

            $this->sendStatusCode(200, "OK");

        }

        public function display(){
            $query = "SELECT * FROM tbl_product 
            ORDER BY tbl_product.product_date_created ASC";

            $stmt = mysqli_prepare($this->connection, $query);
            
            
            if(!$stmt){
                $this->sendStatusCode(401, "Can't execute query");
            }

            mysqli_stmt_execute($stmt);


            $result = mysqli_stmt_get_result($stmt);

            if(!$result){
                $this->sendStatusCode(401, "Can't execute query");
            }

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                                <td>". $row['product_name'] ."</td>
                                <td>". $row['product_price'] ."</td>
                                <td>". date("F j, Y g:m A", strtotime($row['product_date_created'])) ."</td>
                                <th>
                                    <button class='btn btn-ghost btn-xs'>details</button>
                                    <button class='btn btn-ghost btn-xs' id='delete-product' data-id='". $row['product_id'] ."'>delete</button>
                                </th>
                            </tr>";
                }
            }
        }

        public function delete(){
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $this->product_id = htmlspecialchars($_POST["product_id"]);
                if(!$this->product_id) $this->sendStatusCode(402, "Product not found");

                $query = "DELETE FROM tbl_product WHERE product_id = ?";

                $stmt = mysqli_prepare($this->connection, $query);

                if(!$stmt){
                    $this->sendStatusCode(401, "Can't execute query");
                }

                mysqli_stmt_bind_param($stmt, "s", $this->product_id);

                $result = mysqli_stmt_execute($stmt);

                if(!$result){
                    $this->sendStatusCode(401, "Can't execute query");
                }

                $this->sendStatusCode(200, "OK");
            }
        }
    }

?>