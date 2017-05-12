<?php namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait TranslatableModelTrait {

    public function getTitleTranslatedAttribute() {
        switch(LaravelLocalization::getCurrentLocale()) {
            case 'uk':
                return $this->title_ua;
            break;
            case 'ru':
                return $this->title_ru;
                break;
            case 'en':
                return $this->title;
                break;
            default:
                return '';
                break;
        }
    }

    public function getDescriptionTranslatedAttribute() {
        switch(LaravelLocalization::getCurrentLocale()) {
            case 'uk':
                return $this->description_ua;
                break;
            case 'ru':
                return $this->description_ru;
                break;
            default:
                return $this->description;
        }
    }

    public function getTitleUrlAttribute() {
        //Lower case everything
        $string = strtolower($this->title);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}