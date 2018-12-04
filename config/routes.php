<?php

return array(
//    ====================== Auth Controller ============================================
    "<car_id:([A-Za-z0-9-=_]+)>/log-a-job" => 'joblog/index',
//    ========================= others ===============
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
);
