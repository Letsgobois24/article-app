<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class SupabaseStorageService
{
    protected string $url;
    protected string $key;
    protected string $bucket;


    public function __construct()
    {
        $this->url = config('services.supabase.url');
        $this->key = config('services.supabase.key');
        $this->bucket = config('services.supabase.bucket');
    }

    protected function headers(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->key,
            'apikey' => $this->key
        ];
    }

    public function upload(string $fileName, string $content, string $mime)
    {
        return Http::withHeaders($this->headers())->withBody(
            $content,
            $mime
        )->post(
            $this->fullUrl($fileName)
        );
    }

    public function delete(string $fileName)
    {
        return Http::withHeaders($this->headers())->delete(
            $this->fullUrl($fileName)
        );
    }

    protected function fullUrl(string $fileName)
    {
        return $this->url . '/storage/v1/object/' . $this->bucket . '/post-images/' . $fileName;
    }
}
