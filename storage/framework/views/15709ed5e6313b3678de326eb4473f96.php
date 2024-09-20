<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        button {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Alumnos UTJ</h1>
    <a href="<?php echo e(route('items.create')); ?>">Registrar a un nuevo alumno</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Grupo</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['codigo']); ?></td>
                <td><?php echo e($item['nombre']); ?></td>
                <td><?php echo e($item['grupo']); ?></td>
                <td>
                    <a href="<?php echo e(route('items.edit', $item['id'])); ?>">Editar</a>
                    <form action="<?php echo e(route('items.destroy', $item['id'])); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>

<?php /**PATH C:\Users\UTJ-UA-CCD-18\Desktop\CRUD\crudLaravel9\resources\views/items/index.blade.php ENDPATH**/ ?>