<?php

namespace DataStructure;

class TrieNode
{
    public $children;
    public $endOfWord;

    public function __construct()
    {
        $this->children = [];
        $this->endOfWord = false;
    }
}
