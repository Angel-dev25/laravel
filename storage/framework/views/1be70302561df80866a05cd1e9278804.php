<!DOCTYPE html>
<html>
<head>
    <title>Crear Item</title>
</head>
<body>
    <h1>Registrar alumno</h1>
    <form action="<?php echo e(route('items.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="grupo">Grupo:</label>
        <input type="text" id="grupo" name="grupo" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="<?php echo e(route('items.index')); ?>">Volver</a>
</body>
</html>
<?php /**PATH C:\Users\UTJ-UA-CCD-18\Desktop\CRUD\crudLaravel9\resources\views/items/create.blade.php ENDPATH**/ ?>