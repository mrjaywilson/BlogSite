<?php
/**

Project name:       Bloggy Blog
Project Version:    1.15
Module Name:        Blog.php
Module Version:     1.0
Module Description: Handles the Blog object.
Developers:         Jay Wilson, Julian Silvestre
Date:               10.29.2018

 */

// Class Declaration
class Blog
{
    // Private fields
    private $id;
    private $title;
    private $username;
    private $content;
    private $timestamp;
    private $status;

    // Constructor
    public function __construct($id, $title, $username, $content, $timestamp, $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->username = $username;
        $this->content = $content;
        $this->timestamp = $timestamp;
        $this->status = $status;
    }

    // Accessors
    public function GetId() {
        return $this->id;
    }

    public function SetId($id) {
        $this->id = $id;
    }

    public function GetTitle() {
        return $this->title;
    }

    public function SetTitle($title) {
        $this->title = $title;
    }

    public function GetAuthor() {
        return $this->username;
    }

    public function SetAuthor($username) {
        $this->username = $username;
    }

    public function GetContent() {
        return $this->content;
    }

    public function SetContent($content) {
        $this->content = $content;
    }

    public function GetTimestamp() {
        return $this->timestamp;
    }

    public function SetTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function GetStatus() {
        return $this->status;
    }

    public function SetStatus($status) {
        $this->status = $status;
    }
}