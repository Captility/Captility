<div class="col-md-1 column">

</div>

<div class="col-md-8 column content-pane">
    <?php echo $this->Session->flash(); ?>

    <div class="lectures index">

        <div class="row">

            <div class="col-md-12">
                <table cellpadding="0" cellspacing="0" class="table table-striped">
                    <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('lecture_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('number'); ?></th>
                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                        <th><?php echo $this->Paginator->sort('semester'); ?></th>
                        <th><?php echo $this->Paginator->sort('type'); ?></th>
                        <th><?php echo $this->Paginator->sort('comment'); ?></th>
                        <th><?php echo $this->Paginator->sort('start'); ?></th>
                        <th><?php echo $this->Paginator->sort('end'); ?></th>
                        <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                        <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                        <th><?php echo $this->Paginator->sort('host_id'); ?></th>
                        <th class="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lectures as $lecture): ?>
                        <tr>
                            <td><?php echo h($lecture['Lecture']['lecture_id']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['number']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['name']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['semester']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['type']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['comment']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['start']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['end']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['created']); ?>&nbsp;</td>
                            <td><?php echo h($lecture['Lecture']['modified']); ?>&nbsp;</td>
                            <td>
                                <?php echo $this->Html->link($lecture['User']['username'], array('controller' => 'users', 'action' => 'view', $lecture['User']['user_id'])); ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link($lecture['Host']['surname'], array('controller' => 'hosts', 'action' => 'view', $lecture['Host']['host_id'])); ?>
                            </td>
                            <td class="actions">
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
                                <?php echo $this->Html->link('<span class="glyphicon el-icon-file-edit"></span>', array('action' => 'edit', $lecture['Lecture']['lecture_id']), array('escape' => false)); ?>
                                <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $lecture['Lecture']['lecture_id']), array('escape' => false), __('Are you sure you want to delete # %s?', $lecture['Lecture']['lecture_id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

                <p>
                    <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
                </p>

                <?php
                $params = $this->Paginator->params();
                if ($params['pageCount'] > 1) {
                    ?>
                    <ul class="pagination pagination-sm">
                        <?php
                        echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
                        echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
                        echo $this->Paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
                        ?>
                    </ul>
                <?php } ?>

            </div>
            <!-- end col md 12 -->
        </div>
        <!-- end row -->


    </div>
    <!-- end containing of content -->

</div>