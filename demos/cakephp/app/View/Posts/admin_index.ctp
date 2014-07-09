<div style="margin-bottom: 10px;">
    <a href="<?php echo Router::url(array("admin" => true, 'action' => 'add')); ?>">
        <button class="btn btn-primary" type="button">New Post</button>
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                <?php echo $this->Paginator->sort('id'); ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('title'); ?>
            </th>
            <th>
                <?php echo $this->Paginator->sort('user_id'); ?>
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td>
                    <?php echo $post['Post']['id']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link(__(h($post['Post']['title'])), array('action' => 'view', $post['Post']['id'])); ?>
                </td>
                <td>
                    <?php echo $post['User']['fullName']; ?>
                </td>
                <td>
                    <?php echo $this->Html->link(__('Edit'), array("admin" => true, 'action' => 'edit', $post['Post']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Form->postLink(__('Delete'), array("admin" => true, 'action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
<!-- /.table-responsive -->

<ul class="pagination">
    <li class="paginate_button previous">
        <?php echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled')); ?>
    </li>
    <li class="paginate_button next">
        <?php echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled')); ?>
    </li>
</ul>