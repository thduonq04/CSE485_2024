<?php 
    class Category{
        private $ma_tloai;
        private $ten_tloai;
    public function __construct($ma_tloai, $ten_tloai){
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }


        /**
         * Get the value of ma_tloai
         */
        public function getMaTloai()
        {
                return $this->ma_tloai;
        }

        /**
         * Set the value of ma_tloai
         */
        public function setMaTloai($ma_tloai): self
        {
                $this->ma_tloai = $ma_tloai;

                return $this;
        }

        /**
         * Get the value of ten_tloai
         */
        public function getTenTloai()
        {
                return $this->ten_tloai;
        }

        /**
         * Set the value of ten_tloai
         */
        public function setTenTloai($ten_tloai): self
        {
                $this->ten_tloai = $ten_tloai;

                return $this;
        }
}