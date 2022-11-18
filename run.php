<?php

require __DIR__ . '/SuSu/Platform/MODatabase.php';

use SuSu\Platform\MODatabase;

$MODatabase = new MODatabase;

$MODatabase->loadDatabase(__DIR__ . '/database/demo.json');

$MODatabase->table('users');
$MODatabase->data();

?>

<pre>
    <?php
    print_r($MODatabase->first());
    ?>
</pre>