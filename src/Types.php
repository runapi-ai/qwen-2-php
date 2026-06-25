<?php

declare(strict_types=1);

namespace RunApi\Qwen2;

/**
 * Constants for model slugs supported by the Qwen 2 PHP SDK.
 */
final class Types
{
    /** @var list<string> */
    public const TEXT_TO_IMAGE_MODELS = ['qwen-2-text-to-image'];

    /** @var list<string> */
    public const REMIX_IMAGE_MODELS = ['qwen-2-remix-image'];

    /** @var list<string> */
    public const EDIT_IMAGE_MODELS = ['qwen-2-edit-image'];

    private function __construct()
    {
    }
}
