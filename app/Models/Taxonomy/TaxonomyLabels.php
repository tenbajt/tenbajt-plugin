<?php

namespace Tenbajt\Models\Taxonomy;

use Tenbajt\Models\Model;

class TaxonomyLabels extends Model
{
    /**
     * The taxonomy labels default attributes.
     * 
     * @var array
     */
    protected $attributes = [
        'name' => 'Tagi',
        'no_terms' => "Brak tagów",
        'edit_item' => "Edytuj tag",
        'view_item' => "Zobacz tag",
        'all_items' => "Wszystkie tagi",
        'most_used' => "Popularne tagi",
        'not_found' => "Nie znaleziono tagów",
        'items_list' => "Lista tagów",
        'parent_item' => "Tag nadrzędny",
        'update_item' => "Zaktualizuj tag",
        'search_items' => "Znajdź tag",
        'add_new_item' => "Dodaj nowy tag",
        'singular_name' => "Tag",
        'new_item_name' => "Nazwa taga",
        'popular_items' => "Popularne tagi",
        'back_to_items' => "Wróc do tagów",
        'filter_by_item' => "Sortuj według taga",
        'parent_item_colon' => "Rodzic taga:",
        'add_or_remove_items' => "Dodaj lub usuń tagi",
        'items_list_navigation' => "Nawigacja listy tagów",
        'choose_from_most_used' => "Wybierz spośród najczęściej używanych tagów",
        'separate_items_with_commas' => "Oddziel tagi przecinkami",
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
            'no_terms' => "Brak {$genitive}",
            'not_found' => "Nie znaleziono {$genitive}",
            'items_list' => "Lista {$genitive}",
            'back_to_items' => "Wróc do {$genitive}",
            'items_list_navigation' => "Nawigacja listy {$genitive}",
            'choose_from_most_used' => "Wybierz spośród najczęściej używanych {$genitive}",
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
            'new_item_name' => "Nazwa nowego {$genitive}",
            'filter_by_item' => "Sortuj według {$genitive}",
            'parent_item_colon' => "Rodzic {$genitive}:",
        ]);
    }

    /**
     * Set the taxonomy labels plural accusative attribute.
     * 
     * @param  string  $accusative
     * @return void
     */
    public function setPluralAccusativeAttribute(string $accusative): void
    {
        $this->fill([
            'name' => ucfirst($accusative),
            'all_items' => "Wszystkie {$accusative}",
            'most_used' => "Popularne {$accusative}",
            'popular_items' => "Popularne {$accusative}",
            'add_or_remove_items' => "Dodaj lub usuń {$accusative}",
            'separate_items_with_commas' => "Oddziel {$accusative} przecinkami",
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
            'edit_item' => "Edytuj {$accusative}",
            'view_item' => "Zobacz {$accusative}",
            'parent_item' => ucfirst($accusative)." nadrzędne",
            'update_item' => "Zaktualizuj {$accusative}",
            'search_items' => "Znajdź {$accusative}",
            'add_new_item' => "Dodaj nowe {$accusative}",
            'singular_name' => ucfirst($accusative),
        ]);
    }
}