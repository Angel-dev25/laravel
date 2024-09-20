
<!DOCTYPE html>
<html>
<head>
    <title>Editar Item</title>
</head>
<body>
    <h1>Editar Item</h1>
    <form action="<?php echo e(route('items.update', $item['id'])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="<?php echo e($item['codigo']); ?>" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo e($item['nombre']); ?>" required>
        <br>
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo" value="<?php echo e($item['grupo']); ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="<?php echo e(route('items.index')); ?>">Volver</a>
</body>
</html>
<?php /**PATH C:\Users\UTJ-UA-CCD-18\Desktop\CRUD\crudLaravel9\resources\views/items/edit.blade.php ENDPATH**/ ?>