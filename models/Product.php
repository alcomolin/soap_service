<?php

class Product extends Init
{
    public function Get_products()
    {
        $connect = parent::connection();
        parent::set_names();
        
        $sql = "SELECT * FROM products";
        $stm = $connect->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return json_encode($result);
    }

    public function Insert_product($name,$des,$price,$stock)
    {
        $connect = parent::connection();
        parent::set_names();

        $sql = "INSERT INTO products (name, description, price, stock) VALUES (?,?,?,?)";
        $stm = $connect->prepare($sql);
        $stm->bindValue(1, $name);
        $stm->bindValue(2, $des);
        $stm->bindValue(3, $price);
        $stm->bindValue(4, $stock);
        $stm->execute();
    }

    public function Edit_product($name,$des,$price,$stock,$id)
    {
        $connect = parent::connection();
        parent::set_names();
        
        $sql = "UPDATE products SET name=?, description=?, price=?, stock=? WHERE id=?";
        $stm = $connect->prepare($sql);
        $stm->bindValue(1, $name);
        $stm->bindValue(2, $des);
        $stm->bindValue(3, $price);
        $stm->bindValue(4, $stock);
        $stm->bindValue(5, $id);
        $stm->execute();
    }

    public function Delete_product($id)
    {
        $connect = parent::connection();
        parent::set_names();
        
        $sql = "DELETE FROM products WHERE id=?";
        $stm = $connect->prepare($sql);
        $stm->bindValue(1, $id);
        $stm->execute();
    }

    public function Multiplicar($num_1,$num_2)
    {
        return  ($num_1 * $num_2);
    }
}
