<?php
/**
 * App\src\Template\Webadmin\Elemet\Flash\success.ctp
 * Don't Remove this signature if you love code 
 * Code For Easy
 * =================================================================
 * Author   : Ardiansyah Iqbal
 * Email    : aiqbalsyah@gmail.com
 * Github   : aiqbalsyah
 */
?>
<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="m-alert m-alert--icon m-alert--icon-solid  alert alert-info alert-dismissible fade show" role="alert">
    <div class="m-alert__icon">
        <i class="la 	la-check-circle-o"></i>
        <span></span>
    </div>
    <div class="m-alert__text">
        <strong>
            <?=$message;?>
        </strong>
    </div>
    <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
</div>