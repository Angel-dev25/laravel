
<!DOCTYPE html>
<html>
<head>
    <title>Editar Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #333;
            text-decoration: none;
        }
        a:hover {
            color: #4CAF50;
        }
        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        Nombre: <input type="text" name="nombre" value="<?php echo e($student->nombre); ?>"><br>
        Apellido: <input type="text" name="apellido" value="<?php echo e($student->apellido); ?>"><br>
        Código: <input type="text" name="codigo" value="<?php echo e($student->codigo); ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\CRUD\CRUD\crudLaravel9\resources\views/students/edit.blade.php ENDPATH**/ ?>