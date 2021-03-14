<?php

function getComposerFileData(): array
{
    return [
        "autoload" => [
            "files" => [
                "src/Arrays.php"
            ]
        ],
        "config" => [
            "vendor-dir" => "/composer/vendor"
        ]
    ];
}