<?php
namespace App\Services;

use App\Models\Repository;
use Github\Client;
use Illuminate\Support\Facades\Log;

class RepositoryService
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function updateOrCreate(array $repositoryData)
    {
        return Repository::updateOrCreate(
            ['repository_git_id' => $repositoryData['id']],
            $repositoryData
        );
    }

    public function createIfNotExists(array $repositoryData)
    {
        return Repository::firstOrCreate(
            ['repository_git_id' => $repositoryData['repository_git_id']], // Condition to check for existence
            $repositoryData // Attributes to set when creating a new record
        );
    }

    public function getRepositoryFromGit(string $owner = '', string $repo_name = '')
    {
        if (!empty($owner) && !empty($repo_name)){
            return $this->client->api('repo')->show($owner, $repo_name);
        }
        return [];
        
    }
    public function mountRepositoryDataFromUrl(string $url)
    {
        $repository = $this->getRepositoryFromGit(...$this->getOwnerRepoFromUrl($url));
        if (isset($repository)){
            return [
                "repository_git_id" => $repository['id'],
                "language" => $repository['language'],
                "full_name" => $repository['full_name'],
                "description" => $repository['description'],
                "stargazers_count" => $repository['stargazers_count'],
                "forks" => $repository['forks'],
                "open_issues" => $repository['open_issues'],
                "watchers" => $repository['watchers']
            ];
        }  
        return [];
    }

    protected function getOwnerRepoFromUrl(string $url): array {
        if (preg_match('/repos\/([^\/]+)\/([^\/]+)/', $url, $matches)) {
            $owner = $matches[1];
            $repo = $matches[2];
            return [$owner, $repo];
        }
        return [];
    }

    public function deleteAll(): void
    {
        try {
            Repository::query()->delete();
            Log::info('All repository have been successfully deleted.');
        } catch (\Exception $e) {
            Log::error('Error deleting all repository: ' . $e->getMessage());
        }
    }
}
