<?php

define('WEB_NAME', 'Learn Lang');
define('FRONT_TITLE', 'Learn Lang');

define('DEFAULT_LANGE', 'jp');
define('DEFAULT_SORT_ORDER', 'ASC');
define('DEFAULT_SORT_BY', 'id');

// RESPONSE FLAG
define('SUCCESS_FLAG', 'success-flag');
define('FAIL_FLAG', 'fail-flag');

// MESSAGE LESSON RESPONSE
define('MSG_SAVE_LESSON_SUCCESS', 'Save lesson success');
define('MSG_SAVE_LESSON_FAIL', 'Save lesson fail');
define('MSG_NOT_FOUND_LESSON', 'Lesson not found');

// MESSAGE VOCABULARY RESPONSE
define('MSG_SAVE_VOCABULARY_SUCCESS', 'Save vocabulary succeess');
define('MSG_SAVE_VOCABULARY_FAIL', 'Save vocabulary fail');


define('LANGUAGE_OPTIONS', [
    'jp'  => 'Japanese',
    'eng' => 'English'
]);


define('DEFAULT_LIMIT_PAGINATE', 10);

define('OPTION_ANSWER', ['A', 'B', 'C', 'D']);


define('TOTAL_QUESTION', 30);
define('QUESTION_TRANSLATE', 1);
define('QUESTION_PREVERVE_TRANSLATE', 2);
define('QUESTION_TYPE', [
    QUESTION_TRANSLATE,
    QUESTION_PREVERVE_TRANSLATE
]);

define('SUCCESS_ID', 'success_id');
define('INIT_QA_IDX', 0);
define('FAIL_QA_IDX', -1);
define('SESSIOM_QA', 'session_qa');
