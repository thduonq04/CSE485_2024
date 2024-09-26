<?php
class Article{
    // Thuộc tính

    private $ma_bviet;
    private $tieude;
    private $ten_bhat;
    private $ma_tloai;
    private $tomtat;
    private $noidung;
    private $ma_tgia;
    private $ngayviet;
    private $hinhanh;

    
    public function __construct($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh){
            $this->ma_bviet = $ma_bviet;
            $this->tieude = $tieude;
            $this->ten_bhat = $ten_bhat;
            $this->ma_tloai = $ma_tloai;
            $this->tomtat = $tomtat;
            $this->noidung = $noidung;
            $this->ma_tgia = $ma_tgia;
            $this->ngayviet = $ngayviet;
            $this->hinhanh = $hinhanh;
        
     }

    // // Setter và Getter
    // public function getTitle(){
    //     return $this->title;
    // }

    /**
     * Get the value of ma_bviet
     */
    public function getMaBviet()
    {
        return $this->ma_bviet;
    }

    /**
     * Set the value of ma_bviet
     */
    public function setMaBviet($ma_bviet): self
    {
        $this->ma_bviet = $ma_bviet;

        return $this;
    }

    /**
     * Get the value of tieude
     */
    public function getTieude()
    {
        return $this->tieude;
    }

    /**
     * Set the value of tieude
     */
    public function setTieude($tieude): self
    {
        $this->tieude = $tieude;

        return $this;
    }

    /**
     * Get the value of ten_bhat
     */
    public function getTenBhat()
    {
        return $this->ten_bhat;
    }

    /**
     * Set the value of ten_bhat
     */
    public function setTenBhat($ten_bhat): self
    {
        $this->ten_bhat = $ten_bhat;

        return $this;
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
     * Get the value of tomtat
     */
    public function getTomtat()
    {
        return $this->tomtat;
    }

    /**
     * Set the value of tomtat
     */
    public function setTomtat($tomtat): self
    {
        $this->tomtat = $tomtat;

        return $this;
    }

    /**
     * Get the value of noidung
     */
    public function getNoidung()
    {
        return $this->noidung;
    }

    /**
     * Set the value of noidung
     */
    public function setNoidung($noidung): self
    {
        $this->noidung = $noidung;

        return $this;
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
     * Get the value of ngayviet
     */
    public function getNgayviet()
    {
        return $this->ngayviet;
    }

    /**
     * Set the value of ngayviet
     */
    public function setNgayviet($ngayviet): self
    {
        $this->ngayviet = $ngayviet;

        return $this;
    }

    /**
     * Get the value of hinhanh
     */
    public function getHinhanh()
    {
        return $this->hinhanh;
    }

    /**
     * Set the value of hinhanh
     */
    public function setHinhanh($hinhanh): self
    {
        $this->hinhanh = $hinhanh;

        return $this;
    }
}