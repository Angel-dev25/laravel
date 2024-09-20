<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    private $filePath;

    public function __construct()
    {
        // Define the path to the JSON file
        $this->filePath = storage_path('app/items.json');
    }

    private function loadItems()
    {
        if (!Storage::exists('items.json')) {
            return [];
        }

        $json = Storage::get('items.json');
        
        // Desencriptar los datos del archivo
        try {
            $decryptedData = Crypt::decryptString($json);
            return json_decode($decryptedData, true) ?? [];
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Si ocurre un error, retornar un array vacío o manejar el error según sea necesario
            return [];
        }
    }

    private function saveItems($items)
    {
        $json = json_encode($items, JSON_PRETTY_PRINT);

        // Cifrar los datos antes de guardarlos
        $encryptedData = Crypt::encryptString($json);
        Storage::put('items.json', $encryptedData);
    }

    public function index()
    {
        $items = $this->loadItems();
        return view('alumnos.index', ['items' => $items]);
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required',
        ]);

        $items = $this->loadItems();
        $item = [
            'id' => (count($items) + 1),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'codigo' => $request->input('codigo'),
        ];

        $items[] = $item;
        $this->saveItems($items);

        return redirect()->route('items.index');
    }

    public function edit($id)
    {
        $items = $this->loadItems();
        $item = $this->findItemById($items, $id);
        return view('alumnos.edit', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required',
        ]);

        $items = $this->loadItems();
        $index = $this->findItemIndexById($items, $id);
        $items[$index] = [
            'id' => $id,
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'codigo' => $request->input('codigo'),
        ];

        $this->saveItems($items);

        return redirect()->route('items.index');
    }

    public function destroy($id)
    {
        $items = $this->loadItems();
        $index = $this->findItemIndexById($items, $id);
        array_splice($items, $index, 1);
        $this->saveItems($items);

        return redirect()->route('items.index');
    }

    private function findItemById($items, $id)
    {
        foreach ($items as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        abort(404, 'Item not found');
    }

    private function findItemIndexById($items, $id)
    {
        foreach ($items as $index => $item) {
            if ($item['id'] == $id) {
                return $index;
            }
        }
        abort(404, 'Item not found');
    }
}
