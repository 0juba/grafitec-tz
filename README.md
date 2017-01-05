Тестовое задание
===

Задание
---

Написать скрипт, который можно запустить из командной строки, принимающий последовательность символов, разделенных запятой, и определяющий является ли введенная последовательность прогрессией».

Установка
---

* Склонировать репозиторий ```git clone https://github.com/xgubax/grafitec-tz.git```
* Далее в каталоге проекта выполнить ```composer install```

Работа с утилитой
---

Утилита поддерживает только один параметр: ```--seq```

На вход принимается только числовая последовательность. Если имеются пробелы, то последовательность должна быть заключена в кавычки.

На данный момент последовательность проверятся на:
* Арифметическую прогрессию
* Геометрическую прогрессию
* Числа Фибоначчи

**Пример**

```cli/is-progression --seq=1,2,3```
