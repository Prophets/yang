<?php
declare(strict_types=1);

namespace WoohooLabs\Yang\JsonApi\Schema;

class Link
{
    /**
     * @var string
     */
    private $href;

    /**
     * @var array
     */
    private $meta;

    public static function createFromString(string $link): Link
    {
        return new self($link);
    }

    public static function createFromArray(array $link): Link
    {
        $href = isset($link["href"]) && is_string($link["href"]) ? $link["href"] : "";
        $meta = isset($link["meta"]) && is_array($link["meta"]) ? $link["meta"] : [];

        return new self($href, $meta);
    }

    public function __construct(string $href, array $meta = [])
    {
        $this->href = $href;
        $this->meta = $meta;
    }

    public function toArray(): array
    {
        $link = ["href" => $this->href];

        if (empty($this->meta) === false) {
            $link["meta"] = $this->meta;
        }

        return $link;
    }

    public function href(): string
    {
        return $this->href;
    }

    public function hasMeta(): bool
    {
        return empty($this->meta) === false;
    }

    public function meta(): array
    {
        return $this->meta;
    }
}
