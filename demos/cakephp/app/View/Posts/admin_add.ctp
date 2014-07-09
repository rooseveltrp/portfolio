<div class="posts form">

    <?php echo $this->Form->create('Post', array("role" => "form")); ?>
    <?php echo $this->Form->input('id', array("class" => "form-control")); ?>

    <div class="form-group">
        <?php echo $this->Form->input('user_id', array("class" => "form-control")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('title', array("class" => "form-control", "placeholder" => "Enter post title here...")); ?>
    </div>

    <div class="form-group">
        <?php echo $this->Form->input('contents', array("class" => "form-control", "placeholder" => "Begin writing your post here...")); ?>
    </div>

    <?php

    echo $this->Form->end(array(
        "label" => "Save",
        "class" => "btn btn-default"
    ));

    ?>
</div>