<?php

/* require_once('./Database.php'); */

require_once "C:\wamp64\www\braintree\Database\Database.php";


class Product
{

    public $db = null;


    public function __construct(Database $db)
    {
        /* dependency injection */
        if ($db->isConnected()) {
            $this->db = $db;
        } else {
            return null;
            echo "Database not connected";
        }
    }

    //add category to add product------------------------------------------------
    /* insert product into database */
    public function addNewProduct($data)
    {
        $this->db->query("INSERT INTO products (product_name,brand,in_stock,unit_price,product_image,seller,seller_contact,product_details,product_specification,created_at,category)
                    VALUES(:producTnamE,:branD,:iNstocK,:uniTpricE,:producTimagE,:selleR,:selleRcontacT,:producTdetailS,:producTspecificatioN,:datEtimE,:categorY)");

        /* bind the values before executing */
        $this->db->bind(':producTnamE', $data['product_name']);
        $this->db->bind(':branD', $data['brand']);
        $this->db->bind(':iNstocK', $data['in_stock']);
        $this->db->bind(':uniTpricE', $data['unit_price']);
        $this->db->bind(':producTimagE', $data['product_image']);
        $this->db->bind(':selleR', $data['seller']);
        $this->db->bind(':selleRcontacT', $data['seller_contact']);
        $this->db->bind(':producTdetailS', $data['product_details']);
        $this->db->bind(':producTdetailS', $data['product_details']);
        $this->db->bind(':producTspecificatioN', $data['product_specification']);
        $this->db->bind(':categorY', $data['category']);
        $this->db->bind(':datEtimE', $data['dateTime']);

        $this->db->execute();
    }


    public function EditProduct($data, $id)
    {
        $this->db->query("UPDATE products 
                            SET product_name=:producTnamE,brand=:branD,in_stock=:iNstocK,unit_price=:uniTpricE,product_image=:producTimagE,seller=:selleR,seller_contact=:selleRcontacT,
                                product_details=:producTdetailS,product_specification=:producTspecificatioN,created_at=:datEtimE,category=:categorY 
                            WHERE id=:id ");

        /* bind the values before executing */
        $this->db->bind(':id', $id);
        $this->db->bind(':producTnamE', $data['product_name']);
        $this->db->bind(':branD', $data['brand']);
        $this->db->bind(':iNstocK', $data['in_stock']);
        $this->db->bind(':uniTpricE', $data['unit_price']);
        $this->db->bind(':producTimagE', $data['product_image']);
        $this->db->bind(':selleR', $data['seller']);
        $this->db->bind(':selleRcontacT', $data['seller_contact']);
        $this->db->bind(':producTdetailS', $data['product_details']);
        $this->db->bind(':producTdetailS', $data['product_details']);
        $this->db->bind(':producTspecificatioN', $data['product_specification']);
        $this->db->bind(':categorY', $data['category']);
        $this->db->bind(':datEtimE', $data['dateTime']);

        $this->db->execute();
    }


    /* public function display Products */
    public function displayProducts($table = 'products')
    {

        $this->db->query("SELECT * FROM {$table}");
        return $this->db->resultset();
    }


    /* public function display Products WITH LIMIT */
    public function displayProductsLimit($table = 'products', $limit)
    {

        $this->db->query("SELECT * FROM {$table} LIMIT {$limit}");
        return $this->db->resultset();
    }

    /* display single product */
    public function displaySingleProduct($table = 'products', $id)
    {

        $this->db->query("SELECT * FROM {$table} WHERE id = :id ");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }


    public function displayProductincategory($table = 'products', $category)
    {

        $this->db->query("SELECT * FROM {$table} WHERE category = :category ");
        $this->db->bind(':category', $category);
        return $this->db->resultset();
    }

    /* Delete product */

    public function DeleteProduct($table, $id)
    {
        $this->db->query("DELETE FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function SearchProduct($search)
    {
        $this->db->query("SELECT * FROM products WHERE product_name LIKE :searcH
                            OR brand LIKE :searcH 
                            OR category LIKE :searcH
                            OR seller LIKE :searcH");
        $this->db->bind(':searcH', '%' . $search . '%');
        return $this->db->resultset();
    }
}
