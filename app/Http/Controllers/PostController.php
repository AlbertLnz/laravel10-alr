<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return 'Hello from PostController';
    }

    public function create() {
        return 'Hello from PostController, create function';
    }

    public function store() {
        return 'Hello from PostController, store function';
    }

    public function show($postId) {
        return "Hello from PostController, show function: $postId";
    }

    public function edit($postId) {
        return "Hello from PostController, edit function: $postId";
    }

    public function update($postId) {
        return "Hello from PostController, update function: $postId";
    }

    public function destroy($postId) {
        return "Hello from PostController, destroy function: $postId";
    }
}
