<?php
$objects = ["name"=>"VASYA", "status"=>"NORMAL"];//это вместо БД

/**
* Название (имя) класса: Item
* 
* Полное описание
* 
* @author Ф.И.О. <e-mail>
* @version 1.0
*/
final class Item {
  /**
   * Свойство класса. ИД экземпляра
   * 
   * @var int Целое число
   */
    private $id;
  /**
   * Свойство класса. Имя
   * 
   * @var string Строка
   */
    private $name;
    /**
    * Свойство класса. Статус
    * 
    * @var string Строка
    */
    private $status;
    /**
    * Свойство класса. Статус изменений
    * 
    * @var bool Булево значение
    */
    private $changed;
    /**
    * Свойство класса. сырые данные, которые необходимо хранить до сохраненияв класс
    * 
    * @var array Массив
    */
    private $rawData=["name"=>"", "status"=>""];
    /**
    * Свойство класса. После первого выполнения функции init(), меняется на false. Когда это значение false init не запускается
    * 
    * @var bool Булево значение
    */
    private $initStart= true;
    /**
    * Конструктор функция
    * @param int $id Первый параметр функции
    * @return присваивет свойство экземпляру класса
    */
    public function __construct(int $id) {
        $this->id = $id;        
    }
    /**
    * Основная функция
    * @param array $objects Первый параметр функции. Как-будто бы данные из БД
    * @return присваивет свойства экземпляру класса
    * и переводит переменную initStart в положение false
    */

    private function init($objects){
        if ($this->initStart === true){
            $this->rawData["name"]=$objects["name"];
            $this->rawData["status"]=$objects["status"];
            $this->name=$objects["name"];
            $this->status=$objects["status"];
            $this->initStart = false;
        }
    }
    /**
    * Магические методы
    * Для изменеия свойств класса извне
    */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property) && $property != "id") {
            $this->$property = $value;
        }
    }

    
}


?>