<?php
require_once "C:\wamp64\www\braintree\Database\Database.php";

class Category
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

    //new category
    public function AddCategory($data)
    {
        $this->db->query("INSERT INTO category (title,category_image,category_info) VALUES(:titlE,:categorYimagE,:categorYinfO)");
        /* bind the values before executing */
        $this->db->bind(':titlE', $data['title']);
        $this->db->bind(':categorYimagE', $data['category_image']);
        $this->db->bind(':categorYinfO', $data['category_info']);

        $this->db->execute();
    }


    //show category info
    public function DisplayCategory($table = 'category')
    {

        $this->db->query("SELECT * FROM {$table}");
        return $this->db->resultset();
    }

    public function DisplaySingleCategory($table = 'category', $id)
    {

        $this->db->query("SELECT * FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }
    //Delete cateogory
    public function DeleteCategory($table, $id)
    {
        $this->db->query("DELETE FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
    //Edit Category
    //new category
    public function EditCategory($data, $id)
    {
        $this->db->query("UPDATE category SET title=:titlE,category_image=:categorYimagE,category_info=:categorYinfO WHERE id=:id");
        /* bind the values before executing */
        $this->db->bind(':id', $id);
        $this->db->bind(':titlE', $data['title']);
        $this->db->bind(':categorYimagE', $data['category_image']);
        $this->db->bind(':categorYinfO', $data['category_info']);

        $this->db->execute();
    }
}
