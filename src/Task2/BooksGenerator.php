<?php

declare(strict_types=1);

namespace App\Task2;
class BooksGenerator
{
public $minPagesNumber;
public $libraryBooks=[];
public $maxPrice;
public $storeBooks=[];
public $filteredBooks =[];

    /**
     * BooksGenerator constructor.
     * @param $minPagesNumber
     * @param $libraryBooks
     * @param $maxPrice
     * @param $storeBooks
     * @param $filteredBooks
     */
    public function __construct($minPagesNumber, $libraryBooks, $maxPrice, $storeBooks)
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
//        $this->filteredBooks = $filteredBooks;
    }


    public function generate(): \Generator
    {
        //@todo

        foreach ($this->libraryBooks as $libBook) {
            if ( (int)$libBook->getPagesNumber()>= (int)$this->minPagesNumber) {
                $obj = new Book($libBook->title, $libBook->price,$libBook->pagesNumber);
                $this->filteredBooks[] = $obj;
            }
        }
        foreach ($this->storeBooks as $stBook) {
            if ((int)$stBook->getPrice()<= (int)$this->maxPrice ) {
                $obj = new Book($stBook->title, $stBook->price,$stBook->pagesNumber);
                $this->filteredBooks[] = $obj;
            }
        }
//        usort($this->filteredBooks[], function ($a, $b) { return strcmp($a["price"], $b["price"]); });
//        var_dump($this->filteredBooks);
        foreach ($this->filteredBooks as $flBook) {
            yield $flBook;
        }
    }
}