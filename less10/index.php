<?php
class BinaryNode
{
    public $value;      // содержит значение узла
    public $left;       // левый потомок узла
    public $right;      // правый потомок узла

    public function __construct($item) {
        $this->value = $item;
        $this->left = null;
        $this->right = null;
    }
// прямой обход дерева
    public function dump() {
        if ($this->left !== null) {
            $this->left->dump();
        }
        var_dump($this->value);

        if ($this->right !== null) {
            $this->right->dump();
        }
    }
}

class BinaryTree
{
    protected array $currentNode = [];    // Массив текущего положения узла
    protected array $parentNode = [];     // Массив текущего положения родителя текущего узла
    public $rootNode;

    public function __construct()
    {
        $this->rootNode = null;
    }

    public function isEmpty()
    {
        return $this->rootNode === null;
    }

    public function insert($item)
    {
        $node = new BinaryNode($item);

        if ($this->isEmpty()) {
            // если дерево пустое
            $this->rootNode = new BinaryNode("");
            $this->currentNode[] = $this->rootNode;
            $curNode = end($this->currentNode);

            if ($item == "(") {
                $curNode->left = new BinaryNode("");
                $this->currentNode[] = $curNode->left;
            } else {
                $this->insertNode($node);
            }
        } else {
            $this->insertNode($node);
        }
    }


    protected function insertNode($node)
    {
        $curNode = end($this->currentNode);
        if ($node->value == "(") {
            $curNode->left = new BinaryNode("");
            $this->currentNode[] = $curNode->left;
            $this->parentNode[] = $curNode;

        } else if (preg_match("/[\+\-\*\/\^]/", $node->value)) {
            $curNode->value = $node->value;
            $curNode->right = new BinaryNode("");
            $this->currentNode[] = $curNode->right;
            $this->parentNode[] = $curNode;

        } else if (preg_match("/[0-9\.]/", $node->value)) {
            $curNode->value = $node->value;
            array_pop($this->currentNode);
            array_pop($this->parentNode);

        } else if ($node->value == ")") {
            array_pop($this->currentNode);
            array_pop($this->parentNode);
        } else {
            // reject duplicates
        }
    }

    public function traverse()
    {
        // dump the tree rooted at "root"
        $this->rootNode->dump();
    }
}

// Функция подготовки выражения
function preStr($str){
    $token = preg_replace("/\s/", "", $str);
    $token = str_replace(",", ".", $token);
    $token = str_split($token);
    $token[] = ")";
    array_unshift($token, "(");
    return $token;
}

$str = "(3 + 2) + ((5 + 9) * 2)"; // Выражение для примера

$token = preStr($str);

$newTree = new BinaryTree();

foreach ($token as $item){
    $newTree->insert($item);
}

// Подготовленное выражение для постороения дерева
var_dump($token);

// дерево выражения
var_dump($newTree->rootNode);

// прямой обход дерева
$newTree->traverse();
