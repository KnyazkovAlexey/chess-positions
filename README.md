<p align="center">
    <h1 align="center">Тестовое задание</h1>
    <br>
</p>

<h2>Описание</h2>
<pre>
Создать мини-приложение хранения и демонстрации шахматных позиций.
Окружение: PHP8, MySQL/PostgreSQL.
Приложение должно:
    1. Хранить шахматные позиции в базе данных. Выбор оптимальной структуры хранения является частью задания.
    2. Отображать шахматную позицию, номер которой скрипт получает в качестве параметра. Можно обойтись без графики — использовать символьное/юникодное обозначение фигур. Отображение можно сделать в вебе по ссылке (в браузере) либо в консоли.
    3. Содержать хотя бы один юнит-тест любого компонента по вашему выбору.
Обойтись без php-фреймворков. Структура кода/классов/функций — на ваше усмотрение. Плюсом будет использование MVC-подхода. Скрипт добавления позиций не требуется: можете его сделать для своего удобства либо ограничиться sql-дампом.

Задача не требует нагромождения слоёв и паттернов проектирования. Важно, как в принципе написан и организован код, даже если он простой.
Полноценное шахматное приложение тут не нужно. Просто храним и отображаем расстановку фигур в конкретный момент времени.
Из библиотек что-то по мелочи можно, но в целом лучше обойтись.
</pre>

<h2>Запуск</h2>
<pre>
cp .env.example .env
docker-compose up -d
docker-compose run --rm app composer install
docker-compose run --rm app php index.php --action=generate-positions
docker-compose run --rm app php index.php --action=get-position --id=1
</pre>

<h2>Тесты</h2>
<pre>
docker-compose run --rm app ./vendor/bin/phpunit src/Containers/Positions/Tests
</pre>

<h2>Пояснения</h2>
<pre>
    1. Созданы консольные команды на генерацию позиций и получение позиции по id.
    2. Шахматная позиция представляет собой 32 фигуры с 65 состояниями (фигура либо побита, либо находится на одной из 64 клеток).
       Для хранения выбран CHAR(32), где индекс символа соответствует фигуре (0 - чёрная ладья, 1 - чёрный конь, ..., 31 - белая ладья).
       Состояния закодированы однобайтными символами: 0123456789AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz?!. (0 - первая клетка, ..., ! - последняя клетка, . - фигура побита).
       Например, "0123456789AaBbCcTtUuVvWwXxYyZz?!" - стартовая позиция шахматной партии, "...0.......................!...." - два короля по углам доски.
    3. В коде реализован архитектурный шаблон Porto (облегчённая версия).
    4. Согласовано, что не подвязываемся к партиям и ходам. В реальной жизни поиск позиции вероятно осуществлялся бы по id партии и id хода.
</pre>