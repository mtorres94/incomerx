<?php

namespace Sass;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ReceiptEntryAttachment extends Model
{
    protected $table = 'whr_receipts_entries_attachments';

    protected $fillable = [
        'unique_str', 'original_name', 'temp_name', 'mime', 'user_upload_id',
    ];

    public static function saveAttachment($id, $tmp)
    {
        $attach = new ReceiptEntryAttachment();
        $attach->unique_str     = $id;
        $attach->original_name  = $tmp['original_name'];
        $attach->temp_name      = $tmp['temp_name'];
        $attach->mime           = $tmp['mime'];
        $attach->user_upload_id = Auth::user()->id;

        $attach->save();
    }
}
