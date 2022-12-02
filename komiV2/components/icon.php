<?php
/**
 * @param mixed $id
 * @return string
 */
function getImg(mixed $id): string
{
    $file = '/src/uploads/' . $id . '.jpg';
    $file2 = '/src/uploads/' . $id . '.png';
    if (!(file_exists(__DIR__ . '/../' . $file))) {
        if (!(file_exists(__DIR__ . '/../' . $file2))) {
            $icon = "<i class='fa-solid fa-user' style='height: 1.8em'></i>";
        } else {
            $file = $file2;
            $icon = "<img src = $file alt='' class='rounded-pill'  style='width: 2.3em; height: 2.3em;'>";
        }
    } else {
        $icon = "<img src = $file alt='' class='rounded-pill'  style='width: 2.3em; height: 2.3em;'>";
    }
    return $icon;
}


