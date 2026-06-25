<?php

declare(strict_types=1);

namespace RunApi\Qwen2\Resources;

use RunApi\Core\Http\HttpClient;
use RunApi\Core\Models\TaskCreateResponse;
use RunApi\Core\RequestOptions;
use RunApi\Core\Resources\TypedConfiguredResource;
use RunApi\Qwen2\Models\CompletedImageTaskResponse;
use RunApi\Qwen2\Models\ImageTaskResponse;
use RunApi\Qwen2\Types;

/**
 * Creates prompt-guided variations from a source image.
 */
readonly class RemixImage extends TypedConfiguredResource
{
    /**
     * Submits a remix-image task and returns immediately with a task id.
     *
     * @param array{
     *   model: string,
     *   prompt: string,
     *   source_image_url: string,
     *   acceleration?: string,
     *   callback_url?: string,
     *   output_format?: string
     * } $params
     */
    public function create(array $params, ?RequestOptions $options = null): TaskCreateResponse
    {
        return parent::create($params, $options);
    }

    /**
     * Fetches the current status of a remix-image task by id.
     */
    public function get(string $id, ?RequestOptions $options = null): ImageTaskResponse
    {
        $response = parent::get($id, $options);

        /** @var ImageTaskResponse $response */
        return $response;
    }

    /**
     * Submits a remix-image task and polls until it completes.
     *
     * @param array{
     *   model: string,
     *   prompt: string,
     *   source_image_url: string,
     *   acceleration?: string,
     *   callback_url?: string,
     *   output_format?: string
     * } $params
     */
    public function run(array $params, ?RequestOptions $options = null): CompletedImageTaskResponse
    {
        $response = parent::run($params, $options);

        /** @var CompletedImageTaskResponse $response */
        return $response;
    }

    /**
     * Create the resource using the shared RunAPI HTTP transport.
     */
    public static function fromHttp(HttpClient $http): self
    {
        return new self(
            $http,
            '/api/v1/qwen_2/remix_image',
            'qwen-2/remix-image',
            ImageTaskResponse::class,
            CompletedImageTaskResponse::class,
            Types::REMIX_IMAGE_MODELS,
            'remix-image',
            ImageTaskResponse::class,
            CompletedImageTaskResponse::class,
        );
    }
}
