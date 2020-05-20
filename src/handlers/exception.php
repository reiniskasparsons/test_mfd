<?php namespace AppExceptions;

use Illuminate\Contracts\Debug\ExceptionHandler;

class Handler implements ExceptionHandler {
    public function report($e) {
        throw $e;
    }

    public function render($request, $e) {
        throw $e;
    }

    public function renderForConsole($output, $e) {
        throw $e;
    }
}