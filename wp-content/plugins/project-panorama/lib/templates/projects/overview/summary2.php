<?php
$stats = psp_get_project_quick_stats();

if( $stats ): ?>
    <div id="psp-project-summary-dash">


        <div class="psp-project-summary__stats">
            <?php
            $i = 0;
            foreach( $stats as $key => $stat ):

                if( $stat['total'] == 0 ) continue;
                if( $i %4 == 0 && $i > 1 ) echo '</div><div class="psp-row psp-margin-row">'; ?>

                <div id="<?php echo esc_attr( 'psp-stat-' . $key ); ?>" class="psp-summary-stat">


                    <h3><span><?php echo esc_html( $stat['value'] ); ?></span>/<?php echo esc_html( $stat['total'] ); ?></h3>
                    <h5><?php echo esc_html( $stat['label'] ); ?></h5>
                </div>
            <?php $i++; endforeach; ?>
        </div>

    </div>
<?php endif; ?>
