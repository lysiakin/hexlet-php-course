<?php


namespace OODesign\stdClass;


class MyStdClass
{
    private $properties = [];

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }

    // Для полноты полезно реализовать метод __isset
    // https://php.net/manual/ru/language.oop5.overloading.php#object.isset
}

class MyClass
{
    private $properties = [
        "key" => "value"
    ];

    /**
     * @return string[]
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    // Для полноты полезно реализовать метод __isset
    // https://php.net/manual/ru/language.oop5.overloading.php#object.isset
}

$obj = new MyStdClass();
$obj->key = 'value'; // __set($name, $value) где $name = 'key', а $value = 'value'
$obj->key; // __get($name) где $name = 'key'

print_r($obj);

$obj2 = new MyClass();
print_r($obj2);
// MyStdClass Object
// (
//     [properties:Tmp\MyStdClass:private] => Array
//         (
//             [key] => value
//         )
//
// )

$userAsArray = [
    'name' => 'George',
    'age' => 18
];

var_dump($userAsArray);
$userAsObject = (object) $userAsArray;

var_dump($userAsObject);
// class stdClass#2 (2) {
//   public $name =>
//   string(6) "George"
//   public $age =>
//   int(18)
// }

$json = <<<EOB
{
  "files": ["src/Countable.php", "src/Moment.php"],
  "require": {
    "phpunit": "*",
    "http-client": "*"
  }
}
EOB;

var_dump(json_decode($json));