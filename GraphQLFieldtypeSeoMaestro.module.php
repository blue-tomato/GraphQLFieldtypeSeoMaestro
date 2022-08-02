<?php

namespace ProcessWire;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\InputObjectType;
use ProcessWire\Page;
use ProcessWire\Field;
use ProcessWire\GraphQL\Cache;

class GraphQLFieldtypeSeoMaestro extends WireData implements Module
{

  public static function getModuleInfo()
  {

    return array(
      'title' => 'GraphQLFieldtypeSeoMaestro',
      'version' => '1.0.1',
      'summary' => 'GraphQL support for SeoMaestro.',
      'href' => 'https://github.com/blue-tomato/GraphQLFieldtypeSeoMaestro',
      'requires' => ['ProcessGraphQL', 'FieldtypeSeoMaestro']
    );
  }

  public static $name = 'SeoMaestro';
  public static $inputName = 'SeoMaestroInput';

  public static function getType(Field $field)
  {
    return new ObjectType([
      'name' => self::$name,
      'fields' => [

        'meta_title' => [
          'type' => Type::string(),
          'description' => 'Meta Title',
          'resolve' => function ($value) {
            return (string) $value->meta->title;
          }
        ],

        'meta_description' => [
          'type' => Type::string(),
          'description' => 'Meta Description',
          'resolve' => function ($value) {
            return (string) $value->meta->description;
          }
        ],

        'meta_keywords' => [
          'type' => Type::string(),
          'description' => 'Meta Keywords',
          'resolve' => function ($value) {
            return (string) $value->meta->keywords;
          }
        ],

        'meta_canonical_url' => [
          'type' => Type::string(),
          'description' => 'Meta canonical Url',
          'resolve' => function ($value) {
            return (string) $value->meta->canonicalUrl;
          }
        ],

        'og_title' => [
          'type' => Type::string(),
          'description' => 'Opengraph Title',
          'resolve' => function ($value) {
            return (string) $value->opengraph->title;
          }
        ],

        'og_description' => [
          'type' => Type::string(),
          'description' => 'Opengraph description',
          'resolve' => function ($value) {
            return (string) $value->opengraph->description;
          }
        ],

        'og_image' => [
          'type' => Type::string(),
          'description' => 'Opengraph image',
          'resolve' => function ($value) {
            return (string) $value->opengraph->image;
          }
        ],

        'og_image_alt' => [
          'type' => Type::string(),
          'description' => 'Opengraph imageAlt',
          'resolve' => function ($value) {
            return (string) $value->opengraph->imageAlt;
          }
        ],

        'og_type' => [
          'type' => Type::string(),
          'description' => 'Opengraph type',
          'resolve' => function ($value) {
            return (string) $value->opengraph->type;
          }
        ],

        'og_locale' => [
          'type' => Type::string(),
          'description' => 'Opengraph locale',
          'resolve' => function ($value) {
            return (string) $value->opengraph->locale;
          }
        ],

        'og_site_name' => [
          'type' => Type::string(),
          'description' => 'Opengraph siteName',
          'resolve' => function ($value) {
            return (string) $value->opengraph->siteName;
          }
        ],

        'twitter_card' => [
          'type' => Type::string(),
          'description' => 'Twitter card',
          'resolve' => function ($value) {
            return (string) $value->twitter->card;
          }
        ],

        'twitter_site' => [
          'type' => Type::string(),
          'description' => 'Twitter site',
          'resolve' => function ($value) {
            return (string) $value->twitter->site;
          }
        ],

        'twitter_creator' => [
          'type' => Type::string(),
          'description' => 'Twitter creator',
          'resolve' => function ($value) {
            return (string) $value->twitter->creator;
          }
        ],

        'robots_noindex' => [
          'type' => Type::boolean(),
          'description' => 'Robots noIndex',
          'resolve' => function ($value) {
            return (bool) $value->robots->noIndex;
          }
        ],

        'robots_nofollow' => [
          'type' => Type::boolean(),
          'description' => 'Robots noFollow',
          'resolve' => function ($value) {
            return (bool) $value->robots->noFollow;
          }
        ],

        'render' => [
          'type' => Type::string(),
          'description' => 'meta title tag',
          'resolve' => function ($value) {
            return (string) $value->render();
          }
        ]

      ]
    ]);
  }


  public static function getInputType(Field $field)
  {
    return new InputObjectType([
      'name' => self::$inputName,
      'fields' => [
        'meta_title' =>Type::string(),
        'meta_description' =>Type::string(),
        'meta_keywords' =>Type::string(),
      ]
    ]);
  }

  /*
  TODO: make setting value work
  public static function setValue(Page $page, Field $field, $value)
  {
    $fieldName = $field->name;
    $page->$fieldName->[] = $value;
  }
  */

}
