<?php

namespace Autocomplete;

use DataStructure\Trie;

class Autocomplete extends Trie
{
    public function getMatches(string $prefix): array
    {
        $node = $this->root;
        for ($i=0; $i < strlen($prefix);$i++){
            $char = $prefix[$i];
            if (!isset($node->children[$char])) {
                return[];
            }
            $node = $node->children[$char];
        }

        $matches = [];
        $this->findWordsWithPrefix($node, $prefix, $matches);
        return $matches;

    }
    private function findWordsWithPrefix($node, $currentPrefix, &$matches) {
        if ($node->endOfWord) {
            $matches[] = $currentPrefix;
        }

        foreach ($node->children as $char => $childNode) {
            $this->findWordsWithPrefix($childNode, $currentPrefix . $char, $matches);
        }
    }
}
