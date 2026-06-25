<?php

declare(strict_types=1);

namespace RunApi\Qwen2;

use RunApi\Core\BaseClient;
use RunApi\Core\ClientOptions;
use RunApi\Qwen2\Resources\EditImage;
use RunApi\Qwen2\Resources\RemixImage;
use RunApi\Qwen2\Resources\TextToImage;

/**
 * The Qwen2 image generation and edit API client.
 *
 * Exposes typed model resources plus the universal files and account resources.
 */
final class Qwen2Client extends BaseClient
{
    /**
     * Provides text-to-image operations.
     */
    public readonly TextToImage $textToImage;
    /**
     * Provides image remix operations.
     */
    public readonly RemixImage $remixImage;
    /**
     * Provides image edit operations.
     */
    public readonly EditImage $editImage;

    /**
     * Create a Qwen 2 client with optional API key, base URL, and transport overrides.
     */
    public function __construct(ClientOptions $options = new ClientOptions())
    {
        parent::__construct($options);
        $this->textToImage = TextToImage::fromHttp($this->http);
        $this->remixImage = RemixImage::fromHttp($this->http);
        $this->editImage = EditImage::fromHttp($this->http);
    }
}
