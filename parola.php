<?php
$newPassword = 'parolaNoua';
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
echo $hashedPassword;
