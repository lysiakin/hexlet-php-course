<?php

namespace OODesign\configuration;


class PasswordValidator
{
    // BEGIN (write your solution here)
    private const OPTIONS = [
        'minLength' => 8,
        'containNumbers' => false
    ];

    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function getOptions(?string $key = null)
    {
        return isset($key) ? $this->options[$key] : $this->options;
    }

    public function validate (string $password): array
    {
        $errors = [];

        if (strlen($password) < $this->getOptions('minLength')) {
            $errors['minLength'] = 'too small';
        }
        if (!$this->hasNumber($password) && $this->getOptions('containNumbers')) {
            $errors['containNumbers'] = 'should contain at least one number';
        }
        return $errors;
    }
    // END

    private function hasNumber(string $subject): bool
    {
        return strpbrk($subject, '1234567890') !== false;
    }
}