<?php

declare(strict_types=1);

namespace BOA\Programs;

use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @psalm-import-type ScrapedRaces from ScraperInterface
 * @psalm-import-type ScrapedStadiumRaces from ScraperInterface
 *
 * @author shimomo
 */
final class ProgramScraper
{
    /**
     * @psalm-param \BOA\Programs\ScraperInterface $scraper
     *
     * @param \BOA\Programs\ScraperInterface $scraper
     */
    public function __construct(private readonly ScraperInterface $scraper)
    {
        //
    }

    /**
     * @psalm-param \Carbon\CarbonInterface|string $date
     * @psalm-return ScrapedRaces
     *
     * @param \Carbon\CarbonInterface|string $date
     * @return array
     */
    public function scrape(CarbonInterface|string $date = 'today'): array
    {
        $date = Carbon::parse($date, 'Asia/Tokyo');

        /** @psalm-var ScrapedStadiumRaces $programs */
        $programs = $this->scraper->scrapePrograms($date);

        return $this->normalize($programs);
    }

    /**
     * @psalm-param ScrapedStadiumRaces $programs
     * @psalm-return ScrapedRaces
     *
     * @param array $programs
     * @return array
     */
    private function normalize(array $programs): array
    {
        $newPrograms = [];

        foreach (array_values($programs) as $data) {
            foreach (array_values($data) as $program) {
                $program['boats'] = isset($program['boats'])
                    ? array_values($program['boats'])
                    : [];

                $newPrograms[] = $program;
            }
        }

        /** @psalm-var ScrapedRaces */
        return $newPrograms;
    }
}
