<?php

namespace Tenbajt\Models\PostType;

use Tenbajt\Models\Model;
use Illuminate\Support\Str;

class PostTypeLabels extends Model
{
    /**
     * The post type labels default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => 'Wpis',
        'add_new' => 'Dodaj wpis',
        'new_item' => 'Nowy wpis',
        'archives' => 'Archiwum wpisów',
        'view_item' => 'Zobacz wpis',
        'edit_item' => 'Edytuj wpis',
        'all_items' => 'Wszystkie wpisy',
        'not_found' => 'Nie znaleziono wpisów',
        'items_list' => 'Lista wpisów',
        'attributes' => 'Atrybuty wpisu',
        'view_items' => 'Zobacz wpisy',
        'add_new_item' => 'Dodaj nowy wpis',
        'search_items' => 'Znajdź wpis',
        'item_updated' => 'Wpis zaktualizowany',
        'singular_name' => 'Wpis',
        'item_scheduled' => 'Wpis zaplanowany',
        'item_published' => 'Wpis opublikowany',
        'insert_into_item' => 'Dodaj do wpisu',
        'parent_item_colon' => 'Rodzic wpisu:',
        'filter_items_list' => 'Filtruj listę wpisów',
        'not_found_in_trash' => 'Nie znaleziono wpisów',
        'uploaded_to_this_item' => 'Przesłano do wpisu',
        'item_reverted_to_draft' => 'Wpis oznaczony jako roboczy',
        'item_published_privately' => 'Wpis opublikowany jako prywatny',
    ];

    /**
     * Set the post type labels genitive attribute.
     * 
     * @param  string  $value
     * @return void
     */
    public function setPluralGenitiveAttribute(string $genitive): void
    {
        $this->fill([
            'archives' => "Archiwum {$genitive}",
            'not_found' => "Brak {$genitive}",
            'items_list' => "Lista {$genitive}",
            'filter_items_list' => "Filtruj listę {$genitive}",
            'not_found_in_trash' => "Nie znaleziono {$genitive}",
        ]);
    }

    /**
     * Set the post type labels singular genitive attribute.
     * 
     * @param  string  $value
     * @return void
     */
    public function setSingularGenitiveAttribute(string $genitive): void
    {
        $this->fill([
            'attributes' => "Atrybuty {$genitive}",
            'insert_into_item' => "Dodaj do {$genitive}",
            'parent_item_colon' => "Rodzic {$genitive}:",
            'uploaded_to_this_item' => "Przesłano do {$genitive}",
        ]);
    }

    /**
     * Set the post type labels plural accusative attribute.
     * 
     * @param  string  $accusative
     * @return void
     */
    public function setPluralAccusativeAttribute(string $accusative): void
    {
        $this->fill([
            'name' => ucfirst($accusative),
            'all_items' => "Wszystkie {$accusative}",
            'view_items' => "Zobacz {$accusative}",
        ]);
    }

    /**
     * Set the post type labels singular accusative attribute.
     * 
     * @param  string  $accusative
     * @return void
     */
    public function setSingularAccusativeAttribute(string $accusative): void
    {
        $this->fill([
            'add_new' => "Dodaj {$accusative}",
            'new_item' => "Nowy {$accusative}",
            'view_item' => "Zobacz {$accusative}",
            'edit_item' => "Edytuj {$accusative}",
            'add_new_item' => "Dodaj {$accusative}",
            'search_items' => "Znajdź {$accusative}",
            'item_updated' => ucfirst($accusative)." zaktualizowany",
            'singular_name' => ucfirst($accusative),
            'item_published' => ucfirst($accusative)." opublikowany",
            'item_scheduled' => ucfirst($accusative)." zaplanowany",
            'item_reverted_to_draft' => ucfirst($accusative)." oznaczony jako roboczy",
            'item_published_privately' => ucfirst($accusative)." opublikowany jako prywatny",
        ]);
    }
}