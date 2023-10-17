
<?php
echo "hello world!";
use Illuminate\Support\Facades\DB;

$users = DB::select('select * from users');

foreach ($users as $user) {
    echo $user->username;
    echo "<br>";
}
$password = bcrypt('12345');
echo $password;
