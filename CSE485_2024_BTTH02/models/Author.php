<?php 
    class Author{
        private $ma_tgia;
        private $ten_tgia;
        private $hinh_tgia;
    public function __construct($ma_tgia, $ten_tgia, $hinh_tgia){
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
        $this->hinh_tgia = $hinh_tgia;  
    }
        /**
         * Get the value of ma_tgia
         */
        public function getMaTgia()
        {
                return $this->ma_tgia;
        }

        /**
         * Set the value of ma_tgia
         */
        public function setMaTgia($ma_tgia): self
        {
                $this->ma_tgia = $ma_tgia;

                return $this;
        }

        /**
         * Get the value of ten_tgia
         */
        public function getTenTgia()
        {
                return $this->ten_tgia;
        }

        /**
         * Set the value of ten_tgia
         */
        public function setTenTgia($ten_tgia): self
        {
                $this->ten_tgia = $ten_tgia;

                return $this;
        }

        /**
         * Get the value of hinh_tgia
         */
        public function getHinhTgia()
        {
                return $this->hinh_tgia;
        }

        /**
         * Set the value of hinh_tgia
         */
        public function setHinhTgia($hinh_tgia): self
        {
                $this->hinh_tgia = $hinh_tgia;

                return $this;
        }
    }
?>