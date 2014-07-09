<div class="users form">

    <?php echo $this->Form->create('User', array("role" => "form")); ?>
    <?php echo $this->Form->input('id', array("class" => "form-control")); ?>

    <div class="form-group">

    </div>

    <div class="form-group">
        <label>Administrator?</label>
        <div>
            <?php

            $options = array(
                1 => "Yes",
                0 => "No"
            );

            $attributes = array(
                "legend" => false,
                "style" => "margin: 10px;"
            );

            echo $this->Form->radio('admin', $options, $attributes);

            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('first_name', array("class" => "form-control", "placeholder" => "First Name...")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('last_name', array("class" => "form-control", "placeholder" => "Last Name...")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('email_address', array("class" => "form-control", "placeholder" => "E-mail address...")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->password('edit_password', array("class" => "form-control")); ?>
    </div>

    <?php

    echo $this->Form->end(array(
        "label" => "Save",
        "class" => "btn btn-default"
    ));

    ?>
</div>