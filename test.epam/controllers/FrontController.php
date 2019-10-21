<?php

include 'Models\Workers.php';

class FrontController
{
    public function route($route, $id_worker, $order, $sort, $salary)
    {
        switch ($route) {
            case 'all_workers':
                $workers = new Workers();
                $table = $workers->getArraySalary($workers->getWorkers($order, $sort), $salary);
                include "views/all_workers.php";
                break;
            case 'edit':
                $workers = new Workers();
                $data = $workers->getWorker($id_worker);
                include "views/edit.php";
                break;
            case 'create':
                $workers = new Workers();
                $departments = $workers->getDepartments();
                include "views/create.php";
                break;
            case 'delete':
                $workers = new Workers();
                $data = $workers->deleteWorker($id_worker);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                break;
            default :
                include "views/home.php";
                break;
        }
    }

    public function save($data)
    {
        $worker = new Workers();
        $worker->setQuantity($data);
    }

    public function create($data)
    {
        $worker = new Workers();
        $id_worker = $worker->setWorker($data);
        $worker->setProductForWorker($data, $id_worker);
    }
}