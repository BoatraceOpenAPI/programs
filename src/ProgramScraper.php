<?php

declare(strict_types=1);

namespace BOA\Programs;

use Carbon\CarbonImmutable as Carbon;
use Carbon\CarbonInterface;

/**
 * @author shimomo
 */
final class ProgramScraper
{
    /**
     * @param \BOA\Programs\ScraperInterface  $scraper
     */
    public function __construct(private readonly ScraperInterface $scraper)
    {
        //
    }

    /**
     * @phpstan-type ScrapedRace array<non-empty-string, array<int, string|float|int>|string|int>
     * @phpstan-type ScrapedRaces array<int, ScrapedRace>
     * @phpstan-type NormalizedBoat array{
     *     racer_boat_number: int,
     *     racer_name: string,
     *     racer_number: int,
     *     racer_class_number: int,
     *     racer_branch_number: int,
     *     racer_birthplace_number: int,
     *     racer_age: int,
     *     racer_weight: float|int,
     *     racer_flying_count: int,
     *     racer_late_count: int,
     *     racer_average_start_timing: float|int,
     *     racer_national_top_1_percent: float|int,
     *     racer_national_top_2_percent: float|int,
     *     racer_national_top_3_percent: float|int,
     *     racer_local_top_1_percent: float|int,
     *     racer_local_top_2_percent: float|int,
     *     racer_local_top_3_percent: float|int,
     *     racer_assigned_motor_number: int,
     *     racer_assigned_motor_top_2_percent: float|int,
     *     racer_assigned_motor_top_3_percent: float|int,
     *     racer_assigned_boat_number: int,
     *     racer_assigned_boat_top_2_percent: float|int,
     *     racer_assigned_boat_top_3_percent: float|int
     * }
     * @phpstan-type NormalizedRace array{
     *     race_date: string,
     *     race_stadium_number: int,
     *     race_number: int,
     *     race_closed_at: string,
     *     race_grade_number: int,
     *     race_title: string,
     *     race_subtitle: string,
     *     race_distance: int,
     *     boats: array<int, NormalizedBoat>
     * }
     * @phpstan-type NormalizedRaces array<int, NormalizedRace>
     *
     * @param  \Carbon\CarbonInterface|string  $date
     * @return array<int, NormalizedRaces>
     */
    public function scrape(CarbonInterface|string $date = 'today'): array
    {
        $date = Carbon::parse($date, 'Asia/Tokyo');
        /** @var array<int, ScrapedRaces> $programs */
        $programs = $this->scraper->scrapePrograms($date);
        return $this->normalize($programs);
    }

    /**
     * @param  array<int, ScrapedRaces>  $programs
     * @return array<int, NormalizedRaces>
     */
    private function normalize(array $programs): array
    {
        $newPrograms = [];

        foreach (array_values($programs) as $data) {
            foreach (array_values($data) as $program) {
                $program['boats'] = isset($program['boats'])
                    ? array_values((array) $program['boats'])
                    : [];
                $newPrograms[] = $program;
            }
        }

        /** @var array<int, NormalizedRaces> */
        return $newPrograms;
    }
}
