<?php
class Post
{
    private $post_id;
    private $author_id;
    private $course_id;
    private $content;

    public function Post($post_id, $author_id, $course_id, $content)
    {
        $this->post_id = $post_id;
        $this->author_id = $author_id;
        $this->course_id = $course_id;
        $this->content = $content;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }
}
?>