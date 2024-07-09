<?php

namespace App\Repository;

use App\Interface\LibraryRespositoryInterface;
use App\Models\Library;

class LibraryRepository implements LibraryRepositoryInterface
{
    public function all() {
        return Library::all();
    }

    public function find(int $id) {
        return Library::findOrFail($id);
    }

    public function create(array $data) {
        return Library::create($data);
    }

    public function update(array $data, int $id) {
        return Library::findOrFail($id)->update($data);
    }

    public function delete(int $id) {
        return Library::findOrFail($id)->delete();
    }


}
