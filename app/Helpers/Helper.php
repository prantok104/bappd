<?php

/**
 * Generate channel unique id
 * @param $channel_name
 * @return string
 */
function generate_channel_unique_id($channel_name){
    $unique_id = '';
    $unique_id = \Illuminate\Support\Str::upper('C'.\Carbon\Carbon::now()->format('dmYhis').\Illuminate\Support\Str::substr($channel_name, 0, 1));
    return $unique_id;
}

/**
 * Generate Content ID
 * @param $content_name
 * @return string
 */
function generate_content_unique_id($content_name){
    $unique_id = '';
    $unique_id = \Illuminate\Support\Str::upper('CON'.\Carbon\Carbon::now()->format('dmYhis').\Illuminate\Support\Str::substr($content_name, 0, 1));
    return $unique_id;
}

/**
 * User check via mobile number
 * @param $mobile
 * @return mixed
 */
function check_user_exist_via_mobile_number($mobile){
    return \App\Models\User::where('mobile', $mobile)->count();
}


/**
 * pickup user via mobile number
 * @param $mobile
 * @return mixed
 */
function pickup_the_user_id_via_mobile_number($mobile){
    $user_id = \App\Models\User::where('mobile', $mobile)->get(['id']);
    return $user_id[0]['id'];
}

/**
 * String locking
 * @param $data
 * @return string
 */
function lock($data){
    return \Illuminate\Support\Facades\Crypt::encryptString($data, 32);
}

/**
 * String unlocking
 * @param $data
 * @return string
 */
function unlock($data){
    return \Illuminate\Support\Facades\Crypt::decryptString($data);
}


/**
 * Generate unique ID reference by name
 * @param $first
 * @param $name
 * @return string
 */
function generate_unique_id($first, $name){
    $unique_id = '';
    $unique_id = \Illuminate\Support\Str::upper($first.\Carbon\Carbon::now()->format('dmYhis').\Illuminate\Support\Str::substr($name, 0, 1));
    return $unique_id;
}

/**
 * Get content type is series, playlist or Single
 * @param $content_id
 * @return string
 */
function get_content_type($content_id){
    $content = \App\Models\Backend\Content\Content::findOrFail($content_id);
    $type = 'SINGLE';
    if ($content->is_series == 1){
        $type = 'SERIES';
    } elseif ($content->is_series == 0 && $content->records->count() > 1){
        $type = 'PLAYLIST';
    } else{
        $type = $type;
    }
    return $type;
}
