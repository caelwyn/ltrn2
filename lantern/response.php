<?php namespace lantern\response;

function view(array $templateVariables, string $template)
{
    extract($templateVariables);
    $pageTemplate = "./app/templates/{$template}";

    include_once "./app/templates/main.php";

    return;
}

function json(array $data)
{
    echo json_encode($data, JSON_PRETTY_PRINT);

    return;
}
