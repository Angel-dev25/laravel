<!DOCTYPE html>
<html>
<head>
    <title>Alumnos UTJ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        a:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        th, td {
            text-align: center;
        }
        button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #d32f2f;
        }
        form {
            display: inline;
        }
        @media (max-width: 768px) {
            table, th, td {
                display: block;
                width: 100%;
            }
            th, td {
                text-align: left;
                padding-left: 20px;
            }
        }
    </style>
</head>
<body>
    <h1>Listado de Alumnos</h1>

    <a href="<?php echo e(route('items.create')); ?>">Agregar Nuevo Alumno</a>

    <?php if(count($items) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Código</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item['id']); ?></td>
                        <td><?php echo e($item['nombre']); ?></td>
                        <td><?php echo e($item['apellido']); ?></td>
                        <td><?php echo e($item['codigo']); ?></td>
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
    <?php else: ?>
        <p>No hay alumnos registrados.</p>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\CRUD\CRUD\crudLaravel9\resources\views/alumnos/index.blade.php ENDPATH**/ ?>