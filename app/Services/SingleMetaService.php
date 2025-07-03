<?php

namespace App\Services;

use App\Models\Post;

class SingleMetaService
{
    public function makeMetaTags(Post $post, $cityInfo): array
    {

        $data['title'] = $this->makeTitleForIntimBox($post, $cityInfo);
        $data['des'] = $this->makeDesForIntimBox($post, $cityInfo);
        $data['h1'] = $this->makeH1ForIntimBox($post, $cityInfo);

        return $data;
    }

    private function makeTitleForIntimBox(Post $post, $cityInfo): string
    {

        if ($post->price < 3001) $price = ' дешевая ';
        else $price = ' дорогая ';

        $national = '';

        if ($post->national) $national = $post->national->value;

        $metro = $post->metro->first();

        $title = $post->name . ' ' . $post->id . ' -' . $price . 'проститутка ' . $national . ' ' . $cityInfo['city3'];

        if ($metro) $title .= ', метро ' . $metro->metro_value;

        if ($post->age) $title .= ', ' . $this->pluralAge($post->age);

        return $title;
    }

    private function makeDesForIntimBox(Post $post, $cityInfo): string
    {

        $national = '';
        $age = '';

        if ($post->national) $national = $post->national->value;
        if ($post->age) $age =  $this->pluralAge($post->age);

        $des = 'Проститутка ' . $post->name . ' ' .$national. ' '.$age. ' '. $cityInfo['city3'];
        $des .= ' удовлетворит ваши самые потайные желания. На сайте подробная анкета с номером телефона, фотографиями и отзывами.';

        $des .= ' ID анкеты '.$post->id;

        return $des;
    }

    private function makeH1ForIntimBox(Post $post, $cityInfo): string
    {
        $h1 = $post->name . ' – страстная индивидуалка ' . $cityInfo['city3'];

        return $h1;
    }

    private function pluralAge(int $age): string
    {
        $mod10 = $age % 10;
        $mod100 = $age % 100;

        if ($mod10 == 1 && $mod100 != 11) {
            return $age . ' год';
        }

        if ($mod10 >= 2 && $mod10 <= 4 && ($mod100 < 10 || $mod100 >= 20)) {
            return $age . ' года';
        }

        return $age . ' лет';
    }

    private function makeTitle(Post $post, $cityInfo): string
    {

        $title = 'Проститутка ' . $post->name;

        if ($post->metro->count()) $title .= ' рядом с метро ' . $post->metro->first()->metro_value;
        $title .= ' ' . $cityInfo['city3'] . ' ' . $post->phone . ' цена ' . $post->price . ' ID ' . $post->id;

        return $title;

    }

    private function makeDes(Post $post, $cityInfo): string
    {

        if (mb_strlen($post->about) > 200) $des = mb_substr($post->about, 0, 200) . ' ID ' . $post->id;

        else {

            $des = 'Проститутка ' . $post->name . ' ' . $cityInfo['city3'] . ' номер телефона ' . $post->phone;
            $des .= ' лучшие индивидуалки ' . $cityInfo['city3'] . ' ID анкеты' . ' ' . $post->id;

        }

        return $des;

    }

}
