<?php $__env->startSection('main-content'); ?>
    <div>
        <div class="float-start">
            <h4 class="pb-3">My Tasks</h4>
        </div>
        <div class="float-end">
            <a href="<?php echo e(route('task.create')); ?>" class="btn btn-info">
               <i class="fa fa-plus-circle"></i> Create Task
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mt-3">
            <h5 class="card-header">
                <?php if($task->status === 'Todo'): ?>
                    <?php echo e($task->title); ?>

                <?php else: ?>
                    <del><?php echo e($task->title); ?></del>
                <?php endif; ?>

                <span class="badge rounded-pill bg-warning text-dark">
                    <?php echo e($task->created_at->diffForHumans()); ?>

                </span>
            </h5>

            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        <?php if($task->status === 'Todo'): ?>
                            <?php echo e($task->description); ?>

                        <?php else: ?>
                            <del><?php echo e($task->description); ?></del>
                        <?php endif; ?>
                        <br>

                        <?php if($task->status === 'Todo'): ?>
                            <span class="badge rounded-pill bg-info text-dark">
                                Todo
                            </span>
                        <?php else: ?>
                            <span class="badge rounded-pill bg-success text-white">
                                Done
                            </span>
                        <?php endif; ?>


                        <small>Last Updated - <?php echo e($task->updated_at->diffForHumans()); ?> </small>
                    </div>
                    <div class="float-end">
                        <a href="<?php echo e(route('task.edit', $task->id)); ?>" class="btn btn-success">
                           <i class="fa fa-edit"></i>
                        </a>

                        <form action="<?php echo e(route('task.destroy', $task->id)); ?>" style="display: inline" method="POST" onsubmit="return confirm('Are you sure to delete ?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if(count($tasks) === 0): ?>
        <div class="alert alert-danger p-2">
            No Task Found. Please Create one task
            <br>
            <br>
            <a href="<?php echo e(route('task.create')); ?>" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Create Task
             </a>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\todosimple\resources\views/index.blade.php ENDPATH**/ ?>