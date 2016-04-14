<?php

class Storage
    implements Countable
{
    protected $data;

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function count()
    {
        return count($this->data);
    }
}

/*
 Что хотим от этого класса:
- чтобы мы могли задавать на ходу любые свойства этого класса
- чтобы особенности реализации этого были скрыты внутри нашего класса

 * */
$obj = new Storage();
$obj->foo = '123';
$obj->bar = '456';
$obj->baz = [1, 2, 3];

assert ('123' == $obj->foo); // автоматический тест

/*
- хотим, чтобы наш класс вёл себя наподобие массива
- хотим, чтобы его можно было посчитать с помощью обычной функции count()
- и этот подсчет должен выдавать то количетво свойств, которое мы раньше установили
*/

assert(3 == count($obj)); // пройден

/*
- ожидаю, что я смогу по объекту этого класса как по массиву пройтись с помощью foreach
чтобы названия свойств стали ключами, а значениями - то, что я туда записал
пишем для проверки этого такой визуальный тест
 * */

foreach ($obj as $key => $val) {
    echo $key . ' = ' . $val;
    echo '<br />';
}

/*
Полезно сразу писать тесты для своих классов.
Пишите в  тестах ожидаемое поведение вашего класса.
Есть такой специальный паттерн
архитектурный
test driven development = TDD
паттерн говотрит о том, что
- сначала надо писать тесты
- а потом тот код, который будет эти тесты проходить
потому что тесты, которые вы пишете -
вы по сути записываете требования к своему коду

в реальной веб разработке разработка всегда идёт от требований
прибегает внутренний заказчик и формирует требование в стиле таком
я хочу, чтобы эта кнопка была зелёной для русскоязычных пользователей,
для англоязычных должна быть красной

и было бы неплохо сразу для этого писать тесты, а потом код, который будет тесты проходить

для таких тестов есть куча инструментов
- phpUnit
- инструменты для тестирования в браузере
(найти такую-то страницу, найти какой-то элемент, убедиться что у него тест красный
это функциональное тестирование)

 * */