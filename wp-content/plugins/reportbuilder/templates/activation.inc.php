<!-- Panel Group -->
<div class="col-sm-6">

    <!-- Panel Heading -->
    <p class="wdt-activation-heading"><?php _e('Report Builder', 'wpdatatables'); ?></p>
    <!-- /Panel Heading -->

    <!-- Panel Body -->
    <div class="panel-body">

        <!-- TMS Store Purchase Code -->
        <div class="col-sm-10 wdt-purchase-code-report">

            <!-- TMS Store Purchase Code Heading-->
            <h4 class="c-black m-b-20">
                <?php _e('Purchase Code', 'wpdatatables'); ?>
                <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
                   title="<?php _e('If your brought the plugin directly on our website, enter TMS Store purchase code to enable auto updates.', 'wpdatatables'); ?>"></i>
            </h4>
            <!-- /TMS Store Purchase Code Heading -->

            <!-- TMS Store Purchase Code Form -->
            <div class="form-group">
                <div class="row">

                    <!-- TMS Store Purchase Code Input -->
                    <div class="col-sm-11">
                        <div class="fg-line">
                            <input type="text" name="wdt-purchase-code-store-report"
                                   id="wdt-purchase-code-store-report"
                                   class="form-control input-sm"
                                   placeholder="<?php _e('Please enter your Report Builder TMS Store Purchase Code', 'wpdatatables'); ?>"
                                   value=""
                            />
                        </div>
                    </div>
                    <!-- TMS Store Purchase Code Input -->

                    <!-- TMS Store Purchase Code Activate Button -->
                    <div class="col-sm-1">
                        <button class="btn btn-primary waves-effect" id="wdt-activate-plugin-report">
                            <?php _e('Activate ', 'wpdatatables'); ?>
                        </button>
                    </div>
                    <!-- /TMS Store Purchase Code Activate Button -->

                </div>
            </div>
            <!-- /TMS Store Purchase Code Form -->

        </div>
        <!-- /TMS Store Purchase Code -->

        <!-- Envato API -->
        <div class="col-sm-10 wdt-envato-activation wdt-envato-activation-report">

            <!-- Envato API Heading-->
            <h4 class="c-black m-b-20">
                <?php _e('Envato API', 'wpdatatables'); ?>
                <i class="zmdi zmdi-help-outline" data-toggle="tooltip" data-placement="right"
                   title="<?php _e('If you brought the plugin on the Envato (CodeCanyon) activate the plugin using Envato API to enable auto updates.', 'wpdatatables'); ?>"></i>
            </h4>
            <!-- /Envato API Heading -->

            <!-- Envato API Form -->
            <div class="form-group">
                <div class="row">

                    <!-- Envato API Button -->
                    <button class="btn btn-primary waves-effect wdt-envato-activation-button"
                            id="wdt-envato-activation-report">
                        <img src="<?php echo WDT_ASSETS_PATH ?>img/envato.svg"
                             class="wdt-envato-activation-logo"
                        >
                        <span>
                                    <?php _e('Activate with Envato', 'wpdatatables'); ?>
                                </span>
                    </button>
                    <!-- /Envato API Button -->

                    <button class="btn btn-danger waves-effect wdt-envato-deactivation-button"
                            style="display: none;" id="wdt-envato-deactivation-report">
                        <?php _e('Deactivate ', 'wpdatatables'); ?>
                    </button>

                </div>
            </div>
            <!-- /Envato API Form -->

        </div>
        <!-- /Envato API -->

    </div>
    <!-- /Panel Body -->

</div>
<!-- /Panel Group -->
