<div class="col-sm-4 m-b-20 wdt-pf-cascade-filtering-block filtering-form-block">

    <h4 class="c-black m-b-20">
        <?php _e('Cascade filtering', 'wpdatatables'); ?>
        <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
           title="<?php _e('When turned on, all non-free-input filters (checkbox, selectbox) will narrow down the selection range in other checkboxes and selectboxes.', 'wpdatatables'); ?>"></i>
    </h4>
    <div class="toggle-switch" data-ts-color="blue">
        <label for="wdt-pf-cascade-filtering"
               class="ts-label"><?php _e('Enable cascade filtering', 'wpdatatables'); ?></label>
        <input id="wdt-pf-cascade-filtering" type="checkbox" hidden="hidden">
        <label for="wdt-pf-cascade-filtering" class="ts-helper"></label>
    </div>

</div>