<?php
/**
 * @param mixed $id
 * @param mixed $dim
 * @return string
 */
function getImg(mixed $id, mixed $dim): string
{
    $file = '/src/uploads/' . $id . '.jpg';
    $file2 = '/src/uploads/' . $id . '.png';
    if (!(file_exists(__DIR__ . '/../' . $file))) {
        if (!(file_exists(__DIR__ . '/../' . $file2))) {
            $icon = "<i class='fa-solid fa-user' style='height: 1.5em'></i>";
        } else {
            $file = $file2;
            $icon = "<img src = $file alt='' class='rounded-pill'  style='width: $dim; height: $dim; object-fit: cover'>";
        }
    } else {
        $icon = "<img src = $file alt='' class='rounded-pill'  style='width:$dim; height: $dim; object-fit: cover'>";
    }
    return $icon;
}


