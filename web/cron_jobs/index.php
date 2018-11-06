<?php

include_once 'database.php';
include_once 'mail.php';

$sql = "SELECT user_master.id, user_master.first_name, user_master.last_name, user_master.email, user_master.image,
        user_master.latitude, user_master.longitude, available_time.day_master_id, available_time.start_time,
        available_time.end_time, family_details.care_needed, family_details.care_describe_type,
        family_details.other_task, family_details.carer_child_work FROM user_master
        LEFT JOIN available_time ON user_master.id = available_time.user_id
        LEFT JOIN family_details ON user_master.id = family_details.user_id
        WHERE user_master.status = '1' AND user_master.type_id = '3'
        AND family_details.is_looking_found = 0 AND available_time.status = 1 GROUP BY user_master.id";
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        $partial_sql = "";
        if (isset($row['care_needed']) && $row['care_needed'] != "") {
            $care_needed = explode(",", $row['care_needed']);
            foreach ($care_needed as $k => $v) {
                $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.care_type) > 0)";
            }
        }
        if (isset($row['care_describe_type']) && $row['care_describe_type'] != "") {
            $care_describe_type = explode(",", $row['care_describe_type']);
            foreach ($care_describe_type as $k => $v) {
                if ($v == 1 || $v == 2 || $v == 3) {
                    $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.job_type) > 0)";
                } else if ($v == 4) {
                    $partial_sql .= " AND ((FIND_IN_SET (1, carer_details.job_type) > 0)";
                    $partial_sql .= " OR (FIND_IN_SET (2, carer_details.job_type) > 0)";
                    $partial_sql .= " OR (FIND_IN_SET (3, carer_details.job_type) > 0))";
                }
            }
        }
        if (isset($row['other_task']) && $row['other_task'] != "") {
            $other_task = explode(",", $row['other_task']);
            foreach ($other_task as $k => $v) {
                $partial_sql .= " AND (FIND_IN_SET ($v, carer_details.other_task) > 0)";
            }
        }
        if (isset($row['carer_child_work']) && $row['carer_child_work'] != "") {
            $partial_sql .= " AND carer_details.take_children = " . $row['carer_child_work'] . "";
        }
        $sql1 = "SELECT user_master.id, user_master.first_name, user_master.last_name, user_master.image,
        available_time.day_master_id, available_time.start_time, available_time.end_time, carer_details.description FROM user_master
        LEFT JOIN available_time ON user_master.id = available_time.user_id
        LEFT JOIN carer_details ON user_master.id = carer_details.user_id
        WHERE user_master.status = '1' AND user_master.type_id = '2' AND available_time.status = 1
        AND available_time.day_master_id = " . $row['day_master_id'] . "
        AND available_time.start_time <= '" . $row['start_time'] . "'
        AND available_time.end_time >= '" . $row['end_time'] . "' AND carer_details.is_looking_found = 0
        AND ( 6371 * acos( cos( radians(" . $row['latitude'] . ") ) * cos( radians( user_master.latitude ) ) * 
        cos( radians( user_master.longitude ) - radians(" . $row['longitude'] . ") ) + 
        sin( radians(" . $row['latitude'] . ") ) * sin( radians( user_master.latitude ) ) ) ) <= 60 $partial_sql ORDER BY RAND() LIMIT 5";
        $result1 = mysql_query($sql1);
        if (mysql_num_rows($result1) > 0) {
            if ($row['image'] != "")
                $family_img = HOME_URL . 'uploads/frontend/family_picture/preview/' . $row['image'];
            else
                $family_img = HOME_URL . 'frontend/images/avatar.jpg';
            $carer_html = '';
            while ($row1 = mysql_fetch_assoc($result1)) {
                if ($row1['image'] != "")
                    $carer_img = HOME_URL . 'uploads/frontend/carer_picture/preview/' . $row1['image'];
                else
                    $carer_img = HOME_URL . 'frontend/images/avatar.jpg';
                $carer_html .= '<table border="0" cellpadding="5" cellspacing="0" style="background:#fff; box-shadow:rgba(0, 0, 0, 0.24) 1px 1px 12px; margin-bottom:15px; padding:8px; width:100%">
                                    <tbody>
                                        <tr>
                                            <td><img alt="" src="' . $carer_img . '" style="height:100px; width:100px" /></td>
                                            <td>
                                                <div style="text-align:left; color: #253848; padding-bottom: 10px; font-size: 15px;">' . $row1['first_name'] . ' ' . $row1['last_name'] . '</div>
                                                <div style="text-align:left; color: #666; padding-bottom: 10px; font-size: 12px;">5 Reviews <span style="color:#1ca97f">(3.5)</span></div>
                                                <div style="text-align:left; color: #666; padding-bottom: 10px; font-size: 12px;">' . $row1['description'] . '</div>
                                            </td>
                                            <td><a href="' . HOME_URL . '../search/carerprofile?car_id=' . base64_encode($row1['id']) . '" style="padding:15px 20px;background:#253848;color:#fff;font-size:15px;display: inline-block;width: 80px;text-decoration: none;text-align: center;">View profile</a></td>
                                        </tr>
                                    </tbody>
                                </table>';
            }

            $email_setting = get_email_data('matchmaking', []);
            $email_data = [
                'to' => $row['email'],
                'subject' => $email_setting['subject'],
                'data' => ['message' => $email_setting['body'], 'NAME' => $row['first_name'], 'IMAGE' => $family_img, 'CONTENT' => $carer_html]
            ];
            SendMail($email_data);
            echo $row['email'] . '<br>';
        }
    }
}
?>