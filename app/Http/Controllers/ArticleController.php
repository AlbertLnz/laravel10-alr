<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return 'Hello from ArticleController';
    }

    public function create() {
        return 'Hello from ArticleController, create function';
    }

    public function store() {
        return 'Hello from ArticleController, store function';
    }

    public function show($postId) {
        return "Hello from ArticleController, show function: $postId";
    }

    public function edit($postId) {
        return "Hello from ArticleController, edit function: $postId";
    }

    public function update($postId) {
        return "Hello from ArticleController, update function: $postId";
    }

    public function destroy($postId) {
        return "Hello from ArticleController, destroy function: $postId";
    }
}
