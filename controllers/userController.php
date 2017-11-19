<?php

class userController extends Controller
{
    public function index(){
        $user = $this->model->load();
        $this->setResponce($user);
    }

    public function view($data){
        $user = $this->model->load($data['id']); // просим у модели конкретную запись
        $this->setResponce($user);
    }

    public function add(){
        $_POST=json_decode(file_get_contents('php://input'), true);

        if(isset($_POST['id']) && (isset($_POST['name'])) && isset($_POST['country']) && isset($_POST['rating'])){

            $dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'country'=>$_POST['country'], 'rating'=>$_POST['rating']);
            $addedItem=$this->model->create($dataToSave);
            $this->setResponce($addedItem);

        }
    }

    public function edit($id){
        $_PUT=json_decode(file_get_contents('php://input'), true);

        if (isset($_PUT['id']) && (isset($_PUT['name'])) && isset($_PUT['country']) && isset($_PUT['rating'])){

            $dataToUpdate=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'country'=>$_PUT['country'], 'rating'=>$_PUT['rating']);
            $updatedItem=$this->model->save($id, $dataToUpdate);
            $this->setResponce($updatedItem);

        }

    }

    public function delete($id){
        $deleteItem = $this->model->delete($id);
        $this->setResponce($deleteItem);
    }

}