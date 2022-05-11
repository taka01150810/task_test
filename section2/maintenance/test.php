<?php

//パスワードを記録したファイルの位置
echo __FILE__;
//結果 /Applications/MAMP/htdocs/PHP1/section2/maintenance/test.php

//パスワード(暗号化)
echo(password_hash('password123', PASSWORD_BCRYPT));
//結果 $2y$10$dvGhHQmzYA6VcEnpC06aTOGtOwK72jokdU.MQrqanCBQvOHK/6pg2

