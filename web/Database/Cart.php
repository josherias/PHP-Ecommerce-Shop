<?php

class Cart
{
    private $db = null;

    public function __construct(Database $db)
    {
        if ($db->isConnected()) {
            $this->db = $db;
        } else {
            return null;
            echo "Db is not connected";
        }
    }

    /* add to item cart */
    public function addToCart($data)
    {

        $this->db->query("INSERT INTO cart (product_id,user_id) VALUES(:producTiD,:useRiD)");
        /* bind the values before executing */
        $this->db->bind(':producTiD', $data['product_id']);
        $this->db->bind(':useRiD', $data['user_id']);

        $this->db->execute();
    }

    /* get Cart content */
    public function getCartData($table = 'cart', $user_id)
    {
        $this->db->query("SELECT * FROM {$table} WHERE user_id = :id");
        $this->db->bind(':id', $user_id);
        return $this->db->resultset();
    }


    /* get Cart content */
    public function getSingleCart($table = 'cart', $product_id)
    {
        $this->db->query("SELECT * FROM {$table} WHERE product_id = :producTiD");
        $this->db->bind(':producTiD', $product_id);
        return $this->db->resultset();
    }

    /* count items in cart */
    public function cartCount($data)
    {
        return $this->db->rowCount($data);
    }


    /* delete from cart */

    public function deleteFromCart($table = 'cart', $id)
    {
        $this->db->query("DELETE FROM {$table} WHERE product_id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    /* calculate the total of itme in the cart */
    public function getSum($array)
    {
        if (isset($array)) {
            $total = 0;
            foreach ($array as $item) {
                $total += floatval($item[0]);
            }
        }
        return sprintf('%.2f', $total);
    }

    /* get ids of all products in the cart */
    public function getCartId($cartArray = null, $key = 'product_id')
    {
        if ($cartArray != null) {
            //store all ids of items in the cart in the cart id array and then return the array
            $cart_id = array_map(function ($value) use ($key) { //loop thru the cartArray and get the cart ids
                return $value[$key];
            }, $cartArray);
        }

        return $cart_id ?? [];
    }



    /* add to item wishList */
    public function addToWishList($data)
    {
        $this->db->query("INSERT INTO wishlist (cart_id,product_id,user_id) VALUES (:carTiD,:producTiD,:useRiD)");
        /* bind the values before executing */
        $this->db->bind(':carTiD', $data['cart_id']);
        $this->db->bind(':producTiD', $data['product_id']);
        $this->db->bind(':useRiD', $data['user_id']);
        $this->db->execute();
    }
}
