<?php

namespace Redhood\InstagramApp\lib;

class View {
    private array $d;

    function render(string $name, array $data = []) {
        $this->d = $data;
        require 'src/views' . $name . 'php';
    }
}