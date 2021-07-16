<?php

session_start();
session_unset();

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$password = $_POST['password'];

$inputValues = [
    'fullName' => $fullName,
    'email'    => $email,
    'password' => $password,
];

validateInputValues($inputValues);

$filteredValues = filterInputValues($inputValues);

$pdo = new PDO('mysql:dbname=otus;user=otus;password=otus;host=otus-mysql');
$statement = $pdo->prepare('INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)');
$statement->execute([$fullName, $email, $password]);

$_SESSION['success'] = true;
header('Location: /');
exit;

function filterInputValues(array $inputValues): array
{
    $filteredValues = [];

    foreach ($inputValues as $key => $value) {
        $trimmedValue = trim($value); // Удаляет пробелы из начала и конца строки
        $filteredValue = strip_tags($trimmedValue); // Удаляет HTML и PHP теги

        $filteredValues[$key] = $filteredValue;
    }

    return $filteredValues;
}

function validateInputValues(array $values): void
{
    $errors = [];

    foreach ($values as $key => $value) {
        if (isEmpty($value)) {
            $errors[$key][] = 'Field should\'t be empty';
        }

        if (!isLongerThan($value, 6)) {
            $errors[$key][] = 'Field value should be longer than 6 symbols';
        }
    }

    if (!isEmail($values['email'])) {
        $errors['email'][] = 'Field value should be correct email address';
    }

    if (!isSafePassword($values['password'])) {
        $errors['password'][] = 'Password should contain numbers';
    }

    if (!empty($errors)) {
        redirectBackWithErrors($errors);
    }
}

function isEmpty(string $value): bool
{
    return $value === null || $value === '';
}

function isLongerThan(string $value, int $minLength): bool
{
    return strlen($value) >= $minLength;
}

function isEmail(string $value): bool
{
    return str_contains($value, '@');
}

function isSafePassword(string $value): bool
{
    return preg_match('~\d+~', $value);
}

function redirectBackWithErrors(array $errors): void
{
    $_SESSION['errors'] = $errors;
    header('Location: /');
    exit;
}