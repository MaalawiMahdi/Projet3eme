<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerS5P5W8p\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerS5P5W8p/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerS5P5W8p.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerS5P5W8p\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerS5P5W8p\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'S5P5W8p',
    'container.build_id' => 'bb7b9aaf',
    'container.build_time' => 1616710814,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerS5P5W8p');
