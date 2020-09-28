<?php

$name = $request->query->get('name', 'world');
?>

Hello <?= htmlspecialchars($name, ENT_QUOTES) ?>