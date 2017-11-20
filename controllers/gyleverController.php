<?php
/**
 * Created by PhpStorm.
 * User: Kiril
 * Date: 20.11.2017
 * Time: 19:44
 */

class gyleverController extends Controller
{
    public function index(){
        $gyleverController = $this->model->load();
        $this->setResponce($gyleverController);
    }

    public function view($data){
        $gyleverController = $this->model->load($data['id']); // просим у модели конкретную запись
        $this->setResponce($gyleverController);
    }

    public function add(){
        $_POST=json_decode(file_get_contents('php://input'), true);

        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['image']) && isset($_POST['power']) && isset($_POST['speed'])){

            $dataToSave = array('id'=>$_POST['id'], 'name'=>$_POST['name'],
                                'image'=>$_POST['image'], 'power'=>$_POST['power'],
                                'speed'=>$_POST['speed']);
            $saveItem = $this->model->create($dataToSave);
            $this->setResponce($saveItem);

        }

    }

    public function edit($id){
        $_PUT =json_decode(file_get_contents('php://input'), true);

        if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['image']) && isset($_POST['power']) && isset($_POST['speed'])){

            $dataToUpdate=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'],
                                'image'=>$_PUT['image'], 'power'=>$_PUT['power'],
                                'speed'=>$_PUT['speed']);
            $updatedItem=$this->model->save($id, $dataToUpdate);
            $this->setResponce($updatedItem);

        }
    }

    public function delete($id){
        $deleteItem = $this->model->delete($id);
        $this->setResponce($deleteItem);
    }

}