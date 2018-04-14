<?php 
    class Pagination {
        public $perpage;
        public $page;
        public $itemsCount;


        public function __construct($perpage, $page = 1, $itemsCount) {
            $this->perpage = $perpage;
            $this->page = $page;
            $this->itemsCount = $itemsCount;
        }

        public function getPage() {
            return $this->page;
        }

        public function setPage($num) {
            $this->page = $num;
        }

        public function getPerpage() {
            return $this->perpage;
        }

        public function setPerpage($num) {
            $this->perpage = $num;
        }

        public function getLimitPage() {
            return $this->itemsCount % $this->perpage === 0 ? 
                        intval($this->itemsCount / $this->perpage) :
                        intval($this->itemsCount / $this->perpage) + 1;
        }

        // public function next() {
        //     $this->page++;
        // }
        // public function prev() {
        //     $this->page--;
        // }
        // public function first() {
        //     $this->page = 1;
        // }
        // public function last() {
        //     $this->page = $this->getLimitPage();
        // }
    }
    