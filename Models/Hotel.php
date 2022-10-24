<?php

namespace Modules\Hotel\Models;

use App\Helpers\AdminHelper;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model implements TranslatableContract
{
    use Translatable;

    public static $IMAGES_PATH         = "images/hotels";
    public static $HOTEL_SYSTEM_IMAGE  = 'hotel_img.png';
    public static $HOTEL_RATIO         = '1/1';
    public static $HOTEL_MIMES         = 'jpg,jpeg,png,gif';
    public static $HOTEL_MAX_FILE_SIZE = '3000';


    public    $translatedAttributes = ['title', 'short_description', 'visible'];
    protected $fillable             = ['url', 'external_url', 'active', 'position', 'created_by', 'filename', 'date', 'from_date', 'to_date'];


    public function setKeys($array): array
    {
        $array[1]['sys_image_name']      = trans('hotel::admin.hotel.index');
        $array[1]['sys_image']     = self::$HOTEL_SYSTEM_IMAGE;
        $array[1]['sys_image_path'] = AdminHelper::getSystemImage(self::$HOTEL_SYSTEM_IMAGE);
        $array[1]['ratio']         = self::$HOTEL_RATIO;
        $array[1]['mimes']         = self::$HOTEL_MIMES;
        $array[1]['max_file_size'] = self::$HOTEL_MAX_FILE_SIZE;

        return $array;
    }

}
