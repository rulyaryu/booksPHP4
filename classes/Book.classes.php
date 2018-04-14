<?php
    // namespace Book;

    class Book {
        public $id;
        public $imgId;
        public $imgUrl;
        public $title;
        public $author;
        public $categoryId;
        public $category;

        public function __construct($id = '', $imgId = '', $imgUrl = '', $title = '', $author = '', $categoryId = '', $category= '') {
            $this->id = $id;
            $this->imgId = $imgId;
            $this->imgUrl = $imgUrl;
            $this->title = $title;
            $this->author = $author;
            $this->categoryId = $categoryId;
            $this->category = $category;
        }

        public function getString() {
            return implode(',', $this->getAll());
        }

        public function getId() {
            return $this->id;
        } 
        public function getAll() {
            return [ $this->id, $this->imgId, $this->imgUrl, $this->title, $this->author, $this->categoryId, $this->category];
        }
        public function getCardFields() {
            return [
                'title' => $this->title, 
                'imgUrl' => $this->imgUrl, 
                'author' => $this->author, 
                'category' => $this->category
            ];
        }
        public function setCardFields($arr) {
            $this->title = $arr['title'];
            $this->imgUrl = $arr['imgUrl'];
            $this->author = $arr['author'];
            $this->category = $arr['category'];
        }

    }


// "761183272",
// "0761183272.jpg",
// "http://ecx.images-amazon.com/images/I/61Y5cOdHJbL.jpg",
// "Mom's Family Wall Calendar 2016",
// "Sandra Boynton",
// "3",
// "Calendars"
