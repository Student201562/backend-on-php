<?php
class menuController extends Controller
{
    public function index(){
        $menu=$this->model->load();		// просим у модели все записи
        $this->setResponce($menu);		// возвращаем ответ
    }
}