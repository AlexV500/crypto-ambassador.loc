<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Entities\Site;

class TranslateContentCreationService {

    public function getOriginalContentTitle($model) : string{

        if (Session::has('originalContentTitle')) {
            $originalContentTitle = Session::get('originalContentTitle');
            Session::remove('locale');
            return $originalContentTitle;
        } else return "";
    }

    public function getContentTranlationIds($model){

        if (Session::has('originalContentId')) {
            $originalContentId = Session::get('originalContentId');
            $originalContent = $model::find($originalContentId);
            $translatedContents = $model::where('original_content_id', '=', $originalContentId)->get();
            $translatedContentIds = $translatedContents->map(function ($content) {
                return json_decode($content->translation_ids);
            });
        }

    }



}
