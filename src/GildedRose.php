<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private array $items;

    /**
     * Constructor
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return Item[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * @return string[]
     */
    public function getItemsAsString() : array
    {
        $objectToStringArray = array();
        foreach ($this->items as $item)
            $objectToStringArray[] = (string) $item;
        return $objectToStringArray;
    }

    /**
     * @return boolean
     */
    private function itemHasName(Item $item, string $name) : bool {
        return ($item->name === $name ? true : false);
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (!$this->itemHasName($item, 'Aged Brie') && !$this->itemHasName($item,'Backstage passes to a TAFKAL80ETC concert')) {
                if ($item->quality > 0 && !$this->itemHasName($item, 'Sulfuras, Hand of Ragnaros'))
                    $item->quality = $item->quality - 1;
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($this->itemHasName($item, 'Backstage passes to a TAFKAL80ETC concert') && $item->sell_in < 11 && $item->quality < 50)
                        $item->quality = $item->quality + 2;
                }
            }

            if (!$this->itemHasName($item, 'Sulfuras, Hand of Ragnaros'))
                $item->sell_in = $item->sell_in - 1;

            if ($item->sell_in < 0) {
                if (!$this->itemHasName($item, 'Aged Brie')) {
                    if (!$this->itemHasName($item, 'Backstage passes to a TAFKAL80ETC concert')) {
                        if ($item->quality > 0 && !$this->itemHasName($item,'Sulfuras, Hand of Ragnaros'))
                            $item->quality = $item->quality - 1;
                    } else
                        $item->quality = $item->quality - $item->quality;
                } else {
                    if ($item->quality < 50)
                        $item->quality = $item->quality + 1;
                }
            }
        }
    }
}
