<?php
const ERROR_REQUIRED = "champ obligatoire";
const ERROR_LENGTH = "6-8 caracteres";
const ERROR_EMAIL = "email invalide";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_POST = filter_input_array(INPUT_POST, [
    'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
  ]);
  $firstname = $_POST['prenom'] ?? '';
  $email = $_POST['email'] ?? '';

  if (!$firstname) {
    $errors['prenom'] = ERROR_REQUIRED;
  } elseif (mb_strlen($firstname) < 6 || mb_strlen($firstname) > 8) {
    $errors['prenom'] = ERROR_LENGTH;
  }
  if (!$email) {
    $errors['email'] = ERROR_REQUIRED;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = ERROR_EMAIL;
  }
}
?>


<form action="" method="POST">
  <div>
    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom" value=<?= $firstname ?? '' ?>>
    <?= $errors['prenom'] ? '<p style="color:red">' . $errors['prenom'] . '</p>' : "" ?>
  </div>
  <div>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" value=<?= $email ?? '' ?>>
    <?= $errors['email'] ? '<p style="color:red">' . $errors['email'] . '</p>' : "" ?>
  </div>
  <button type="submit">Submit</button>
</form>
