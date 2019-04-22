<li>
    <img src="<?php echo e($user->gravatar()); ?>" alt="<?php echo e($user->name); ?>" class="gravatar"/>
    <a href="<?php echo e(route('users.show', $user->id )); ?>" class="username"><?php echo e($user->name); ?></a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroy', $user)): ?>
        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('DELETE')); ?>

            <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
        </form>
    <?php endif; ?>
</li>