<?php if (isset($items) && (bool)$items): ?>

    <?php foreach($items as $name => $url): ?>

            <div class="panel-body" style="padding: 5px;">
                <div class="panel-group" id="accordion" style="margin: 0px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="load_source" data-source="<?php echo $url; ?>" data-toggle="collapse" data-parent="#accordion"
                                   href="#<?php echo md5($name); ?>"><?php echo $name; ?></a>
                            </h4>
                        </div>
                        <div id="<?php echo md5($name); ?>" class="panel-collapse collapse"
                             style="height: auto;">
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->

    <?php endforeach; ?>

<?php endif; ?>