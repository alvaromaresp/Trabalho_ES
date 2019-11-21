<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\UploadedFile;
use Spatie\Dropbox\Client;
use Spatie\Dropbox\Exceptions\BadRequest;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Store a photo in Dropbox.
     *
     * @param  Illuminate\Http\UploadedFile  $photo
     * @param  string $path
     * @param  string $mode
     * @return string | bool (Shared link)
     */
    protected function uploadPhoto(UploadedFile &$photo, string $path, string  $mode = 'add'): string
    {
        $Client = new Client(env('DROPBOX_TOKEN'));
        $realFile = fopen($photo, 'r');
        $resultado = $Client->upload($path, $realFile, $mode);
        try {
            $link = $Client->createSharedLinkWithSettings($resultado['path_display'], ["requested_visibility" => "public"]);
        } catch (BadRequest $e) {
            $link = ($Client->listSharedLinks($resultado['id']))[0];
        }
        $link = $link['url'];
        $link = str_replace('?dl=0', '?raw=1', $link);
        return $link;
    }
    protected function removePhoto(string $path)
    {
        $Client = new Client(env('DROPBOX_TOKEN'));


        $Client->delete($path);
    }
}
