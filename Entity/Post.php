<?php

namespace PP\AcmeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 */
class Post
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $tags = array();

    /**
     * @var string
     */
    private $author;


    public static function create($title, $content, $tags, $author)
    {
        $post = new static();
        $post->title = $title;
        $post->content = $content;
        $post->tags = $tags;
        $post->author = $author;

        return $post;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get tags
     *
     * @return array 
     */
    public function getTags()
    {
        return $this->tags;
    }

    public function addTag($tag)
    {
        $this->tags[] = $tag;
    }


    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
