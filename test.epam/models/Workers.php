<?php

include 'models/DataBase.php';

class Workers
{
    private $coefficient = 0.15;

    public function getWorkers($order = null, $sort = null)
    {
        $db = DataBase::getDB();

        $query = "SELECT w.`id` AS id, w.`first_name` AS fname, w.`last_name` AS lname, d.`name` AS dname, pp.`quantity`, p.`name`, p.`price` FROM `workers` AS w LEFT JOIN `departments` AS d ON w.`id_deparment` = d.`id` LEFT JOIN                 `products_produced` AS pp ON pp.`id_worker` = w.`id` LEFT JOIN `products` AS p ON pp.`id_product` = p.`id`";
        if (isset($order) && !empty($order)) {
            $query .= " ORDER BY `$order`";
        }
        if (isset($sort) && !empty($sort)) {
            $query .= " $sort";
        }
        return $db->select($query);
    }

    public function getWorker($id)
    {
        $db = DataBase::getDB();

        $query = "SELECT w.`id` AS id_worker, w.`first_name` AS fname, w.`last_name` AS lname, d.`name` AS dname, pp.`quantity`, p.`name`, p.`price`, p.`id` AS id_product FROM `workers` AS w LEFT JOIN `departments` AS d ON w.`id_deparment` = d.`id` LEFT JOIN                 `products_produced` AS pp ON pp.`id_worker` = w.`id` LEFT JOIN `products` AS p ON pp.`id_product` = p.`id` WHERE w.`id` = " . $id;
        return $db->selectRow($query);
    }

    public function setQuantity($data)
    {
        $db = DataBase::getDB();

        $query = "UPDATE `products_produced` SET `quantity`= " . $data['quantity'] . " WHERE `id_product`= " . $data['id_product'] . " AND `id_worker`= " . $data['id_worker'];
        return $db->query($query);
    }

    public function getDepartments()
    {
        $db = DataBase::getDB();

        $query = "SELECT * FROM `departments`";
        return $db->select($query);
    }

    public function setWorker($data)
    {
        $db = DataBase::getDB();
        $query = "INSERT INTO `workers`(`first_name`, `last_name`, `id_deparment`) VALUES ('" . $data['fname'] . "','" . $data['lname'] . "','" . $data['id_department'] . "')";
        return $db->query($query);
    }

    public function setProductForWorker($data, $id_worker)
    {
        $db = DataBase::getDB();

        $query = "INSERT INTO `products_produced`(`id_product`, `id_worker`) VALUES ('" . $this->getProductForDepartment($data['id_department']) . "','" . $id_worker . "')";
        return $db->query($query);
    }

    public function getProductForDepartment($id)
    {
        $db = DataBase::getDB();

        $query = "SELECT `id` FROM `products` WHERE `id_deparment` = ".$id;
        return $db->selectRow($query)['id'];
    }

    public function deleteWorker($id){
        $db = DataBase::getDB();

        $query = "DELETE FROM `products_produced` WHERE `id_worker` = " . $id;
        $db->query($query);

        $query = "DELETE FROM `workers` WHERE `id` = " . $id;

        return $db->query($query);
    }

    public function getArraySalary($array, $salary=null){
        $data = [];
        foreach ($array as $key => $value){
            $data[$key]['id'] = $value['id'];
            $data[$key]['fname'] = $value['fname'];
            $data[$key]['lname'] = $value['lname'];
            $data[$key]['dname'] = $value['dname'];
            $data[$key]['quantity'] = $value['quantity'];
            $data[$key]['name'] = $value['name'];
            $data[$key]['price'] = $value['price'];
            $data[$key]['salary'] = $value['price'] * $value['quantity'] * $this->coefficient;
        }
        if (isset($salary) && !empty($salary)) {
            $price = array_column($data, 'salary');
            if($salary == 'sort_desc') {
                array_multisort($price, SORT_DESC, $data);
            } elseif ($salary == 'sort_asc'){
                array_multisort($price, SORT_ASC, $data);
            }
        }
        return $data;
    }
}