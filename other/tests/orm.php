<?php

abstract class Model {

    // мы считаем, что это свойство должно быть у любой модели
    // в какой таблице в базе у нас эта модель
    // свойство объявлено статическим, принадлежит классу а не объектам этого класса
    static protected $table='123';

    // статический метод возвращает название таблицы
    static function getTableName() {

        // ключевое слово self и :: для доступа к классу - свойствам и методам
        return self::$table;
    }
}

class News extends Model {
    static protected $table = 'news';
}
echo News::getTableName();

// выводит 123