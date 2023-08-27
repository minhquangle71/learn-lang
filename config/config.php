<?php
define('SECRET_KEY', env('APP_NAME', 'SECRET_KEY'));

define('VALIDATE_ERROR', 'Validate error');

define('N1', 'N1');
define('N2', 'N2');
define('N3', 'N3');
define('N4', 'N4');
define('N5', 'N5');

define('LEVELS', [N1, N2, N3, N4, N5]);

define('DATE_TIME_FORMAT', 'Y-m-d H:i:s');
define('DATETIME_FORMAT_RESPONSE', 'Y-m-d');


define('TAG_VOCABULARY', 0);
define('TAG_KANJI', 1);

define('TAG_TYPE', [
    TAG_VOCABULARY => 'Vocabulary',
    TAG_KANJI      => 'Kanji',
]);

define('TOTAL_QUESTION', 20);
define('TOTAL_CORRECT', 'total_correct');
define('TOTAL_WRITING_CORRECT', 'total_writing_correct');

define('PARAM_CURRENT_ID', 'current_id');
define('PARAM_IS_INIT', 'is_init');
define('PARAM_NODE_ID', 'node_id');
define('PARAM_ANSWER', 'answer');
