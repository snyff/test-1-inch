<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en', array (
));

$catalogue->addFallbackCatalogue(new MessageCatalogue('ru', array (
  'validators' => 
  array (
    'This value should be false' => 'Значение должно быть ложным',
    'This value should be true' => 'Значение должно быть истинным',
    'This value should be of type {{ type }}' => 'Тип значения должен быть {{ type }}',
    'This value should be blank' => 'Значение должно быть пустым',
    'The value you selected is not a valid choice' => 'Выбранное Вами значение недопустимо',
    'You must select at least {{ limit }} choices' => 'Вы должны выбрать хотя бы {{ limit }} вариантов',
    'You must select at most {{ limit }} choices' => 'Вы должны выбрать не более чем {{ limit }} вариантов',
    'One or more of the given values is invalid' => 'Одно или несколько заданных значений недопустимо',
    'The fields {{ fields }} were not expected' => 'Поля {{ fields }} не ожидались',
    'The fields {{ fields }} are missing' => 'Поля {{ fields }} отсутствуют',
    'This value is not a valid date' => 'Значение не является правильной датой',
    'This value is not a valid datetime' => 'Значение даты и времени недопустимо',
    'This value is not a valid email address' => 'Значение адреса электронной почты недопустимо',
    'The file could not be found' => 'Файл не может быть найден',
    'The file is not readable' => 'Файл не может быть прочитан',
    'The file is too large ({{ size }}). Allowed maximum size is {{ limit }}' => 'Файл слишком большой ({{ size }}). Максимальный допустимый размер {{ limit }}',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}' => 'MIME-тип файла недопустим ({{ type }}). Допустимы MIME-типы файлов {{ types }}',
    'This value should be {{ limit }} or less' => 'Значение должно быть {{ limit }} или меньше',
    'This value is too long. It should have {{ limit }} characters or less' => 'Значение слишком длинное. Должно быть {{ limit }} символов или меньше',
    'This value should be {{ limit }} or more' => 'Значение должно быть {{ limit }} или больше',
    'This value is too short. It should have {{ limit }} characters or more' => 'Значение слишком короткое. Должно быть {{ limit }} символов или больше',
    'This value should not be blank' => 'Значение не должно быть пустым',
    'This value should not be null' => 'Значение не должно быть null',
    'This value should be null' => 'Значение должно быть null',
    'This value is not valid' => 'Значение недопустимо',
    'This value is not a valid time' => 'Значение времени недопустимо',
    'This value is not a valid URL' => 'Значение URL недопустимо',
    'This form should not contain extra fields' => 'Эта форма не должна содержать дополнительных полей',
    'The uploaded file was too large. Please try to upload a smaller file' => 'Загруженный файл слишком большой. Пожалуйста, попробуйте загрузить файл меньшего размера',
    'The CSRF token is invalid. Please try to resubmit the form' => 'CSRF значение недопустимо. Пожалуйста, попробуйте повторить отправку формы',
    'The two values should be equal' => 'Оба значения должны быть одинаковыми',
    'The file is too large. Allowed maximum size is {{ limit }}' => 'Файл слишком большой. Максимальный допустимый размер {{ limit }}',
    'The file is too large' => 'Файл слишком большой',
    'The file could not be uploaded' => 'Файл не может быть загружен',
    'This value should be a valid number' => 'Значение должно быть числом',
    'This value is not a valid country' => 'Значение не является допустимой страной',
    'This file is not a valid image' => 'Файл не является допустимым форматом изображения',
    'This is not a valid IP address' => 'Значение не является допустимым IP адресом',
    'This value is not a valid language' => 'Значение не является допустимым языком',
    'This value is not a valid locale' => 'Значение не является допустимой локалью',
    'This value is already used' => 'Это значение уже используется',
  ),
  'messages' => 
  array (
    'Symfony2 is great' => 'J\'aime Symfony2',
  ),
)));

return $catalogue;
