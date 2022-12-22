<?php

require_once 'Fw/init.php';

if (!defined("ACCESS")) {
    die("Доступ закрыт");
}

$pager->addJs("https://www.google-analytics.com/analytics.js");
$pager->addCss("assets/style.css");
$pager->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
$application->header();
$application->includeComponent("content:RenderForm", "default", [
    'additional_class' => 'window--full-form', //доп класс на контейнер формы
    'attr' => ['data-form-id' => 'form-123'],// доп атрибуты
    'method' => 'post',
    'action' => '', //url отправки
    'elements' => [  //список элементов формы
        [
            'type' => 'text',
            'name' => 'login',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Input text',
            'placeholder' => 'Введите текст'
        ],
        [
            'type' => 'text',
            'name' => 'login',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Input text multiple',
            'placeholder' => 'Введите текст',
            'multiple' => true
        ],
        [
            'type' => 'number',
            'name' => 'number',
            'attr' => ['data-id' => '17'],
            'title' => 'Input number',
            'placeholder' => 'Введите число',
        ],
        [
            'type' => 'password',
            'name' => 'password',
            'title' => 'Input password',
            'placeholder' => 'Введите пароль'
        ],
        [
            'type' => 'textarea',
            'name' => 'Textarea',
            'title' => 'Textarea',
            'placeholder' => 'Введите текст'
        ],
        [
            'type' => 'checkbox',
            'name' => 'checkbox',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Checkbox'
        ],
        [
            'type' => 'radio',
            'name' => 'radio',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Radio'
        ],
        [
            'type' => 'select',
            'name' => 'server',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Select',
            'list' => [
                [
                    'title' => 'Select 1',
                    'value' => 'Select 1',
                    'additional_class' => 'mini--option',
                    'attr' => ['data-id' => '188'],
                    'selected' => true
                ],
                [
                    'title' => 'Select 2',
                    'value' => 'Select 2',
                ]
            ]
        ],
        [
            'type' => 'checkbox multiple',
            'name' => 'server',
            'action' => '',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Checkbox multiple',
            'list' => [
                [
                    'type' => 'checkbox',
                    'title' => 'Select 1',
                    'value' => 'Select 1',
                ],
                [
                    'type' => 'checkbox',
                    'title' => 'Select 2',
                    'value' => 'Select 2',
                ],
                [
                    'type' => 'checkbox',
                    'title' => 'Select 3',
                    'value' => 'Select 3',
                ]
            ]
        ],
        [
            'type' => 'select',
            'multiple' => true,
            'size' => '2',
            'name' => 'server',
            'action' => '',
            'additional_class' => 'js-login',
            'attr' => ['data-id' => '17'],
            'title' => 'Select multiple',
            'list' => [
                [
                    'type' => 'checkbox',
                    'title' => 'Select 1',
                    'value' => 'Select 1',
                ],
                [
                    'type' => 'checkbox',
                    'title' => 'Select 2',
                    'value' => 'Select 2',
                ],
                [
                    'type' => 'checkbox',
                    'title' => 'Select 3',
                    'value' => 'Select 3',
                ]
            ]
        ]
    ]
]);

?>
    <div class="body">
        <h1><?php $pager->showProperty('h1'); ?></h1>
        <h2>28.11.2022</h2>
        <ol> Работа на первым этапом:
            <li>Создал гит-репазиторий</li>
            <li>Создал структуру файлов</li>
            <li>Сделал роутинг</li>
            <li>Создал класс Application</li>
            <li>Создал класс Config</li>
        </ol>
        <h2>29.11.2022-06.12.2022</h2>
        <ol> Работа на вторым этапом:
            <li>Создал класс Multiton для хранения объекта в одном экземпляре</li>
            <li>Добавил константы подключения ядра</li>
            <li>Создал структуру шаблонов</li>
            <li>Доработал класс Application</li>
            <li>Создал класс Page</li>
            <li>Добавил инициализацию класса Page в $pager в конструктор Application</li>
            <li>Создал страницу истории проекта</li>
        </ol>
        <h2>07.12.2022-14.12.2022</h2>
        <ol> Работа над третьим этапом:
            <li>Создал класс Dictionary</li>
            <li>Создал класс Request</li>
            <li>Создал класс Server</li>
            <li>Создал класс Session</li>
            <li>Доработал класс Application</li>
            <li>Создал файловую структуру для хранения компонентов, шаблонов</li>
            <li>Создал классы для работы компонентов</li>
            <li>Доработал класс Application</li>
            <li>Доработал класс Page</li>
        </ol>
        <h2>15.12.2022-18.12.2022</h2>
        <ol> Работа над четвертым этапом:
            <li>Поработал над стилями сайта</li>
            <li>Создал компонент со всеми элементами формы</li>
        </ol>
    </div>

<?php
$pager->setProperty("title", "История проекта");
$pager->setProperty("header", "Фреймворк");
$pager->setProperty("h1", "История проекта создания фреймворка");
$application->footer();