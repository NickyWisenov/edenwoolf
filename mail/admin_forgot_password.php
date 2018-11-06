<?php

use yii\helpers\Url;
use yii\helpers\Html;
?> 
<div class='movableContent'>
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
        <tr>
            <td width="100">&nbsp;</td>
            <td width="400" align="center">
                <div class="contentEditableContainer contentTextEditable">
                    <div class="contentEditable" align='left' >
                        <?= $message; ?>
                    </div>
                </div>
            </td>
            <td width="100">&nbsp;</td>
        </tr>
    </table>
</div>