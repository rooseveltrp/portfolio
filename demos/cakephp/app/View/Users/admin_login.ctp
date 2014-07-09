<div class="users form">

    <?php echo $this->Form->create('User', array("role" => "form", "action" => "login")); ?>
    <?php echo $this->Form->input('id', array("class" => "form-control")); ?>

    <div class="form-group">
        <?php echo $this->Form->input('username', array("class" => "form-control", "placeholder" => "Username...")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('password', array("class" => "form-control")); ?>
    </div>

    <?php

    echo $this->Form->end(array(
        "label" => "Log-in",
        "class" => "btn btn-default"
    ));

    ?>
</div>

<div class="col-lg-12">
    <div class="col-lg-2">
        <div class="panel-body">
            <h4>Sample Admin User</h4>
            <blockquote>
                <p>
                    Username<br />admin
                </p>
                <p>
                    Password<br />12345
                </p>
            </blockquote>
        </div>
    </div>
</div>