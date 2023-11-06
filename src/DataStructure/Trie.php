<?php

namespace DataStructure;

class Trie
{
    public $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    public function insert(string $word)
    {
        $current =  $this->root;

       for ($i=0; $i < strlen($word); $i++){
           $char = $word[$i];

            if(!isset($current->children[$char])){
                $current->children[$char] = new TrieNode();
            }
            $current = $current->children[$char];
       }
       $current->endOfWord = true;
    }

    public function remove(string $word)
    {
        // OPTIONAL! Your code goes here
    }
}
