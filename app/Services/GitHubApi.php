<?php

namespace App\Services;

use GrahamCampbell\GitHub\GitHubManager;

class GitHubApi
{
    private static $instance = null;
    private $github;

    private function __construct(GitHubManager $github)
    {
        $this->github = $github;
    }

    public static function getInstance(GitHubManager $github)
    {
        if (self::$instance === null) {
            self::$instance = new self($github);
        }

        return self::$instance;
    }

    public function getClient()
    {
        return $this->github;
    }
}
