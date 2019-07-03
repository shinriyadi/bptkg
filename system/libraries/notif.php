<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class notif {

    public function tnotif($par) {
        $data = explode('~', $par);
        if (count($data) == 2) {
            $dt = $data[0];
            $st = $data[1];
        } else {
            $dt = '';
            $st = '';
        }

        switch ($st) {
            case '0':
                $mesage = '<div class="alert alert-danger fade in notifikasi">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button><strong>Failed!</strong> '.$dt.'
                            </div>';
                return $mesage;
                break;
            case '1':
                $mesage = '<div class="alert alert-success fade in notifikasi">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button><strong>Success!</strong> '.$dt.'
                            </div>';
                return $mesage;
                break;
            default :
                return null;
        }
    }

}

?>
