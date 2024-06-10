<?php
class Product {
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function __toString() {
        return "Product: {$this->name}, Price: {$this->price}, Quantity: {$this->quantity}";
    }
}
?>

<?php
class Cart {
    private $products;

    public function __construct() {
        $this->products = array();
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product) {
        foreach ($this->products as $key => $item) {
            if ($item === $product) {
                unset($this->products[$key]);
                return;
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString() {
        $output = "Products in cart:\n";
        foreach ($this->products as $product) {
            $output .= $product->__toString() . "\n";
        }
        $output .= "Total price: {$this->getTotal()}";
        return $output;
    }
}
?>




<?php
$product = new Product("Laptop", 1500, 1);
$cart = new Cart();
$cart->addProduct($product);
echo $cart;
?>


