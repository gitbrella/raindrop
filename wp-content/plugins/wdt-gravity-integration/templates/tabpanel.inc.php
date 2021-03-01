<!-- Gravity Form settings -->
<div role="tabpanel" class="tab-pane" id="gravity-settings">
    <!-- .row -->
    <div class="row">
        <!-- Filter by status -->
        <div class="col-sm-4 m-b-20 wdt-gf-toggle-deleted-records-block">
            <h4 class="c-black m-b-20">
                <?php _e('Filter by status', 'wpdatatables'); ?>
                <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
                   title="<?php _e('Enable this to show records in wpDataTable that are deleted from the Gravity Form', 'wpdatatables'); ?>"></i>
            </h4>
            <div class="toggle-switch" data-ts-color="blue">
                <label for="wdt-gf-toggle-deleted-records"
                       class="ts-label"><?php _e('Show form deleted records', 'wpdatatables'); ?></label>
                <input id="wdt-gf-toggle-deleted-records" type="checkbox" hidden="hidden">
                <label for="wdt-gf-toggle-deleted-records" class="ts-helper"></label>
            </div>
        </div>
        <!-- /Filter by status -->
        <!-- Filter by user -->
        <div class="col-sm-4 m-b-20 wdt-gf-toggle-current-user-block">
            <h4 class="c-black m-b-20">
                <?php _e('Filter by user', 'wpdatatables'); ?>
                <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
                   title="<?php _e('Enable this to show records in wpDataTable that are created by current user', 'wpdatatables'); ?>"></i>
            </h4>
            <div class="toggle-switch" data-ts-color="blue">
                <label for="wdt-gf-toggle-current-user"
                       class="ts-label"><?php _e('Show user only their own entries', 'wpdatatables'); ?></label>
                <input id="wdt-gf-toggle-current-user" type="checkbox" hidden="hidden">
                <label for="wdt-gf-toggle-current-user" class="ts-helper"></label>
            </div>
        </div>
        <!-- /Filter by user -->
    </div>
    <!-- /.row -->
    <!-- .row -->
    <div class="row">
        <!-- Filter by date range -->
        <div class="col-sm-12 m-b-20 wdt-gf-filter-by-date-range-block">
            <h4 class="c-black m-b-20">
                <?php _e('Filter by date', 'wpdatatables'); ?>
                <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
                   title="<?php _e('Chose date filter logic if you want to filter form entries by date', 'wpdatatables'); ?>"></i>
            </h4>
            <div class="row">
                <div class='col-md-4 wdt-gf-date-filter-logic-block'>
                    <div class="form-group">
                        <div class="fg-line">
                            <div class="select">
                                <select class="selectpicker" id="wdt-gf-date-filter-logic">
                                    <option value=""><?php _e('Select date filter logic', 'wpdatatables'); ?></option>
                                    <option value="range"><?php _e('Filter by date range', 'wpdatatables'); ?></option>
                                    <option value="last"><?php _e('Filter by last X time period', 'wpdatatables'); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 hidden wdt-gf-date-range-block">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="date">
                                <input class="form-control wdt-datetimepicker" id="wdt-gf-date-filter-from" placeholder="From"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="date">
                                <input class="form-control wdt-datetimepicker" id="wdt-gf-date-filter-to" placeholder="To"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden wdt-gf-last-x-block">
                    <div class="col-md-6">
                        <div class="fg-line">
                            <input type="number" class="form-control input-sm" id="wdt-gf-date-filter-time-units"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="fg-line">
                                <div class="select">
                                    <select class="selectpicker" id="wdt-gf-date-filter-time-period">
                                        <option value="days"><?php _e('Day(s)', 'wpdatatables'); ?></option>
                                        <option value="weeks"><?php _e('Week(s)', 'wpdatatables'); ?></option>
                                        <option value="months"><?php _e('Month(s)', 'wpdatatables'); ?></option>
                                        <option value="years"><?php _e('Year(s)', 'wpdatatables'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Filter by date range -->
    </div>
    <!-- /.row -->
</div>
<!-- /Gravity Form settings -->