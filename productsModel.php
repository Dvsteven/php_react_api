<?php

    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli('localhost','root','','api');
        mysqli_set_charset($this->conexion,'utf8');
    }

    public function getProducts(){
        $products=[];
        $sql="SELECT * FROM products";
        $registros = mysql_query($this->conexion,$sql);
        while($row = mysqli_fetch_assoc($reigstros)){
            array_push($products,$row);
        }
        return $products;
    }

    public function saveProducts($name,$description,$price){
        $sql="INSERT INTO products(name,description,price) VALUES ($name,$description,$price)";
        mysqli_query($this->conexion,$sql);
        $resultado=['succes','Producto guardado'];
        return $resultado;
    }

    public function updateProducts($id,$name,$description,$price){
        $sql="UPDATE products SET name='$name' ,description = '$description', price ='$price' WHERE id='$id'";
        $resultado=['succes','Producto actualizado'];
        return $resultado;
    }

    public function deleteProducts($id){
        $sql="DELETE FROM products WHERE id='$id'";
        mysqli_query($this->conexion,$sql);
        $resultado=['succes','Producto Eliminado'];
        return $resultado;
    }
?>