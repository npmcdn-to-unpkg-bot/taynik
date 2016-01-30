<?php namespace system\helpers;

class Functions {

    public static function redirect($http)
    {

        echo "<script>location = " . $http . "</script>";

    }

    public static function alert($message)
    {

        echo '<script type="text/javascript">alert(' . $message . ')</script>';

    }

    /**
     * @param $string
     * @param $width
     * @return string
     *
     * Функция обрезает текст до указанного количества символов
     *
     */
    public static function cut_paragraph($string, $width)
    {

//        preg_match_all('#<img.*src="(.*)".*>#isU', $string, $images);

        $regex = "/<img[^>]+src\s*=\s*[\"']\/?([^\"']+)[\"'][^>]*\>/";
        preg_match ($regex, $string, $matches);
        $images = (count($matches)) ? $matches : array();

        $string = preg_replace('/<img[^>]+\>/', '', $string, 50);
        $string = preg_replace('/<iframe[^>]+\>/', '', $string, 50);
        $string = preg_replace('/<object[^>]+\>/', '', $string, 50);

        $your_desired_width = $width;
        $string = substr($string, 0, $your_desired_width+1);

        if (strlen($string) > $your_desired_width)
        {

            $string = wordwrap($string, $your_desired_width);
            $i = strpos($string, "\n");

            if ($i) {

                $string = substr($string, 0, $i) . '...';

            }

        }

        return array('text' => $string, 'images' => $images);
    }

    public static function reloadLoc()
    {

        echo '<script>location.reload()</script>';

    }

    public static function generatePassword($length = 8){
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }

    public static function mb_ucfirst($str, $enc = 'utf-8') {

        return mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc).mb_substr($str, 1, mb_strlen($str, $enc), $enc);

    }

} 