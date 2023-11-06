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
        return $this->removeAssist($this->root,$word,0);
    }

    private function removeAssist($node,$word,$index){
        if($index === strlen($word)){
            if($node->endOfWord){
                $node->endOfWord = false;
                return true;
            }
            return false;
        }

        $char = $word[$index];
        if(!isset($node->children[$char])){
            return false; //Word not found
        }

        $result = $this->removeAssist($node->children[$char],$word,$index+1);

        if($result && empty($node->children[$char]->children) && !$node->children[$char]->endOfWord){
            unset($node->children[$char]);
        }

        return $result;

    }

}
