<?php

namespace Modules\Hotel\Models;

use App\Helpers\AdminHelper;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class HotelRoom extends Model implements TranslatableContract
{
    use Translatable;

    public static $IMAGES_PATH             = "images/hotels/hotelId/rooms";
    public static $HOTEL_ROOM_SYSTEM_IMAGE = 'hotel_room_img.png';
    public static $HOTEL_ROOM_RATIO         = '1/1';
    public static $HOTEL_ROOM_MIMES         = 'jpg,jpeg,png,gif';
    public static $HOTEL_ROOM_MAX_FILE_SIZE = '3000';

    public    $translatedAttributes = ['title', 'short_description', 'visible'];
    protected $fillable             = ['url', 'external_url', 'active', 'position', 'created_by', 'filename', 'date', 'from_date', 'to_date'];


    public function setKeys($array): array
    {
        $array[1]['sys_image_name']      = trans('hotelroom::admin.hotelroom.index');
        $array[1]['sys_image']     = self::$HOTEL_ROOM_SYSTEM_IMAGE;
        $array[1]['sys_image_path'] = AdminHelper::getSystemImage(self::$HOTEL_ROOM_SYSTEM_IMAGE);
        $array[1]['ratio']         = self::$HOTEL_ROOM_RATIO;
        $array[1]['mimes']         = self::$HOTEL_ROOM_MIMES;
        $array[1]['max_file_size'] = self::$HOTEL_ROOM_MAX_FILE_SIZE;

        return $array;
    }

}
