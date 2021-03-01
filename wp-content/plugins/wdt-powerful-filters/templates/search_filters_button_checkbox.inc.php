<div class="col-sm-4 m-b-20 wdt-pf-show-search-filters-button-block hidden">

    <h4 class="c-black m-b-20">
        <?php _e('Search button', 'wpdatatables'); ?>
        <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
           title="<?php _e('If this is turned off, table is filtered on-the-fly every time when user changes any of the filters. If turned on, the selected filters are applied only when user clicks the search button.', 'wpdatatables'); ?>"></i>
    </h4>
    <div class="toggle-switch" data-ts-color="blue">
        <label for="wdt-pf-show-search-filters-button"
               class="ts-label"><?php _e('Show search filters button', 'wpdatatables'); ?></label>
        <input id="wdt-pf-show-search-filters-button" type="checkbox" hidden="hidden">
        <label for="wdt-pf-show-search-filters-button" class="ts-helper"></label>
    </div>

</div>