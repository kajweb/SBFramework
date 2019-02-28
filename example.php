<?php
include 'functionWithFramework.php';
include __LIB__ . '/phpqrcode/qrlib.php';

echo "<p>This is example without SBF Framework.</p>".
	 "<p>But it can use framework functions</p>".
	 "<p>Now time is : ".getDateTime()."</p>";