<?php

require_once 'Fw/init.php';


if (!defined("ACCESS")) {
    die("Доступ закрыт");
}
$application->getPager()->setProperty("title", "История проекта");
$application->getPager()->setProperty("h1", "История проекта создания фреймворка");
$application->getPager()->setProperty("header", "Фреймворк");
$application->getPager()->addJs("https://www.google-analytics.com/analytics.js");
$application->getPager()->addCss("assets/style.css");
$application->getPager()->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
$application->header();

?>

    <h1><?php echo "#FW_PAGE_PROPERTY_h1#" ?></h1>
    <h2>28.11.2022</h2>
    <ol> Работа на первым этапом:
        <li>Создал гит-репазиторий</li>
        <li>Создал структуру файлов</li>
        <li>Сделал роутинг</li>
        <li>Создал класс Application</li>
        <li>Создал класс Config</li>
    </ol>
    <h2>29.11.2022-05.12.2022</h2>
    <ol> Работа на вторым этапом:
        <li>Создал класс Multiton для хранения объекта в одном экземпляре</li>
        <li>Добавил константы подключения ядра</li>
        <li>Создал структуру шаблонов</li>
        <li>Доработал класс Application</li>
        <li>Создал класс Page</li>
        <li>Добавил инициализацию класса Page в $pager в конструктор Application</li>
        <li>Создал страницу истории проекта</li>
    </ol>
<?php
$application->footer();