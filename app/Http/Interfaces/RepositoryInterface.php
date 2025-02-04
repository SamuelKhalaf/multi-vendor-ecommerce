<?php

namespace App\Http\Interfaces;

interface RepositoryInterface
{
    public function all();

    public function store(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);
}
