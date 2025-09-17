<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class SessionHelper
{
    public static function common_flasher($action, $data_label)
    {
        switch($action)
        {
            case 'create':
                Session::flash('message-type', 'success');
                Session::flash('message-body', $data_label.' telah berhasil dibuat');
                break;
            case 'update':
                Session::flash('message-type', 'success');
                Session::flash('message-body', $data_label.' telah berhasil diubah');
                break;
            case 'delete':
                Session::flash('message-type', 'success');
                Session::flash('message-body', $data_label.' telah berhasil dihapus');
                break;
            case 'restore':
                Session::flash('message-type', 'success');
                Session::flash('message-body', $data_label.' telah berhasil dikembalikan');
                break;
            default:
                Session::flash('message-type', 'success');
                Session::flash('message-body', $data_label.' telah berhasil dihapus permanen');
                break;
        }
    }

    public static function error_flasher($message)
    {
        Session::flash('message-type', 'error');
        Session::flash('message-body', $message);
    }
}