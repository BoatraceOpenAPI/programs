<?php

declare(strict_types=1);

namespace BOA\Programs;

/**
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ProgramStorage
{
    /**
     * @psalm-param ScrapedStadiumRaces $programs
     * @psalm-param non-empty-string $path
     * @psalm-return void
     *
     * @param array $programs
     * @param string $path
     * @return void
     * @throws \RuntimeException
     */
    public function save(array $programs, string $path): void
    {
        $contents = json_encode(['programs' => $programs]);
        if ($contents === false) {
            throw new \RuntimeException("Failed to encode programs to JSON");
        }

        $dir = dirname($path);
        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException("Failed to create directory: {$dir}");
        }

        if (file_put_contents($path, $contents) === false) {
            throw new \RuntimeException("Failed to save programs to {$path}");
        }
    }
}
