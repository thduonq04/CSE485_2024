<?php
class Admin{

    private $numberOfCategory;
    private $numberOfAuthor;
    private $numberOfArticle;
    private $numberOfUser;

    public function __construct($numberOfCategory, $numberOfAuthor, $numberOfArticle, $numberOfUser){
        $this->numberOfCategory = $numberOfCategory;
        $this->numberOfAuthor = $numberOfAuthor;
        $this->numberOfArticle = $numberOfArticle;
        $this->numberOfUser = $numberOfUser;
    }

    //getter setter all
    


    /**
     * Get the value of numberOfCategory
     */
    public function getNumberOfCategory()
    {
        return $this->numberOfCategory;
    }

    /**
     * Set the value of numberOfCategory
     */
    public function setNumberOfCategory($numberOfCategory): self
    {
        $this->numberOfCategory = $numberOfCategory;

        return $this;
    }

    /**
     * Get the value of numberOfAuthor
     */
    public function getNumberOfAuthor()
    {
        return $this->numberOfAuthor;
    }

    /**
     * Set the value of numberOfAuthor
     */
    public function setNumberOfAuthor($numberOfAuthor): self
    {
        $this->numberOfAuthor = $numberOfAuthor;

        return $this;
    }

    /**
     * Get the value of numberOfArticle
     */
    public function getNumberOfArticle()
    {
        return $this->numberOfArticle;
    }

    /**
     * Set the value of numberOfArticle
     */
    public function setNumberOfArticle($numberOfArticle): self
    {
        $this->numberOfArticle = $numberOfArticle;

        return $this;
    }

    /**
     * Get the value of numberOfUser
     */
    public function getNumberOfUser()
    {
        return $this->numberOfUser;
    }

    /**
     * Set the value of numberOfUser
     */
    public function setNumberOfUser($numberOfUser): self
    {
        $this->numberOfUser = $numberOfUser;

        return $this;
    }
}

